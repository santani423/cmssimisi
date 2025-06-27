@extends('cms.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/summernote/dist/summernote.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header">
                        <h2>Form Edit About Us</h2>
                    </div>
                    <div class="body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif
                        <form accept="{{ route('cms.about_us.update', '1') }}" method="POST" novalidate>
                            @csrf
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
    <script src="{{ asset('admin/assets/vendor/summernote/dist/summernote.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
