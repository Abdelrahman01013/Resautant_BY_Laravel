<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Section;
use App\Models\User;
use App\Notifications\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all();
        $sections = Section::all();
        return view('meals.all', compact('meals', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        return view('meals.create', compact('sections'));
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
            'price' => 'required |max:255',
            'components' => 'required',
            'photo' => 'required|mimes:png,Jpg,jpeg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $file = $request->photo;
        $name = time() . $file->getClientOriginalName();
        $file->move('assets_templet/img/menu/', $name);


        $data = $request->all();
        $data['photo'] = $name;

        if ($meal = Meal::create($data)) {
            Notification::send(User::where('id', '!=', auth()->user()->id)->get(), new Add($meal->id, 'meal', 'Create New Meal By : '));


            return response()->json([
                'msg' => 'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sections = Section::all();
        $meal = Meal::find($id);
        return view('meals.update', compact('sections', 'meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required |max:255',
            'components' => 'required',
            'photo' => 'mimes:png,Jpg,jpeg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $data = $request->all();
        $product = Meal::find($id);
        if ($request->has('photo')) {
            $productOldPath = "assets_templet/img/menu/" . $product->photo;
            $file = $request->photo;
            $name = time() . $file->getClientOriginalName();
            $file->move('assets_templet/img/menu/', $name);
            $data['photo'] = $name;
            if (file_exists($productOldPath)) {
                unlink($productOldPath);
            }
        };


        if ($product->update($data)) {
            return response()->json([
                'msg' => 'success',
                'name' => $request->name

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $meal = Meal::find($id);

        $old_path = "assets_templet/img/menu/" . $meal->photo;
        if (file_exists($old_path)) {
            unlink($old_path);
        }

        $meal->destroy($id);
        return response()->json([
            'msg' => "success",
            'id' => $id
        ]);
    }

    public function readNotifiction($product_id, $notifiction_id)
    {
        DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);

        if ($meal = Meal::find($product_id)) {
            $sections = Section::all();
            return view('meals.update', compact('meal', 'sections'));
        } else {
            return redirect()->back();
        }
    }
}
