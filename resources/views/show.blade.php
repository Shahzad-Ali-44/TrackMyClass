<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TrackMyClass - Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header -->
    @include('includes.header')

    <!-- Main Content -->
    <div class="container flex-grow-1 my-4">
        <!-- Back Button -->
        <div class="mb-3">
            <a href="/" class="btn btn-secondary">Back to Home</a>
        </div>

        <!-- Session Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Students Table -->
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Student Records</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Roll Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($form as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td class="text-nowrap">{{ $student->name }}</td>
                                <td class="text-nowrap">{{ $student->roll_number }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="/editForm/{{ $student->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/deleteForm/{{ $student->id }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>