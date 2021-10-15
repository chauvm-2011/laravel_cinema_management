
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
                            <h3 class="card-title">Detail Movie </h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url('/detail_movie/'.$movie->id.'') }}" method="post" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Movie name</label>
                                    <input type="text" name="movie_name" value="{{ $movie->movie_name }}" disabled class="form-control" placeholder="Enter movie name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>

                                    <select class="select2" name="category_id[]" disabled  multiple="multiple" style="width: 100%;">
                                        @foreach($movie->categories as $category)
                                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description" disabled placeholder="Enter ...">{{ $movie->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <div id="image_show">
                                        <a href="{{ $movie->image }}" target="_blank">
                                            <img src="{{ $movie->image }}" width="200px" height="200px">
                                        </a>
                                    </div>
                                    <input type="hidden" name="image" value="{{ $movie->image }}" id="file">
                                </div>
                                <div class="form-group">
                                    <label for="">Time(Minutes):</label>
                                    <input type="text" value="{{ $movie->time }}" disabled name="time" class="form-control" >
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
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

