@extends('layouts.app')

@section('title', 'Registration Form')

@section('content')

<div class="container">
    <div class="row p-4 pb-0 mt-3 justify-content-center">

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-12 text-center">
            @if (session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        
        <div class="col-8 d-grid gap-2">
            <div class="" id="collapseExample">
                <div class="card card-header text-center">
                    <strong>Vaccine Registration Form</strong>
                </div>
                <div class="card card-body">
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
                
                        <button type="submit" class="btn btn-primary my-3 w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>

        
    </div>

</div>

<script>
</script>

@endsection