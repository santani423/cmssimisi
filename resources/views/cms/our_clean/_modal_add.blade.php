<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('cms.our_clean.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kategori_our_clien_id" value="1">

                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Mitra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Logo</label>
                        <input type="file" name="img" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Perusahaan</label>
                        <input type="text" name="company" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contact Person</label>
                        <input type="text" name="contact_person" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="address" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Catatan</label>
                        <textarea name="notes" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Aktif</label>
                        <select name="is_active" class="form-select">
                            <option value="1" selected>Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
