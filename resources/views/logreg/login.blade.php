<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Rumah Sakit Terpadu</title>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/808ba9c7d8.js" crossorigin="anonymous"></script>
</head>
<style>
    .konten {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 85vh;
            margin: 0;
            position: relative;
            z-index: 1; /* Pastikan konten berada di atas canvas */
        }
        body {
            overflow: hidden;
            margin: 0; /* Hapus margin body */
        }
        canvas {
            position: absolute;
            top: 0; left: 0; /* Pastikan canvas berada di atas halaman */
            z-index: -1; /* Canvas di bawah konten */
        }

</style>
<body>
    <div class="container-fluid" style="background-color: rgb(8, 156, 252); padding: 20px;">
        <div class="d-flex align-items-center">
            <i class="fa-regular fa-3x fa-hospital me-3" style="font-size: 40px; color: white;"></i>
            <h1 class="text-light mb-0">Rumah Sakit Terpadu</h1>
        </div>
    </div>
    
    <canvas id="waveCanvas2"></canvas>
    <div class="konten">
        <div class="container rounded" style="max-width: 500px">
            @if(session('error'))
                <div class="alert alert-danger">
                    <b>Opps!</b> {{session('error')}}
                </div>
            @endif        
                    
            <form action="{{ route('actionlogin')}}" method="post" class="text-dark bg-light bg-gradient " style="box-shadow: 0px 0px 14px -7px rgba(0,0,0,0.75);
-webkit-box-shadow: 0px 0px 14px -7px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 14px -7px rgba(0,0,0,0.75); padding: 10px; border-radius: 10px; background-color: rgb(244, 244, 244)">
                <div class="" style="margin: 50px; z-index:1">
                    @csrf
                    <h1 class="text-center" style="letter-spacing: 4px; font-size: 60px; margin-bottom: 40px; ">Login</h1>

                    <div class="form-group" style="margin-bottom: 15px">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group" style="margin-bottom: 15px; position: relative; width: 100%">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <label for=""> </label>
                    </div>
                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-block" style="width: 100%; background-color: rgb(8, 156, 252); color: white">Log In</button>
                    </div>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href="register">Register</a> sekarang!</p>
                </div>
            </form>         
        </div>
    </div>
</body>
<script>
  // Inisialisasi canvas
  const canvas = document.getElementById('waveCanvas2');
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