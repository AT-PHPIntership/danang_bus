<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! trans('header.web_name') !!} </title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmfz59xpBdgu2WuHic0O4ra1drIDWSrMo"></script>
    <!-- <script src="http://maps.google.com/maps/api/js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('danangbus/css/bootstrap-responsive.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('danangbus/css/style.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body>
	<!-- start header -->
	@include('templates.danabus.header')
	<!-- end header -->
	<!-- start content -->
	@yield('content')
	<!-- end content -->
	<!-- start footer -->
	@include('templates.danabus.footer')
	<!-- end footer -->
	<script src="{{asset('danangbus/js/dnbus.main.js')}}"></script>
	<script src="{{asset('danangbus/js/dnbus.routesmodule.js')}}"></script>
	<script src="{{asset('danangbus/js/dnbus.searchmodule.js')}}"></script>
</body>
</html>

