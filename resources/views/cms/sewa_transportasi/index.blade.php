<!-- resources/views/cms/sewa_transportasi/index.blade.php -->
@extends('cms.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTransportModal">
                            Tambah Unit Transportasi
                        </button>
                    </div>
                    <div class="body">
                        <!-- Modal Tambah -->
                        <div class="modal fade" id="addTransportModal" tabindex="-1" role="dialog"
                            aria-labelledby="addTransportModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('cms.sewa_transportasi.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Unit Transportasi</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span>&times;</span></button>
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
                                                <div class="form-group">
                                                    <label>{{ $label }}</label>
                                                    <input
                                                        type="{{ in_array($field, ['tahun', 'kapasitas_penumpang', 'harga_sewa_per_hari']) ? 'number' : 'text' }}"
                                                        class="form-control" name="{{ $field }}" required>
                                                </div>
                                            @endforeach
                                            <div class="form-group">
                                                <label>Fasilitas</label>
                                                <textarea name="fasilitas" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" name="foto" class="form-control-file">
                                            </div>
                                            <div class="form-group">
                                                <label>Tersedia</label>
                                                <select class="form-control" name="tersedia">
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif

                        <h2 class="page-title">Manajemen Sewa Transportasi</h2>

                        <!-- Table Data -->
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
                                <tbody>
                                    @foreach ($transportasi as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if ($item->foto)
                                                    <img src="{{ asset(  $item->foto) }}" alt="Foto"
                                                        width="80">
                                                @else
                                                    <span class="text-muted">Tidak ada foto</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->nama_unit }}</td>
                                            <td>{{ $item->jenis_kendaraan }}</td>
                                            <td>{{ $item->no_polisi }}</td>
                                            <td>{{ $item->merek }}</td>
                                            <td>{{ $item->tipe }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->warna }}</td>
                                            <td>{{ $item->kapasitas_penumpang }}</td>
                                            <td>Rp {{ number_format($item->harga_sewa_per_hari, 2, ',', '.') }}</td>
                                            <td>{{ $item->fasilitas }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>{{ $item->tersedia ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editTransportModal-{{ $item->id }}">Edit</button>
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('cms.sewa_transportasi.destroy', $item->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin hapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editTransportModal-{{ $item->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('cms.sewa_transportasi.update', $item->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Transportasi</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span></button>
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
                                                                <div class="form-group">
                                                                    <label>{{ $label }}</label>
                                                                    <input
                                                                        type="{{ in_array($field, ['tahun', 'kapasitas_penumpang', 'harga_sewa_per_hari']) ? 'number' : 'text' }}"
                                                                        class="form-control" name="{{ $field }}"
                                                                        value="{{ $item->$field }}">
                                                                </div>
                                                            @endforeach
                                                            <div class="form-group">
                                                                <label>Fasilitas</label>
                                                                <textarea name="fasilitas" class="form-control" rows="2">{{ $item->fasilitas }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <textarea name="deskripsi" class="form-control" rows="2">{{ $item->deskripsi }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Ganti Foto (Opsional)</label>
                                                                <input type="file" name="foto"
                                                                    class="form-control-file">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tersedia</label>
                                                                <select class="form-control" name="tersedia">
                                                                    <option value="1"
                                                                        {{ $item->tersedia ? 'selected' : '' }}>Ya</option>
                                                                    <option value="0"
                                                                        {{ !$item->tersedia ? 'selected' : '' }}>Tidak
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                         <hr>
         
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            function show(page = 1, wilayah_id = null) {
                $.ajax({
                    url: '{{ route('api.transportasi') }}',
                    method: 'GET',
                    data: { page: page, wilayah_id: wilayah_id },
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
                                    <a href="{{ route('ruang-media.show', '') }}/${item.code}" class="tour-listing-image">
                                        <img src="${item.thumbnail_img}" alt="${item.title}" class="img-fluid">
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
                                            <a href="{{ route('paket.show', '') }}/${item.code}">${item.title}</a>
                                        </h3>
                                        <div class="review" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                             ${item.resume}  
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
                const wilayah_id = $('.nav-link.active').data('id');
                if (page) {
                    show(page, wilayah_id);

                    // Scroll ke atas dengan efek animasi
                    $('html, body').animate({
                        scrollTop: $('#paket-list').offset().top - 100
                    }, 500);
                }
            });

            // Handle wilayah click
            $(document).on('click', '.nav-link', function(e) {
                e.preventDefault();
                $('.nav-link').removeClass('active');
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

