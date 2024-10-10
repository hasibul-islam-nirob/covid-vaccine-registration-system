@extends('layouts.app')

@section('title', 'Search Status')

@section('content')

<div class="container">
    <div class="row p-4 pb-0 mt-3">

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

        
        <div class="col-12 d-grid gap-2">
            <h1>Check Vaccination Status</h1>
            <div class="" id="collapseExample">
                <div class="card card-body">
                    <form action="{{url('/search_result')}}" method="get">
                        @csrf

                        <div class="row" >
                            <div class="col-6 mb-3">
                                <input type="text" id="nid" name="nid" class="form-control" value="">
                            </div>

                            <div class="col-6">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-primary btn-lg px-5">Check</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        @if (!empty($status))    
        <div class="col-12 my-3">
            <div class="card text-bg-light mb-3" style="max-width: 100%;">
                <div class="card-header text-center">
                    <strong>Vaccination Status</strong>
                </div>
                <div class="card-body">

                    <table class="table border shadow-sm p-3 mb-3 bg-body-tertiary rounded">
                        <tr>
                            <th>NID:</th>
                            <td>{{ $nid }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>{{ $status }}</td>
                        </tr>
                        @if (!empty($scheduledDate))
                        <tr>
                            <th>Scheduled Date</th>
                            <td>{{ $scheduledDate }}</td>
                        </tr>
                        @endif
                    </table>

                    @if (!empty($status) && $status == "Not registered" )
                    <a type="button" href="{{url('/register')}}" class="btn btn-sm btn-primary btn-lg px-5">Register Now</a>
                    @endif

                    
                </div>
            </div>
        </div>
        @endif
        
    </div>

</div>

<script>
</script>

@endsection