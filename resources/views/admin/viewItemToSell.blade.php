@extends('layouts.admin')

@section('content')
<h3>Item You Sell</h3>
<div class="row">
    @foreach($data as $product)
      <div class="col-md-3">
        <div class="card">
          <img class="item-images" src="{{ asset($product->imgUrl) }}" alt="Avatar" style="width:100%">
          <div class="container item-content">
            <h4><b>@if(strlen($product->name) > 20) {{ substr($product->name, 0, 17) . '...'}}@else{{$product->name}}@endif</b></h4> 
            <p>Stock : {{$product->stock}}</p>
            <a class="btn btn-primary" data-toggle="modal" href='#modal-{{$product->id}}'>About</a>
            <a href="{{action('ItemController@edit',$product->id)}}" class="btn btn-info">Edit</a>
            
            <div class="modal fade" id="modal-{{$product->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{$product->name}}</h4>
                  </div>
                  <div class="modal-body">
                    <img src="{{ asset($product->imgUrl) }}" alt="Avatar" style="width:100%">
                    <h3>Stock : {{$product->stock}}<br>Price : {{$product->price}}</h3>
                    {{$product->desc}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    @endforeach
  </div>


  <div align="center">
    <div  class="pagination"> {{ $data->render() }} </div>
  </div>
@endsection