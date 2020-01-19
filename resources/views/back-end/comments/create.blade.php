<form action="{{route('comment.create')}}" method="post">
    {{csrf_field()}}
    @include('back-end.comments.form')
</form>
