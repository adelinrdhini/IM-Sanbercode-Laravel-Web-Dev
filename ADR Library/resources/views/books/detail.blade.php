@extends('layouts.master')
@section('title')
    Detail Buku
@endsection
@section('content')

<img src="{{asset('image/'.$books->image)}}" class="mx-auto d-block" width="20%">
<br>
<h1 class="text-primary">{{$books->title}}</h1>
<p>{{$books->summary}}</p> 
<p>Jumlah Stok : {{$books->stok}}</p>
<hr>

<h1>List Komentar</h1>
@forelse ($books->comments as $item)
<div class="card my-3">
<div class="card-header">
   {{$item->owner->name}}
</div>
<div class="card-body">
    <p class="card-text">{{$item->content}}</p>
</div>
</div>
@empty
    <h3>Belum ada komentar</h3>
@endforelse


<hr>
<h3>Tambah Komentar</h3>
@auth
<form method="POST" action="{{ url('/comments/' . $books->id) }}" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
      <textarea name="content" class="form-control" placeholder="Isi komentar disini..." cols="30" rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
@endauth
<hr>

<a href="/books" class="btn btn-secondary btn-sm">Kembali</a>
@endsection