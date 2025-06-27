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
                <div class="body">
                    <form id="mediaForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="thumbnail_img">Thumbnail Image</label>
                            <input type="file" name="thumbnail_img" id="thumbnail_img" class="form-control" required onchange="previewImage(event)">
                            <div class="mt-3">
                                <img id="thumbnail_preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; height: auto;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="resume">Resume</label>
                            <textarea name="resume" id="resume" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="summernote" rows="6" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Spinner -->
<div class="modal fade modal-spinner" id="loadingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="spinner-border text-primary" role="status"></div>
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
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 200
        });

        $('#mediaForm').on('submit', function (e) {
            e.preventDefault();

            // validasi summernote
            let summerContent = $('#content').val();
            if (!summerContent || summerContent.trim() === '' || $(summerContent).text().trim() === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Konten wajib diisi!',
                    text: 'Silakan isi konten sebelum mengirim.'
                });
                return;
            }

            simpanData();
        });
    });

    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnail_preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

    function simpanData() {
        let form = $('#mediaForm')[0];
        let formData = new FormData(form);

        $('#loadingModal').modal('show');

        $.ajax({
            url: "{{ url('/api/ruang-media') }}",
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
                    window.location.href = "{{ url('/cms/ruang_media') }}"; // kamu bisa sesuaikan redirect
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
