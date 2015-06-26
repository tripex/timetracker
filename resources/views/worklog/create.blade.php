@extends('app')

@section('content')
    <div class="container">
        <h1>Create work entry</h1>
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
        <form class="form-horizontal" role="form" method="post" action="{{ url('/worklog/store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-4 control-label">Client</label>
                <div class="col-md-6">
                    <select id="client" name="client" class="form-control">
                        <option value="">Select client</option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}" @if (Input::old('client') == $client->id || $client_id == $client->id) selected="selected" @endif>
                                {{$client->company}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Work start</label>
                <div class="col-md-6">
                    <input type="date" class="form-control datetimepicker" name="work_date_start" value="{{ old('work_date_start') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Work end</label>
                <div class="col-md-6">
                    <input type="date" class="form-control datetimepicker" name="work_date_end" value="{{ old('work_date_end') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Odometer start</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="odometer_start" value="{{ old('odometer_start') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Odometer end</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="odometer_end" value="{{ old('odometer_end') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Note</label>
                <div class="col-md-6">
                    <textarea name="note" class="form-control" rows="3" placeholder="Just a brief note about the work">{{old('note')}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Create work entry
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection