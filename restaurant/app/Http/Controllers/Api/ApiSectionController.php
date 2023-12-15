<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\User;
use App\Notifications\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ApiSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();

        return response()->json([
            'massage' => 'All Sections',
            'data' => $sections,
            'status' => 201
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('sections.create');
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
            'name' => 'required|max:255|unique:sections,name,'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'msg' => "error",
                'data' => $validator->errors()
            ]);
        }

        if ($section = Section::create($request->all())) {
            Notification::send(User::where('id', '!=', auth()->user()->id)->get(), new Add($section->id, 'section', 'Create New Section By : '));

            return response()->json([
                'massage' => "success",
                'data' => $section,
                'status' => 201


            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        if ($section) {
            return response()->json([
                'massage' => 'Show Success',
                'data' => $section,
                'status' => 201
            ]);
        } else {
            return response()->json(['massage' => 'unavailable']);
        }
    }




    public function update(Request $request, $id)
    {



        $validator = Validator::make($request->all(), [
            'name' => "required|max:255|unique:sections,name"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => "error",
                'data' => $validator->errors()
            ]);
        }

        $update = Section::find($id);
        if ($update->update($request->all())) {
            return response()->json([
                'massage' => "success",
                'data' => $update,
                'status' => 201
            ]);
        }
    }




    public function destroy($id)
    {
        if (Section::destroy($id)) {
            return response()->json([
                'massage' => "success DELETE",

            ]);
        } else {
            return response()->json([
                'massage' => "unavailable"
            ]);
        }
    }
    // public function readNotifiction($product_id, $notifiction_id)
    // {
    //     DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);

    //     if ($section = Section::find($product_id)) {
    //         return view('sections.update', compact('section'));
    //     } else {
    //         return redirect()->back();
    //     }
    // }
}
