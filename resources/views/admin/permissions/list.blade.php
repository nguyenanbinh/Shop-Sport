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
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible" style="width:300px;float:right;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
    <h1>List Permission</h1>

    <button type="button" class="btn btn-dark" style="margin-bottom: 1em">
        <a href="{{ route('admin.permissions.create') }}">Add Permission</a></button>

    <table class="table table-bordered" style="width: 50%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Permission name</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($permissions as $permission)
                <tr>

                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>


                    <td><a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-dark"
                            role="button">Edit</a>
                    </td>
                    {{-- <td><a href="{{ route('admin.roles.create') }}">Assign Role</a></td>
                    <td> <a href="{{ route('admin.roles.create') }}">Revoke Role</a></td> --}}
                    <td>
                        <form action="{{ route('admin.permissions.delete', $permission->id) }}" method="post">
                            {{ @csrf_field() }}
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div>
        {{ $permissions->links('vendor.pagination.bootstrap-4') }}
    </div>

@push('javascript')
    <script>
        $(".alert-dismissible").fadeTo(1500, 100).slideUp(500, function() {
            $(".alert-dismissible").alert('close');
        });

    </script>
@endpush
@endsection
