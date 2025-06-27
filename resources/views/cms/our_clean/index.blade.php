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
                                <form action="{{ route('cms.our_clean.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="kategori_our_clien_id" value="1" hidden>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Mitra</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
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
                            <tbody>
                                @foreach ($ourCleans as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if ($item->img)
                                            <img src="{{ asset('storage/'.$item->img) }}" width="50" height="50" class="rounded-circle" alt="Logo">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>{{ $item->contact_person }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->is_active ? 'Ya' : 'Tidak' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal-{{ $item->id }}">Edit</button>
                                        <form action="{{ route('cms.our_clean.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('cms.our_clean.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Mitra</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body row">
                                                    <div class="form-group col-md-6">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Logo (opsional)</label>
                                                        <input type="file" name="img" class="form-control-file">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Perusahaan</label>
                                                        <input type="text" name="company" class="form-control" value="{{ $item->company }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Contact Person</label>
                                                        <input type="text" name="contact_person" class="form-control" value="{{ $item->contact_person }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" value="{{ $item->email }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Telepon</label>
                                                        <input type="text" name="phone" class="form-control" value="{{ $item->phone }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Alamat</label>
                                                        <textarea name="address" class="form-control" rows="2">{{ $item->address }}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Catatan</label>
                                                        <textarea name="notes" class="form-control" rows="2">{{ $item->notes }}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Status Aktif</label>
                                                        <select name="is_active" class="form-control">
                                                            <option value="1" {{ $item->is_active ? 'selected' : '' }}>Ya</option>
                                                            <option value="0" {{ !$item->is_active ? 'selected' : '' }}>Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Tabel -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
