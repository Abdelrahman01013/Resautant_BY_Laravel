<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use App\Notifications\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ApiComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all();
        return response()->json([
            'massage' => 'success',
            'data' => $complaints,
            'status' => 201
        ]);
    }
    public function all_Archive()
    {
        $all = Complaint::onlyTrashed()->get();

        if ($all) {
            return response()->json([
                'massage' => 'All Archive',
                'data' => $all,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'unvaliable',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
                'massage' => 'success',
                'data' => $complaint,
                'status' => 201



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
        $complaint = Complaint::find($id);
        if ($complaint) {
            return Response()->json([
                'massage' => 'Success',
                'data' => $complaint,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'This Complaint unavailable',
            ]);
        }
    }
    public function show_Archive($id)
    {
        $complaint = Complaint::onlyTrashed()->where('id', $id)->get();
        if ($complaint->count() > 0) {
            return Response()->json([
                'massage' => 'Success',
                'data' => $complaint,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'This Complaint unavailable',
            ]);
        }
    }
    // public function show_Archive($id)
    // {
    //     $complaint = Complaint::withTrashed()->where('id', $id)->restore();
    //     if ($complaint) {
    //         return Response()->json([
    //             'massage' => 'Success',
    //             'data' => $complaint,
    //             'status' => 201
    //         ]);
    //     } else {
    //         return response()->json([
    //             'massage' => 'This Complaint unavailable',
    //         ]);
    //     }
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */


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
                    'massage' => "success Archive",
                    'data' => $order,
                    'status' => 201
                ]);
            };
        };
        if ($value == 2) {
            $order = Complaint::withTrashed()->where('id', $id)->first();
            if ($order->forceDelete()) {
                return response()->json([
                    'msg' => 'Success Delete ',

                ]);
            };
        }
    }


    // public function readNotifiction($notifiction_id)
    // {
    //     DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);

    //     return redirect()->route('complaints.index');
    // }
}
