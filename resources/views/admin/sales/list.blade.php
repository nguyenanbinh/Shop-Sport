@extends('admin.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" style="width:500px;float:right;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('success') }}</strong>
        </div>
    @elseif(session('delete'))
        <div class="alert alert-success alert-dismissible" style="width:300px;float:right;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('delete') }}</strong>
        </div>
    @elseif(session('update'))
        <div class="alert alert-success alert-dismissible" style="width:300px;float:right;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('update') }}</strong>
        </div>
    @endif
    <h1>List sale</h1>

    <button type="button" class="btn btn-dark" style="margin-bottom: 1em">
        <a href="{{ route('admin.sales.create') }}">Add sale</a>
    </button>
    <table class="table table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Discount</th>
                <th>Start day</th>
                <th>End day</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->title }}</td>
                    <td>{{ $sale->content }}</td>
                    <td>{{$sale->discount *100}}%</td>
                    <td>{{$sale->start_day}}</td>
                    <td>{{$sale->end_day}}</td>

                    <td><a href="{{ route('admin.sales.edit', $sale->id) }}" class="btn btn-dark" role="button">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.sales.delete', $sale->id) }}" method="post">
                            {{ @csrf_field() }}
                            @method('DELETE')
                            <input type="submit" id="delete" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $sales->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection

<!-- js -->
@push('javascript')

    <script>
        $(".alert-dismissible").fadeTo(1500, 100).slideUp(500, function() {
            $(".alert-dismissible").alert('close');
        });

    </script>


@endpush
