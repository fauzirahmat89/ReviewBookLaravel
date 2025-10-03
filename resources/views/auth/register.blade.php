@extends('layouts.master');

@section('judul')
    Register
@endsection

@section('content')
        <form method="POST" action="/register">
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
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label  class="form-label">email</label>
            <input type="email" class="form-control" name="email" id="">
        </div>
        <div class="mb-3">
            <label  class="form-label">password</label>
            <input type="password" class="form-control" name="password" id="">
        </div>
                <div class="mb-3">
            <label  class="form-label">password confirmation</label>
            <input type="password" class="form-control" name="password_confirmation" id="">
        </div>
        <div class="mb-3">
            <label  class="form-label">role</label>
            <select name="role" class="form-control">
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select><br><br>
        </div>
        <button type="submit" class="btn btn-primary">register</button>
    </form>
@endsection