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
    @component('back-end.shared.table', ['pageTitle' => $pageTitle, 'pageDes' => $pageDes])
        @slot('addButton')
            <div class="col-4 text-right">
                <a href="{{route($routeName . '.create')}}" class="btn btn-white btn-round">add {{$titleS}}</a>
            </div>
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr><th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th class="text-right">
                        Control
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>
                            {{$row['id']}}
                        </td>
                        <td>
                            {{$row['name']}}
                        </td>
                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $rows->links() !!}
        </div>
    @endcomponent
@endsection
@push('js')

@endpush
