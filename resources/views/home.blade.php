@extends('layouts.admin')

@section('content')

@if(session('messages'))
<div class="alert alert-success" role="alert">{{session('messages')}}</div>
@endif

@endsection