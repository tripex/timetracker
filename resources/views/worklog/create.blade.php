@extends('app')

@section('title','Create work entry')
@section('header', 'Create work entry')
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
                        <label>Client</label>
                            <select id="client" name="client" class="form-control">
                                <option value="">Select client</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}" @if (Input::old('client') == $client->id || $client_id == $client->id) selected="selected" @endif>
                                        {{$client->company}}
                                    </option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <label>Work start</label>
                        <input type="date" class="form-control datetimepicker" name="work_date_start" value="{{ old('work_date_start') }}">
                    </div>

                    <div class="form-group">
                        <label>Work end</label>
                        <input type="date" class="form-control datetimepicker" name="work_date_end" value="{{ old('work_date_end') }}">
                    </div>

                    <div class="form-group">
                        <label>Odometer start</label>
                        <input type="number" class="form-control" name="odometer_start" value="{{ old('odometer_start') }}">
                    </div>

                    <div class="form-group">
                        <label>Odometer end</label>
                        <input type="number" class="form-control" name="odometer_end" value="{{ old('odometer_end') }}">
                    </div>

                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" class="form-control" rows="16" placeholder="Just a brief note about the work">{{old('note')}}</textarea>
                    </div>

                </div>
            </div>
            </div>
                <div class="box-footer">
            <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success">
                        Create work entry
                    </button>
            </div>
                </div>
        </form>
        </div>
        </div>
    </div>
@endsection