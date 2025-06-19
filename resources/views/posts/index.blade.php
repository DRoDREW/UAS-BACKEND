<!DOCTYPE html>
<html>
<head>
    <title>Campus Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding: 30px;
            border-right: 1px solid #dee2e6; /* Changed from border-left to border-right */
            box-shadow: 2px 0 5px rgba(0,0,0,0.1); /* Changed shadow direction */
        }
        .sidebar-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .sidebar-button {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            background-color: rgb(33, 33, 33);
            border-color: rgb(33, 33, 33);
            color: white;
            text-align: left;
            transition: all 0.3s ease;
        }
        .sidebar-button:hover {
            background-color: #bb2d3b;
            border-color: #bb2d3b;
            transform: translateY(-2px);
        }
        .news-card {
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .news-section {
            padding-left: 30px; /* Changed from padding-right to padding-left */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Campus Dashboard</a>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">Welcome, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar - Moved to left -->
            <div class="col-md-3 sidebar">
                <div class="sidebar-container">
                    <h4 class="mb-4">Menu Akademik</h4>
                    <a href="{{ route('schedule') }}" class="btn sidebar-button">
                        Jadwal Kuliah
                    </a>
                    <a href="{{ route('biodata') }}" class="btn sidebar-button">
                        Biodata
                    </a>
                    <a href="{{ route('grades') }}" class="btn sidebar-button">
                        History Nilai
                    </a>
                    <a href="{{ route('academic-calendar') }}" class="btn sidebar-button">
                        Kalender Akademik
                    </a>
                </div>
            </div>

            <!-- News Section - Moved to right -->
            <div class="col-md-9 news-section">
                <h2 class="mb-4">Campus News</h2>
                
                <!-- News Cards -->
                <div class="card news-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman Penerimaan Mahasiswa Baru 2024</h5>
                        <h6 class="card-subtitle mb-2 text-muted">June 7, 2024</h6>
                        <p class="card-text">Universitas membuka pendaftaran mahasiswa baru untuk tahun akademik 2024/2025...</p>
                        <a href="#" class="">Read more</a>
                    </div>
                </div>

                <div class="card news-card">
                    <div class="card-body">
                        <h5 class="card-title">Seminar Nasional Teknologi Informasi</h5>
                        <h6 class="card-subtitle mb-2 text-muted">June 5, 2024</h6>
                        <p class="card-text">Fakultas Teknik menyelenggarakan seminar nasional dengan tema "AI in Education"...</p>
                        <a href="#" class="">Read more</a>
                    </div>
                </div>

                <div class="card news-card">
                    <div class="card-body">
                        <h5 class="card-title">Prestasi Mahasiswa di Kompetisi Nasional</h5>
                        <h6 class="card-subtitle mb-2 text-muted">June 3, 2024</h6>
                        <p class="card-text">Tim mahasiswa meraih juara pertama dalam kompetisi robotika tingkat nasional...</p>
                        <a href="#" class="">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>