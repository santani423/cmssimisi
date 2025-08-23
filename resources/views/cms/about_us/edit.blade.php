@extends('cms.layout.index')

{{-- CSS Summernote Bootstrap 5 --}}
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bs5-summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task p-4">
                    <div class="header">
                        <h2>Form Edit About Us</h2>
                    </div>
                    <div class="body">
                        {{-- Alert success --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Form Update --}}
                        <form action="{{ route('cms.about_us.update', '1') }}" method="POST" novalidate>
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="video">Video URL</label>
                                <textarea name="video" id="video" class="form-control" rows="3">{{ $about->video }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="discover_more">Discover More</label>
                                <input type="text" name="discover_more" id="discover_more" class="form-control"
                                       value="{{ $about->discover_more }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control summernote">{{ $about->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="customer">Customer</label>
                                <input type="text" name="customer" id="customer" class="form-control"
                                       value="{{ $about->customer }}">
                            </div>

                            <div class="form-group">
                                <label for="personal_team">Personal Team</label>
                                <input type="text" name="personal_team" id="personal_team" class="form-control"
                                       value="{{ $about->personal_team }}">
                            </div>

                            <div class="form-group">
                                <label for="destinasi_tour">Destinasi Tour</label>
                                <input type="text" name="destinasi_tour" id="destinasi_tour" class="form-control"
                                       value="{{ $about->destinasi_tour }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Spinner --}}
    <div class="modal fade modal-spinner" id="loadingModal" tabindex="-1" role="dialog" data-bs-backdrop="static"
         data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="text-center">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="mt-3">Menyimpan data, mohon tunggu...</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- jQuery wajib --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- bs5-summernote JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bs5-summernote@0.8.20/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
