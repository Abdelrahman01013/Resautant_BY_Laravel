<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Notifications\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.all', compact('comments'));
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
            'name' => 'max:255',
            'comment' => 'required',
            'photo' => 'mimes:png,Jpg,jpeg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $data = $request->all();

        if ($request->has('photo')) {
            $file = $request->photo;
            $name = time() . $file->getClientOriginalName();
            $file->move('assets_templet/img/customer/', $name);
            $data['photo'] = $name;
        }

        if (empty($request->name)) {
            $data['name'] = "User";
        }


        if ($comment = Comment::create($data)) {
            Notification::send(User::all(), new Customer($comment->id, 'c-2', 'New Comment By : ' . $comment->name));


            return response()->json([
                'msg' => 'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $comment = Comment::find($id);


        if (!empty($comment->photo)) {
            if (file_exists("assets_templet/img/customer/" . $comment->photo)) {
                unlink("assets_templet/img/customer/" . $comment->photo);
            }
        }

        if ($comment->destroy($id)) {
            return response()->json([
                'msg' => "success",
                'id' => $id
            ]);
        }
    }



    public function readNotifiction($notifiction_id)
    {
        DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);
        return redirect()->route('comments.index');
    }
}
