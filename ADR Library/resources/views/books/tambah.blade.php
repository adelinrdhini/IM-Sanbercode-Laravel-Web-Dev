@extends('layouts.master')
@section('title')
    Tambah Buku
@endsection
@section('content')

<form method="POST" action="/books" enctype="multipart/form-data">
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
      <label class="form-label">Genre</label>
      <select name="genre_id" class="form-control">
        <option value="">-- Pilih Genre --</option>
        @forelse ($genre as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @empty
          <option value="">Genre belum ada</option>
        @endforelse
        </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" class="form-control" name="title"> 
    </div>
    <div class="mb-3">
      <label class="form-label">Books Summary</label>
      <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image"> 
    </div>
     <div class="mb-3">
      <label class="form-label">Jumlah Stok</label>
      <input type="number" class="form-control" name="stok"> 
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection