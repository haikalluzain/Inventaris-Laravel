<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Borrow;
use App\Employee;
use App\Item;
use Auth;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('web')->check()) {
            $data = Borrow::latest()->get();
        }else{
            $data = Borrow::where('employee_id',Auth::guard('employee')->user()->id)->get();
        }

        return view('pages.borrow.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.borrow.create',[
            'emps' => Employee::all()
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
        if (Auth::guard('web')->check()) {
            $borrow = new Borrow($request->all());
            $borrow->date_borrow = Carbon::now();
            $borrow->date_return = Carbon::now()->addDays($request->dayCount);
            $borrow->officer_id = Auth::id();
            $borrow->status = "uncompleted";
            $borrow->save();
        }else{
            $borrow = new Borrow($request->all());
            $borrow->date_borrow = Carbon::now();
            $borrow->date_return = Carbon::now()->addDays($request->dayCount);
            $borrow->status = "uncompleted";
            $borrow->save();
        }

        return redirect()->route('borrow.show',$borrow);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('pages.borrow.show',[
            'data' =>$borrow,
            'items' => Item::where('qty','>',0)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        if(Auth::guard('web')->check()){
            $borrow->update(['status'=>'borrowed']);
        }else{
            $borrow->update(['status'=>'booking']);
        }

        return redirect()->route('borrow.index')->with('message','create a borrow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }

    public function detail(Borrow $borrow)
    {
        return view('pages.borrow.detail',[
            'data'=>$borrow
        ]);
    }

    public function confirm(Borrow $borrow)
    {
        $borrow->update([
            'status'=>'borrowed',
            'officer_id'=>Auth::id()
        ]);

        return redirect()->back()->with('message','confirm a borrow');
    }

    public function denied(Borrow $borrow)
    {
        $borrow->update([
            'status'=>'denied',
            'officer_id'=>Auth::id()
        ]);

        foreach ($borrow->borrowDetail as $field) {
            $item = Item::find($field->item_id);
            $item->update([
                'qty'=>$item->qty + $field->total
            ]);   
        }

        return redirect()->back()->with('message','denied a borrow');
    }

    public function cancel(Borrow $borrow)
    {
        $borrow->update([
            'status'=>'canceled'
        ]);

        foreach ($borrow->borrowDetail as $field) {
            $item = Item::find($field->item_id);
            $item->update([
                'qty'=>$item->qty + $field->total
            ]);   
        }

        return redirect()->back()->with('message','cancel a borrow');
    }
}
