<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RST - Tabel Dokter</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/808ba9c7d8.js" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    @vite('resources/css/style.css')
    @vite('resources/css/bootstrap.min.css')
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session("error") }}',  // Pastikan session error ada
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if(session('success'))
    <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session("success") }}',  // Pastikan session error ada
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <i class="text-primary d-flex justify-content-center fa-solid fa-hospital fa-3x pb-3"></i>
                    <h3 class="text-primary">Rumah Sakit<br class="ms-4">Terpadu</h3>
                </a>

                <div class="navbar-nav w-100">
                    <a href="{{route('customer.informasi_pasien')}}" class="nav-item nav-link">
                        <i class="fa-solid fa-user"></i>Data Diri
                    </a>
                    <a href="#" class="nav-item nav-link active">
                        <i class="fa-solid fa-heart-pulse"></i>Rekam Medis
                    </a>
                    <a href="{{route('customer.pembayaran')}}" class="nav-item nav-link">
                        <i class="fa-solid fa-file-invoice-dollar"></i>Pembayaran
                    </a>
                </div>

                <div class="nav-item dropdown">
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="signin.html" class="dropdown-item">Sign In</a>
                        <a href="signup.html" class="dropdown-item">Sign Up</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                        <a href="blank.html" class="dropdown-item">Blank Page</a>
                    </div>
                </div>
        </div>
        </nav>
        <div style="position: absolute; bottom: 29px;">
            Copyright &copy; 2024 <a href="#">Rumah Sakit Terpadu</a>,
        </div>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content" style="max-height: 100vh">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light px-4 py-3">
            <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <div class="bg-light rounded d-flex align-items-center justify-content-between gap-3 ">
                <i class="fa-solid fa-user-doctor fa-3x text-primary"></i>
                <h1 style="margin-bottom: 0px;" class="text-primary ">Customer</h1>
            </div>

            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <!-- <span class="d-none d-lg-inline-flex">John Doe</span> -->
                        <b> <i class="fa-regular fa-user"></i> {{Auth::user()->name}}</b>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end bg-light rounded-0 rounded-bottom m-0 text-primary border-top-0">
                        <a href="{{route('actionlogout')}}" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card" style="box-shadow: 0px 0px 22px 0px rgba(0,0,0,0.22);
                                            -webkit-box-shadow: 0px 0px 22px 0px rgba(0,0,0,0.22);
                                            -moz-box-shadow: 0px 0px 22px 0px rgba(0,0,0,0.22);">
                                        <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                                style="position: relative; height: auto">
                                                <table class="table table-striped mb-0">
                                                    <thead style="background-color: #002d72;">
                                                        <tr class="judul-tabel">
                                                            <th scope="col">No</th>                                                            
                                                            <th scope="col">Dokter</th>
                                                            <th scope="col">Diagnosa</th>                                                            
                                                            <th scope="col">Tindakan medis</th>
                                                            <th scope="col">Obat</th>
                                                            <th scope="col">Tanggal kunjungan</th>                                                    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rekam_medis as $index => $p)
                                                        <tr class="data">
                                                            <td class="text-dark">{{ $index + 1 }}</td>
                                                           
                                                            <td class="text-dark">
                                                                {{ $p->dokter->nama_dokter ?? 'Tidak Ditemukan' }}
                                                            </td>
                                                            <td class="text-dark">{{ $p->diagnosa }}</td>                                                            
                                                            <td class="text-dark">{{ $p->tindakan_medis }}</td>
                                                            <td class="text-dark">
                                                                {{ $p->obat->nama_obat ?? 'Tidak Ditemukan' }}
                                                            </td>                
                                                            <td class="text-dark">{{ $p->tanggal_kunjungan }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </table>          
        </div>
        <!-- Table End -->
    </div>
    <!-- Content End -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script th, .table td {
        border-right: 1px solid black;
    }>
        <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->

</body>

<style>
    .custom-mb {
        margin-bottom: 300px;
    }

    html,
    body,
    .intro {
        height: 100%;
    }

    table td,
    table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    thead th {
        color: #fff;
    }

    .card {
        border-radius: .5rem;
    }

    .table-scroll {
        border-radius: .5rem;
    }

    .table-scroll table thead th {
        font-size: 1.25rem;
    }

    thead {
        top: 0;
        position: sticky;
    }

    ::after table {
        padding: 20px;
    }

    tr,
    th,
    td {
        padding: 10px;
        margin: 20px;
    }

    .data td{
        text-align: center;
    }
    .judul-tabel th{
        text-align: center;
    }
</style>

</html>