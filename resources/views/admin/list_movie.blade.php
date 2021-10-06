
@extends('admin.layout.dashboard')
@section('admin_content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{ url('/add_movie') }}" class="btn btn-primary">
                    Add Movie
                </a>
            </div>
        </div>
    </div>
</section>
@if (Session::has('message'))
<div class="alert alert-success">
    {{Session::get('message')}}
</div>
@endif
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List movie</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Moviname</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<!-- ./wrapper -->
@endsection
