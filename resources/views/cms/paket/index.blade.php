@extends('cms.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header d-flex justify-content-end">
                        <!-- Tombol memunculkan modal -->

                        <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal"
                            data-target="#choosePaketModal">Add Paket</a>
                    </div>
                    <div class="body">
                        <h1>{{ $wilayah->name }}</h1>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Nama</th>
                                    <th>Paket</th>
                                    <th>Departure</th>
                                    <th>Transportation</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablePaket">
                                <!-- Data will be dynamically loaded here -->
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <!-- Pagination links will be dynamically loaded here -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus paket ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pilih Jenis Paket -->
    <div class="modal fade" id="choosePaketModal" tabindex="-1" role="dialog" aria-labelledby="choosePaketModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="choosePaketModalLabel">Pilih Jenis Paket</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group" id="choosePaketList">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let selectedCode = null;

            function show(page = 1, wilayah_id = null) {
                $.ajax({
                    url: '{{ route('api.paket.index') }}',
                    method: 'GET',
                    data: {
                        page: page,
                        wilayah_id: '{{ $code }}',
                    },
                }).done(function(response) {
                    const data = response?.data?.data || [];
                    const currentPage = response?.data?.current_page || 1;
                    const lastPage = response?.data?.last_page || 1;
                    const container = $('#tablePaket');
                    container.empty();

                    if (data.length === 0) {
                        container.append(
                            '<tr><td colspan="10" class="text-center">No data available</td></tr>');
                    } else {
                        data.forEach(function(item, index) {
                            const html = `
                            <tr>
                                <td>${(currentPage - 1) * data.length + index + 1}</td>
                                <td><img src="/${item.thumbnail_img || '{{ asset('assets/item/Maskgroup.png') }}'}" alt="thumbnail_img" width="100"></td>
                                <td>${item.name || '-'}</td>
                                <td>${item?.type_paket?.name || 'Unknown'}</td>
                                <td>${item.start_date_departure ? new Date(item.start_date_departure).toLocaleString('default', { month: 'long', year: 'numeric' }) : '-'} - ${item.end_date_departure ? new Date(item.end_date_departure).toLocaleString('default', { month: 'long', year: 'numeric' }) : '-'}</td>
                                <td>${item.transportation_ticket ? '<span class="text-success">Include</span>' : '<span class="text-danger">Exclude</span>'}</td>
                                <td>${item.price || '-'}</td> 
                                <td>
                                    <a href="/cms/paket/edit/${item.code || '#'}" class="btn btn-primary">Edit</a>
                                    <a href="/cms/paket/show/${item.code || '#'}" class="btn btn-info">Detail</a>
                                    <button class="btn btn-danger btn-delete" data-code="${item.code}">Hapus</button>
                                </td>
                            </tr>`;
                            container.append(html);
                        });
                    }

                    // Pagination
                    const paginationContainer = $('.pagination');
                    paginationContainer.empty();
                    let startPage = Math.max(currentPage - 2, 1);
                    let endPage = Math.min(currentPage + 2, lastPage);

                    if (currentPage > 1) {
                        paginationContainer.append(
                            `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage - 1}">«</a></li>`
                        );
                    }

                    for (let i = startPage; i <= endPage; i++) {
                        paginationContainer.append(
                            `<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`
                        );
                    }

                    if (currentPage < lastPage) {
                        paginationContainer.append(
                            `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage + 1}">»</a></li>`
                        );
                    }
                }).fail(function(xhr, status, error) {
                    console.error('Error:', error);
                });


                $.ajax({
                    url: '{{ route('api.type-paket') }}',
                    method: 'GET',
                }).done(function(response) {
                    console.log('type-paket:', response);

                    const data = response?.data?.data || [];
                    const container = $('#choosePaketList');
                    container.empty(); // Bersihkan isi sebelumnya

                    if (data.length === 0) {
                        container.append('<p class="text-center">No data available</p>');
                    } else {
                        data.forEach(function(item) {
                            const href = `/cms/paket/create/{{ $code }}?jenis=${item.code}`;
                            container.append(
                                `<a href="${href}" class="list-group-item list-group-item-action">${item.name}</a>`
                            );
                        });
                    }
                }).fail(function(xhr, status, error) {
                    console.error('Error:', error);
                });

            }

            // Pagination Click
            $(document).on('click', '.pagination .page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                const wilayah_id = $('.nav-link.active').data('id');
                if (page) {
                    show(page, wilayah_id);
                    $('html, body').animate({
                        scrollTop: $('#tablePaket').offset().top - 100
                    }, 500);
                }
            });

            // Wilayah Click
            $(document).on('click', '.nav-link', function(e) {
                e.preventDefault();
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
                const wilayah_id = $(this).data('id');
                show(1, wilayah_id);
                $('html, body').animate({
                    scrollTop: $('#tablePaket').offset().top - 100
                }, 500);
            });

            // Delete Button Click
            $(document).on('click', '.btn-delete', function() {
                selectedCode = $(this).data('code');
                $('#confirmDeleteModal').modal('show');
            });

            // Confirm Delete
            $('#deleteConfirmBtn').on('click', function() {
                if (selectedCode) {
                    $.ajax({
                        url: `/api/paket/${selectedCode}`,
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#confirmDeleteModal').modal('hide');
                            show();
                            selectedCode = null;
                        },
                        error: function(err) {
                            console.error('Delete failed:', err);
                            alert('Gagal menghapus data.');
                        }
                    });
                }
            });

            show(); // initial load
        });
    </script>
@endsection
