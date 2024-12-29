<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RST - Tabel Perawat</title>
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
</head>

<body>
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
                    <a href="/admin" class="nav-item nav-link">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard Admin
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">
                            <i class="fa fa-table me-2"></i>Tables
                        </a>
                        <div class="dropdown-menu show bg-transparent border-0">
                            <a href="{{url('admin/user')}}" class="dropdown-item">User</a>
                            <a href="{{url('admin/pasien')}}" class="dropdown-item">Pasien</a>
                            <a href="{{url('admin/pembayaran')}}" class="dropdown-item">Pembayaran</a>
                             <a href="{{url('admin/rekam_medis')}}" class="dropdown-item">Rekam Medis</a>
                             <a href="{{url('admin/obat')}}" class="dropdown-item">Obat</a>

                            <!-- Dropdown Pegawai -->
                            <p class="dropdown-item dropdown d-flex flex-row" style="margin-bottom:0px; gap:70px;">Pegawai <i class="bi bi-chevron-up"></i></p>
                            <div class="dropdown-submenu show bg-transparent border-0">
                                <a href="{{url('admin/dokter')}}" class="dropdown-item" style="margin-left:10px ;">Dokter</a>
                                <a href="#" class="dropdown-item active" style="margin-left:10px ;">Perawat</a>
                                <a href="{{url('admin/kasir')}}" class="dropdown-item" style="margin-left:10px ;">Kasir</a>
                        </div>


                            <!-- Akhir Dropdown Pegawai -->

                        </div>
                    </div>
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
        <div class="content" style="height: 120vh   ">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light px-4 py-3">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <div class="bg-light rounded d-flex align-items-center justify-content-between gap-3 ">
                    <i class="fa-solid fa-user-nurse fa-3x text-primary"></i>
                    <h1 style="margin-bottom: 0px;" class="text-primary ">Tabel Perawat</h1>
                </div>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
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

                <div class="d-flex justify-content-center mt-5">
                    <form action="{{ route('perawat.update', $perawat->id_perawat)}}" method="POST" class="text-dark bg-light bg-gradient p-5 rounded-3" style="box-shadow: 0px 0px 22px 0px rgba(0,0,0,0.22);
-webkit-box-shadow: 0px 0px 22px 0px rgba(0,0,0,0.22);
-moz-box-shadow: 0px 0px 22px 0px rgba(0,0,0,0.22);">
                        <h1 class="text-primary mb-5 d-flex justify-content-center">Ubah Data</h1>
                        @csrf
                        @method('PUT') <!-- Tambahkan jika menggunakan route dengan method PUT -->
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input type="hidden" name="id_perawat" value="{{ $perawat->id_perawat }}">
                                    <input type="text" class="form-control" name="nama_perawat" value="{{ $perawat->nama_perawat }}">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>No Lisensi</td>
                                <td>
                                    <input type="text" class="form-control" name="nomor_lisensi" value="{{ $perawat->nomor_lisensi }}" readonly>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Jadwal Kerja</td>
                                <td>
                                    <input type="text" class="form-control" name="jadwal_kerja" value="{{ $perawat->jadwal_kerja }}">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Pengalaman</td>
                                <td>
                                    <input type="text" class="form-control" name="pengalaman" value="{{ $perawat->pengalaman }}">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Kontak</td>
                                <td>
                                    <input type="text" class="form-control" name="kontak" value="{{ $perawat->kontak }}">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pt-3">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="submit" style="width: 100px;" 
                                                class="btn border border-primary btn-block btns-hover"
                                                onclick="window.location.href='{{ route('perawat.index') }}';">
                                            SIMPAN
                                        </button>
                                        <button type="button" style="width: 100px;" 
                                                class="btn border-danger btn-block btnb-hover" 
                                                onclick="window.location.href='{{ route('perawat.index') }}';">
                                            BATAL
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>

                </div>
                </form>


            <!-- Form Ubah Start -->

            <!-- Form Ubah End -->

        </div>


        <!-- Content End -->


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->

</body>

<style>
    .btns-hover:hover {
        background-color: #009cff;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .btnb-hover:hover {
        background-color: #dc3545;
        color: #fff;
        transition: background-color 0.3s ease;
    }

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
</style>

</html>