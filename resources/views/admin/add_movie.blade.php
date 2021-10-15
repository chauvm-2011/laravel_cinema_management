
@extends('admin.layout.dashboard')
@section('admin_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Movie </h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url('/add_movie') }}" method="post" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Movie name</label>
                                    <input type="text" name="movie_name" class="form-control" placeholder="Enter movie name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="select2" name="category_id[]" multiple="multiple" data-placeholder="Select a category" style="width: 100%;">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="file" class="form-control" id="upload" >
                                    <div id="image_show">

                                    </div>
                                    <input type="hidden" name="file" id="file">
                                </div>
                                <div class="form-group">
                                    <label for="">Time(Minutes):</label>
                                    <input type="number" name="time" class="form-control" >
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('/list_movie') }}" class="btn btn-primary">Cancel</a>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
