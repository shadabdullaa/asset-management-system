<!DOCTYPE html>
<html>
<head>
    <title>Asset Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><script src="{{ asset('js/app.js') }}" defer></script>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-light p-3" style="width: 220px; min-height: 100vh;">
            <h4>AMS Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('floors.index') }}">Floors</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('assets.index') }}">Assets</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('maintenance.index') }}">Maintenance</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reports.inventory') }}">Reports</a></li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="p-4 flex-grow-1">
            @yield('content')
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
