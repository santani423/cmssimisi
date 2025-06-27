@extends('cms.layout.index')

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="body">
                    <h4>Setting</h4>
                    <form action="{{route('cms.setting.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @foreach($settings->toArray() as $key => $value)
                            @if(!in_array($key, ['id', 'created_at', 'updated_at']))
                                <div class="form-group">
                                    <label for="{{ $key }}">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                    @if($key === 'logo' || $key === 'favicon')
                                        <input 
                                            type="file" 
                                            class="form-control" 
                                            id="{{ $key }}" 
                                            name="{{ $key }}" 
                                            accept="image/*"
                                            onchange="previewImage(event, '{{ $key }}')">
                                        <div class="mt-2">
                                            <img id="preview-{{ $key }}" src="{{ $value ? asset($value) : '' }}" alt="Preview {{ $key }}" style="max-height: 100px;">
                                        </div>
                                    @else
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="{{ $key }}" 
                                            name="{{ $key }}" 
                                            value="{{ old($key, $value) }}" 
                                            placeholder="Enter {{ str_replace('_', ' ', $key) }}">
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event, key) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('preview-' + key);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
