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
                            <h3 class="card-title">Detail Movie Schedule </h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url('/detail_movie_schedule/'.$movie_schedule->id.'') }}" method="post" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Movie name</label>
                                    <select class="form-control select2 " name="movie_id" disabled data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        @foreach($movies as $movie )
                                            @if($movie->id == $movie_schedule->movie_id)
                                                <option value="{{$movie_schedule->movie_id}}">{{$movie->movie_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room</label>
                                    <select class="select2" name="room_id[]" multiple="multiple" disabled data-placeholder="Select a room" style="width: 100%;">
                                        @foreach($rooms as $room )
                                            @if($room->id == $movie_schedule->room_id)
                                                <option selected value="{{$movie_schedule->room_id}}">{{$room->room_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Showtime</label>
                                    @foreach($movie_schedule->movieshowtimes as $movieshowtime)
                                        <input type="time" name="showtime" value="{{ $movieshowtime->start_time}}" class="form-control" placeholder="Enter start time" disabled>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="">Date:</label>
                                    <input type="date" name="date" value="{{ $movie_schedule->date }}" disabled class="form-control" >
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
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
