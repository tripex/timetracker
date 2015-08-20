@extends('app')

@section('title', trans('user.create_user'))
@section('header', trans('user.create_user'))
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
                                <label>{{ trans('user.firstname') }}</label>
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.lastname') }}</label>
                                <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.company') }}</label>
                                <input type="text" class="form-control" name="company" value="{{ old('company') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.zipcode') }}</label>
                                <input type="number" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.city') }}</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.street') }}</label>
                                <input type="text" class="form-control" name="street" value="{{ old('street') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('user.vat_number') }}</label>
                                <input type="number" class="form-control" name="vat_number" value="{{ old('vat_number') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.phone') }}</label>
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>

                            @if (Auth::user()->user_type == "superadmin")
                                <div class="form-group">
                                    <label>{{ trans('user.user_type') }}</label>
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
                                <label>{{ trans('user.password') }}</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('user.repeat_password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="generate_password"> {{ trans('user.random_password') }}
                                    </label>
                                </div>
                        </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success">
                                {{ trans('user.create_user') }}
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
        $("[name='generate_password']").change( function(){
            if($(this).is(':checked') == true)
            {
                $("[name='password'],[name='password_confirmation']").prop('disabled', true);
            }
            else
            {
                $("[name='password'],[name='password_confirmation']").prop('disabled', false);
            }
        })

        $("[name='vat_number']").keyup(function() {
            if($(this).val().length == 8)
            {
                $.ajax({
                    method:"POST",
                    url: "/client/cvr/"+$(this).val(),
                    data:{_token:"{{ csrf_token()}}"},
                })
                .success(function( msg ) {
                    $("[name='company']").val(msg.name);
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