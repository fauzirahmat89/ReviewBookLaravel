@extends('layouts.master');

@section('judul')
    Login
@endsection

@section('content')
        <form method="POST" action="/login">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label  class="form-label">email</label>
            <input type="email" class="form-control" name="email" id="">
        </div>
        <div class="mb-3">
            <label  class="form-label">password</label>
            <input type="password" class="form-control" name="password" id="">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection