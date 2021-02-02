@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Websites <a href="{{ route('websites.create') }}" class="btn btn-warning pull-right">Add new</a></h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Websites</li>
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
    
                    @if(count($websites) > 0)
        
                        <table class="table table-bordered">
                            <tr>
                                <td>Title</td>
                                <td>Logo</td>
                                <td>Url</td>
                                <td>Actions</td>
                            </tr>
                            @foreach($websites as $website)
                                <tr>
                                    <td>{{ $website->title }}</td>
                                    <td><img width="150" src="{{ url($website->logo) }}" /></td>
                                    <td><a href="{{ $website->url }}">{{ $website->url }}</a> </td>
                                    <td>
                                        <a href="{{ url('dashboard/websites/' . $website->id . '/edit') }}"><i class="glyphicon glyphicon-edit"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
        
                        @if(count($websites) > 0)
                            <div class="pagination">
                                <?php echo $websites->render();  ?>
                            </div>
                        @endif
        
                    @else
                        <i>No websites found</i>
        
                    @endif
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



@endsection