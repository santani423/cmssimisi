@extends('cms.layout.index')

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h1>{{ $ruangMedia->title }}</h1>
                </div>
                <div class="body">
                    <div class="blog-image">
                        <img src="{{ asset(  $ruangMedia->thumbnail_img) }}" alt="{{ $ruangMedia->title }}" class="img-fluid">
                    </div>
                    <div class="blog-content mt-3">
                        <p>{!! $ruangMedia->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
// Tambahkan script jika diperlukan
</script>
@endsection
