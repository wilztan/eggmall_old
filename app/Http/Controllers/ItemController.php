<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::Where('user_id','=',Auth::User()->id)->paginate(4);
        return view('admin.viewItemToSell')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createNewItem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $item=Item::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'type'=>$request->type,
            'desc'=>$request->desc,
            'user_id'=>Auth::User()->id,
            'imgUrl'=>'asd',
            ]);
        // Validating Photos
        if ($request->file('imgUrl')->isValid()) {
            $img_url=$request->file('imgUrl')->move('public/img/item/',$item->id.".tmp");
            $item->imgUrl = $img_url;
            $item->save();
        }
        return redirect('home');
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
        $item = Item::find($id)->first();
        return view('admin.editItem')->with('item',$item);
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
        if(!empty($request->imgUrl)){
            $imgUrl=$request->file('imgUrl')->move('public/img/item/',$id.".tmp");
        }
        Item::find($id)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'type'=>$request->type,
            'desc'=>$request->desc,
            ]);
        return redirect('home');
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
}
