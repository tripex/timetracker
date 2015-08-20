@extends('app')

@section('title', trans('worklog.worklog_dashboard'))
@section('header', trans('worklog.worklog_dashboard'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table class="table-striped table">
                        <thead>
                        <tr>
                            <th>{{ trans('worklog.workdate') }}</th>
                            <th>{{ trans('worklog.client') }}</th>
                            <th>{{ trans('worklog.hours') }}</th>
                            <th>{{ trans('worklog.note') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($works as $work)
                            <tr>
                                <td>{{$work->work_date_end  }}</td>
                                <td>{{$work->fk_client}}</td>
                                <td>{{$work->hours_used}}</td>
                                <td>{{$work->note}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection