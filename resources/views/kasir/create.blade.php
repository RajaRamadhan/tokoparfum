@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasir - Toko Parfum</title>
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

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .pagination {
            justify-content: center;
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
        <h1 class="header-title">Kasir - Toko Parfum</h1>

        <div class="card border-0">
            <div class="card-body">
                <form method="POST" action="{{ route('kasir.store') }}">
                    @csrf

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title">Tambah Barang ke Kasir</h5>
                        <a href="{{ route('posts.index') }}" class="btn btn-custom">
                            <i class="fas fa-list"></i> Lihat Semua Barang
                        </a>
                    </div>

                    <!-- Item Row -->
                    <div id="items-container" class="mb-4">
                        <div class="item-row mb-3 p-3 bg-white rounded shadow-sm">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-primary">Item 1</h5>
                            </div>

                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" name="items[0][item_name]" class="form-control form-control-lg shadow-sm" placeholder="Nama Barang" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="items[0][item_price]" class="form-control form-control-lg shadow-sm" placeholder="Harga" required step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="items[0][item_quantity]" class="form-control form-control-lg shadow-sm" placeholder="Jumlah" required min="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button untuk tambah barang dan hitung total -->
                    <div class="d-flex justify-content-between">
                        <button type="button" id="add-item" class="btn btn-outline-success rounded-pill px-4 py-2 shadow-sm">
                            <i class="fas fa-plus"></i> Tambah Barang
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                            <i class="fas fa-calculator"></i> Hitung Total
                        </button>
                    </div>

                </form>
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

        let itemCount = 1;

        document.getElementById('add-item').addEventListener('click', function () {
            let newItemRow = `
            <div class="item-row mb-3 p-3 bg-white rounded shadow-sm">
                <div class="d-flex justify-content-between">
                    <h5 class="text-primary">Item ${itemCount + 1}</h5>
                </div>

                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" name="items[${itemCount}][item_name]" class="form-control form-control-lg shadow-sm" placeholder="Nama Barang" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="items[${itemCount}][item_price]" class="form-control form-control-lg shadow-sm" placeholder="Harga" required step="0.01">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="items[${itemCount}][item_quantity]" class="form-control form-control-lg shadow-sm" placeholder="Jumlah" required min="1">
                    </div>
                </div>
            </div>`;

            document.getElementById('items-container').insertAdjacentHTML('beforeend', newItemRow);
            itemCount++;
        });

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
