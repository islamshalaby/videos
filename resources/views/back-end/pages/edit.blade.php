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
        <form method="POST" autocomplete="off" action="{{route($routeName . '.update', $row->id)}}">
            {{method_field('PUT')}}
            @include('back-end.'. $routeName .'.form')

            <button type="submit" class="btn btn-primary pull-right">{{$pageTitle}}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent
@endsection
@push('js')

@endpush
