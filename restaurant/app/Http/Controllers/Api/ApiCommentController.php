<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ApiCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json([
            'massage' => "All Comment",
            'data' => $comments,
            'status' => 201
        ]);
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
                'massage' => 'success Create Comment',
                'data' => $comment,
                'status' => 201

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return response()->json([
            'massage' => 'show Comment',
            'data' => $comment,
            'status' => 201
        ]);
    }


    public function destroy($id)
    {

        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json([
                'massage' => 'This Comment Unavailable',
                'status' => 404
            ]);
        }


        if (!empty($comment->photo)) {
            if (file_exists("assets_templet/img/customer/" . $comment->photo)) {
                unlink("assets_templet/img/customer/" . $comment->photo);
            }
        }

        if ($comment->destroy($id)) {
            return response()->json([
                'Massage' => "Success Delete Comment",

            ]);
        }
    }
}
