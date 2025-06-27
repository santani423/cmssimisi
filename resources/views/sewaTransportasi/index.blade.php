@extends('layout.index')

@section('content')
    <section class="breadcumb-section"
        style="background-image: url('{{ asset('assets/item/Maskgroup.png') }}'); background-size: cover; background-position: center;">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12 center z-index1">
                    <h1 class="title">Sewa  Transportasi</h1>
                    <ul class="breadcumb-list flex-five">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Sewa Transportasi</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-dashboard">
        <div class="container">

            <hr>
            <div class="row" id="paket-list">
                <!-- Data akan dimuat melalui AJAX -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination"></ul>
                </nav>
            </div>
        </div>
    </section>
@endsection


@section('css')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            function show(page = 1, wilayah_id = null) {
                $.ajax({
                    url: '{{ route('api.transportasi') }}',
                    method: 'GET',
                    data: {
                        page: page,
                        wilayah_id: wilayah_id
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
                                    <a href="{{ route('sewa.transportasi.show', '') }}/${item.id}" class="tour-listing-image">
                                        <img src="${item.foto}" alt="${item.title}" class="img-fluid">
                                    </a>
                                    <div class="tour-listing-content">
                                        <span class="map">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock me-2" viewBox="0 0 16 16">
                                                <path d="M8 3.5a.5.5 0 0 1 .5.5v4h3a.5.5 0 0 1 0 1H8a.5.5 0 0 1-.5-.5V4a.5.5 0 0 1 .5-.5z"/>
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>
                                            </svg>
                                            ${new Date(item?.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) || 'Unknown'}
                                        </span>
                                        <h3 class="title-tour-list">
                                            <a href="{{ route('sewa.transportasi.show', '') }}/${item.id}">${item.nama_unit}</a>
                                        </h3>
                                        <div class="review" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                           
                                        </div> 
                                    </div>
                                </div>
                            </div>`;
                        container.append(html);
                    });

                    // Update pagination
                    const paginationContainer = $('.pagination');
                    paginationContainer.empty();

                    let startPage = Math.max(currentPage - 2, 1);
                    let endPage = Math.min(currentPage + 2, lastPage);

                    // Tombol Previous
                    if (currentPage > 1) {
                        paginationContainer.append(`
                            <li class="page-item">
                                <a class="page-link" href="#" data-page="${currentPage - 1}">«</a>
                            </li>
                        `);
                    }

                    // Halaman Dinamis
                    for (let i = startPage; i <= endPage; i++) {
                        paginationContainer.append(`
                            <li class="page-item ${i === currentPage ? 'active' : ''}">
                                <a class="page-link" href="#" data-page="${i}">${i}</a>
                            </li>
                        `);
                    }

                    // Tombol Next
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

            // Handle pagination click + Scroll ke atas
            $(document).on('click', '.pagination .page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                const wilayah_id = $('.nav-link-transportasi.active').data('id');
                if (page) {
                    show(page, wilayah_id);

                    // Scroll ke atas dengan efek animasi
                    $('html, body').animate({
                        scrollTop: $('#paket-list').offset().top - 100
                    }, 500);
                }
            });

            // Handle wilayah click
            $(document).on('click', '.nav-link-transportasi', function(e) {
                e.preventDefault();
                $('.nav-link-transportasi').removeClass('active');
                $(this).addClass('active');
                const wilayah_id = $(this).data('id');
                show(1, wilayah_id);

                // Scroll ke atas dengan efek animasi
                $('html, body').animate({
                    scrollTop: $('#paket-list').offset().top - 100
                }, 500);
            });

            show(); // Load data on page load
        });
    </script>
@endsection
