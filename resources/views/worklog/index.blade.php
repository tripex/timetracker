@extends('app')

@section('content')
    <div class="container">
        <h1>Last 10 worklog entries</h1>
        <hr/>
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
@endsection