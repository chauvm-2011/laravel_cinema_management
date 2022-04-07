@extends('admin.layout.dashboard')
@section('admin_content')

{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <a href="{{ url('/add_movie_schedule') }}" class="btn btn-primary">--}}
{{--                        Add Movie Schedule--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
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
                        <form action="{{ url('/list_movie_schedule') }}" method="post">
                            <div class="form-group" style="margin-top: 30px">
                                <label style="margin-left: 20px" for="">Room:</label>
                                <select name="room_id" id="room_id" style="width: 20%;height: 30px" >
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->room_name}}</option>
                                    @endforeach
                                </select>
                                <label style="margin-left: 10px" for="">Date:</label>
                                <input type="date" name="date" id="date-search">
                                <input type="button" id="form_search" class="btn btn-primary" name="search" style="margin-left: 10px;height: 50%" value="Search">
                            </div>
                            @csrf
                        </form>
                        <div class="card-body table-search">
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">List movie schedule</h3>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <table id="example1" class="table table-bordered table-hover">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>No</th>--}}
{{--                                    <th>Moviename</th>--}}
{{--                                    <th>Room</th>--}}
{{--                                    <th>Start_time</th>--}}
{{--                                    <th>End_time</th>--}}
{{--                                    <th>Date</th>--}}
{{--                                    <th>Option</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <?php--}}
{{--                                $no = 1--}}
{{--                                ?>--}}
{{--                                @foreach($movie_schedules as $movie_schedule)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $no++ }}</td>--}}
{{--                                        <td>@foreach($movies as $movie )--}}
{{--                                                @if($movie->id == $movie_schedule->movie_id)--}}
{{--                                                    {{$movie->movie_name}}--}}
{{--                                                @endif--}}
{{--                                            @endforeach</td>--}}
{{--                                        <td>@foreach($rooms as $room )--}}
{{--                                                @if($room->id == $movie_schedule->room_id)--}}
{{--                                                    {{$room->room_name}}--}}
{{--                                                @endif--}}
{{--                                            @endforeach</td>--}}
{{--                                        <td>{{$movie_schedule->start_time}}</td>--}}
{{--                                        <td>{{$movie_schedule->end_time}}</td>--}}
{{--                                        <td>{{$movie_schedule->date}}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ '/detail_movie_schedule/'.$movie_schedule->id.'' }}" class="btn btn-warning btn-sm">--}}
{{--                                                <i class="fas fa-info-circle"></i>--}}
{{--                                            </a>--}}
{{--                                            <a href="{{ '/update_movie_schedule/'.$movie_schedule->id.'' }}" class="btn btn-primary btn-sm">--}}
{{--                                                <i class="fas fa-edit"></i>--}}
{{--                                            </a>--}}
{{--                                            <a  class="btn btn-danger btn-sm"--}}
{{--                                                onclick="removeRow('{{ $movie_schedule->id }}', '{{ url('/delete_movie_schedule') }}')">--}}
{{--                                                <i class="fas fa-trash"></i>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--            </div>--}}
{{--            <!-- /.row -->--}}
{{--        </div>--}}
{{--        <!-- /.container-fluid -->--}}
{{--    </section>--}}
    <!-- /.content -->
    </div>

    <!-- ./wrapper -->
@endsection
