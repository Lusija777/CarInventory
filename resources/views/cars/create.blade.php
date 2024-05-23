@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Car</h1>
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="is_registered">Is Registered</label>
                <select class="form-control" id="is_registered" name="is_registered" required>
                    <option value="0" {{ old('is_registered') == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('is_registered') == '1' ? 'selected' : '' }}>Yes</option>
                </select>
                @error('is_registered')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" id="registration_number_group" style="display: none;">
                <label for="registration_number">Registration Number</label>
                <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ old('registration_number') }}">
                @error('registration_number')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Car</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const isRegisteredSelect = document.getElementById('is_registered');
            const registrationNumberGroup = document.getElementById('registration_number_group');
            const registrationNumberInput = document.getElementById('registration_number');

            function toggleRegistrationNumber() {
                if (isRegisteredSelect.value === '1') {
                    registrationNumberGroup.style.display = '';
                    document.getElementById('registration_number').required = true;
                } else {
                    registrationNumberGroup.style.display = 'none';
                    document.getElementById('registration_number').required = false;
                    registrationNumberInput.value = '';
                }
            }

            isRegisteredSelect.addEventListener('change', toggleRegistrationNumber);
            toggleRegistrationNumber(); // Initial call to set the correct state
        });
    </script>
@endsection
