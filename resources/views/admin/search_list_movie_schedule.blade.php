<table class="table table-bordered">
    <thead>
    <tr>
        <th>Showtime</th>
        <th>Movie</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @php
        $dt = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
    @endphp
    @foreach($showtimes as $showtime)
        <tr>
            <td>
                {{date('H:i',strtotime($showtime->start_time))}}
            </td>
            <td>
                @php
                    $movie = false;
                @endphp
                @foreach($movieschedules as $movieschedule)
                    @if($movieschedule->movie_showtime_id === $showtime->id)
                        @php
                            $movie = true;
                        @endphp
                        @break
                    @endif
                @endforeach
                @if($movie)
                    <p>{{$movieschedule->movie_name}}</p>
                    @else
                    <p style="color: red">Trống</p>
                @endif
            </td>
            <td>
                @php
                    $check = false;
                @endphp
                @foreach($movieschedules as $movieschedule)
                    @if($movieschedule->movie_showtime_id === $showtime->id)
                        @php
                            $check = true;
                        @endphp
                        @break
                    @endif
                @endforeach
                @if($check)
                    <a href="{{ '/detail_movie_schedule/'.$movieschedule->movie_schedule_id.'' }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="{{ '/update_movie_schedule/'.$movieschedule->movie_schedule_id.'' }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a  class="btn btn-danger btn-sm"
                        onclick="removeRow('{{ $movieschedule->movie_schedule_id }}', '{{ url('/delete_movie_schedule') }}')">
                        <i class="fas fa-trash"></i>
                    </a>
                @else
                    <a href="{{ url('/add_movie_schedule?date='.$date.'&showtime='.$showtime->start_time.'') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
