@extends('layouts.admin')
@section('header')
	<script type="text/javascript">{{$a=1}}</script>
@endsection

@section('content')
<h4>More Coming Soon! <small>Item You Have Ordered</small></h4>
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
				<th>Quantity</th>
				<th>seller</th>
				<th>seller phone</th>
				<th>payment account</th>
				<th>buyer</th>
				<th>options</th>
			</tr>
		</thead>
		<tbody>
			<tr>@foreach($data as $transaction)
			<tr>
				<td>{{$a++}}</td>
				<td>{{$transaction->name}}</td>
				<td>{{$transaction->price}}</td>
				<td>{{$transaction->qty}}</td>
				<td>{{Auth::User()->find($transaction->user_id)->name}}</td>
				<td>{{Auth::User()->find($transaction->user_id)->phone}}</td>
				<td>{{Auth::User()->find($transaction->user_id)->payment}}</td>
				<td>{{Auth::User()->find($transaction->buyer_id)->name}}</td>
				<td><a type="button" class="btn btn-danger" href="{{action('TransactionController@cancelTransaction',$transaction->id)}}">Cancel</a></td>
			</tr>
			@endforeach
			</tr>
		</tbody>
	</table>
</div>
@endsection