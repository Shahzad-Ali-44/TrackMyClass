<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TrackMyClass is a student management platform that helps educators track student records.">
    <meta name="keywords" content="TrackMyClass, student management, school records, students tracking, education platform">
    <meta name="author" content="TrackMyClass Team">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <title>TrackMyClass - Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header -->
    @include('includes.header') 

    <!-- Main Content -->
    <div class="container d-flex align-items-center justify-content-center flex-grow-1 my-3">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Edit Student Record</h3>
                </div>
                <div class="card-body">
                    <form action="/update" method="POST">
                        @csrf
                        <input type="hidden" name="sid" value="{{ $data->id }}"> <!-- Hidden ID field -->
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="studentName" placeholder="Enter student's name" name="sname" value="{{ $data->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="rollNumber" class="form-label">Roll Number</label>
                            <input type="text" class="form-control" id="rollNumber" placeholder="Enter roll number" name="roll_number" value="{{ $data->roll_number }}" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="/formShow" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
