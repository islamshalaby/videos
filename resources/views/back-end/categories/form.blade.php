{{csrf_field()}}
<div class="row">
    @php
    $input = 'name'
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category name</label>
            <input type="text" value="{{isset($row) ? $row->{$input} : ''}}" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
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
</div>
@php
    $input = 'meta_description'
@endphp
<div class="row">
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
