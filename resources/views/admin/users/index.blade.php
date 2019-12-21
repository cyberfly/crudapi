@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('partials.alert')

                <div class="card">
                    <div class="card-header">
                        Manage Users
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm float-right">Add User</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type_name }}</td>
                                    <td>
                                        <form class="delete" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            @csrf

                                            <a href="{{ route('admin.users.edit', $user) }}" title="Edit" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            @if ($user->id != auth()->id())
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        {!! $users->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_content')
    <script>
        $(function() {
            $(".delete").on("submit", function(){
                return confirm("Do you want to delete this item?");
            });
        });
    </script>
@endsection