@extends('layouts.master')
@section('title')
    Daftar Buku
@endsection
@section('content')
@auth
    @if (Auth()->user()->role === 'admin')
    <a href="/books/create" class="btn btn-dark my-5">Tambah Buku</a>
    @endif
@endauth

<div class="row">
    @forelse ($books as $item)
        <div class="col-md-4 mb-4">
        <div class="card d-flex flex-column w-100" style="min-height: 550px;">
            <img src="{{asset('image/'.$item->image)}}" class="card-img-top mt-4" style="height: 250px; width: 100%; object-fit: contain;">
            <div class="card-body">
            <h5 class="card-title">({{ $item->title }})</h5>
            <span class="badge mb-2" style="background-color: #547792; color: white;">{{$item->genre->name}}</span>
            <p class="card-text">{{Str::limit($item->summary, 75)}}</p>
            <p class="card-text">Stok Tersedia: ({{$item->stok}})</p>
            <div class="d-grid gap-2"> 
            <a href="/books/{{$item->id}}" class="btn btn-primary">Read More</a>
            </div>

        @auth
            @if (Auth()->user()->role === 'admin')
            <div class="row mt-3">
            <div class="col">
                <div class="d-grid gap-2">
                    <a href="/books/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                </div>
            </div>
            
            <div class="col">
                <form action="/books/{{$item->id}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="d-grid gap">
                <input type="submit" class="btn btn-danger" value="Delete">
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
        <h1>Belum ada buku</h1>
    @endforelse
    </div>

@endsection

