@extends('admin.main')
@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        {{ @csrf_field() }}
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">

                    <label>Quantity:</label>
                    <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control">

                    <label>Price:</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control">

                    <div class="form-group">
                        <label>Brand:</label><br>
                        <select name="brand_id" id="">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sale:</label><br>
                        <select name="sale_id" id="">
                            @foreach ($sales as $sale)
                                <option value="{{ $sale->id }}">{{ $sale->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image:</label><br>
                    @foreach ($product->images as $key => $img)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="old_img_id" value="{{ $img->id }}" >{!!
                                $img->path !!}
                            </label>
                        </div>
                    @endforeach
                    </div>
                </div> </div>
                <div class="col-lg-6">
                    <label>Image:</label>
                    <textarea id="my-editor" name="img_product" class="form-control"></textarea>
<br>
                    <input type="submit" id="updateBtn" value="Update" class="btn btn-dark">
                </div>
            </div>
        </div>





    </form>

@endsection

@push('javascript')
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
