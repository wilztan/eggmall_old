<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Item;
use App\User;

class OtherController extends Controller
{
    public function showTransaction()
    {
        $data = Item::join('transactions','transactions.item_id','=','items.id')->where('user_id','=',Auth::User()->id)->where('status','=','ordered')->get();
        return view('admin.viewTransaction')->with('data',$data);
    }

    public function showHistory()
    {
    	$data = Item::join('transactions','transactions.item_id','=','items.id')->orderBy('status', 'desc')->get();
        return view('admin.viewHistory')->with('data',$data);;
    }

    public function setting()
    {
    	return view('admin.setting');
    }

    public function home()
    {
        $data =$paginator =Item::where('stock','>',0)->paginate(4);
        return view('welcome')->with('data',$data)->with('paginator',$paginator);
    }

    public function download()
    {
        return response()->download('public/download/eggmall.zip');
    }

    public function webdownload()
    {
        return response()->download('public/download/webeggmall.zip');
    }

}
