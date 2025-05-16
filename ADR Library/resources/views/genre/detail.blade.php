@extends('layouts.master')
@section('title')
    Detail Genre
@endsection
@section('content')

<h1>{{$genre->name}}</h1>
<p>{{$genre->description}}</p>

<hr>

    <div class="row">
@forelse ( $genre->books as $item )
        <div class="col-md-4 mb-4">
        <div class="card d-flex h-100" style="min-height: 550px;">
            <img src="{{asset('image/'.$item->image)}}" class="card-img-top mt-4" style="height: 250px; width: 100%; object-fit: contain;">
            <div class="card-body d-flex flex-column">
            <h5 class="card-title">({{ $item->title }})</h5>
            <p class="card-text">{{Str::limit($item->summary, 75)}}</p>
            <p class="card-text">Stok Tersedia: ({{$item->stok}})</p>
            <div class="d-grid gap-2"> 
            <a href="/books/{{$item->id}}" class="btn" style="background-color: #547792; color: white;">Read More</a>
            </div>
            </div>
        </div>
    </div>
  
@empty
    <h1> Tidak ada buku pada genre ini</h1>
@endforelse

<a href="/genre" class="btn btn-dark btn-sm my-5">Kembali</a>
@endsection