@extends('app')

@section('title',trans('user.users'))
@section('header',trans('user.users'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table class="table-striped table table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('user.name') }}</th>
                            <th>{{ trans('user.company') }}</th>
                            <th>{{ trans('user.email') }}</th>
                            <th>{{ trans('user.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->firstname}} {{$user->lastname}}</td>
                                <td>{{$user->company}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{url('user/'.$user->id.'/edit')}}">{{ trans('user.edit_user') }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection