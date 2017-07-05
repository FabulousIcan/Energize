@extends('layouts.app')

@section('title')
{{ $user->name }}'s Article
@stop

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h2>{{ $user->name }}</h2>
                @foreach($user->energysupplies as $energysupply)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">{{ $energysupply->title }}</h2></div>
                        <div class="panel-body"><p>{{ $energysupply->body}}</p></div>
                        <div class="panel-footer" style="text-align: right;"><span>{{ $energysupply->created_at }} {{ $user->name}}</span></div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
@stop