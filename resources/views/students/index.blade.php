@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.alerts')

    <h1>Students</h1>

    <div class="mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="college_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All Colleges</option>
                    @foreach($colleges as $college)
                        <option value="{{ $college->id }}" {{ request('college_id') == $college->id ? 'selected' : '' }}>
                            {{ $college->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    @if($students->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="{{ route('students.index', ['sort' => 'name', 'college_id' => request('college_id')]) }}">Name</a></th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date of Birth</th>
                <th>College</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->college->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this student?')" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No students found.</p>
    @endif
</div>
@endsection
