@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="title">
                <h1>{{$skill->name}}</h1>
            </div>
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-lg-4">
                        @include('front-end.shared.video-card')
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{$videos->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
