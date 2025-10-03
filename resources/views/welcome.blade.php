@extends('layouts.master')

@section('judul')
DASHBOARD
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>SELAMAT DATANG {{$FirstName . " " . $LastName}} !</h1>
    <H2>Terima kasih telah bergabung di Sanberbook. Social Media kita bersama!</H2>
@endsection