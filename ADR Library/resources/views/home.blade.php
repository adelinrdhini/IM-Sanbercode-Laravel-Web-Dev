@extends('layouts.master')
@section('title')
    Perpustakaan Digital
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
@auth
    <h1> Selamat datang kembali {{ Auth()->user()->name}}   
    @if (auth()->user()->profile)
    ({{ auth()->user()->profile->age}} Tahun)
    @else
        
    @endif
@endauth
<hr>
<section style="position: relative; text-align: center; color: white;">
  <img src="https://i.pinimg.com/736x/86/7c/9f/867c9fc5cc11611288fbbe93bfdd79dd.jpg" alt="Perpustakaan" style="width: 100%; height: 300px; object-fit: cover; opacity: 0.5;">
  <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <h2>Temukan Buku Favoritmu Disini dan Mulai Membaca Sekarang</h2>
  </div>
</section>

<h3 class="text-center">Rekomendasi Buku Pilihan</h3>
<hr>
<div class="card-group">
  <div class="card">
    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1723043112i/211642122.jpg" class="card-img-top" style="background-color: #94B4C1; height: 250px; width: 100%; object-fit: contain;">
    <div class="card-body" style="background-color: #547792; color: white; text-align: center;">
      <h5 class="card-title">Immortal</h5>
    </div>
    <div class="card-footer" style="text-align: center;">
      <p>Penulis: Sue Lynn Tan</p>
    </div>
  </div>
  <div class="card">
    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1590674497i/53565978.jpg" class="card-img-top" style="background-color: #94B4C1; height: 250px; width: 100%; object-fit: contain;">
    <div class="card-body" style="background-color: #547792; color: white; text-align: center;">
      <h5 class="card-title">Bridgerton Collection, Volume 1</h5>
    </div>
    <div class="card-footer" style="text-align: center;">
      <p>Penulis: Julia Quinn</p>
    </div>
  </div>
  <div class="card">
    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1548033656i/42861019.jpg" class="card-img-top" style="background-color: #94B4C1; height: 250px; width: 100%; object-fit: contain;">
    <div class="card-body" style="background-color: #547792; color: white; text-align: center;">
      <h5 class="card-title">Filosofi Teras</h5>
    </div>
    <div class="card-footer" style="text-align: center;">
      <p>Penulis: Henry Manampiring</p>
    </div>
  </div>
</div>
<br>
<div class="card" style="max-width: 1000px; margin: 0 auto;">
  <div class="card-header" style= "background-color: #547792; color: white; text-align: center;">
    Quote of the Day
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>"If you don't like to read, you haven't found the right book."</p>
      <footer class="blockquote-footer">JK. Rowling</footer>
    </blockquote>
  </div>
</div>
<br>
<div class="card text-center" style="max-width: 1000px; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title">Belum punya akun?</h5>
    <p class="card-text">Yuk daftar gratis dan mulai petualangan membaca kamu!</p>
    <a href="/register" class="btn btn-dark">Daftar</a>
  </div>
</div>

@endsection

   