@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('partials.alert')

                <div class="card">
                    <div class="card-header">
                        Create User
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.users.store') }}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="email" value="{{ old('name') }}" placeholder="Enter name">
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" value="{{ old('email') }}" placeholder="Enter email">
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label for="name">Type</label>
                                <select name="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : ''}}" id="">
                                    <option value="">Select Type</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key }}" @if (old('type') === $key) selected @endif >{{ $type }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" placeholder="">
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
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