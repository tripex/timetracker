@extends('app')

@section('title',trans('worklog.create_work_entry'))
@section('header', trans('worklog.create_work_entry'))
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="box box-primary">
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
        <form class="" role="form" method="post" action="{{ url('/worklog/store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label>{{ trans('worklog.client') }}</label>
                            <select id="client" name="client" class="form-control">
                                <option value="">{{ trans('worklog.select_client') }}</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}" @if (Input::old('client') == $client->id || $client_id == $client->id) selected="selected" @endif>
                                        {{$client->company}}
                                    </option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <label>{{ trans('worklog.date_start') }}</label>
                        <input type="text" class="form-control datetimepicker" name="work_date_start" value="{{ old('work_date_start') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ trans('worklog.date_end') }}</label>
                        <input type="text" class="form-control datetimepicker" name="work_date_end" value="{{ old('work_date_end') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ trans('worklog.odometer_start') }}</label>
                        <input type="number" class="form-control" name="odometer_start" value="{{ old('odometer_start') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ trans('worklog.odometer_end') }}</label>
                        <input type="number" class="form-control" name="odometer_end" value="{{ old('odometer_end') }}">
                    </div>

                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label>{{ trans('worklog.note') }}</label>
                        <textarea name="note" class="form-control" rows="16" placeholder="{{ trans('worklog.brief_note') }}">{{old('note')}}</textarea>
                    </div>

                </div>
            </div>
            </div>
                <div class="box-footer">
            <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success">
                        {{ trans('worklog.create_work_entry') }}
                    </button>
            </div>
                </div>
        </form>
        </div>
        </div>
    </div>
@endsection