@extends('layouts.admin')
@section('header')
	<script type="text/javascript">{{$a=1}}</script>
@endsection

@section('content')
<h4>More Coming Soon! <small>Item Others Wanted to Buy From You</small></h4>
<div>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>no</th>
				<th>item name</th>
				<th>price</th>
				<th>stock</th>
				<th>qty</th>
				<th>Total</th>
				<th>buyer</th>
				<th>buyer phone</th>
				<th>buyer account</th>
				<th>status</th>
				<th>options</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $transaction)
			<tr>
				<td>{{$a++}}</td>
				<td>{{$transaction->name}}</td>
				<td>{{$transaction->price}}</td>
				<td>{{$transaction->stock}}</td>
				<td>{{$transaction->qty}}</td>
				<td>{{$total = $transaction->price*$transaction->qty}}</td>
				<td>{{Auth::User()->find($transaction->buyer_id)->name}}</td>
				<td>{{Auth::User()->find($transaction->buyer_id)->phone}}</td>
				<td>{{Auth::User()->find($transaction->buyer_id)->payment}}</td>
				<td>{{$transaction->status}}</td>
				<td><a type="button" class="btn btn-primary" href="{{action('TransactionController@confirmTransaction',$transaction->id)}}">Confirm</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection