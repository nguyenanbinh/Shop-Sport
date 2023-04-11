@extends('admin.main')
@section('content')
    <h1>Create Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="post" style="width: 80%;">

        {{ @csrf_field() }}


        <div class="form-group" >
            <label for="">Name:</label>
            <input type="text" name="name" id="" class="form-control">
            @if ($errors->has('name'))
                <p style="color:red">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group">
            <select name="parent_id" id="">
            {{!!$x!!}}
            </select>
        </div>

        <input type="submit" id="createBtn" value="Create Category" class="btn btn-primary" >
    </form>
@endsection

@push('javascript')

 <script>

//   $(document).ready(function () {
//     $(window).on('beforeunload', function(){
//         return "You have unsaved changes!";
//     });
//     $(document).on("submit", "form", function(event){
//         $(window).off('beforeunload');
//     });
//   });

  $(document).ready(function()
{
    var warn_on_unload="";
    $('input:text,input:checkbox,input:radio,textarea,select').one('change', function()
    {
        warn_on_unload = "Leaving this page will cause any unsaved data to be lost.";

        $('#createBtn').click(function(e) {
            warn_on_unload = "";});

            window.onbeforeunload = function() {
            if(warn_on_unload != ''){
                return warn_on_unload;
            }
        }
    });
});
</script>
@endpush
