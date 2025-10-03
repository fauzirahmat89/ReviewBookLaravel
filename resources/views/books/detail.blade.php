@extends('layouts.master');

@section('judul')
    Detail Buku {{$book->title}}
@endsection

@section('content')
    <img src="{{asset('image/'.$book->image)}}" width="100%" alt="">
    <h1 class="text-primary">{{$book->title}}</h1>
    <h2>Stok : {{$book->stok}}</h2>
    <h2>genre : {{$book->genre}}</h2>
    <p>{{$book->summary}}</p>
    <div class="d-grid gap-2">
        <a href="/books" class="btn btn-info">Kembali</a>
    </div>  

    <hr>
        <h1>List Komentar</h1>
        @forelse ($book->comments as $comments)
            <div class="card mt-2">
                <div class="card-header">
                    {{$comments->owner->name}}
                </div>
                <div class="card-body">
                    <p class="card-text">{{$comments->content}}</p>
                </div>
            </div>
        @empty
            <h3>
                Tidak ada komentar
            </h3>
        @endforelse
    <hr>
    @auth
        <h3 class="mt-4">Buat Komentar</h3>
        <form method="POST" action="/comments/{{$book->id}}">
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
                <textarea placeholder="Isi komentar..." cols="20" rows="10"  name="content" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Buat Komentar</button>
        </form>    
    @endauth


@endsection