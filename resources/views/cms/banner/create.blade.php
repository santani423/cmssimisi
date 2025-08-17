@extends('cms.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/jquery-steps/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/summernote/dist/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl.css') }}">
    <style>
        .modal-spinner .modal-dialog {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .modal-spinner .spinner-border {
            width: 4rem;
            height: 4rem;
        }
    </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header"> 
                    <h2>Form Tambah Banner</h2>
                </div>
                <div class="body">
                    <form id="mediaForm" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        {{-- <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                        </div> --}}
                        <div class="form-group">
                            <label for="image_path">Main Banner Image <span class="text-danger">*</span></label>
                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*" onchange="previewImage(this, '#main-banner-preview')" required>
                            <img id="main-banner-preview" src="#" alt="Main Banner Preview" style="display: none; margin-top: 10px; max-height: 200px;">
                        </div>
                        {{-- <div class="form-group">
                            <label for="discover_more">Discover More URL <span class="text-danger">*</span></label>
                            <input type="text" name="discover_more" id="discover_more" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sub_banner_1">Sub Banner 1 <span class="text-danger">*</span></label>
                            <input type="file" name="sub_banner_1" id="sub_banner_1" class="form-control" accept="image/*" onchange="previewImage(this, '#sub-banner-1-preview')" required>
                            <img id="sub-banner-1-preview" src="#" alt="Sub Banner 1 Preview" style="display: none; margin-top: 10px; max-height: 200px;">
                        </div>
                        <div class="form-group">
                            <label for="sub_banner_2">Sub Banner 2 <span class="text-danger">*</span></label>
                            <input type="file" name="sub_banner_2" id="sub_banner_2" class="form-control" accept="image/*" onchange="previewImage(this, '#sub-banner-2-preview')" required>
                            <img id="sub-banner-2-preview" src="#" alt="Sub Banner 2 Preview" style="display: none; margin-top: 10px; max-height: 200px;">
                        </div>
                        <div class="form-group">
                            <label for="sub_banner_3">Sub Banner 3 <span class="text-danger">*</span></label>
                            <input type="file" name="sub_banner_3" id="sub_banner_3" class="form-control" accept="image/*" onchange="previewImage(this, '#sub-banner-3-preview')" required>
                            <img id="sub-banner-3-preview" src="#" alt="Sub Banner 3 Preview" style="display: none; margin-top: 10px; max-height: 200px;">
                        </div> --}}
                        <div class="form-group">
                            <label for="is_active">Is Active <span class="text-danger">*</span></label>
                            <select name="is_active" id="is_active" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="simpanData()">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Spinner --}}
<div class="modal fade modal-spinner" id="loadingModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="text-center">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-3">Menyimpan data, mohon tunggu...</p>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jquery-steps/jquery.steps.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/form-wizard.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/summernote/dist/summernote.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function previewImage(input, previewId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.querySelector(previewId);
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    function simpanData() {
        const form = document.getElementById('mediaForm');

        if (!form.checkValidity()) {
            form.reportValidity(); // Menampilkan pesan validasi default browser
            return;
        }

        const formData = new FormData(form);
        $('#loadingModal').modal('show');

        $.ajax({
            url: "{{ url('/api/banner') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $('#loadingModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil disimpan!'
                }).then(() => {
                    window.location.href = "{{ url('/cms/Banner') }}";
                });
            },
            error: function (err) {
                $('#loadingModal').modal('hide');
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menyimpan data.'
                });
            }
        });
    }
</script>
@endsection
