@extends('layouts.master');

@section('judul')
    Edit Buku
@endsection

@section('content')

    <form method="POST" action="/books/{{$book->id}}" enctype="multipart/form-data">
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
        @method('put')
        <div class="mb-3">
            <label class="form-label">Book Title</label>
            <input type="text" class="form-control" name="title" value="{{$book->title}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Book Summary</label>
            <textarea name="summary" class="form-control">{{$book->summary}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">stok</label>
            <input type="number" class="form-control" name="stok" value="{{$book->stok}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" id="" class="form-control">
                <option value="">-- Pilih Genre --</option>
                @forelse ($genres as $genre)
                    @if ($book->genre_id === $genre->id)
                        <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                    @else
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endif
                @empty
                    <option value="">Genre belum ada</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>    
@endsection