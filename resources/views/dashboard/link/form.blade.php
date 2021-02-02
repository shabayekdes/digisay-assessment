<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Url:</strong>
            <input type="text" name="url" class="form-control" value="{{ old('url') ?? $link->url }}"/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Main Filter Selector:</strong>
            <input type="text" name="main_filter_selector" class="form-control" value="{{ old('url') ?? $link->main_filter_selector }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Website:</strong>
            <select name="website_id" class="form-control">
                <option value="">select</option>
                @foreach($websites as $website)
                    <option {{ $link->website_id == $website->id ? 'selected' : ''}} value="{{ $website->id }}">{{ $website->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@csrf