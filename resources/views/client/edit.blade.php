@extends('app')

@section('title',"$client->firstname $client->lastname - $client->company")
@section('header',"Edit $client->firstname $client->lastname ($client->company)")
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
                <form role="form" method="post" action="{{ url('/client/'.$client->id) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" class="form-control" name="firstname"
                                   value="{{ $client->firstname }}">
                        </div>

                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $client->lastname }}">
                        </div>

                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" class="form-control" name="company" value="{{ $client->company }}">
                        </div>

                        <div class="form-group">
                            <label>E-Mail Address</label>
                            <input type="email" class="form-control" name="email" value="{{ $client->email }}">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $client->phone }}">
                        </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>VAT-number</label>
                            <input type="number" class="form-control" name="vat_number"
                                   value="{{ $client->vat_number }}">
                        </div>

                        <div class="form-group">
                            <label>Zipcode</label>
                            <input type="number" class="form-control" name="zipcode" value="{{ $client->zipcode }}">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" value="{{ $client->city }}">
                        </div>

                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" name="street" value="{{ $client->street }}">
                        </div>

                        <div class="form-group">
                            <label>Hourly rate</label>
                            <input type="text" class="form-control" name="hourly_rate"
                                   value="{{ $client->hourly_rate }}">
                        </div>
                                    </div>
                        </div>
                        </div>
                    <div class="box-footer">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">
                                Update client
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection