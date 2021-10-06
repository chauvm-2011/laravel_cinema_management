@extends('admin.layout.dashboard')
@section('admin_content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                        <a href="{{ url('/add_category') }}" class="btn btn-primary">
                            Add Category
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
                            <h3 class="card-title">List category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                {!! \App\Helpers\Helper::category($categories) !!}
{{--                                <?php--}}
{{--                                    $no = 1--}}
{{--                                ?>--}}
{{--                                @foreach($categories as $category)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $no++ }}</td>--}}
{{--                                    <td>{{ $category->name }}</td>--}}
{{--                                    <td>{{ $category->description }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ '/update_category/'.$category->id.'' }}" class="btn btn-primary btn-sm">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                        <a  class="btn btn-danger btn-sm"--}}
{{--                                        onclick="removeRow('{{ $category->id }}', '{{ url('/delete_category') }}')">--}}
{{--                                            <i class="fas fa-trash"></i>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
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
