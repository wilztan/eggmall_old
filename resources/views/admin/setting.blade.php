@extends('layouts.admin')

@section('content')
<h3>Settings</h3>
<h4>About</h4>
Username : {{Auth::User()->name}}<br>

Email : {{Auth::User()->email}}<br>

Firstname : {{Auth::User()->firstname}}<br>

Last Name: {{Auth::User()->lastname}}<br>

Status : {{Auth::User()->role}}<br>
<br>
<h4>More Coming Soon!</h4>
@endsection