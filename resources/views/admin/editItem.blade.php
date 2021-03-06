@extends('layouts.admin')

@section('content')
{!! Form::open([
	'method' => 'PUT',
	'role'=>'form',
	'action'=>['ItemController@update',$item->id],
	'enctype'=>"multipart/form-data",
]) !!}
	<legend>Sell New Item</legend>

	<div class="form-group">
		<label for="">Item Name</label>
		<input type="text" class="form-control" id="" name="name" placeholder="Input field" required="true" value="{{$item->name}}">
	</div>

	<div class="form-group">
		<label for="">Stock</label>
		<input type="number" class="form-control" id="" name="stock" placeholder="Input field" required="true" value="{{$item->stock}}">
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="number" class="form-control" id="" name="price" placeholder="Input field" required="true" value="{{$item->price}}">
	</div>

	<div class="form-group">
		<label for="">Item Type</label>
		<input type="text" class="form-control" id="" name="type" placeholder="Input field" required="true" value="{{$item->type}}">
	</div>

	<div class="form-group">
		<label for="">Description</label>
		<textarea type="text" class="form-control" id="" name="desc" placeholder="Input field" required="true" value="{{$item->desc}}">
		</textarea>
	</div>

	<div class="form-group">
		<label for="">Input Item Image <small>Max 2mb</small></label>
		<input type="file" class="form-control" id="" name="imgUrl" value="{{$item->imgUrl}}">
	</div>
	
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}
@endsection