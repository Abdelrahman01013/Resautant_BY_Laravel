<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ApiOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return response()->json([
            'massage' => 'All Requests',
            'data' => $orders,
            'status' => 201
        ]);
    }
    public function archive()
    {
        $orders = Order::onlyTrashed()->get();

        if ($orders->count() > 0) {
            return response()->json([
                'massage' => 'All Archive',
                'data' => $orders,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'Nothing Archive',

            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
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
                'massage' => 'error',
                'data' => $validator->errors(),
            ]);
        }



        $order = Order::create($request->all());

        if ($order) {
            Notification::send(User::all(), new Customer($order->id, 'c-3', 'New Request By : ' . $order->name));
            return response()->json([
                'massage' => 'success',
                'data' => $order,
                'status' => 201

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function Restore_Archive($id)
    {
        $orders = Order::withTrashed()->where('id', $id)->restore();
        if ($orders) {
            return Response()->json([
                'massage' => 'success Restore ',

            ]);
        } else {
            return Response()->json([
                'massage' => 'unavailable',

            ]);
        }
    }

    public function show($id)
    {
        $orders = Order::where('id', $id)->where('deleted_at', null)->get();
        if ($orders) {
            return Response()->json([
                'massage' => 'success show ',
                'data' => $orders,
                'status' => 201
            ]);
        } else {
            return Response()->json([
                'massage' => 'unavailable',
                'status' => 404
            ]);
        }
    }
    public function show_Archive($id)
    {
        $orders = Order::onlyTrashed()->where('id', $id)->get();
        if ($orders) {
            return Response()->json([
                'massage' => 'success',
                'data' => $orders,
                'status' => 201
            ]);
        }
    }




    public function destroy(Request $request, $id)
    {
        $value = $request->value;

        if ($value == 1) {
            $order = Order::find($id);
            if ($order->delete()) {
                return response()->json([
                    'msg' => "success Go Archive",

                ]);
            };
        };
        if ($value == 2) {
            $order = Order::withTrashed()->where('id', $id)->first();
            if ($order->forceDelete()) {
                return response()->json([
                    'msg' => 'success DELETE',
                    'id' => $id
                ]);
            };
        }
    }



    // public function readNotifiction($notifiction_id)
    // {
    //     DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);
    //     return redirect()->route('orders.index');
    // }
}
