@extends('cms.layout.index')

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task p-4">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2 class="page-title">Manajemen Mitra Kerja Sama</h2>
                    <!-- Trigger Modal Tambah (pakai data-bs-toggle, data-bs-target) -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Mitra
                    </button>
                </div>
                <div class="body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Modal Tambah --}}
                    @include('cms.our_clean._modal_add')

                    {{-- Modal Edit --}}
                    @include('cms.our_clean._modal_edit')

                    {{-- Modal Hapus --}}
                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus mitra ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tabel Data --}}
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Contact Person</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableOurClean">
                                {{-- Data via AJAX --}}
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center mt-3"></ul>
                        </nav>
                    </div>
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

    function show(page = 1) {
        $.ajax({
            url: '/api/our_clean',
            method: 'GET',
            data: { page: page },
        }).done(function(response) {
            const data = response?.data?.data || [];
            const currentPage = response?.data?.current_page || 1;
            const lastPage = response?.data?.last_page || 1;
            const container = $('#tableOurClean');
            container.empty();

            const defaultImg = "{{ asset('assets/item/Maskgroup.png') }}";

            if (data.length === 0) {
                container.append('<tr><td colspan="9" class="text-center">No data available</td></tr>');
            } else {
                data.forEach(function(item, index) {
                    const imgSrc = item.img ? `/${item.img}` : defaultImg;
                    container.append(`
                        <tr>
                            <td>${(currentPage - 1) * data.length + index + 1}</td>
                            <td><img src="${imgSrc}" alt="logo" width="80"></td>
                            <td>${item.name || '-'}</td>
                            <td>${item.company || '-'}</td>
                            <td>${item.contact_person || '-'}</td>
                            <td>${item.email || '-'}</td>
                            <td>${item.phone || '-'}</td>
                            <td>${item.is_active == 1 ? 'Aktif' : 'Tidak Aktif'}</td>
                            <td>
                                <!-- Trigger Modal Edit -->
                                <button type="button" class="btn btn-primary btn-edit" data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                <button class="btn btn-danger btn-delete" data-code="${item.id}">Hapus</button>
                            </td>
                        </tr>`);
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
                    `<li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>`
                );
            }

            if (currentPage < lastPage) {
                paginationContainer.append(
                    `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage + 1}">»</a></li>`
                );
            }
        });
    }

    // Pagination click
    $(document).on('click', '.pagination .page-link', function(e) {
        e.preventDefault();
        const page = $(this).data('page');
        if (page) show(page);
    });

    // Delete
    $(document).on('click', '.btn-delete', function() {
        selectedCode = $(this).data('code');
        $('#confirmDeleteModal').modal('show');
    });

    $('#deleteConfirmBtn').on('click', function() {
        if (selectedCode) {
            $.ajax({
                url: `/api/our_clean/${selectedCode}`,
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function() {
                    $('#confirmDeleteModal').modal('hide');
                    show();
                },
                error: function() {
                    alert('Gagal menghapus data.');
                }
            });
        }
    });

    // Edit
    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        $.ajax({
            url: `/api/our_clean/${id}`,
            method: 'GET',
            success: function(res) {
                const data = res.data;
                $('#edit_id').val(data.id);
                $('#edit_name').val(data.name);
                $('#edit_company').val(data.company);
                $('#edit_contact_person').val(data.contact_person);
                $('#edit_email').val(data.email);
                $('#edit_phone').val(data.phone);
                $('#edit_address').val(data.address);
                $('#edit_notes').val(data.notes);
                $('#edit_is_active').val(data.is_active);
                $('#edit_img_preview').attr('src', data.img ? `/${data.img}` : "{{ asset('assets/item/Maskgroup.png') }}");
                $('#editForm').attr('action', `/cms/our_clean/${data.id}`);
            }
        });
    });

    show(); // Load pertama
});
</script>
@endsection
