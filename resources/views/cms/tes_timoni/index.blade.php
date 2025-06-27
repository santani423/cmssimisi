<!-- resources/views/cms/tes_timoni/index.blade.php -->
@extends('cms.layout.index')

@section('content')
    <div class="container-fluid">
      
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header d-flex justify-content-end">
                        <!-- Tombol memunculkan modal tambah -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTesTimoniModal">
                            Tambah Tes Timoni
                        </button>
                    </div>
                    <div class="body">
                        <!-- Form Modal Tambah -->
                        <div class="modal fade" id="addTesTimoniModal" tabindex="-1" role="dialog" aria-labelledby="addTesTimoniModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addTesTimoniModalLabel">Tambah Tes Timoni</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('cms.tes_timoni.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Telepon</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan Nomor Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label for="tes_timoni">Tes Timoni</label>
                                                <textarea class="form-control" id="tes_timoni" name="tes_timoni" rows="3" placeholder="Masukkan Tes Timoni"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="is_active">Aktif</label>
                                                <select class="form-control" id="is_active" name="is_active">
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif  
                        <h2 class="page-title">Manajemen Tes Timoni</h2>

                        <!-- Tabel Data Tes Timoni -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Tes Timoni</th>
                                        <th>Aktif</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tesTimonis as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ Str::limit($item->tes_timoni, 50) }}</td>
                                            <td>{{ $item->is_active ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editTesTimoniModal-{{ $item->id }}">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('cms.tes_timoni.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit per Item -->
                                        <div class="modal fade" id="editTesTimoniModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editTesTimoniModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTesTimoniModalLabel-{{ $item->id }}">Edit Tes Timoni</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('cms.tes_timoni.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name-{{ $item->id }}">Nama</label>
                                                                <input type="text" class="form-control" id="name-{{ $item->id }}" name="name" value="{{ $item->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email-{{ $item->id }}">Email</label>
                                                                <input type="email" class="form-control" id="email-{{ $item->id }}" name="email" value="{{ $item->email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="phone-{{ $item->id }}">Telepon</label>
                                                                <input type="text" class="form-control" id="phone-{{ $item->id }}" name="phone" value="{{ $item->phone }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tes_timoni-{{ $item->id }}">Tes Timoni</label>
                                                                <textarea class="form-control" id="tes_timoni-{{ $item->id }}" name="tes_timoni" rows="3">{{ $item->tes_timoni }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="is_active-{{ $item->id }}">Aktif</label>
                                                                <select class="form-control" id="is_active-{{ $item->id }}" name="is_active">
                                                                    <option value="1" {{ $item->is_active ? 'selected' : '' }}>Ya</option>
                                                                    <option value="0" {{ !$item->is_active ? 'selected' : '' }}>Tidak</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Tabel Data -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
