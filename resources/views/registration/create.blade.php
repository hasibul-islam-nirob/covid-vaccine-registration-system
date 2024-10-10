@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vaccine Registration</h1>
    <form method="POST" action="{{ route('registration.store') }}">
        @csrf
        <div class="form-group">
            <label for="nid">NID</label>
            <input type="text" name="nid" id="nid" class="form-control" value="{{ old('nid') }}">
            @error('nid')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Other form fields for name, email, phone -->
        <div class="form-group">
            <label for="vaccine_center_id">Vaccine Center</label>
            <select name="vaccine_center_id" id="vaccine_center_id" class="form-control">
                @foreach($vaccineCenters as $center)
                    <option value="{{ $center->id }}">{{ $center->name }}</option>
                @endforeach
            </select>
            @error('vaccine_center_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Add fields for name, email, phone -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Similarly for email and phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Similarly for email and phone -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection