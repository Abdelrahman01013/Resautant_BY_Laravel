<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\User;
use App\Notifications\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Testing\Fakes\NotificationFake;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = Chef::all();

        return view('chef.all', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chef.create');
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
            'description' => 'required',
            'job' => 'required|max:255',
            'photo' => 'required|mimes:png,Jpg,jpeg,gif',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'msg' => "error",
                'data' => $validator->errors()
            ]);
        }




        $file = $request->photo;
        $name = time() . $file->getClientOriginalName();
        $file->move('assets_templet/img/chefs/', $name);

        $chef = Chef::create([
            'name' => $request->name,
            'job' => $request->job,
            'description' => $request->description,
            'photo' => $name,
        ]);

        if ($chef) {

            Notification::send(User::where('id', '!=', auth()->user()->id)->get(), new Add($chef->id, 1, "Create New Chef By: "));




            return response()->json([
                'msg' => 'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $chef = Chef::find($id);
        return view('chef.show', compact('chef'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chef = Chef::find($id);
        return view('chef.update', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'description' => 'required',
            'job' => 'max:255',
            'photo' => 'mimes:png,jpg,jpeg,gif'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors()
            ]);
        }

        $data = $request->all();
        $chefBefore = Chef::find($id);
        if ($request->has('photo')) {
            $file = $request->photo;
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move('assets_templet/img/chefs/', $name);
            $data = array_merge($data, ['photo' => $name]);
            $old_path = 'assets_templet/img/chefs/' . $chefBefore->photo;

            if (file_exists($old_path)) {
                unlink($old_path);
            }
        }

        $chefBefore->update($data);

        // إرسال إشعار التحديث
        // $notification = new Add($chefBefore->id, 'chef', 'Chef updated');
        // $users = User::where('id', '!=', auth()->user()->id)->get();
        // Notification::send($users, $notification);

        Notification::send(User::where('id', '!=', auth()->user()->id)->get(), new Add($chefBefore->id, 1, 'Chef updated'));

        return response()->json([
            'msg' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // {
    //     $chef = Chef::find($request->id);
    //     $old_path = "assets_templet/img/chefs/" . $chef->photo;
    //     if (file_exists($old_path)) {
    //         unlink($old_path);
    //     }

    //     $chef->destroy($request->id);
    //     return response()->json([
    //         'msg' => "success",
    //         'id' => $request->id
    //     ]);
    // }
    public function destroy($id)
    {

        $chef = Chef::find($id);
        $old_path = "assets_templet/img/chefs/" . $chef->photo;
        if (file_exists($old_path)) {
            unlink($old_path);
        }

        $chef->destroy($id);
        Notification::send(User::where('id', '!=', auth()->user()->id)->get(), new Add($chef->name, 0, "Delete " . $chef->name . " Chef By"));

        return response()->json([
            'msg' => "success",
            'id' => $id
        ]);
    }

    public function chef_update(Request $request)
    {
        return $request;
    }

    public function readNotifiction($product_id, $notifiction_id)
    {
        DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);
        if ($chef = Chef::find($product_id)) {
            return view('chef.show', compact('chef'));
        } else {
            return redirect()->back();
        }
    }
    public function read_All()
    {
        $not = auth()->user()->unreadNotifications;

        if ($not) {
            $not->markAsRead();
        }

        return response()->json(['success' => true]);
    }

    public function delete_all_notifiction()
    {
        $user_id = auth()->user()->id;

        DB::table('notifications')->where('notifiable_id', $user_id)->delete();
    }
}
