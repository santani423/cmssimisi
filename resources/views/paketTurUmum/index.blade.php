@extends('layout.index')

@section('content')
    <section class="breadcumb-section"
        style="background-image: url('{{ asset('assets/item/Maskgroup.png') }}'); background-size: cover; background-position: center;">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12 center z-index1">
                    <h1 class="title">Paket {{$jenisPaket->name}}</h1>
                    {{-- <ul class="breadcumb-list flex-five">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>{{$jenisPaket->name}}</span></li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="profile-dashboard">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">{{$typePaket->name}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav1"
                    aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav1">
                    <ul class="navbar-nav">
                        @foreach ($wilayah as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="/paket_jenis?type_paket={{ $typePaket->code }}&jenis_paket={{ $jenisPaket->code }}&wilayah_id={{$item->code}}">{{$item->name}}</a>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </nav>
            <hr>

            <div class="row" id="paket-list">
                <!-- Data akan dimuat melalui AJAX -->
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- jQuery & Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            function show(page = 1, wilayah_id = null) {
                $.ajax({
                    url: '{{ route('api.paket.index') }}',
                    method: 'GET',
                    data: {
                        page: page,
                        jenis_paket_id: '{{ $jenisPaket->code }}',
                        type_paket: '{{ $typePaket->code }}',
                        wilayah_id: '{{ $wilayah_id }}',
                    },
                }).done(function(response) {
                    const data = response?.data?.data || [];
                    const currentPage = response?.data?.current_page || 1;
                    const lastPage = response?.data?.last_page || 1;
                    const container = $('#paket-list');
                    container.empty();

                    data.forEach(function(item) {
                        const html = `
                            <div class="col-md-3 mb-3">
                                <div class="tour-listing box-sd">
                                    <a href="{{ route('paket.show', '') }}/${item.code}" class="tour-listing-image">
                                        <img src="${item.thumbnail_img}" alt="${item.name}" class="img-fluid">
                                    </a>
                                    <div class="tour-listing-content">
                                        <span class="map">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-geo-alt me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.166 8.94c-.26.35-.578.77-.927 1.23-.774.99-1.675 2.06-2.239 2.727a.58.58 0 0 1-.86 0c-.564-.667-1.465-1.737-2.239-2.727a31.634 31.634 0 0 1-.927-1.23C4.478 7.98 4 6.92 4 6a4 4 0 1 1 8 0c0 .92-.478 1.98-1.834 2.94zM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                            </svg>
                                            ${item?.wilayah?.name || 'Unknown'}
                                        </span>
                                        <h3 class="title-tour-list">
                                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; color: #000; font-weight: bold;">
                                                ${item.name}
                                            </p>
                                        </h3>
                                        <div class="row">
                                            <div class="col-8">
                                                <p style="color: gray;">Start From</p>
                                                <h5 style="color: orange;">Rp. ${new Intl.NumberFormat('id-ID').format(item.price)}</h5>
                                                <h6 style="color: orange;">/Orang</h6>
                                            </div>
                                            <div class="col-4 d-flex justify-content-end align-items-center" style="text-align: right;">
                                                <a href="{{ route('paket.show', '') }}/${item.code}" class="tour-listing-image">
                                                    <img src="{{ asset('assets/item/Group74.svg') }}" alt="" style="width: 50px; height: 50px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        container.append(html);
                    });

                    // Pagination
                    const paginationContainer = $('.pagination');
                    paginationContainer.empty();

                    let startPage = Math.max(currentPage - 2, 1);
                    let endPage = Math.min(currentPage + 2, lastPage);

                    if (currentPage > 1) {
                        paginationContainer.append(`
                            <li class="page-item">
                                <a class="page-link" href="#" data-page="${currentPage - 1}">«</a>
                            </li>
                        `);
                    }

                    for (let i = startPage; i <= endPage; i++) {
                        paginationContainer.append(`
                            <li class="page-item ${i === currentPage ? 'active' : ''}">
                                <a class="page-link" href="#" data-page="${i}">${i}</a>
                            </li>
                        `);
                    }

                    if (currentPage < lastPage) {
                        paginationContainer.append(`
                            <li class="page-item">
                                <a class="page-link" href="#" data-page="${currentPage + 1}">»</a>
                            </li>
                        `);
                    }
                }).fail(function(xhr, status, error) {
                    console.error('Error:', error);
                });
            }

            $(document).on('click', '.pagination .page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                const wilayah_id = $('.nav-link-item.active').data('id');
                if (page) {
                    show(page, wilayah_id);
                    $('html, body').animate({
                        scrollTop: $('#paket-list').offset().top - 100
                    }, 500);
                }
            });

            $(document).on('click', '.nav-link-item', function(e) {
                e.preventDefault();
                $('.nav-link-item').removeClass('active');
                $(this).addClass('active');
                const wilayah_id = $(this).data('id');
                show(1, wilayah_id);
                $('html, body').animate({
                    scrollTop: $('#paket-list').offset().top - 100
                }, 500);
            });

            show(); // Load on page load
        });
    </script>
@endsection
