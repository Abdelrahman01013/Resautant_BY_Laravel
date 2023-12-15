<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        if ($galleries) {
            return response()->json([
                'massage' => 'All Gallery',
                'data' => $galleries,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'unavailable',

            ]);
        }
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'gallery' => 'required|mimes:png,Jpg,jpeg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $file = $request->gallery;
        $name = time() . $file->getClientOriginalName();
        $file->move('assets_templet/img/gallery/', $name);


        $data = $request->all();
        $data['gallery'] = $name;

        if (Gallery::create($data)) {
            return response()->json([
                'massage' => 'success',
                'data' => $data,
                'status' => 201

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);

        if ($gallery) {
            return response()->json([
                'massage' => 'Success',
                'data' => $gallery,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'unavailable',

            ]);
        }
    }




    public function destroy($id)
    {

        $gallery = Gallery::find($id);

        $old_path = "assets_templet/img/gallery/" . $gallery->gallery;
        if (file_exists($old_path)) {
            unlink($old_path);
        }

        $gallery->destroy($id);
        return response()->json([
            'msg' => "Success Delete",

        ]);
    }
}
