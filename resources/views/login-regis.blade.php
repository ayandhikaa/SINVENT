<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('assets/css/login.css') !!}">
    <style>
        /* Animasi muncul dan bergerak ke kiri */
        .description {
            opacity: 0;
            transform: translateX(0);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        
        .description.active {
            opacity: 1;
            transform: translateX(20%);
        }

        #title {
    font-size: 95px;
    font-weight: bold;
    text-transform: uppercase;
    background: linear-gradient(-45deg, #6312faad, #e73c7e, #110bbd, #00b4d8);
    background-size: 300% 300%; /* Pastikan ukuran cukup besar agar animasi terlihat */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradient-text 6s ease infinite; /* Atur durasi dan kehalusan animasi */
    transform: translateX(16%);
}

@keyframes gradient-text {
    0% {
        background-position: 0% 50%; /* Mulai dari kiri */
    }
    50% {
        background-position: 100% 50%; /* Pindah ke kanan */
    }
    100% {
        background-position: 0% 50%; /* Kembali ke kiri */
    }
}


    </style>
</head>
<body>
    <div class="container-fluid vh-100 d-flex align-items-center">
        <div class="row w-100">
            <!-- Judul dan Deskripsi -->
            <div class="col-md-5 d-flex flex-column align-items-start justify-content-center text-l pl-5 ml-5 px-5 mt-3">
            <h2 id="title">SINVENT</h2>
                <p class="description" id="description-text">solusi efektif untuk manajemen barang yang lebih mudah dan terstruktur</p>

            </div>

            
            <!-- Card Login & Sign Up -->
            <div class="col-md-7 d-flex justify-content-center">
                <div class="card-3d-wrap mb-3">
                    <input type="checkbox" class="d-none" id="toggle-form">
                    <div class="card-3d-wrapper">
                        <!-- Log In Form -->
                        <div class="card-front text-center d-flex flex-column justify-content-center">
                            <h4 style="font-size:35px">Log In</h4>
                            <hr>
                            @if(session('error'))
                            <div class="alert alert-danger">
                                <b>Oops!</b> {{session('error')}}
                            </div>
                            @endif
                            <form action="{{ route('actionlogin') }}" method="post">
                            @csrf    
                                <div class="form-group mb-3 position-relative">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                    <i class="uil uil-at position-absolute" style="top: 12px; left: 10px;"></i>
                                </div>    
                                <div class="form-group mb-3 position-relative">
                                    <input type="password" name="password" class="form-control" placeholder="Your Password" required>
                                    <i class="uil uil-lock-alt position-absolute" style="top: 23px; left: 10px;"></i>
                                </div>
                                <button type="submit" class="btn btn-custom w-100 mb-3">Log In</button>
                                <a href="#" class="link">Forgot your password?</a>
                                <label for="toggle-form" class="toggle-label">Don't have an account? Sign Up</label>
                            </form>
                        </div>
                        
                        <!-- Sign Up Form -->
                        <div class="card-back text-center d-flex flex-column justify-content-center">
                            <h4 style="font-size:35px">Sign Up</h4>
                            <hr>
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                            <form action="{{ route('register.submit') }}" method="post">
                                @csrf
                                <div class="form-group mb-3 position-relative">
                                    <input type="text" name="name" class="form-control" placeholder="Your Full Name" required>
                                    <i class="uil uil-user position-absolute" style="top: 12px; left: 10px;"></i>
                                </div>    
                                <div class="form-group mb-3 position-relative">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                    <i class="uil uil-at position-absolute" style="top: 12px; left: 10px;"></i>
                                </div>    
                                <div class="form-group mb-3 position-relative">
                                    <input type="password" name="password" class="form-control" placeholder="Your Password" required>
                                    <i class="uil uil-lock-alt position-absolute" style="top: 12px; left: 10px;"></i>
                                </div>
                                <div class="form-group mb-3 position-relative">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Your Password" required>
                                    <i class="uil uil-lock-alt position-absolute" style="top: 12px; left: 10px;"></i>
                                </div>
                                <button type="submit" class="btn btn-custom w-100">Sign Up</button>
                                <label for="toggle-form" class="toggle-label">Already have an account? Log In</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('title').addEventListener('click', function() {
            // Toggle class "active" untuk efek muncul dan bergerak
            document.getElementById('description-text').classList.toggle('active');
            document.getElementById('description-b').classList.toggle('active');
        });
    </script>
</body>
</html>
