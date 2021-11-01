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
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
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
                            <h3 class="card-title">Update Movie Schedule </h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url('/update_movie_schedule/'.$movie_schedule->id.'') }}" method="post" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Movie name</label>
                                    <select class="form-control select2 " name="movie_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        @foreach($movies as $movie )
                                            <option value="{{ $movie->id }}" {{ $movie->id == $movie_schedule->movie_id ? 'selected' : '' }}> {{ $movie->movie_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room</label>
                                    <select class="form-control select2 " name="room_id" data-placeholder="Select a room" style="width: 100%;">
                                        @foreach($rooms as $room )
                                            <option value="{{ $room->id }}" {{ $room->id == $movie_schedule->room_id ? 'selected' : ''}}>{{ $room->room_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Start time</label>
                                    <input type="time" name="start_time" value="{{ $movie_schedule->start_time }}" class="form-control" placeholder="Enter start time">
                                </div>
                                <div class="form-group">
                                    <label>End time</label>
                                    <input type="time" name="end_time" value="{{ $movie_schedule->end_time }}"class="form-control" placeholder="Enter end time">
                                </div>
                                <div class="form-group">
                                    <label for="">Date:</label>
                                    <input type="date" name="date" value="{{ $movie_schedule->date }}" class="form-control" >
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('/list_movie_schedule') }}" class="btn btn-primary">Cancel</a>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
