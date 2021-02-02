@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Articles</h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Articles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">

                    @if(count($articles) > 0)

                    <table class="table table-bordered">
                        <tr>
                            <td>Image</td>
                            <td>Title</td>
                            <td>Excerpt</td>
                            <td>Source</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($articles as $article)
                        <tr>
                            @if(!empty($article->image))
                            <td><img src="{{ url($article->image) }}" /></td>
                            @else
                            <td>No image</td>
                            @endif
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->excerpt }}</td>
                            <td><em>Source: </em><a class="label label-danger" href="{{ $article->source_link }}"
                                target="_blank">{{ $article->website->title }}</a></td>
                            <td>
                                <a class="btn btn-warning pull-right"
                                href="{{ url('article-details/' . $article->id) }}">READ MORE</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    @if(count($articles) > 0)
                    <div class="pagination">
                        <?php echo $articles->render();  ?>
                    </div>
                    @endif

                    @else
                    <i>No articles found</i>

                    @endif

                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection