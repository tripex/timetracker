@extends('app')

@section('title','Dashboard')
@section('header','Dashboard')
@section('content')
	<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon">
                    <i class="fa fa-money"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Money earned this month</span>
                    <span class="info-box-number">{{$invoiced_this_month}} DKK</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon">
                    <i class="fa fa-clock-o"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Hours worked this week</span>
                    <span class="info-box-number">{{$hours_worked_this_week}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
                <span class="info-box-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Clients</span>
                    <span class="info-box-number">{{$number_of_clients}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon">
                    <i class="fa fa-comment"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Inspiring quote</span>
                    <span class="info-box-number">{{ Inspiring::quote() }}</span>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <span class="box-title">Last 10 worklog entries</span>
                </div>
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
@endsection
