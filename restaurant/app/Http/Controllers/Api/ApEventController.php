<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Notifications\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ApEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        if ($events) {
            return response()->json([
                'massage' => 'All Events',
                'data' => $events,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'unavailable'
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
    //     return view('events.create');
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
            'title' => 'required|max:255',
            'price' => 'required |max:255',
            'description' => 'required',
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
        $file->move('assets_templet/img/events/', $name);


        $data = $request->all();
        $data['photo'] = $name;

        if ($event = Event::create($data)) {

            Notification::send(User::where('id', '!=', auth()->user()->id)->get(), new Add($event->id, 'evn', 'Create New Events By : '));

            return response()->json([
                'massage' => 'Success',
                'data' => $event,
                'status' => 201

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        if ($event) {
            return response()->json([
                'massage' => "Success Show",
                'data' => $event,
                'status' => 201
            ]);
        } else {
            return response()->json([
                'massage' => 'unavailable'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $event = Event::find($id);

    //     return view('events.update', compact('event'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|',
            'price' => 'required|max:255',
            'description' => 'required',
            'photo' => 'mimes:png,Jpg,jpeg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $data = $request->all();
        $product = Event::find($id);
        if ($request->has('photo')) {
            $productOldPath = "assets_templet/img/events/" . $product->photo;
            $file = $request->photo;
            $name = time() . $file->getClientOriginalName();
            $file->move('assets_templet/img/events/', $name);
            $data['photo'] = $name;
            if (file_exists($productOldPath)) {
                unlink($productOldPath);
            }
        };


        if ($product->update($data)) {
            return response()->json([
                'massage' => 'success',
                'data' => $data,
                'status' => 201

            ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event = Event::find($id);

        $old_path = "assets_templet/img/events/" . $event->photo;
        if (file_exists($old_path)) {
            unlink($old_path);
        }

        $event->destroy($id);
        return response()->json([
            'massage' => "success delete",

        ]);
    }


    // public function readNotifiction($product_id, $notifiction_id)
    // {
    //     DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);

    //     if ($event = Event::find($product_id)) {
    //         return view('events.update', compact('event'));
    //     } else {
    //         return redirect()->back();
    //     }
    // }
}
