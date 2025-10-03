@extends('layouts.master');

@section('judul')
    Tampil Genre Buku
@endsection

@section('content')

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">nama</th>
            <th scope="col">description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genre)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$genre->name}}</td>
                    <td>{{$genre->description}}</td>
                    <td>
                        <a href="/genre/{{$genre->id}}" class="btn btn-info btn-sm">Detail</a>
                        @auth
                            @if (Auth()->user()->role === 'admin')
                                <a href="/genre/{{$genre->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/genre/{{$genre->id}}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Data genre belum ada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @auth
        @if (Auth()->user()->role === 'admin')
            <a href="/genre/create" class="btn btn-primary btn-sm">Tambah genre</a>
        @endif
    @endauth
    
@endsection