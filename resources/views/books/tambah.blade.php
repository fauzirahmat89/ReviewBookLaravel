@extends('layouts.master');

@section('judul')
    Tambah Buku
@endsection

@section('content')

    <form method="POST" action="/books" enctype="multipart/form-data">
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
            <label class="form-label">Book Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Book Summary</label>
            <textarea name="summary" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">stok</label>
            <input type="number" class="form-control" name="stok">
        </div>
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" id="" class="form-control">
                <option value="">-- Pilih Genre --</option>
                @forelse ($genre as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @empty
                    <option value="">Genre belum ada</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>    
@endsection