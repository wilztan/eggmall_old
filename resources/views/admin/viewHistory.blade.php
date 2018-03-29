@extends('layouts.admin')

@section('header')
	<script type="text/javascript">{{$a=1}}</script>
@endsection

@section('content')
<h4>More Coming Soon! <small>Item you have ordered or transact with</small></h4>
@if(session('messages'))
<div class="alert alert-success" role="alert">{{session('messages')}}</div>
@endif
<div>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>no</th>
				<th>item name</th>
				<th>price</th>
				<th>stock</th>
				<th>seller</th>
				<th>buyer</th>
				<th>status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $transaction)
			<tr>
				<td>{{$a++}}</td>
				<td>{{$transaction->name}}</td>
				<td>{{$transaction->price}}</td>
				<td>{{$transaction->stock}}</td>
				<td>{{Auth::User()->find($transaction->user_id)->name}}</td>
				<td>{{Auth::User()->find($transaction->buyer_id)->name}}</td>
				<td>{{$transaction->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection