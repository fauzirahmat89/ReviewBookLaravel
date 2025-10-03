<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Books;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['comments']),
            new Middleware(IsAdmin::class, except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Books::all();

        // foreach ($books as $book) {
        //     $genre = Genres::find($book->genre_id);
        //     $book->genre = $genre->name;
        // }

        return view('books.tampil', ['books' => $books ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $genre = Genres::all();

        return view('books.tambah', ['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stok' => 'required',
            'genre_id' => 'required',
        ]);

        $newImageName = time().'.'.$request->image->extension();  
         
        $request->image->move(public_path('image'), $newImageName);

        $books = new Books;
 
        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->stok = $request->input('stok');
        $books->genre_id = $request->input('genre_id');
        $books->image = $newImageName;
 
        $books->save();
 
        return redirect('/books');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book = Books::find($id);

        $genre = Genres::find($book->genre_id);
        $book->genre = $genre->name;

        return view('books.detail', ['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genres::all();
        $book = Books::find($id);

        return view('books.edit', ['book' => $book, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stok' => 'required',
            'genre_id' => 'required',
        ]);
        $book = Books::find($id);

        if($request->has('image')){
            // hapus data lama
            $filePath = public_path('image/' . $book->image);
            unlink($filePath);

            $newImageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('image'), $newImageName);

            $book->image = $newImageName;
        }

        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stok = $request->input('stok');
        $book->genre_id = $request->input('genre_id');

        $book->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::find($id);

        $filePath = public_path('image/' . $book->image);
        unlink($filePath);
 
        $book->delete();

        return redirect('/books');
    }
}
