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
                    <h2>Form Edit Banner</h2>
                </div>
                <div class="body">
                    <form id="mediaForm" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $banner->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $banner->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image_path">Main Banner Image <span class="text-danger">*</span></label>
                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*" onchange="previewImage(this, '#main-banner-preview')">
                            <img id="main-banner-preview" src="{{ asset($banner->image_path) }}" alt="Main Banner Preview" style="display: block; margin-top: 10px; max-height: 200px;">
                        </div>
                        <div class="form-group">
                            <label for="discover_more">Discover More URL <span class="text-danger">*</span></label>
                            <input type="text" name="discover_more" id="discover_more" class="form-control" value="{{ $banner->discover_more }}" required>
                        </div>
                        @foreach($banner->SubBannersImage as $i => $SubBannersImage)
                        <div class="form-group">
                            <label for="sub_banner_{{ $i }}">Sub Banner {{ $i + 1 }}   <span class="text-danger">*</span></label>
                            <input type="file" name="sub_banner_{{ $i + 1  }}" id="sub_banner_{{ $i }}" class="form-control" accept="image/*" onchange="previewImage(this, '#sub-banner-{{ $i }}-preview')">
                            <img id="sub-banner-{{ $i }}-preview" src="{{ asset($SubBannersImage->path_img) }}" alt="Sub Banner {{ $i + 1 }} Preview" style="display: block; margin-top: 10px; max-height: 200px;">
                        </div>
                        @endforeach
                        <div class="form-group">
                            <label for="is_active">Is Active <span class="text-danger">*</span></label>
                            <select name="is_active" id="is_active" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1" {{ $banner->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $banner->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="updateData({{ $banner->id }})">Update</button>
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

    function updateData(id) {
        const form = document.getElementById('mediaForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData(form);
        $('#loadingModal').modal('show');

        $.ajax({
            url: `/api/banner/${id}`,
            method: "POST", // tetap POST karena pakai method spoofing
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'PUT'
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $('#loadingModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil diperbarui!'
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
                    text: 'Terjadi kesalahan saat memperbarui data.'
                });
            }
        });
    }
</script>
@endsection
