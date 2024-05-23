@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Parts</h1>
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
                <a href="{{ route('parts.create') }}" class="btn btn-primary mb-2">Add Part</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Serial Number</th>
                    <th>Car</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($parts as $part)
                    <tr>
                        <td>{{ $part->name }}</td>
                        <td>{{ $part->serial_number }}</td>
                        <td>@if($part->car)
                                {{ $part->car->name }} {{ $part->car->registration_number }}
                            @else
                                No associated car
                            @endif</td>
                        <td>
                            <a href="{{ route('parts.edit', $part->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('parts.destroy', $part->id) }}" method="POST" style="display:inline;">
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
