@extends('layouts.master');

@section('judul')
    Edit profile
@endsection

@section('content')
    <form method="POST" action="/profile/{{$profile->id}}">
        @method('PUT')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
            <input type="number" class="form-control" name="age" value="{{$profile->age}}">
        </div>
        <div class="mb-3">
            <label class="form-label">address</label>
            <textarea name="address" class="form-control">{{$profile->address}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection