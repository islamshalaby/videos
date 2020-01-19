
<table id="comments" class="table">
    <tbody>
    @foreach($comments as $comment)
    <tr>
        <td>
            <span>{{$comment->user->name}}</span>
            <p>{{$comment->comment}}</p>
            <small>{{$comment->created_at}}</small>
        </td>
        <td class="td-actions text-right">
            <button type="button" rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').slideToggle()" class="btn btn-white btn-link btn-sm" data-original-title="Edit Task">
                <i class="material-icons">edit</i>
            </button>

            <a href="{{route('comment.delete', $comment->id)}}" onclick="return confirm('Are you sure ?')" type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                <i class="material-icons">close</i>
            </a>
        </td>
    </tr>
        <tr style="display: none">
            <td>
                <form action="{{route('comment.update', $comment->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Comment</label>
                                <textarea name="comment" id="" cols="30" rows="10" class="form-control">{{$comment->comment}}</textarea>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Edit Comment</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
