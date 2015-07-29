@extends('app')

@section('title','Users')
@section('header','Users')

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
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->firstname}} {{$user->lastname}}</td>
                                <td>{{$user->company}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{url('user/'.$user->id.'/edit')}}">edit user</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection