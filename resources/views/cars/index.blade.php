@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cars</h1>
        <div class="row">
            <div class="col-auto">
                <form action="{{ route('parts.index') }}" method="GET" class="form-inline">
                    <div class="form-group mb-2 mr-1">
                        <label for="filter" class="sr-only">Filter</label>
                        <input type="text" class="form-control" id="filter" name="filter" placeholder="filter by name...">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Filter</button>
                </form>
            </div>
            <div class="col-auto ml-auto">
                <a href="{{ route('cars.create') }}" class="btn btn-primary mb-2">Add Car</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Registration Number</th>
                    <th>Is Registered</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->registration_number }}</td>
                        <td>{{ $car->is_registered ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-success">Detail</a>
                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
