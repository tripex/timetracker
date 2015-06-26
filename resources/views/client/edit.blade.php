@extends('app')

@section('content')
    <div class="container">
        <h1>Update {{$client->company}}</h1>
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
        <form class="form-horizontal" role="form" method="post" action="{{ url('/client/'.$client->id) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-4 control-label">Firstname</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="firstname" value="{{ $client->firstname }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Lastname</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="lastname" value="{{ $client->lastname }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Company</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="company" value="{{ $client->company }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ $client->email }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Phone</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" value="{{ $client->phone }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">VAT-number</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="vat_number" value="{{ $client->vat_number }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Zipcode</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="zipcode" value="{{ $client->zipcode }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="city" value="{{ $client->city }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Street</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="street" value="{{ $client->street }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Hourly rate</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="hourly_rate" value="{{ $client->hourly_rate }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update client
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection