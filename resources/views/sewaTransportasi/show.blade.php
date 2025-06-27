@extends('layout.index')

@section('content')
    <section class="breadcumb-section"
        style="background-image: url('{{ asset('assets/item/Maskgroup.png') }}'); background-size: cover; background-position: center;">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12 center z-index1">
                    <h1 class="title">Paket Tour Umum</h1>
                    <ul class="breadcumb-list flex-five">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Paket Tour Umum</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us-h4">
        <div class="tf-container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($sewaTransportasi->foto) }}" alt="image" style="width: 100%; height: auto;">
                </div>
                <div class="col-md-6 inner-content-about">
                    <div class="mb-30">
                        <h2 class="title-heading mb-18">{{ $sewaTransportasi->nama_unit }}</h2>

                        <div class="extra">
                            <div class="flex-three">
                                <span class="name text-secondary">Jenis:</span>
                                <span class="price mr-1">{{ $sewaTransportasi->jenis_kendaraan }} </span>
                            </div>  
                        </div>
                        <div class="extra">
                            <div class="flex-three">
                                <span class="name text-secondary">Merek:</span>
                                <span class="price mr-1">{{ $sewaTransportasi->merek }} </span>
                            </div>  
                        </div>
                        <div class="extra">
                            <div class="flex-three">
                                <span class="name text-secondary">Type:</span>
                                <span class="price mr-1">{{ $sewaTransportasi->tipe }} </span>
                            </div>  
                        </div>
                        <div class="extra">
                            <div class="flex-three">
                                <span class="name text-secondary">Kapasitas Penumpang:</span>
                                <span class="price mr-1">{{ $sewaTransportasi->kapasitas_penumpang }} Orang</span>
                            </div>  
                        </div>
                    </div>

                    <hr>

          

                    <div class="mb-30">
                        <div class="extra">
                            <div class="flex-three">
                                <span class="name text-secondary">Fasilitas:</span>
                                <span class="price mr-1">{{ $sewaTransportasi->fasilitas }} </span>
                            </div>  
                        </div>
                    </div>
                    <div class="mb-30">
                        <div class="extra">
                            <div class="flex-three">  
                                <span class="price mr-1">{{ $sewaTransportasi->deskripsi }} </span>
                            </div>  
                        </div>
                    </div>

                    

                    <hr>

                    <div class="mb-30">
                        <div class="extra">
                            <div class="flex-three">
                                <span class="name text-secondary">Harga:</span>
                            </div>
                            <div class="flex-two mb-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mr-auto">
                                            <h5 style="color: #FE7C00;">
                                                Rp {{ number_format($sewaTransportasi->harga_sewa_per_hari, 2, ',', '.') }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-end ml-auto"> 
                                            <button class="btn btn-success m-3" onclick="booking()">Booking Now</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

      
    </section>
@endsection

@section('script')
    <script>
        function booking() {
            const paketName = @json($sewaTransportasi->nama_unit);
            const category = @json($sewaTransportasi->jenis_kendaraan);

            let message = `Hallo Admin, saya ingin booking transportasi:\n\n`;
            message += `🚗 *Nama Unit*: ${paketName}\n`;
            message += `🔖 *Jenis Kendaraan*: ${category}`;

            const phoneNumber = '6285716828111'; // Ganti dengan nomor admin Anda
            const encodedMessage = encodeURIComponent(message);
            const waUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

            window.open(waUrl, '_blank');
        }
    </script>
@endsection

