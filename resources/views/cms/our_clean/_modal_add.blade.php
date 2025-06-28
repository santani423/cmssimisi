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
