@extends('app')

@section('title','Last 10 worklog entries')
@section('header','Last 10 worklog entries')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table class="table-striped table">
                        <thead>
                        <tr>
                            <th>Workdate</th>
                            <th>Client</th>
                            <th>Hours</th>
                            <th>Note</th>
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