{{csrf_field()}}
<div class="row">
    @php
    $input = 'name'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video name</label>
            <input type="text" value="{{isset($row) ? $row->{$input} : ''}}" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php
        $input = 'image'
    @endphp
    <div class="col-md-6">
        <div class="">
            <label class="bmd-label-floating">image</label>
            <input type="file" value="{{isset($row) ? $row->{$input} : ''}}" name="{{$input}}" class="@error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php
        $input = 'meta_keywords'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords</label>
            <input type="text" value="{{isset($row) ? $row->{$input} : ''}}" name="{{$input}}"  class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
        $input = 'youtube'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube Url</label>
            <input type="text" value="{{isset($row) ? $row->{$input} : ''}}" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php
        $input = 'description'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video description</label>
            <input type="text" value="{{isset($row) ? $row->{$input} : ''}}" name="{{$input}}"  class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
        $input = 'published'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Status</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{isset($row) && $row->published == 1 ? 'selected' : ''}}>Publish</option>
                <option value="0" {{isset($row) && $row->published == 0 ? 'selected' : ''}}>Hidden</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php
        $input = 'category_id'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{isset($row) && $row->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
        $input = 'skills[]'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select name="{{$input}}" multiple class="form-control @error($input) is-invalid @enderror">
                @foreach($skills as $skill)
                    <option value="{{$skill->id}}" {{in_array($skill->id, $skillsArray) ? 'selected' : ''}} >{{$skill->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php
        $input = 'tags[]'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags</label>
            <select name="{{$input}}" multiple class="form-control @error($input) is-invalid @enderror">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{in_array($tag->id, $tagsArray) ? 'selected' : ''}} >{{$tag->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

@php
    $input = 'meta_description'
@endphp

    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta description</label>
            <textarea name="{{$input}}" id="" cols="30" rows="10" class="form-control @error($input) is-invalid @enderror">{{isset($row) ? $row->{$input} : ''}}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
