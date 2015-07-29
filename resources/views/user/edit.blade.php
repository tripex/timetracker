@extends('app')

@section('title','Create user')
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
        <form class="form-horizontal" role="form" method="post" action="{{ url('/user/'.$user->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label class="col-md-4 control-label">Firstname</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Lastname</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Company</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="company" value="{{ $user->company }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">VAT Number</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="vat_number" value="{{ $user->vat_number }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Zipcode</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="zipcode" value="{{ $user->zipcode }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="city" value="{{ $user->city }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Street</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="street" value="{{ $user->street }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Phone</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
            </div>

            @if (Auth::user()->user_type == "superadmin")
            <div class="form-group">
                <label class="col-md-4 control-label">User type</label>
                <div class="col-md-6">
                    <select name="user_type">
                        <option value="admin" @if ($user->user_type == 'admin') selected="selected" @endif>Admin</option>
                        <option value="superadmin" @if ($user->user_type == 'superadmin') selected="selected" @endif>Superadmin</option>
                    </select>
                </div>
            </div>
            @endif

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update user
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection