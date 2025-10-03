<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Genres;

class GenreController extends Controller
{   
    // ambil data
    public function index(){
        $genres = DB::table('genres')->select()->get();
        
        return view('genre.index', ['genres' => $genres]);
    }

    public function show($id){
        $genre = Genres::find($id);
        $genreName = DB::table('genres')->select()->find($id);

        return view('genre.detail', ['genre' => $genre, 'genreName' => $genreName]);
    }

    public function create(){
        return view('genre.form');
    }

    public function store(Request $request){
        // validasi
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $now = Carbon::now();

        // insert database
        DB::table('genres')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now

            
        ]);

        // redirect
        return redirect('/genre/create');
    }

    public function edit($id){
        $genre = DB::table('genres')
            ->select()
            ->find($id);

        return view('genre.edit', ['genre'=> $genre]);
    }

    public function update($id,Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $now = Carbon::now();
        DB::table('genres')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'updated_at' => $now
                ]);

        return redirect('/genre');
    }

    public function destroy($id){
        DB::table('genres')->where('id', $id)->delete();

        return redirect('/genre');
    }
}
