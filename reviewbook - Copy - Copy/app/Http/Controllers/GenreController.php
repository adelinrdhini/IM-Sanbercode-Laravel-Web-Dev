<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreController extends Controller
{
    public function create()
    {
        return view('genre.tambah');
    }

   
public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
        ]);
        //insert data
        DB::table('genre')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/genre');    
    }
    

    public function index()
    {
        $genre = DB::table('genre')->get();
        //dd($genre);
        
        return view('genre.tampil', ['genre' => $genre]);
    }

    public function show($id)
    {
        $genre = DB::table('genre')->find($id);

        return view('genre.detail', ['genre' => $genre]);
    }

    public function edit($id)
    {
        $genre = DB::table('genre')->find($id);
        
        return view('genre.edit', ['genre' => $genre]);
    }

    public function update($id, request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
        ]);
        //update data
        DB::table('genre')->where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/genre');      
           
    }

        public function destroy($id){   
        DB::table('genre')->where('id', $id)->delete();
        return redirect('/genre');
    
    }
}