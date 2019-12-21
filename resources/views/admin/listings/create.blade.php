@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('partials.alert')

                <div class="card">
                    <div class="card-header">
                        Create Listing
                        <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.listings.store') }}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="list_name" class="form-control {{ $errors->has('list_name') ? 'is-invalid' : ''}}" id="email" value="{{ old('list_name') }}" placeholder="Enter name">
                                {!! $errors->first('list_name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label for="name">Address</label>
                                <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" id="email" value="{{ old('address') }}" placeholder="Enter address">
                                {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label for="name">Latitude</label>
                                <input type="text" name="latitude" class="form-control {{ $errors->has('latitude') ? 'is-invalid' : ''}}" id="email" value="{{ old('latitude') }}" placeholder="Enter latitude">
                                {!! $errors->first('latitude', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label for="name">Longitude</label>
                                <input type="text" name="longitude" class="form-control {{ $errors->has('longitude') ? 'is-invalid' : ''}}" id="email" value="{{ old('longitude') }}" placeholder="Enter longitude">
                                {!! $errors->first('longitude', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection