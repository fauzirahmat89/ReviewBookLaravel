@extends('layouts.master');

@section('judul')
    Tampil Buku
@endsection

@section('content')
    @auth
        @if (Auth()->user()->role === 'admin')
            <a href="/books/create" class="btn btn-primary my-3"> Tambah</a>
            
        @endif
    @endauth
    

    <div class="row">
        @forelse ($books as $book)
            <div class="col-4">
                <div class="card mt-2">
                    <img src="{{asset('image/'.$book->image)}}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <h6 class="card-title">stok : {{$book->stok}}</h6>
                        <span class="badge bg-success">{{$book->Genres->name}}</span>
                        <p class="card-text">{{Str::limit($book->summary, 100)}}</p>
                        <div class="d-grid gap-2">
                            <a href="/books/{{$book->id}}" class="btn btn-info">Read More</a>
                        </div>
                        @auth
                            @if (Auth()->user()->role === 'admin')
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="d-grid gap-2">
                                            <a href="/books/{{$book->id}}/edit" class="btn btn-warning">Edit</a>
                                        </div>         
                                    </div>
                                    <div class="col">
                                        <form action="/books/{{$book->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="d-grid gap-2">
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </div>                    
                                        </form>
                                    </div>
                                </div>                                
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <h1>Belum ada Postingan</h1>
        @endforelse
    </div>
@endsection