@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $car->name }}</h1>
        <p><strong>Registration Number:</strong> {{ $car->registration_number }}</p>
        <p><strong>Is Registered:</strong> {{ $car->is_registered ? 'Yes' : 'No' }}</p>

        <h2>Parts</h2>
        @if($car->parts->isEmpty())
            <p>No parts available for this car.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Serial Number</th>
                </tr>
                </thead>
                <tbody>
                @foreach($car->parts as $part)
                    <tr>
                        <td>{{ $part->name }}</td>
                        <td>{{ $part->serial_number }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection

