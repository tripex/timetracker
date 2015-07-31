@extends('app')

@section('title',"Edit $user->firstname $user->lastname")
@section('header',"Edit $user->firstname $user->lastname ($user->company)")
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="box box-primary">
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
                <form class="" role="form" method="post" action="{{ url('/user/'.$user->id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" name="firstname"
                                           value="{{ $user->firstname }}">
                                </div>

                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" name="lastname"
                                           value="{{ $user->lastname }}">
                                </div>

                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" name="company" value="{{ $user->company }}">
                                </div>

                                <div class="form-group">
                                    <label>VAT Number</label>
                                    <input type="number" class="form-control" name="vat_number"
                                           value="{{ $user->vat_number }}">
                                </div>

                                <div class="form-group">
                                    <label>Zipcode</label>
                                    <input type="number" class="form-control" name="zipcode"
                                           value="{{ $user->zipcode }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $user->city }}">
                                </div>

                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" class="form-control" name="street" value="{{ $user->street }}">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>

                                <div class="form-group">
                                    <label>E-Mail Address</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>

                                @if (Auth::user()->user_type == "superadmin")
                                    <div class="form-group">
                                        <label>User type</label>
                                        <select name="user_type" class="form-control">
                                            <option value="admin"
                                                    @if ($user->user_type == 'admin') selected="selected" @endif>Admin
                                            </option>
                                            <option value="superadmin"
                                                    @if ($user->user_type == 'superadmin') selected="selected" @endif>
                                                Superadmin
                                            </option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">
                                Update user
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection