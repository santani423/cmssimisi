@extends('cms.layout.index')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>
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
    <form id="regForm" action="{{ url('cms/paket/store') }}" method="post" enctype="multipart/form-data">
        <h1>Tambah Paket Baru</h1>
        @csrf
        <div class="tab">Informasi Utama:
            <div class="form-group">
                <label for="paket_id">Jenis Paket *</label>
                <input type="text" class="form-control"  id="typePaket_id" value="{{$typePaket->name}}"
                placeholder="typePaket" required disabled>
            </div>

            <div class="form-group">
                <input type="hidden" name="wilayah_id"  value="{{$wilayah->id}}">
                <input type="hidden" name="paket_id"  value="{{$typePaket->id}}">
                <label for="wilayah_id">Wilayah *</label>
                <input type="text"  class="form-control"   id="wilayah_id" value="{{$wilayah->name}}"
                    placeholder="Wilayah" required disabled>
            </div>

            <div class="form-group">
                <label for="pdf">File PDF *</label>
                <input type="file" class="form-control" name="pdf" id="pdf" accept=".pdf" required>
                <small class="text-danger">Format file harus PDF.</small>
            </div>
            <div class="form-group">
                <label for="thumbnail_img">Gambar Thumbnail *</label>
                <input type="file" class="form-control" name="thumbnail_img" id="thumbnail_img" accept="image/*" required
                    onchange="previewImage(event)">
                <small class="text-danger" id="thumbnail_error" style="display: none;">Tipe file tidak valid.</small>
            </div>

            <div class="form-group d-flex">
                <div style="flex: 1;">
                    <img id="thumbnail_preview" src="#" alt="Pratinjau Gambar"
                        style="display: none; width: 100%; height: auto; margin-top: 10px;">
                </div>
                <div style="flex: 1; margin-left: 20px;">
                    <button id="preview_button" type="button" class="btn btn-primary"
                        style="display: none; margin-top: 10px;" onclick="showModal()">Pratinjau</button>
                </div>
            </div>

            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pratinjau Gambar</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <img id="modal_image" src="#" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Nama Paket *</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Paket" required>
            </div>

            <div class="form-group">
                <label for="start_date_departure">Tanggal Mulai Keberangkatan *</label>
                <input type="date" class="form-control" name="start_date_departure" id="start_date_departure" required>
            </div>
            <div class="form-group">
                <label for="end_date_departure">Tanggal Akhir Keberangkatan *</label>
                <input type="date" class="form-control" name="end_date_departure" id="end_date_departure" required>
            </div>
        </div>

        <div class="tab"> 
            <div class="form-group">
                <label>Transportasi</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="transportation_ticket" id="transportation_ticket"
                        value="1">
                    <label class="form-check-label" for="transportation_ticket">Termasuk Tiket Transportasi</label>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="minimal_orang">Minimal Orang per Pax *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Pax</span>
                    </div>
                    <input type="number" class="form-control" name="minimal_orang" id="minimal_orang"
                        placeholder="Contoh: 30" required>
                </div>
            </div>
            <div class="form-group">
                <label for="price">Harga *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control" name="price" id="price"
                        placeholder="Contoh: 2.500.000" required oninput="formatRupiah(this)">
                </div>
            </div>
        </div>
        @foreach ($ItemDesc as $id)
            <div class="tab">
                <h3>{{ $id->name }}</h3>
                <input type="hidden" name="item_desc_id[]" value="{{ $id->id }}">
                <fieldset>
                    <div class="card">
                        <div class="body">
                            <textarea class="summernote" name="deskripsi[]"></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
        @endforeach
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
            </div>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            @foreach ($ItemDesc as $id)
                <span class="step"></span>
            @endforeach
        </div>
    </form>

    {{-- Modal Spinner --}}
    <div class="modal fade modal-spinner" id="loadingModal" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false">
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
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Simpan";
            } else {
                document.getElementById("nextBtn").innerHTML = "Selanjutnya";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                simpanData();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            z = x[currentTab].getElementsByTagName("select");
            w = x[currentTab].getElementsByTagName("textarea");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].hasAttribute('required') && y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                } else if (y[i].classList.contains('invalid') && y[i].value != "") {
                    y[i].classList.remove('invalid'); // Remove invalid class if now filled
                }
            }
            for (i = 0; i < z.length; i++) {
                if (z[i].hasAttribute('required') && z[i].value == "") {
                    z[i].className += " invalid";
                    valid = false;
                } else if (z[i].classList.contains('invalid') && z[i].value != "") {
                    z[i].classList.remove('invalid');
                }
            }
            for (i = 0; i < w.length; i++) {
                if (w[i].hasAttribute('required') && w[i].value == "") {
                    w[i].className += " invalid";
                    valid = false;
                } else if (w[i].classList.contains('invalid') && w[i].value != "") {
                    w[i].classList.remove('invalid');
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('thumbnail_preview');
            const previewButton = document.getElementById('preview_button');
            const error = document.getElementById('thumbnail_error');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (!file.type.startsWith('image/')) {
                    error.style.display = 'block';
                    input.value = '';
                    preview.style.display = 'none';
                    previewButton.style.display = 'none';
                    return;
                } else {
                    error.style.display = 'none';
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    previewButton.style.display = 'inline-block';
                };
                reader.readAsDataURL(file);
            }
        }

        function showModal() {
            const modalImage = document.getElementById('modal_image');
            const preview = document.getElementById('thumbnail_preview');
            modalImage.src = preview.src;
            $('#imageModal').modal('show');
        }

        function formatRupiah(input) {
            let value = input.value.replace(/[^,\d]/g, '');
            const split = value.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            input.value = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        }

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });

        function simpanData() {
            $('#loadingModal').modal('show'); // tampilkan modal spinner
            document.getElementById("regForm").submit();
        }
    </script>
@endsection
