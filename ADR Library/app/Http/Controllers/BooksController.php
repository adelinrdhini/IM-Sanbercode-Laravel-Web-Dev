<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genre;
use App\Models\books;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;


class BooksController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            
            new Middleware(IsAdmin::class, except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::all();
        return view('books.tampil', ['books' => $books]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = genre::all();
        return view('books.tambah',['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|integer',
            'genre_id' => 'required|exists:genre,id'
        ]);

        $newImageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('image'), $newImageName);

        $books = new books();
        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->image = $newImageName;
        $books->stok = $request->input('stok');
        $books->genre_id = $request->input('genre_id');
        $books->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = books::find($id);
        return view('books.detail', ['books' => $books]);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = genre::all();
        $books = books::find($id);

        return view('books.edit', ['books' => $books, 'genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|integer',
            'genre_id' => 'required|exists:genre,id'
        ]);
        $books = books::find($id);

        if($request->has('image')){
            //hapus data lama
            File::delete('image/'.$books->image);

            //upload file baru
            $newImageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $newImageName);
            
            $books->image= $newImageName;
        }
        $books->title=$request->input('title');
        $books->summary=$request->input('summary');
        $books->stok=$request->input('stok');
        $books->genre_id=$request->input('genre_id');
        
        $books->save();
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = books::find($id);
        File::delete('image/'. $books->image);

        $books->delete();
        return redirect('/books');
    }

   

}