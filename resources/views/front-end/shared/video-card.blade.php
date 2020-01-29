<div class="card" style="width: 20rem;">
    <a href="{{route('frontend.video', $video->id)}}" title="{{$video->name}}">
        <img class="card-img-top" style="max-height: 160px" src="{{url($video->image)}}" alt="Card image cap">
    </a>
    <div class="card-body">
        <a href="{{route('frontend.video', $video->id)}}" title="{{$video->name}}">
            <p class="card-text">{{$video->name}}</p>
            <small>{{$video->created_at}}</small>
        </a>
    </div>
</div>
