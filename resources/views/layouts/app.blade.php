<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'COVID Vaccine Registration')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    <!-- DataTables Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Content Area -->
    @yield('content')

    <!-- jQuery -->
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>


    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- DataTables JS -->
    <script src="{{asset('js/dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.js')}}"></script>


    <!-- Custom JS -->
    <script src="{{asset('js/custom.js')}}"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            new DataTable('#example');
        });
    </script>

</body>
</html>
