<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\Customer;
use Illuminate\Support\Facades\Validator;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('reaquest.all', compact('orders'));
    }
    public function archive()
    {
        $orders = Order::onlyTrashed()->get();
        return view('reaquest.archive', compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'email',
            'phone' => 'required|max:255',
            'date' => 'required |max:255',
            'time' => 'required |max:255',
            'number_people' => 'required |max:255',
            'message' => 'required',



        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }



        $order = Order::create($request->all());

        if ($order) {
            Notification::send(User::all(), new Customer($order->id, 'c-3', 'New Request By : ' . $order->name));
            return response()->json([
                'msg' => 'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::withTrashed()->where('id', $id)->restore();
        if ($orders) {
            return Response()->json([
                'msg' => 'success',
                'id' => $id
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $value = $request->value;

        if ($value == 1) {
            $order = Order::find($id);
            if ($order->delete()) {
                return response()->json([
                    'msg' => "success",
                    'id' => $id
                ]);
            };
        };
        if ($value == 2) {
            $order = Order::withTrashed()->where('id', $id)->first();
            if ($order->forceDelete()) {
                return response()->json([
                    'msg' => 'success',
                    'id' => $id
                ]);
            };
        }
    }



    public function readNotifiction($notifiction_id)
    {
        DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);
        return redirect()->route('orders.index');
    }
}
