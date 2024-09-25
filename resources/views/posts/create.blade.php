@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data - Toko Parfum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #00c6ff, #0072ff);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .header-title {
            color: #000000;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .card {
            border-radius: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-custom {
            background-color: #ff5722;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #e64a19;
            transform: translateY(-2px);
        }

        .btn-reset {
            background-color: #ffc107;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .btn-reset:hover {
            background-color: #ffb300;
            transform: translateY(-2px);
        }

        /* Animasi */
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="container fade-in">
        <h1 class="header-title">Tambah Data Kasir</h1>

        <div class="card border-0">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <label class="font-weight-bold">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        <!-- error message untuk image -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Post">
                        <!-- error message untuk title -->
                        @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold">Konten</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5" placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>
                        <!-- error message untuk content -->
                        @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-custom">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-reset">
                            <i class="fas fa-redo-alt"></i> Reset
                        </button>
                    </div>

                </form> 
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        // Mengaktifkan CKEditor pada textarea konten
        CKEDITOR.replace('content');
    </script>
</body>
</html>

@endsection
