@extends('admin.main')

@section('content')
    <h1>List User</h1>


    {{-- {{ $permissions }} --}}

    <div class="flex-center position-ref full-height">
        <div class="content">
        <form class="typeahead" action="{{route('admin.users.search1')}}" role="search" method="get">
            {{-- @csrf --}}
                <input type="search" name="q" class="form-control search-input" placeholder="Type something..."
                    autocomplete="off">
                    <button type="submit">Search</button>
            </form>
        </div>
    </div>


    <button type="button" class="btn btn-dark">
        <a href="{{ route('admin.users.create') }}">Add User</a></button>
    <table class="table table-bordered" style="width: 50%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Role</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        {{-- @php
                            dd($user->roles,$user->roles->contains(App\Role::where('name','mod')->first()));
                        @endphp                      --}}
                            @foreach ($user->roles as $item)
                                    {{$item['name']}}
                            @endforeach
                    </td>


                   @if ($user->roles->contains(App\Role::where('name','admin')->first()))
                        @if (Auth::user()->getRoleNames()->contains('admin'))
                            <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-dark" role="button">Edit</a>
                            </td>


                            <td>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="post">
                                    {{ @csrf_field() }}
                                    @method('DELETE')
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        @endif
                   @else
                    <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-dark" role="button">Edit</a>
                    </td>

                    <td>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="post">
                            {{ @csrf_field() }}
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                    @endif
                </tr>

            @endforeach
        </tbody>
    </table>


    {{-- Pagination --}}
    <div>
        {{ $users->withQueryString()->links() }}

    </div>


    <!-- js -->
@push('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/bloodhound.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>
    <script>
        $(document).ready(function($) {
            var engine1 = new Bloodhound({
                remote: {
                    url: '/admin/search/name?value=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            var engine2 = new Bloodhound({
                remote: {
                    url: '/admin/search/email?value=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, [{
                    source: engine1.ttAdapter(),
                    name: 'name',

                    display: function(data) {
                        return data.name;
                    },
                    templates: {
                        empty: [
                            '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                        ],
                        header: [
                            '<div class="header-title">Name</div><div class="list-group search-results-dropdown"></div>'
                        ],
                        suggestion: function(data) {
                            return '<a href="/admin/users/' + data.id + '" class="list-group-item">' +
                                data.name + '</a>';
                        }
                    }
                },
                {
                    source: engine2.ttAdapter(),
                    name: 'email',
                    display: function(data) {
                        return data.email;
                    },
                    templates: {
                        empty: [
                            '<div class="header-title">Email</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                        ],
                        header: [
                            '<div class="header-title">Email</div><div class="list-group search-results-dropdown"></div>'
                        ],
                        suggestion: function(data) {
                            return '<a href="/admin/users/' + data.id + '" class="list-group-item">' +
                                data.email + '</a>';
                        }
                    }
                }
            ]);
        });

    </script>


<script>
$(document).ready(function(){
   $("#delete").click(function(){
       if(!confirm("Do you want to delete this?"))
       event.preventDefault();
   });
 });
</script>
@endpush

@endsection
