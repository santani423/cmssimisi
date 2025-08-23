<!-- resources/views/cms/sewa_transportasi/index.blade.php -->
@extends('cms.layout.index')

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task p-4">
                <div class="header d-flex justify-content-end">
                    <!-- Tombol Tambah Unit Transportasi -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addTransportModal">
                        Tambah Unit Transportasi
                    </button>
                </div>
                <div class="body">

                    {{-- Modal Tambah Unit Transportasi --}}
                    <div class="modal fade" id="addTransportModal" tabindex="-1"
                        aria-labelledby="addTransportModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form action="{{ route('cms.sewa_transportasi.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addTransportModalLabel">Tambah Unit Transportasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ([
                                            'nama_unit' => 'Nama Unit',
                                            'jenis_kendaraan' => 'Jenis Kendaraan',
                                            'merek' => 'Merek',
                                            'tipe' => 'Tipe',
                                            'no_polisi' => 'No Polisi',
                                            'tahun' => 'Tahun',
                                            'warna' => 'Warna',
                                            'kapasitas_penumpang' => 'Kapasitas Penumpang',
                                            'harga_sewa_per_hari' => 'Harga Sewa per Hari',
                                        ] as $field => $label)
                                            <div class="form-group mb-3">
                                                <label class="form-label">{{ $label }}</label>
                                                <input type="{{ in_array($field, ['tahun', 'kapasitas_penumpang', 'harga_sewa_per_hari']) ? 'number' : 'text' }}"
                                                    class="form-control" name="{{ $field }}" required>
                                            </div>
                                        @endforeach
                                        <div class="form-group mb-3">
                                            <label class="form-label">Fasilitas</label>
                                            <textarea name="fasilitas" class="form-control summernote"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control summernote"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Foto</label>
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Tersedia</label>
                                            <select class="form-control" name="tersedia">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- End Modal Tambah Unit --}}

                    {{-- Notifikasi sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <h2 class="page-title mt-3">Manajemen Sewa Transportasi</h2>

                    {{-- Tabel Data --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama Unit</th>
                                    <th>Jenis</th>
                                    <th>No Polisi</th>
                                    <th>Merek</th>
                                    <th>Tipe</th>
                                    <th>Tahun</th>
                                    <th>Warna</th>
                                    <th>Kapasitas</th>
                                    <th>Harga/Hari</th>
                                    <th>Fasilitas</th>
                                    <th>Deskripsi</th>
                                    <th>Tersedia</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="transportasi-list">
                                <!-- Data dimuat via AJAX -->
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center"></ul>
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

    // Fungsi load data
    function show(page = 1, wilayah_id = null) {
        $.ajax({
            url: '{{ route('api.transportasi') }}',
            method: 'GET',
            data: { page: page, wilayah_id: wilayah_id },
        }).done(function(response) {
            const data = response?.data?.data || [];
            const currentPage = response?.data?.current_page || 1;
            const lastPage = response?.data?.last_page || 1;
            const container = $('#transportasi-list');
            container.empty();

            data.forEach(function(item) {
                const html = `
<tr>
    <td>${item.id}</td>
    <td><img src="/${item.foto ? item.foto : 'assets/item/Maskgroup.png'}" alt="${item.nama_unit}" width="100"></td>
    <td>${item.nama_unit}</td>
    <td>${item.jenis_kendaraan}</td>
    <td>${item.no_polisi}</td>
    <td>${item.merek}</td>
    <td>${item.tipe}</td>
    <td>${item.tahun}</td>
    <td>${item.warna}</td>
    <td>${item.kapasitas_penumpang}</td>
    <td>Rp ${Number(item.harga_sewa_per_hari).toLocaleString('id-ID')}</td>
    <td>${item.fasilitas || '-'}</td>
    <td>${item.deskripsi || '-'}</td>
    <td>${item.tersedia == 1 ? 'Ya' : 'Tidak'}</td>
    <td>
        <button class="btn btn-sm btn-warning btn-edit" data-id="${item.id}">Edit</button>
        <form action="/cms/sewa_transportasi/${item.id}" method="POST" style="display:inline;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus unit transportasi ini?')">Hapus</button>
        </form>
    </td>
</tr>`;
                container.append(html);
            });

            // Pagination
            const paginationContainer = $('.pagination');
            paginationContainer.empty();

            let startPage = Math.max(currentPage - 2, 1);
            let endPage = Math.min(currentPage + 2, lastPage);

            if (currentPage > 1) {
                paginationContainer.append(`<li class="page-item"><a class="page-link" href="#" data-page="${currentPage - 1}">«</a></li>`);
            }
            for (let i = startPage; i <= endPage; i++) {
                paginationContainer.append(`<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`);
            }
            if (currentPage < lastPage) {
                paginationContainer.append(`<li class="page-item"><a class="page-link" href="#" data-page="${currentPage + 1}">»</a></li>`);
            }
        }).fail(function(xhr, status, error) {
            console.error('Error:', error);
        });
    }

    // Handle pagination
    $(document).on('click', '.pagination .page-link', function(e) {
        e.preventDefault();
        const page = $(this).data('page');
        if (page) show(page);
    });

    // Klik Edit -> load modal edit via AJAX
    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        $.get(`/api/transportasi/${id}`, function(item) {
            $('#editTransportModal input[name="nama_unit"]').val(item.data.nama_unit);
            $('#editTransportModal input[name="jenis_kendaraan"]').val(item.data.jenis_kendaraan);
            $('#editTransportModal input[name="merek"]').val(item.data.merek);
            $('#editTransportModal input[name="tipe"]').val(item.data.tipe);
            $('#editTransportModal input[name="no_polisi"]').val(item.data.no_polisi);
            $('#editTransportModal input[name="tahun"]').val(item.data.tahun);
            $('#editTransportModal input[name="warna"]').val(item.data.warna);
            $('#editTransportModal input[name="kapasitas_penumpang"]').val(item.data.kapasitas_penumpang);
            $('#editTransportModal input[name="harga_sewa_per_hari"]').val(item.data.harga_sewa_per_hari);
            $('#editTransportModal textarea[name="fasilitas"]').val(item.data.fasilitas);
            $('#editTransportModal textarea[name="deskripsi"]').val(item.data.deskripsi);
            $('#editTransportModal select[name="tersedia"]').val(item.data.tersedia);
            $('#editTransportModal form').attr('action', `/cms/sewa_transportasi/${id}`);
            $('#editTransportModal').modal('show');
        });
    });

    show(); // initial load
});
</script>

<!-- Modal Edit Global -->
<div class="modal fade" id="editTransportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Transportasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Nama Unit</label>
                        <input type="text" name="nama_unit" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Jenis Kendaraan</label>
                        <input type="text" name="jenis_kendaraan" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tipe</label>
                        <input type="text" name="tipe" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">No Polisi</label>
                        <input type="text" name="no_polisi" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="tahun" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Warna</label>
                        <input type="text" name="warna" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Kapasitas Penumpang</label>
                        <input type="number" name="kapasitas_penumpang" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Harga Sewa per Hari</label>
                        <input type="number" name="harga_sewa_per_hari" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Fasilitas</label>
                        <textarea name="fasilitas" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Ganti Foto (Opsional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tersedia</label>
                        <select class="form-control" name="tersedia">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
