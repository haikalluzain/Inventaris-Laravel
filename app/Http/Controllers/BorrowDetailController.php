<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\BorrowDetail;
use App\Borrow;
use App\Item;
use App\Maintenance;
use Illuminate\Http\Request;

class BorrowDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $item = Item::find($request->item_id);
        $this->validate($request,[
            'total'=> 'numeric|max:'.$item->qty,
        ]);

        $item->update([
            'qty'=>$item->qty - $request->total
        ]);

        $cek = BorrowDetail::where(['borrow_id'=>$request->borrow_id,'item_id'=>$request->item_id]);

        if ($cek->count() > 0) {
            $cek->update([
                'total'=>$cek->first()->total + $request->total
            ]);
        }else{
            BorrowDetail::create($request->all());    
        }
            
        return redirect()->back()->with('message','add item to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrowDetail)
    {
        return view('pages.borrow.return',[
            'data' => $borrowDetail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowDetail $borrowDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $borrow)
    {
        $old_borrow = Borrow::find($borrow);

        for ($i = 0; $i < count($request->item_id); $i++) {
            $item = Item::find($request->item_id[$i]);
            $final_total = $request->total[$i] - $request->total_broken[$i];
            $item->update([
                'qty'=>$item->qty + $final_total
            ]);

            if ($request->total_broken[$i] > 0) {
                Maintenance::create([
                    'item_id'=> $request->item_id[$i],
                    'total'=> $request->total_broken[$i],
                    'borrow_id'=> $old_borrow->id,
                    'broken_at'=>Carbon::now()
                ]);
            }
        }

        $old_borrow->update(['status'=>'returned']);
        return redirect()->route('borrow.index')->with('message','return a borrow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowDetail $borrowDetail)
    {
        $item = Item::find($borrowDetail->item_id);
        $item->update([
            'qty'=>$item->qty + $borrowDetail->total
        ]);
        $borrowDetail->delete();
        return redirect()->back()->with('message','remove item from cart');
    }
}
