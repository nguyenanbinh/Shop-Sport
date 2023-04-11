@extends('admin.main')
@section('content')

<h1>Upload file</h1>

<!-- markup -->
<textarea id="my-editor" name="img_product" class="form-control"></textarea>


@endsection

@push('javascript')
<script>
    CKEDITOR.replace('my-editor', options);
    </script>

@endpush
