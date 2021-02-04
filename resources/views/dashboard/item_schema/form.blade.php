<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" value="{{ old('title') ?? $itemSchema->title }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>CSS Expression:</strong>
            <input type="text" name="css_expression" class="form-control" value="{{ old('css_expression') ?? $itemSchema->css_expression }}" />
            <small id="emailHelp" class="form-text text-muted">title[css selector1]||excerpt[css selector2]||image[css selector3[src]]||source_link[css selector4 a[href]]</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Is Full Url To Article/Partial Url:</strong>
            <input type="checkbox" name="is_full_url" value="1" checked />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Full content selector:</strong>
            <input type="text" name="full_content_selector" class="form-control" value="{{ old('full_content_selector') ?? $itemSchema->full_content_selector }}" />
            <small id="emailHelp" class="form-text text-muted">the css selector of full content from news details page</small>

        </div>
    </div>
</div>

@csrf