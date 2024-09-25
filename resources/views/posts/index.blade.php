@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Data Kasir - Toko Parfum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
    
        body {
            background: linear-gradient(120deg, #00c6ff, #0072ff);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .container {
            margin-top: 50px;
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

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table img {
            border-radius: 10px;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-actions .btn {
            margin-right: 5px;
        }

        .pagination {
            justify-content: center;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: white;
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
        <h1 class="header-title">Manajemen Data Kasir</h1>

        <div class="card border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title">Daftar Data Kasir</h5>
                    <a href="{{ route('posts.create') }}" class="btn btn-custom">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('/storage/posts/'.$post->image) }}" style="width: 100px; height: auto;" alt="Post Image">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{!! Str::limit($post->content, 50, '...') !!}</td>
                            <td class="text-center table-actions">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger">Tidak ada data ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if(session()->has('success'))
        toastr.success('<i class="fas fa-check-circle"></i> {{ session('success') }}', 'Berhasil!', {
            iconClass: 'toast-icon'
        });
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'Gagal!');
    @endif
</script>


</body>
</html>

@endsection
