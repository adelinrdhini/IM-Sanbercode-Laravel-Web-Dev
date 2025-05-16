@extends('layouts.master')

@section('title')
Dashboard
@endsection
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Selamat Datang! {{$FirstName}} {{$LastName}}</h1>
    <h2>Terima kasih telah bergabung di SanberBook. Social Media kita bersama!</h2>
</body>
@endsection