@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="title">
                <h1>{{$video->name}}</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $url = getYoutubeUrl($video->youtube);
                    @endphp
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" style="margin-bottom: 20px" allowfullscreen></iframe>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <b><i class="nc-icon nc-single-02"></i> {{$video->user->name}}</b> &nbsp;
                    <b><i class="nc-icon nc-calendar-60"></i> {{$video->created_at->diffForHumans()}}</b>&nbsp;
                    <b><i class="nc-icon nc-single-copy-04"></i> {{$video->category->name}}</b>
                </div>
                <div class="col-lg-2">
                    <b class="text-center">Tags</b><br>
                    @foreach($video->tags as $tag)
                        <a href="{{route('frontend.tags', $tag->id)}}" title="{{$tag->name}}">
                            <span class="badge badge-primary">{{$tag->name}}</span>
                        </a>
                    @endforeach

                </div>
                <div class="col-lg-2">
                    <b class="text-center">Skills</b><br>
                    @foreach($video->skills as $skill)
                        <a href="{{route('frontend.skills', $skill->id)}}" title="{{$skill->name}}">
                            <span class="badge badge-info">{{$skill->name}}</span>
                        </a>
                    @endforeach
                </div>
                <div class="col-lg-8">
                    <p>{{$video->description}}</p>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="card card-nav-tabs" style="width: 100%; margin-top: 20px">
                        <b class="card-header card-header-danger">
                            Comments ({{count($video->comments)}})
                        </b>
                        <ul class="list-group list-group-flush">
                            @foreach($video->comments as $comment)
                            <li class="list-group-item">{{$comment->comment}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
