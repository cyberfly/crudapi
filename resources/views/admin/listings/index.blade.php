@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('partials.alert')

                <div class="card">
                    <div class="card-header">
                        Manage Listings
                        <a href="{{ route('admin.listings.create') }}" class="btn btn-primary btn-sm float-right">Add Listing</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($listings as $listing)
                                <tr>
                                    <td>{{ $listing->id }}</td>
                                    <td>{{ $listing->list_name }}</td>
                                    <td>{{ $listing->address }}</td>
                                    <td>{{ $listing->latitude }}</td>
                                    <td>{{ $listing->longitude }}</td>
                                    <td>
                                        <form class="delete" action="{{ route('admin.listings.destroy', $listing->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            @csrf

                                            <a href="{{ route('admin.listings.edit', $listing) }}" title="Edit" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        {!! $listings->links() !!}

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