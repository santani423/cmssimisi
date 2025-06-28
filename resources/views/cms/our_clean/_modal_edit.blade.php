<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body row">
                    <input type="hidden" id="edit_id">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Logo</label>
                        <input type="file" name="img" class="form-control-file">
                        <img id="edit_img_preview" src="" width="80" class="mt-2"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Perusahaan</label>
                        <input type="text" name="company" id="edit_company" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contact Person</label>
                        <input type="text" name="contact_person" id="edit_contact_person" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" id="edit_email" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telepon</label>
                        <input type="text" name="phone" id="edit_phone" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <textarea name="address" id="edit_address" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Catatan</label>
                        <textarea name="notes" id="edit_notes" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status Aktif</label>
                        <select name="is_active" id="edit_is_active" class="form-control">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
