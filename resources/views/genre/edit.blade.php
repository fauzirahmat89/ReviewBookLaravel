@extends('layouts.master');

@section('judul')
    Edit Genre Buku
@endsection

@section('content')
    <form method="POST" action="/genre/{{$genre->id}}">
        @method('PUT')
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
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$genre->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">description</label>
            <textarea name="description" class="form-control">{{$genre->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection