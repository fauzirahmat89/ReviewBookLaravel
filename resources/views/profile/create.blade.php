@extends('layouts.master');

@section('judul')
    buat profile
@endsection

@section('content')
    <form method="POST" action="/profile">
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
            <label class="form-label">age</label>
            <input type="number" class="form-control" name="age">
        </div>
        <div class="mb-3">
            <label class="form-label">address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection