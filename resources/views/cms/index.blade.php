@extends('cms.layout.index')

@section('content')

{{-- <style>
    .dashboard-card {
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        color: #fff;
        margin-bottom: 24px;
        transition: transform 0.2s;
    }
    .dashboard-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.12);
    }
    .dashboard-card .header {
        padding: 20px 24px 10px 24px;
        font-weight: 600;
        font-size: 1.2rem;
    }
    .dashboard-card .body {
        padding: 0 24px 24px 24px;
        font-size: 2.5rem;
        font-weight: bold;
    }
    .bg-paket {
        background: linear-gradient(135deg, #36d1c4 0%, #1fa2ff 100%);
    }
    .bg-sewa {
        background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
        color: #333;
    }
    .bg-media {
        background: linear-gradient(135deg, #f953c6 0%, #b91d73 100%);
    }
</style>

<div class="container-fluid">
    <div class="row clearfix">
        <!-- Card 1: Paket -->
        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-card bg-paket">
                <div class="header">
                    <i class="fa fa-suitcase-rolling"></i> Total Paket
                </div>
                <div class="body">
                    {{ $paketCount ?? 0 }}
                </div>
            </div>
        </div>
        <!-- Card 2: Sewa Kendaraan -->
        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-card bg-sewa">
                <div class="header">
                    <i class="fa fa-car"></i> Total Sewa Kendaraan
                </div>
                <div class="body">
                    {{ $sewaKendaraanCount ?? 0 }}
                </div>
            </div>
        </div>
        <!-- Card 3: Ruang Media -->
        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-card bg-media">
                <div class="header">
                    <i class="fa fa-photo-film"></i> Total Ruang Media
                </div>
                <div class="body">
                    {{ $ruangMediaCount ?? 0 }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome CDN for icons (if not already included) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}

@endsection