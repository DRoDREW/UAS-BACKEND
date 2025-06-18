<!DOCTYPE html>
<html>
<head>
    <title>History Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4>History Nilai - {{ $user->name }}</h4>
            </div>
            <div class="card-body">
                @foreach($grades as $semester => $semesterGrades)
                    <div class="mb-4">
                        <h5 class="bg-secondary text-white p-2">Semester {{ $semester }}</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Nilai</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($semesterGrades as $grade)
                                        <tr>
                                            <td>{{ $grade->course_name }}</td>
                                            <td>{{ $grade->credit_hours }}</td>
                                            <td>{{ $grade->grade }}</td>
                                            <td>{{ $grade->grade_point }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>