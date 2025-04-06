<!-- resources/views/partials/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('colleges.index') }}">CollegeApp</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('colleges.index') }}">Colleges</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('students.index') }}">Students</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  