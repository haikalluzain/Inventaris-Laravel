<?php

namespace App\Http\Controllers;

use App\Room;
use App\Type;
use App\Item;
use App\Borrow;
use App\BorrowDetail;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function room()
    {
    	return view('pages.report.room',[
    		'rooms'=>Room::all(),
    	]);
    }

    public function type()
    {
    	return view('pages.report.type',[
    		'types'=>Type::all(),
    	]);
    }

    public function printroom(Request $request)
    {
        $room = Room::find($request->room_id);
        return view('pages.report.printroom',[
            'data' => Item::where('room_id',$request->room_id)->get(),
            'room' => $room->name
        ]);
    }

    public function printtype(Request $request)
    {
        $type = Type::find($request->type_id);
        return view('pages.report.printtype',[
            'data' => Item::where('type_id',$request->type_id)->get(),
            'type' => $type->name
        ]);
    }

    public function printperiod(Request $request)
    {
        if ($request->start > $request->end) {
            return redirect()->back()->withError('Date start cannot more than date end');
        }else{
            $borrow = BorrowDetail::whereBetween('created_at',[$request->start,$request->end])->get();
            return view('pages.report.printperiod',[
                'data' => $borrow,
                'start' => $request->start,
                'end' => $request->end,
            ]);
        }
    }

    public function unreturned(Request $request)
    {
        $borrow = BorrowDetail::whereExists(function ($query) {
                $query->select()
                      ->from('borrows')
                      ->where('status','borrowed');
            })
            ->get();
        return view('pages.report.unreturned',[
            'data' => $borrow,
        ]);
        // return dd($borrow);
    }
}
