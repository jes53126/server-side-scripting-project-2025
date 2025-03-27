@extends('layouts.app')

@section('content')
    <h1>{{ isset($college) ? 'Edit College' : 'Create College' }}</h1>

    <!-- Display Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($college) ? route('colleges.update', $college->id) : route('colleges.store') }}" method="POST">
        @csrf
        @if(isset($college))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">College Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', isset($college) ? $college->name : '') }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">College Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', isset($college) ? $college->address : '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($college) ? 'Update' : 'Create' }} College</button>
    </form>
@endsection
