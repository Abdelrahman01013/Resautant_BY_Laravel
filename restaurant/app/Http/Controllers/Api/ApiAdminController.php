<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();


        return response()->json([
            'massage' => "All Users",
            'data' => $users,
            'status' => 201
        ]);
    }

    // public function admin()
    // {
    //     $count_orders = Order::where('deleted_at', null)->count();
    //     $count_complaints = Complaint::where('deleted_at', null)->count();

    //     $count_all_orders = Order::withTrashed()->count();

    //     $monthly_orders = [];
    //     $count_orders_month = [];
    //     $count_complaints_month = [];
    //     for ($i = 1; $i <= 12; $i++) {
    //         $orders_month = Order::withTrashed()->whereMonth('created_at', $i)->whereYear('created_at', now()->year)->count();
    //         $complaints_month = Complaint::withTrashed()->whereMonth('created_at', $i)->whereYear('created_at', now()->year)->count();

    //         $count_orders_month[$i] = $orders_month;
    //         $count_complaints_month[$i] = $complaints_month;

    //         if ($count_all_orders !== 0) {

    //             $percentage = ($orders_month / $count_all_orders) * 100;
    //         } else {
    //             $percentage = 0;
    //         }
    //         $monthly_orders[] = $percentage;
    //     }

    //     $chartjs = app()->chartjs
    //         ->name('lineChartTest')
    //         ->type('line')
    //         ->size(['width' => 400, 'height' => 200])
    //         ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
    //         ->datasets([
    //             [
    //                 "label" => "My First dataset",
    //                 'backgroundColor' => "rgba(38, 185, 154, 0.31)",
    //                 'borderColor' => "rgba(38, 185, 154, 0.7)",
    //                 "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
    //                 "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
    //                 "pointHoverBackgroundColor" => "#fff",
    //                 "pointHoverBorderColor" => "rgba(220,220,220,1)",
    //                 'data' => $monthly_orders,
    //             ],
    //         ])
    //         ->options([]);

    //     return view('index', compact('count_orders', 'count_complaints', 'chartjs', 'count_orders_month', 'count_complaints_month'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admains.create');
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
            'status' => 'in:1,2',
            'email' => 'required |email|unique:users,email',
            'password' => 'required |min:8',
            're-password' => 'same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }



        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        if ($user) {
            return response()->json([
                'massage' => 'success',
                'data' => $user,
                'status' => 201

            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'massage' => 'Success User',
            'data' => $user,
            'status', 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'status' => 'integer',
            'email' => "email|unique:users,email,$id,id",
            'password' => 'min:8',
            're-password' => 'same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::find($id);

        if ($user->update($data)) {
            return response()->json([
                'massage' => 'success Update',
                'data' => $user,
                'status' => 201

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);



        $user->destroy($id);
        return response()->json([
            'msg' => "success DELETE",

        ]);
    }
}
