@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Part</h1>
        <form action="{{ route('parts.update', $part->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $part->name) }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ old('serial_number', $part->serial_number) }}" required>
                @error('serial_number')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="car_id">Car</label>
                <select class="form-control" id="car_id" name="car_id">
                    <option value="">Select a car</option>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" {{ old('car_id', $part->car_id) == $car->id ? 'selected' : '' }}>{{ $car->name }} {{ $car->registration_number }}</option>
                    @endforeach
                </select>
                @error('car_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Part</button>
        </form>
    </div>
@endsection
