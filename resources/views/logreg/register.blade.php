<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/808ba9c7d8.js" crossorigin="anonymous"></script>
    <style>
    body {
      /* margin: 0; */
      overflow: hidden;
    }
    canvas {
      position: absolute;
      z-index: -1;
    }
    .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        #passwordField {
        width: 100%; /* Atur lebar sesuai kebutuhan */
        padding-right: 40px; /* Beri ruang untuk ikon */
        }
        .eye-icon {
        position: absolute;
        right: 10px; /* Jarak dari kanan */
        top: 70%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #aaa; /* Warna ikon */
        }
  </style>
</head>
<body>
    
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                // confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
        // Redirect ke halaman login setelah pop-up ditutup
        window.location.href = "/login";
    }
            });
        });
    </script>
@endif
    <div class="container-fluid" style="background-color: rgb(8, 156, 252); padding: 20px;">
        <div class="d-flex align-items-center">
            <i class="fa-regular fa-3x fa-hospital me-3" style="font-size: 40px; color: white;"></i>
            <h1 class="text-light mb-0">Rumah Sakit Terpadu</h1>
        </div>
    </div>

    <canvas id="waveCanvas"></canvas>
    <div class="container" style="height: 88vh;">
    

        <div class="row h-100">

        <!-- Kolom kedua -->
        <div class="d-flex align-items-center justify-content-center">
            <div class="w-100" style="max-width: 500px; z-index:1">
                
                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                
                <form action="{{ route('actionregister') }}" method="post" class="text-dark bg-light bg-gradient d-flex flex-column justify-content-between"
                    style="box-shadow: 0px 0px 14px -7px rgba(0,0,0,0.75);
                           padding: 20px; 
                           border-radius: 10px; 
                           background-color: rgb(244, 244, 244); 
                           min-height: 500px; /* Tinggi minimum untuk form */
                           ">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach (session('error') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2 class="text-center mb-4">Buat Akun Anda</h2>
                    <div class="form-group">
                        <label><i class="fa fa-user"></i> Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                        <input type="hidden" name="role" class="form-control"  value="user" required="">
                    </div>
                    <div class="form-group">

                    </div>

                    <button type="submit" class="btn btn-block text-white" style="background-color: rgb(8, 156, 252)"><i class="fa fa-user text-white"></i> Register</button>
                    <hr>
                    <p class="text-center">Sudah punya akun silahkan <a href="login">Login Disini!</a></p>
                </form>
            </div>
            
        </div>
    </div>
</div>

</div>

</body>
<script>
  // Inisialisasi canvas
  const canvas = document.getElementById('waveCanvas');
  const ctx = canvas.getContext('2d');

  // Sesuaikan ukuran canvas dengan ukuran layar
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  // Variabel untuk animasi
  let wave = {
    amplitude: 30, // Tinggi gelombang
    length: 0.01,  // Panjang gelombang
    speed: 0.01,   // Kecepatan animasi
    phase: 0       // Posisi gelombang
  };

  function drawWave() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Bersihkan canvas

    ctx.beginPath();
    ctx.moveTo(0, canvas.height / 2);

    // Gambar gelombang
    for (let x = 0; x < canvas.width; x++) {
      const y = canvas.height / 2 + Math.sin(x * wave.length + wave.phase) * wave.amplitude;
      ctx.lineTo(x, y);
    }

    // Tutup jalur dengan menggambar ke bagian bawah layar
    ctx.lineTo(canvas.width, canvas.height);
    ctx.lineTo(0, canvas.height);
    ctx.closePath();

    // Isi area di bawah gelombang
    ctx.fillStyle = 'rgba(8, 156, 252)'; // Warna cyan transparan
    ctx.fill();

    // Gambar garis gelombang
    ctx.strokeStyle = 'rgba(8, 156, 252)';
    ctx.lineWidth = 2;
    ctx.stroke();
  }

  function animate() {
    wave.phase += wave.speed; // Gerakkan gelombang
    drawWave();               // Gambar ulang gelombang
    requestAnimationFrame(animate); // Panggil ulang fungsi animasi
  }

  // Jalankan animasi
  animate();

  // Update ukuran canvas saat ukuran layar berubah
  window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  });
</script>

</html>