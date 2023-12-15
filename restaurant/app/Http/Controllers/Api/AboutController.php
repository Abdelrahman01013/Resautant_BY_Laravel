<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::latest()->first();
        if (!$about) {
            return response()->json([
                'massage' => "PLZ Create First",
                'data' => Null
            ]);
        } else {

            return response()->json([
                'massage' => "All Page Home",
                'data' => $about
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title_head' => 'required |max:255',
            'body_head' => 'required',
            'body_footer' => 'required',
            'phone' => 'required |max:255',
            'hours_of_support' => 'required |max:255',
            'workers' => 'required |max:255',
            'address' => 'required',
            'email' => 'required|email|max:200',
            'opening_hours' => 'required',
            'photo_head' => 'required|mimes:png,Jpg,jpeg,gif',
            'video_head' => 'required|mimes:mp4,avi',
            'video_footer' => 'required|mimes:mp4,avi',


        ]);


        if ($validator->fails()) {
            return response()->json([
                'msg' => "errors",
                'data' => $validator->errors()
            ]);
        }

        $data = $request->all();





        $file = $request->file('photo_head');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets_templet/img/home/photo', $name);
        $data = array_merge($data, ['photo_head' => $name]);





        $file = $request->file('video_head');
        $name = time() . "." . $file->getClientOriginalExtension();
        $file->move('assets_templet/img/home/video', $name);
        $data = array_merge($data, ['video_head' => $name]);





        $file = $request->file('video_footer');
        $name = time() . "." . $file->getClientOriginalExtension();
        $file->move('assets_templet/img/home/video', $name);
        $data = array_merge($data, ['video_footer' => $name]);



        $page = About::create($data);


        return response()->json([
            'massage' => "success Add In Page Home",
            'data' => $page
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    // public function show(About $about)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    // public function edit(About $about)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title_head' => 'required |max:255',
    //         'body_head' => 'required',
    //         'body_footer' => 'required',
    //         'phone' => 'required |max:255',
    //         'address' => 'required',
    //         'email' => 'required|email|max:200',
    //         'opening_hours' => 'required',
    //     ]);


    //     if ($validator->fails()) {
    //         return response()->json([
    //             'msg' => "errors",
    //             'data' => $validator->errors()
    //         ]);
    //     }

    //     $data = $request->all();

    //     $update = About::latest()->first();

    //     if ($request->hasFile('photo_head')) {
    //         $validator = Validator::make($request->all(), [
    //             'photo_head' => 'mimes:png,Jpg,jpeg,gif'


    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'msg' => "errors",
    //                 'data' => $validator->errors()
    //             ]);
    //         }
    //         $file = $request->file('photo_head');
    //         $name = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move('assets_templet/img/home/photo', $name);
    //         $data = array_merge($data, ['photo_head' => $name]);
    //         $old_path = 'assets_templet/img/home/photo/' . $update->photo_head;
    //         if (file_exists($old_path)) {
    //             unlink($old_path);
    //         }
    //     }


    //     if ($request->hasFile('video_head')) {
    //         $validator = Validator::make($request->all(), [
    //             'video_head' => 'mimes:mp4,x-msvideo,avi'


    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'msg' => "errors",
    //                 'data' => $validator->errors()
    //             ]);
    //         }


    //         $file = $request->file('video_head');
    //         $name = time() . "." . $file->getClientOriginalExtension();
    //         $file->move('assets_templet/img/home/video', $name);
    //         $data = array_merge($data, ['video_head' => $name]);
    //         if ($data) {
    //             $old_path_video = 'assets_templet/img/home/photo/video/' . $update->video_head;
    //             if (file_exists($old_path_video)) {
    //                 // unlink($old_path_video);
    //                 shell_exec("rm $old_path_video");
    //             }
    //         }
    //     }
    //     if ($request->hasFile('video_footer')) {
    //         $validator = Validator::make($request->all(), [
    //             'video_footer' => 'mimes:mp4,x-msvideo,avi'


    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'msg' => "errors",
    //                 'data' => $validator->errors()
    //             ]);
    //         }


    //         $file = $request->file('video_footer');
    //         $name = time() . "." . $file->getClientOriginalName();
    //         $file->move('assets_templet/img/home/video', $name);
    //         $data = array_merge($data, ['video_footer' => $name]);
    //     }


    //     $update->update($data);


    //     return response()->json([
    //         'msg' => "success",
    //         'data' => "success Update"
    //     ]);
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    // public function destroy(About $about)
    // {
    //     //
    // }
}
