@extends('cms.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header d-flex justify-content-between align-items-center">
                        <h2 class="page-title">Manajemen Mitra Kerja Sama</h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            Tambah Mitra
                        </button>
                    </div>
                    <div class="body">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('cms.our_clean.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="kategori_our_clien_id" value="1" hidden>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Mitra</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="form-group col-md-6">
                                                <label>Nama</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Logo</label>
                                                <input type="file" name="img" class="form-control-file">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Perusahaan</label>
                                                <input type="text" name="company" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Contact Person</label>
                                                <input type="text" name="contact_person" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Telepon</label>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Alamat</label>
                                                <textarea name="address" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Catatan</label>
                                                <textarea name="notes" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Status Aktif</label>
                                                <select name="is_active" class="form-control">
                                                    <option value="1" selected>Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Data -->
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
                                    <!-- Data akan diisi oleh AJAX -->
                                </tbody>
                            </table>
                            <nav>
                                <ul class="pagination justify-content-center mt-3"></ul>
                            </nav>
                        </div>
                        <!-- End Tabel -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Hapus</button>
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
                url: '{{ route('our_clean.index') }}',
                method: 'GET',
                data: { page: page },
            }).done(function(response) {
                const data = response?.data?.data || [];
                const currentPage = response?.data?.current_page || 1;
                const lastPage = response?.data?.last_page || 1;
                const container = $('#tableOurClean');
                container.empty();

                if (data.length === 0) {
                    container.append(
                        '<tr><td colspan="9" class="text-center">No data available</td></tr>');
                } else {
                    data.forEach(function(item, index) {
                        const imgSrc = item.img ? `/${item.img}` : '{{ asset('assets/item/Maskgroup.png') }}';
                        const company = item.company ? item.company : '-';
                        const contactPerson = item.contact_person ? item.contact_person : '-';
                        const email = item.email ? item.email : '-';
                        const phone = item.phone ? item.phone : '-';
                        const status = item.is_active == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-secondary">Tidak Aktif</span>';
                        const html = `
                            <tr>
                                <td>${(currentPage - 1) * data.length + index + 1}</td>
                                <td><img src="${imgSrc}" alt="logo" width="80"></td>
                                <td>${item.name || '-'}</td>
                                <td>${company}</td>
                                <td>${contactPerson}</td>
                                <td>${email}</td>
                                <td>${phone}</td>
                                <td>${status}</td>
                                <td>
                                    <a href="/cms/our_clean/edit/${item.id}" class="btn btn-primary btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm btn-delete" data-code="${item.id}">Hapus</button>
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

        // Pagination Click
        $(document).on('click', '.pagination .page-link', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            if (page) {
                show(page);
                $('html, body').animate({
                    scrollTop: $('#tableOurClean').offset().top - 100
                }, 500);
            }
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
                    url: `/api/our_clean/${selectedCode}`,
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
