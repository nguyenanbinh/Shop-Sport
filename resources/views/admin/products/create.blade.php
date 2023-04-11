@extends('admin.main')
@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('admin.products.store') }}" method="post" style="width: 50%;">

        {{ @csrf_field() }}


        <div class="form-group">
            <label for="">Name<span style="color: red">(*)</span>:</label>
            <input type="text" name="name" id="" class="form-control">
            @if ($errors->has('name'))
                <p style="color:red">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="">Quantity<span style="color: red">(*)</span>:</label>
            <input type="number" name="quantity" id="" class="form-control">
            @if ($errors->has('quantity'))
                <p style="color:red">{{ $errors->first('quantity') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="">Price<span style="color: red">(*)</span>:</label>
            <input type="number" name="price" id="" class="form-control">
            @if ($errors->has('price'))
                <p style="color:red">{{ $errors->first('price') }}</p>
            @endif
        </div>

        <!-- markup -->
        <textarea id="my-editor" name="img_product" class="form-control"></textarea>

        <div class="form-group">
            <label for="">Brand<span style="color: red">(*)</span>:</label>
            <select name="brand_id" id="">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Sale<span style="color: red">(*)</span>:</label>
            <select name="sale_id" id="">
                @foreach ($sales as $sale)
                    <option value="{{ $sale->id }}">{{ $sale->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Category</label>

            <select name="category_id">

                @foreach ($categories as $category)
                    @if ($category->parent_id != 0)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="submit" id="createBtn" value="Create Product" class="btn btn-primary">
    </form>
@endsection

@push('javascript')
    <script>
        $(document).ready(function() {
            var warn_on_unload = "";
            $('input:text,input:checkbox,input:radio,textarea,select').one('change', function() {
                warn_on_unload = "Leaving this page will cause any unsaved data to be lost.";

                $('#createBtn').click(function(e) {
                    warn_on_unload = "";
                });

                window.onbeforeunload = function() {
                    if (warn_on_unload != '') {
                        return warn_on_unload;
                    }
                }
            });
        });

    </script>

<script>
    $(document).ready(function() {
        var warn_on_unload = "";
        $('input:text,input:checkbox,input:radio,textarea,select').one('change', function() {
            warn_on_unload = "Leaving this page will cause any unsaved data to be lost.";

            $('#updateBtn').click(function(e) {
                warn_on_unload = "";
            });

            window.onbeforeunload = function() {
                if (warn_on_unload != '') {
                    return warn_on_unload;
                }
            }
        });
    });

</script>

    <script>
        CKEDITOR.replace('my-editor', options);

    </script>

@endpush
