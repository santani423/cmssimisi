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
            <div class="card planned_task p-4">
                <div class="header"> 
                    <h2>Form Edit Program</h2>
                </div>
                <div class="body">
                    <form id="programForm" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        {{-- Nama Program --}}
                        <div class="form-group">
                            <label for="nama_program">Nama Program <span class="text-danger">*</span></label>
                            <input type="text" name="nama_program" id="nama_program" class="form-control" required>
                        </div>

                        {{-- Deskripsi Program --}}
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control summernote" rows="5"></textarea>
                        </div>

                        {{-- File PDF --}}
                        <div class="form-group">
                            <label for="pdf_path">Upload File (PDF)</label>
                            <input type="file" name="pdf_path" id="pdf_path" class="form-control" accept="application/pdf">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti file</small>
                            <div id="pdfPreview" class="mt-2"></div>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="updateProgram()">Update</button>
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
    const programId = "{{ $id ?? '' }}"; // pastikan dikirim dari route

    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            placeholder: 'Tulis deskripsi program di sini...',
        });

        if (programId) {
            loadProgram();
        }
    });

    // 🔹 Ambil data program dari API
    function loadProgram() {
        $.ajax({
            url: `/api/program/${programId}`,
            method: "GET",
            success: function (res) {
                const data = res.data || res;
                $('#nama_program').val(data.nama_program);
                $('#deskripsi').summernote('code', data.deskripsi || '');

                if (data.pdf_path) {
                    $('#pdfPreview').html(`
                        <p class="mt-2">
                            <a href="/${data.pdf_path}" target="_blank" class="btn btn-sm btn-secondary">
                                Lihat File Lama
                            </a>
                        </p>
                    `);
                }
            },
            error: function (err) {
                console.error("Gagal memuat data:", err);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal memuat data',
                    text: 'Data program tidak ditemukan.'
                });
            }
        });
    }

    // 🔹 Update data
    function updateProgram() {
        const form = document.getElementById('programForm');

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData(form);
        formData.append('_method', 'PUT');

        $('#loadingModal').modal('show');

        $.ajax({
            url: `/api/program/${programId}`,
            method: "POST", // Laravel perlu _method: PUT
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
                    text: 'Program berhasil diperbarui!'
                }).then(() => {
                    window.location.href = "{{ url('/cms/program') }}";
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
