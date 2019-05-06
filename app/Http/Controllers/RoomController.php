<?php

namespace App\Http\Controllers;

use App\Room;
use App\Item;
use Log;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.room.index',[
            'data'=>Room::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Room::create($request->all());
        return redirect()->route('room.index')->with('message','create a room');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('pages.room.edit',[
            'data' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        Room::find($room->id)->update($request->except('_method','_token'));
        return redirect()->route('room.index')->with('message','edit a room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $cek = Item::where('room_id',$room->id)->count();
        if ($cek > 0) {
            return redirect()->back()->withError('This room is already in use');
        }else{
            Log::info('Melakukan penghapusan ruangan');
            $room->delete();
            return redirect()->route('room.index')->with('message','delete a room');
        }
    }
}
