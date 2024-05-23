@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to Your Application</h1>
        <p>This is the landing page of your application.</p>
        <p>You can navigate to other pages using the navigation menu.</p>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Go to Cars</a>
        <a href="{{ route('parts.index') }}" class="btn btn-primary">Go to Parts</a>
    </div>
@endsection
