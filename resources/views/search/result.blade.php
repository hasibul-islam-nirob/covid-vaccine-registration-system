@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vaccination Status</h1>
    @if($status == 'Not registered')
        <p>Your status is: {{ $status }}</p>
        <a href="{{ route('registration.create') }}">Register here</a>
    @elseif($status == 'Scheduled')
        <p>Your status is: {{ $status }}</p>
        <p>Your scheduled date is: {{ $scheduledDate }}</p>
    @else
        <p>Your status is: {{ $status }}</p>
    @endif
</div>
@endsection