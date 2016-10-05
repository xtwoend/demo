@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    @php
                        $url = (new App\Connection(config('kuis88.client_id'), config('kuis88.client_secret')))->url();
                    @endphp
                    <a href="{{ $url }}" class="btn btn-success btn-sm"> Main Kuis88 </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
