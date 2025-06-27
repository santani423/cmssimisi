@extends('cms.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header">

                    </div>
                    <div class="body">
                        <h4></h4>

                        <nav>
                            <ul class="pagination justify-content-center">
                                <!-- Pagination links will be dynamically loaded here -->
                                <div class="row">
                                    <div class="col-md-6">


                                        <img src="{{ asset($paket->thumbnail_img) }}" alt="image"
                                            style="width: 100%; height: auto;">


                                    </div>
                                    <div class="col-md-6 inner-content-about">
                                        <div class="mb-30">

                                            <h2 class="title-heading mb-18">{{ $paket->name }}</h2>

                                            <div class="extra">
                                                <div class="flex-three">
                                                    <span class="name">Category:</span>
                                                    <span class="price mr-1">{{ $paket->typePaket->name }}</span>
                                                </div>
                                                <div class="flex-three">
                                                    <span class="name">Departure:</span>
                                                    <span
                                                        class="price mr-1">{{ \Carbon\Carbon::parse($paket->start_date_departure)->translatedFormat('F Y') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($paket->end_date_departure)->translatedFormat('F Y') }}</span>
                                                </div>
                                                <div class="flex-three">
                                                    <span class="name">Transportation Ticket:</span>
                                                    <span class="price mr-1">
                                                        @if ($paket->transportation_ticket == 1)
                                                            <span class="text-success">Include</span>
                                                        @else
                                                            <span class="text-danger">Exclude</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mb-30">
                                            <div class="extra">

                                                <div class="flex-three">
                                                    <span class="name ">Hotel:</span>
                                                </div>
                                                <div class="flex-three">
                                                    <div class="form-group d-flex">
                                                        @if ($paket->hotel_bintang_1)
                                                            <div class="form-check mr-3">

                                                                <label class="form-check-label font-weight-bold"
                                                                    for="hotel1">Bintang
                                                                    1</label>
                                                            </div>
                                                        @endif
                                                        @if ($paket->hotel_bintang_2)
                                                            <div class="form-check mr-3">

                                                                <label class="form-check-label font-weight-bold"
                                                                    for="hotel2">Bintang
                                                                    2</label>
                                                            </div>
                                                        @endif
                                                        @if ($paket->hotel_bintang_3)
                                                            <div class="form-check mr-3">

                                                                <label class="form-check-label font-weight-bold"
                                                                    for="hotel3">Bintang
                                                                    3</label>
                                                            </div>
                                                        @endif
                                                        @if ($paket->hotel_bintang_4)
                                                            <div class="form-check">

                                                                <label class="form-check-label font-weight-bold"
                                                                    for="hotel4">Bintang
                                                                    4</label>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mb-30">
                                            <div class="extra">
                                                <div class="flex-three">
                                                    <p class="text-muted">{{ $paket->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="mb-30">
                                            <div class="extra">
                                                <div class="flex-three">
                                                    <span class="name ">Travelers & Class:</span>
                                                </div>
                                                <div class="flex-two mb-40">
                                                    <div class="d-flex align-items-center mr-auto">
                                                        <h5 style="color: #FE7C00;">
                                                            {{ 'IDR ' . number_format($paket->price, 0, ',', '.') }}
                                                            /person</h5>
                                                    </div>
                                                    <div class="d-flex align-items-end ml-auto">
                                                        <a href="{{ asset($paket->pdf) }}" class="btn btn-outline-primary m-3"
                                                            style="border-color: #307EC2; color: #307EC2;" download>Download PDF</a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist"
                                            style="border-bottom: 2px solid;">
                                            @foreach ($paket->itemDescPaket as $key => $fasilitas)
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                        id="{{ $fasilitas->itemDesc->code }}-tab" data-bs-toggle="tab"
                                                        data-bs-target="#{{ $fasilitas->itemDesc->code }}" type="button"
                                                        role="tab" aria-controls="{{ $fasilitas->itemDesc->code }}"
                                                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}"
                                                        style="color: {{ $key == 0 ? '#307EC2' : '#000' }};">{{ $fasilitas->itemDesc->name }}</button>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            @foreach ($paket->itemDescPaket as $key => $fasilitas)
                                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                                    id="{{ $fasilitas->itemDesc->code }}" role="tabpanel"
                                                    aria-labelledby="{{ $fasilitas->itemDesc->code }}-tab">
                                                    {!! $fasilitas->desc !!}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.style.color = '#000');
                    this.style.color = '#307EC2';
                });
            });
        });
    </script>
@endsection
