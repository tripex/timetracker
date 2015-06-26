@extends('app')

@section('content')
    <div class="container">
        <h1>Create client</h1>
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
        <form class="form-horizontal" role="form" method="post" action="{{ url('/client/store') }}">
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

            <div class="form-group">
                <label class="col-md-4 control-label">Phone</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">VAT-number</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="vat_number" value="{{ old('vat_number') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Zipcode</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Street</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="street" value="{{ old('street') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Hourly rate</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="hourly_rate" value="{{ old('hourly_rate') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Create client
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection