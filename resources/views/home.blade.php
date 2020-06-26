@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" id="app">
            <div class="card">
                <div class="card-header">Dashboard -- {{auth()->user()->name}} -- {{auth()->user()->email}} </div>
                <div class="card-body" style="padding: 0">
                    <chat-app :user="{{auth()->user()}}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
