@include('product.layout')
@extends('admin.layout.index')
@section('content')
    <h2 style="align-content: center">
        @if (session('user'))
            Hello <b>{{ session('user')->name }}</b>
        @endif,Welcome to Page Manage
    </h2>
    <img src="https://afamilycdn.com/2017/do-an-7-1486180602449.gif" alt="Home Admin" width="1200px">
@endsection

