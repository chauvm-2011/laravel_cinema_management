
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
                            <h3 class="card-title">Update Movie </h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url('/update_movie/'.$movie->id.'') }}" method="post" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Movie name</label>
                                    <input type="text" name="movie_name" value="{{ $movie->movie_name }}" class="form-control" placeholder="Enter movie name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="select2" name="category_id[]" multiple="multiple" style="width: 100%;">
                                        @foreach($categories as $category )
                                            @php
                                                $selected = false
                                            @endphp
                                            @foreach($movie->categories as $cate)
                                                @if ($cate->id === $category->id)
                                                    @php
                                                        $selected = true;
                                                    @endphp
                                                    @break
                                                @endif
                                            @endforeach
                                            <option value="{{ $category->id }}"{{ $selected ? 'selected' : '' }}>{{ $category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description" placeholder="Enter ...">{{ $movie->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="file" value="{{ $movie->image }}" class="form-control" id="upload" >
                                    <div id="image_show">
                                        <a href="{{ $movie->image }}" target="_blank">
                                            <img src="{{ $movie->image }}" width="200px" height="200px">
                                        </a>
                                    </div>
                                    <input type="hidden" name="image" value="{{ $movie->image }}" id="file">
                                </div>
                                <div class="form-group">
                                    <label for="">Link trailer</label>
                                    <input type="text" value="{{ $movie->link }}" name="link" class="form-control"  placeholder="Enter link trailer">
                                </div>
                                <div class="form-group">
                                    <label for="">Time(Minutes):</label>
                                    <input type="text" value="{{ $movie->time }}" name="time" class="form-control" >
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

