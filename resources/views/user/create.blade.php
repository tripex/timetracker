@extends('app')

@section('title','Create user')
@section('header', 'Create user')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="box box-primary">
                <form class="" role="form" method="post" action="{{ url('/user/store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="box-body">
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
                        <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            </div>

                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                            </div>

                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" class="form-control" name="company" value="{{ old('company') }}">
                            </div>

                            <div class="form-group">
                                <label>Zipcode</label>
                                <input type="number" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                            </div>

                            <div class="form-group">
                                <label>Street</label>
                                <input type="text" class="form-control" name="street" value="{{ old('street') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>VAT Number</label>
                                <input type="number" class="form-control" name="vat_number" value="{{ old('vat_number') }}">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>

                            <div class="form-group">
                                <label>E-Mail Address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>

                            @if (Auth::user()->user_type == "superadmin")
                                <div class="form-group">
                                    <label>User type</label>
                                    <select name="user_type" class="form-control">
                                        <option value="admin"
                                                @if (Input::old('user_type') == 'admin') selected="selected" @endif>Admin
                                        </option>
                                        <option value="superadmin"
                                                @if (Input::old('user_type') == 'superadmin') selected="selected" @endif>
                                            Superadmin
                                        </option>
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                        </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success">
                                Create user
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection