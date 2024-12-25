<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Dashboard Rumah Sakit Terpadu</title>
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
  <link href="resources/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/808ba9c7d8.js" crossorigin="anonymous"></script>

  <!-- Template Stylesheet -->
  @vite('resources/css/style.css')
  @vite('resources/css/bootstrap.min.css')
  
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
          <a href="index.php" class="nav-item nav-link active">
            <i class="fa fa-tachometer-alt me-2"></i>Dashboard
          </a>

          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-table me-2"></i>Tables
            </a>
            <div class="dropdown-menu bg-transparent border-0">
              <a href="pasien.php" class="dropdown-item">Pasien</a>
              <a href="pembayaran.php" class="dropdown-item">Pembayaran</a>
              <a href="rekam_medis.php" class="dropdown-item">Rekam Medis</a>

              <!-- Dropdown Pegawai -->
              <p class="dropdown-item dropdown d-flex flex-row" style="margin-bottom:0px; gap:70px;">Pegawai <i class="bi bi-chevron-up"></i></p>
              <div class="dropdown-submenu show bg-transparent border-0">
                <a href="dokter.php" class="dropdown-item" style="margin-left:10px ;">Dokter</a>
                <a href="perawat.php" class="dropdown-item" style="margin-left:10px ;">Perawat</a>
                <a href="administrasi.php" class="dropdown-item" style="margin-left:10px ;">Kasir</a>
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
  <div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light px-4 py-3" style="border-bottom-left-radius: 10px;
">
      <div class="">
        <h1 style="margin-bottom: 0px;" class="text-primary">Dashboard</h1>
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
          </a>
          <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 text-primary">
            <a href="{{route('actionlogout')}}" class="dropdown-item">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->


    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4 custom-mb">
  <div class="row g-4">
    
    <!-- Row pertama -->
    <div class="col-sm-6 col-xl-4">
      <div class="bg-light rounded d-flex align-items-center p-4">
        <i class="fa-solid fa-user-doctor fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Total Dokter</p>
          <h6 class="mb-0"> </h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-4">
      <div class="bg-light rounded d-flex align-items-center p-4">
        <i class="fa-solid fa-user-nurse fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Total Perawat</p>
          <h6 class="mb-0"> </h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-4">
      <div class="bg-light rounded d-flex align-items-center p-4">
        <i class="fa-solid fa-user fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Total Pasien</p>
          <h6 class="mb-0"></h6>
        </div>
      </div>
    </div>
    
    <!-- Row kedua -->
    <div class="col-sm-6 col-xl-4">
      <div class="bg-light rounded d-flex align-items-center p-4">
        <i class="fa-solid fa-cash-register fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Pembayaran</p>
          <h6 class="mb-0"> </h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-4">
      <div class="bg-light rounded d-flex align-items-center p-4">
        <i class="fa-solid fa-file-medical fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Rekam Medis</p>
          <h6 class="mb-0"> </h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-4">
      <div class="bg-light rounded d-flex align-items-center p-4">
        <i class="fa-solid fa-user-tie fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Kasir</p>
          <h6 class="mb-0"> </h6>
        </div>
      </div>
    </div>
  </div>
</div>



    <!-- Footer Start -->

    <!-- Footer End -->
  </div>
  <!-- Content End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>
<style>
  .custom-mb {
    margin-bottom: 300px;
  }
</style>

</html>