<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" value="{{ old('title') ?? $website->title }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Url:</strong>
            <input type="text" name="url" class="form-control" value="{{ old('url') ?? $website->url }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        @if($website->logo != "")
        <img src="{{ url($website->logo) }}" width="150" />
        @endif
        <div class="form-group">
            <strong>Logo:</strong>
            <input type="file" name="logo" class="form-control" />
        </div>
    </div>
</div>

@csrf