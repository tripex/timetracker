@extends('app')

@section('header','Clients')
@section('title','Clients')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table class="table-striped table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Hourly rate</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->firstname}} {{$client->lastname}}</td>
                                <td>{{$client->company}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->hourly_rate}} DKK</td>
                                <td>
                                    <a href="{{ url('worklog/create', $client->id)}}">Create work entry</a>
                                    |
                                    <a href="{{ url('client/'.$client->id.'/edit') }}">Edit client</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection