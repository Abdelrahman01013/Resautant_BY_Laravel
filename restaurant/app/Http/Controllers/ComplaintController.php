<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use App\Notifications\Add;
use App\Notifications\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all();
        return view('complaient_customer.all', compact('complaints'));
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
            'name' => 'required|max:255|unique:meals,name',
            'email' => 'required |email',
            'complaint' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }





        if ($complaint = Complaint::create($request->all())) {


            Notification::send(User::all(), new Customer($complaint->id, 'c-1', 'New Complaint By ' . $complaint->name));
            return response()->json([
                'msg' => 'success',



            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::withTrashed()->where('id', $id)->restore();
        if ($complaint) {
            return Response()->json([
                'msg' => 'success',
                'id' => $id
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $value = $request->value;

        if ($value == 1) {
            $order = Complaint::find($id);
            if ($order->delete()) {
                return response()->json([
                    'msg' => "success",
                    'id' => $id
                ]);
            };
        };
        if ($value == 2) {
            $order = Complaint::withTrashed()->where('id', $id)->first();
            if ($order->forceDelete()) {
                return response()->json([
                    'msg' => 'success',
                    'id' => $id
                ]);
            };
        }
    }

    public function archive()
    {
        $complaints = Complaint::onlyTrashed()->get();
        return view('complaient_customer.archive', compact('complaints'));
    }

    public function readNotifiction($notifiction_id)
    {
        DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);

        return redirect()->route('complaints.index');
    }
}
