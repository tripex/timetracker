@extends('app')

@section('title', trans('client.create_client'))
@section('header' , trans('client.create_client'))

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="box box-primary">
                <form class="" role="form" method="post" action="{{ url('/client/store') }}">
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
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>{{ trans('client.firstname') }}</label>
                                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.lastname') }}</label>
                                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.zipcode') }}</label>
                                    <input type="number" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.city') }}</label>
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.street') }}</label>
                                    <input type="text" class="form-control" name="street" value="{{ old('street') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>{{ trans('client.company') }}</label>
                                    <input type="text" class="form-control" name="company" value="{{ old('company') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.vatnumber') }}</label>
                                    <input type="number" class="form-control" name="vat_number" value="{{ old('vat_number') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.email') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.phone') }}</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('client.hourly_rate') }}</label>
                                    <input type="text" class="form-control" name="hourly_rate" value="{{ old('hourly_rate') }}">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success">
                                {{ trans('client.create_client') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        $("[name='vat_number']").keyup(function() {
            if($(this).val().length == 8)
            {
                $.ajax({
                    method:"POST",
                    url: "/client/cvr/"+$(this).val(),
                    data:{_token:"{{ csrf_token()}}"},
                })
                .success(function( msg ) {
                    $("[name='company']").val('').val(msg.name);
                    $("[name='zipcode']").val(msg.zipcode);
                    $("[name='city']").val(msg.city);
                    $("[name='street']").val(msg.address);
                    $("[name='email']").val(msg.email);
                    $("[name='phone']").val(msg.phone);
                });;
            }
        });
    </script>
@endsection