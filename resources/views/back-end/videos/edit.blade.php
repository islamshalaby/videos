@extends('back-end.layout.app')

@section('title')
    {{$pageTitle}}
@endsection
@push('css')

@endpush

@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent
    @component('back-end.shared.edit', ['pageTitle' => $pageTitle, 'pageDes' => $pageDes])
        <form method="POST" autocomplete="off" action="{{route($routeName . '.update', $row->id)}}" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @include('back-end.'. $routeName .'.form')

            <button type="submit" class="btn btn-primary pull-right">{{$pageTitle}}</button>
            <div class="clearfix"></div>
        </form>
        @php
            $url = getYoutubeUrl($row->youtube);
        @endphp
        @slot('embdedVideo')
            <iframe width="300" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" style="margin-bottom: 20px" allowfullscreen></iframe>
            <img src="{{url($row->image)}}" style="width: 300px"  />
        @endslot
    @endcomponent

    @component('back-end.shared.edit', ['pageTitle' => 'Comments', 'pageDes' => 'Her you can control comments'])
        @include('back-end.comments.index')
        @slot('embdedVideo')
            @include('back-end.comments.create')
        @endslot
    @endcomponent

@endsection
@push('js')

@endpush
