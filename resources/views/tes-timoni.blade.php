@extends('layout.index')

@section('content')
    <section class="breadcumb-section"
        style="background-image: url('{{ asset('assets/item/Maskgroup.png') }}'); background-size: cover; background-position: center;">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12 center z-index1">
                    <h1 class="title">Testimoni</h1>
                    <ul class="breadcumb-list flex-five">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Testimoni</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-dashboard py-5">
        <div class="container">
            <div class="row">
                @forelse ($testimonis as $testimoni)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                        
                            <div class="card-body">
                                <h5 class="card-title">{{ $testimoni->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $testimoni->email }}</h6>
                                <p class="card-text">{{ $testimoni->tes_timoni }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada testimoni tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
