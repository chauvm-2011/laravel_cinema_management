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
                            <h3 class="card-title">Update Category </h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url('/update_category/'.$category->id.'') }}" method="post" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Enter category">
                                </div>
                                <div class="form-group">
                                    <label for="">Parent category </label>
                                    <select class="form-control" name="category_id">
                                        <option value="" >------Category parent------</option>
                                        @foreach($categories as $categoryParent)
                                            <option value="{{ $categoryParent->id }}"
                                                    {{ $category->category_id == $categoryParent->id ? 'selected' : '' }}
                                            >{{ $categoryParent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="Enter ...">{{ $category->description }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('/list_category') }}" class="btn btn-primary">Cancel</a>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
