@extends('app')
 
@section('content')
    <div class="container">
        <h1>Users</h1>
        <hr/>
        <div class="row>">
            <div class="col-sm-12">
                <table class="table-striped table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->firstname}} {{$user->lastname}}</td>
                                <td>{{$user->company}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection