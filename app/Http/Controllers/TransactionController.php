<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Item;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::join('transactions','transactions.item_id','=','items.id')->where('buyer_id','=',Auth::User()->id)->where('status','=','ordered')->get();
        return view('admin.viewOrder')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buyitem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Item::find($request->item_id)->first();
        Transaction::create([
            'item_id'=>$request->item_id,
            'buyer_id'=>Auth::User()->id,
            'status'=>'ordered',
            'qty'=>$request->qty,
            'price'=>$item->price,
            ]);
        return redirect('/home')->with('messages','Order Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirmTransaction($id)
    {
        $data = Transaction::find($id)->first();
        $item = Item::Find($data->item_id)->first();
        if($item->user_id == Auth::User()->id){
            if($item->stock>=$data->qty){
                $item->stock = $item->stock-$data->qty;
                $item->save();
                $data->status="confirmed";
                $data->save();
                $message = 'Transaction Confirmed';
            }else{
                $message ='Stock not Available';
            }
        }
        else{
            $message = 'not confirmeds';
        }
        return redirect('/home')->with('messages',$message);
    }

    public function cancelTransaction($id)
    {
        $data = Transaction::find($id)->first();
        if($data->buyer_id == Auth::User()->id){
            $data->status="canceled";
            $data->save();
            $message = 'Transaction Confirmed';
        }
        else{
            $message = 'not confirmeds';
        }
        return redirect('/home')->with('messages',$message);
    }

}
