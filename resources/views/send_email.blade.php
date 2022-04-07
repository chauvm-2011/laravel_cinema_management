<?php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
?>
<div>
    <div>
        <h2> Xin chào {{ $user->name }}</h2>
        <h3>Thông tin hoá đơn của bạn</h3>
        <p>Mã hoá đơn: {{$bill->id}}</p>
        <p>Phim:
        @foreach($tickets as $ticket)
            @foreach($movies as $movie)
                @foreach($movie->movieschedules as $movieschedule)
                    @if($ticket->movie_schedule_id == $movieschedule->id)
                        {{$movie->movie_name}}
                    @endif
                @endforeach
            @endforeach
                @break
        @endforeach
        <p>Phòng chiếu:
        @foreach($tickets as $ticket)
            @foreach($rooms as $room)
                @foreach($room->movieschedules as $movieschedule)
                    @if($ticket->movie_schedule_id == $movieschedule->id && $movieschedule->room_id == $room->id)
                        {{$room->room_name}}
                    @endif
                @endforeach
            @endforeach
            @break
        @endforeach
        <p>Giờ bắt đầu:
            @foreach($tickets as $ticket)
                @foreach($movie_schedules as $movie_schedule)
                    @if($ticket->movie_schedule_id == $movie_schedule->id)
                        {{date('H:i',strtotime($movie_schedule-> start_time))}}
                    @endif
                @endforeach
                @break
            @endforeach
        </p>
        <p>Ngày chiếu:
            @foreach($tickets as $ticket)
                @foreach($movie_schedules as $movie_schedule)
                    @if($ticket->movie_schedule_id == $movie_schedule->id)
                        {{date('d-m-Y',strtotime($movie_schedule->date))}}
                    @endif
                @endforeach
                @break
            @endforeach
        </p>
        <p>Ghế:
            @foreach($tickets as $ticket)
                {{$ticket->seat_name}}
            @endforeach
        </p>
        <p>Tổng tiền:
            {{$bill->total_money}}VND
        </p>
{{--        <p>Vui lòng xuất mã QRCode này cho cashier để lấy vé khi đến rạp chiếu phim</p>--}}
{{--        <div>--}}
{{--            <?php--}}
{{--            $qrCodeAsPng = QrCode::format('png')->size(100)->generate($bill->id);--}}
{{--            ?>--}}
{{--            <img src="{{ $message->embedData($qrCodeAsPng, 'nameForAttachment.png') }}" />--}}
{{--        </div>--}}
        <p>Thanks</p>
    </div>
</div>
