@extends('app')

@section('header',trans('client.clients'))
@section('title',trans('client.clients'))
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table class="table-striped table table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('client.name') }}</th>
                            <th>{{ trans('client.company') }}</th>
                            <th>{{ trans('client.email') }}</th>
                            <th>{{ trans('client.phone') }}</th>
                            <th>{{ trans('client.hourly_rate') }}</th>
                            <th>{{ trans('client.actions') }}</th>
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
                                    <a href="{{ url('worklog/create', $client->id)}}">{{ trans('client.create_work') }}</a>
                                    |
                                    <a href="{{ url('client/'.$client->id.'/edit') }}">{{ trans('client.edit_client') }}</a>
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