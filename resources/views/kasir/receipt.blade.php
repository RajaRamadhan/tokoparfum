@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h1 id="receipt-title">Struk Belanjaan</h1>
    <div id="receipt-content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga per Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kasirItems as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>Rp {{ number_format($item->item_price, 2, ',', '.') }}</td>
                    <td>{{ $item->item_quantity }}</td>
                    <td>Rp {{ number_format($item->total, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total Keseluruhan:</th>
                    <th>Rp {{ number_format($grandTotal, 2, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <br>
    <center>
        <a href="{{ route('kasir.create') }}" class="btn btn-primary custom-btn">Kembali</a>
        <button onclick="printReceipt()" class="btn btn-success btn-lg custom-btn">
            🖨️ Cetak Struk
        </button>
    </center>
</div>

<style>
    /* Styling umum untuk struk belanjaan */
    body {
        font-family: 'Arial', sans-serif;
    }

    #receipt-content {
        width: 100%;
        margin: 0 auto;
        text-align: left;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    th {
        background-color: #f8f8f8;
        font-weight: bold;
    }

    /* Styling tombol */
    .custom-btn {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 50px;
        border: none;
        text-transform: uppercase;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-primary.custom-btn {
        background-color: #007bff;
        color: #fff;
        text-decoration: none; /* Menghilangkan garis bawah */
    }

    .btn-primary.custom-btn:hover {
        background-color: #0056b3;
        color: #fff;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-success.custom-btn {
        background-color: #ff5722;
        color: white;
        border-radius: 50px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-success.custom-btn:hover {
        background-color: #e64a19;
        transform: translateY(-2px);
    }

    /* Hanya berlaku saat cetak */
    @media print {
        body * {
            visibility: hidden; /* Menyembunyikan semua elemen halaman */
        }

        #receipt-title, #receipt-content, #receipt-content * {
            visibility: visible; /* Menampilkan judul dan struk */
        }

        #receipt-title {
            visibility: visible; /* Menampilkan judul */
            font-size: 18px;
            margin-bottom: 5px; /* Rapatkan jarak judul ke tabel */
        }

        #receipt-content {
            position: absolute;
            top: 60px; /* Posisikan di bagian atas halaman saat dicetak */
            left: 50%;
            transform: translateX(-50%); /* Menempatkan di tengah secara horizontal */
            max-width: 88mm; /* Lebar maksimum seperti ukuran struk */
        }

        table {
            font-size: 12px; /* Sesuaikan ukuran font untuk cetakan */
            width: 100%;
        }

        th, td {
            padding: 5px; /* Perbaikan padding untuk cetakan */
        }

        /* Menghilangkan margin default dari cetak browser */
        @page {
            margin: 0;
        }

        /* Menghilangkan header dan footer dari browser */
        html, body {
            margin: 0;
            padding: 0;
            height: auto;
        }
    }
</style>

<script>
    function printReceipt() {
        window.print(); // Fungsi cetak untuk mencetak hanya struk belanjaan
    }
</script>
@endsection
