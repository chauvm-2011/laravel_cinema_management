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
                                    <th>No</th>
                                    <th>Moviename</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1
                                    ?>
                                    @foreach($movies as $movie)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $movie->movie_name }}</td>
                                        <td><img src="{{ ''.$movie->image.'' }}" width="100px" height="100px" ></td>
                                        <td>@foreach($movie->categories as $cate)
                                                {{ $cate->name.',' }}
                                            @endforeach</td>
                                        <td>
                                            <a href="{{ '/detail_movie/'.$movie->id.'' }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ '/update_movie/'.$movie->id.'' }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a  class="btn btn-danger btn-sm"
                                            onclick="removeRow('{{ $movie->id }}', '{{ url('/delete_movie') }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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
