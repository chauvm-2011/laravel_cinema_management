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
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

