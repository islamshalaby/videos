<form action="{{route($routeName . '.destroy', $row->id)}}" method="post">
    {{method_field('DELETE')}}
    {{csrf_field()}}
    <button type="submit" onclick="return confirm('Are you sure?')" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$titleS}}">
        <i class="material-icons">close</i>
    </button>
</form>
