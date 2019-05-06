<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Item;
use App\Type;
use App\Room;
use App\Supply;
use App\BorrowDetail;
use Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.item.index',[
            'data'=>Item::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.item.create',[
            'types' => Type::all(),
            'rooms' => Room::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item($request->all());
        $item->registration_date = Carbon::now();
        $item->officer_id = Auth::id();
        $item->save();

        return redirect()->route('item.index')->with('message','create an item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('pages.item.supply',[
            'data' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('pages.item.edit',[
            'data' => $item,
            'types' => Type::all(),
            'rooms' => Room::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        Item::find($item->id)->update($request->except('_method','_token'));
        return redirect()->route('item.index')->with('message','update item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $cek = BorrowDetail::where('item_id',$item->id)->count();
        if ($cek > 0) {
            return redirect()->back()->withError('This item is already in use');
        }else{
            $item->delete();
            return redirect()->route('item.index')->with('message','delete item');
        }
    }

    public function supply(Request $request)
    {
        $supply = new Supply($request->all());
        $supply->officer_id = Auth::id();
        $supply->date = Carbon::now();
        $supply->save();

        $item = Item::find($request->item_id);
        $item->update([
            'qty' => $item->qty + $request->total
        ]);

        return redirect()->route('item.index')->with('message','supply item');
    }
}
