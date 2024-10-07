@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="color: #4A90E2;">📜 Riwayat Barang</h1>

    @if ($kasirItems->isEmpty())
        <div class="alert alert-warning text-center">
            <strong>⚠️ Tidak ada barang yang telah diinputkan.</strong>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead style="background-color: #6c757d; color: white;">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga per Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Total</th>
                        <th>Tanggal Input</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kasirItems as $item)
                        <tr>
                            <td style="color: #1E88E5; font-weight: bold;">{{ $item->item_name }}</td>
                            <td style="color: #28a745;">Rp {{ number_format($item->item_price, 2, ',', '.') }}</td>
                            <td class="text-center">{{ $item->item_quantity }}</td>
                            <td style="color: #dc3545;">Rp {{ number_format($item->total, 2, ',', '.') }}</td>
                            <td class="text-muted">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="background-color: #f8f9fa;">
                        <td colspan="3" class="text-end fw-bold">Grand Total</td>
                        <td colspan="2" class="text-danger fw-bold">
                            Rp {{ number_format($kasirItems->sum('total'), 2, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Button Area -->
        <div class="text-center mt-4">
            <a href="{{ route('kasir.create') }}" class="btn btn-primary btn-lg me-3">
                🔄 Kembali ke Input Barang
            </a>
            <button onclick="printPage()" class="btn btn-success btn-lg">
                🖨️ Cetak Struk
            </button>
        </div>
    @endif
</div>

<script>
    function printPage() {
        window.print(); // Mencetak halaman saat ini
    }
</script>

<style>
    .table {
        border-radius: 8px;
        overflow: hidden;
    }
    .table thead th {
        background-color: #343a40;
        color: white;
    }
    .table-bordered {
        border: 2px solid #dee2e6;
    }
    .table-hover tbody tr:hover {
        background-color: #e9ecef !important;
    }
    .btn-lg {
        padding: 12px 24px;
        font-size: 18px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-success {
        background-color: #28a745;
        border: none;
        transition: background-color 0.3s;
    }
    .btn-success:hover {
        background-color: #218838;
    }
</style>
@endsection
