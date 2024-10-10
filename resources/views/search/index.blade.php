@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Check Vaccination Status</h1>
    <form method="GET" action="{{ route('search.result') }}">
        <div class="form-group">
            <label for="nid">Enter NID</label>
            <input type="text" name="nid" id="nid" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Check Status</button>
    </form>
</div>
@endsection