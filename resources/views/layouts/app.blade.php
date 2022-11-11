<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    @yield('third_party_stylesheets')

    @stack('page_css')
 
</head>

<body class="c-app">
@include('layouts.sidebar')


<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed">
        @include('layouts.header')
    </header>

    <div class="c-body">
        <main class="c-main">
            @yield('content')
            
        </main> 
    </div>

    <footer class="c-footer">
        <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
        <div class="mfs-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
    </footer>
</div>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    $("th.test").css({"display" : "none"});
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
