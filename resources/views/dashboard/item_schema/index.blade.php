@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Item Schema <a href="{{ route('item-schema.create') }}" class="btn btn-warning pull-right">Add new</a></h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Schema</li>
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
    
                    @if(count($itemSchemas) > 0)

                    <table class="table table-bordered">
                        <tr>
                            <td>Title</td>
                            <td>CSS Expression</td>
                            <td>Is Full Url To Article</td>
                            <td>Full content selector</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($itemSchemas as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->css_expression }}</td>
                                <td>{{ $item->is_full_url == 1 ? "Yes" : "No" }}</td>
                                <td>{{ $item->full_content_selector }}</td>
                                <td>
                                    <a href="{{ url('dashboard/item-schema/' . $item->id . '/edit') }}"><i class="fas fa-edit"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
    
                    @if(count($itemSchemas) > 0)
                        <div class="pagination">
                            <?php echo $itemSchemas->render();  ?>
                        </div>
                    @endif
    
                @else
                    <i>No items found</i>
    
                @endif
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection