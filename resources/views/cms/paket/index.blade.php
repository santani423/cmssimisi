@extends('cms.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task p-4">
                    <div class="header d-flex justify-content-end">
                        <!-- Tombol memunculkan modal (Bootstrap 5) -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#choosePaketModal">
                            Add Paket
                        </button>
                    </div>
                    <div class="body">
                        <h1>{{ $JenisPaket->name }}</h1>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Nama</th>
                                    <th>Type Paket</th>
                                    <th>Wilayah</th>
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
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus paket ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pilih Jenis Paket -->
    <div class="modal fade" id="choosePaketModal" tabindex="-1" aria-labelledby="choosePaketModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="choosePaketModalLabel">Pilih Jenis Paket</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="list-group" id="choosePaketList">
                        <!-- Data type paket akan dimuat via Ajax -->
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

            // Load paket
            function show(page = 1) {
                $.ajax({
                    url: '{{ route('api.paket.index') }}',
                    method: 'GET',
                    data: {
                        page: page,
                        jenis_paket_id: '{{ $code }}',
                    },
                }).done(function(response) {
                    const data = response?.data?.data || [];
                    const currentPage = response?.data?.current_page || 1;
                    const lastPage = response?.data?.last_page || 1;
                    const container = $('#tablePaket');
                    container.empty();

                    if (data.length === 0) {
                        container.append(
                            '<tr><td colspan="10" class="text-center">No data available</td></tr>'
                        );
                    } else {
                        data.forEach(function(item, index) {
                            const html = `
                                <tr>
                                    <td>${(currentPage - 1) * data.length + index + 1}</td>
                                    <td><img src="/${item.thumbnail_img || '{{ asset('assets/item/Maskgroup.png') }}'}" alt="thumbnail_img" width="100"></td>
                                    <td>${item.name || '-'}</td>
                                    <td>${item?.type_paket?.name || 'Unknown'}</td>
                                    <td>${item?.wilayah?.name || 'Unknown'}</td>
                                    <td>${item.start_date_departure ? new Date(item.start_date_departure).toLocaleString('default', { month: 'long', year: 'numeric' }) : '-'} - ${item.end_date_departure ? new Date(item.end_date_departure).toLocaleString('default', { month: 'long', year: 'numeric' }) : '-'}</td>
                                    <td>${item.transportation_ticket ? '<span class="text-success">Include</span>' : '<span class="text-danger">Exclude</span>'}</td>
                                    <td>${item.price || '-'}</td> 
                                    <td>
                                        <a href="/cms/paket/edit/${item.code || '#'}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="/cms/paket/show/${item.code || '#'}" class="btn btn-info btn-sm">Detail</a>
                                        <button class="btn btn-danger btn-sm btn-delete" data-code="${item.code}">Hapus</button>
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
            }

            // Load jenis paket ketika modal dibuka
            $('#choosePaketModal').on('show.bs.modal', function() {
                $.ajax({
                    url: '{{ route('api.type-paket') }}',
                    method: 'GET',
                }).done(function(response) {
                    const data = response?.data?.data || [];
                    const container = $('#choosePaketList');
                    container.empty();

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
                        method: 'DELETE',
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

            // Initial load
            show();
        });
    </script>
@endsection
