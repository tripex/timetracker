@extends('app')

@section('content')
    <div class="container">
        <h1>Create user</h1>
        <hr/>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" role="form" method="post" action="{{ url('/user/store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-4 control-label">Firstname</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Lastname</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Company</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="company" value="{{ old('company') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            @if (Auth::user()->user_type == "superadmin")
            <div class="form-group">
                <label class="col-md-4 control-label">User type</label>
                <div class="col-md-6">
                    <select name="user_type">
                        <option value="admin" @if (Input::old('user_type') == 'admin') selected="selected" @endif>Admin</option>
                        <option value="superadmin" @if (Input::old('user_type') == 'superadmin') selected="selected" @endif>Superadmin</option>
                    </select>
                </div>
            </div>
            @endif
            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Create user
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection