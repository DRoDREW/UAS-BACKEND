<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Akademik - {{ Auth::user()->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.1);
        }
        .course-code {
            color: #0d6efd;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Jadwal Akademik</h4>
                <span>{{ Auth::user()->name }} ({{ Auth::user()->nim }})</span>
            </div>
            <div class="card-body">
                @if($jadwalAkademik->isEmpty())
                    <div class="alert alert-info">
                        Belum ada jadwal akademik yang tersedia.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th>Kelas</th>
                                    <th>Dosen</th>
                                    <th>Ruang</th>
                                    <th>Kontak</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwalAkademik as $jadwal)
                                    <tr>
                                        <td><span class="course-code">{{ $jadwal->kode_mata_kuliah }}</span></td>
                                        <td>{{ $jadwal->nama_mata_kuliah }}</td>
                                        <td>{{ $jadwal->kelas }}</td>
                                        <td>{{ $jadwal->nama_dosen }}</td>
                                        <td>{{ $jadwal->ruang }}</td>
                                        <td>
                                            @if($jadwal->kontak_dosen)
                                                <small>{{ $jadwal->kontak_dosen }}</small>
                                            @else
                                                <small class="text-muted">-</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($jadwal->keterangan)
                                                <small>{{ $jadwal->keterangan }}</small>
                                            @else
                                                <small class="text-muted">-</small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>