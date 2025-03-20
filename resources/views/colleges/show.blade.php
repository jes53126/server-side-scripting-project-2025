@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $college->name }}</h2>
        <p><strong>Address:</strong> {{ $college->address }}</p>
        <h3>Students</h3>
        @if ($college->students->count() > 0)
            <ul>
                @foreach ($college->students as $student)
                    <li>{{ $student->name }} ({{ $student->email }})</li>
                @endforeach
            </ul>
        @else
            <p>No students enrolled yet.</p>
        @endif
        <a href="{{ route('colleges.index') }}" class="btn btn-primary">Back to Colleges</a>
    </div>
@endsection
