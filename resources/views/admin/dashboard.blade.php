
@extends('layout')

@section('content')
<div id="success-message"  style="color: black" >{{ session('success') }}</div>
    @endif

@if(session('error'))
        <div id="error-message"  style=" color: red;">{{ session('error') }}</div>
    @endif

<h1>Painel Administrador</h1>

@endsection