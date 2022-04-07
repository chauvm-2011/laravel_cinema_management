<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>Tenguu Cinema - Movie Theater Template</title>
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,Themeton" >
    <meta name="description" content="Tenguu Cinema - Movie Theater Template">
    <meta name="author" content="Themeton">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("template/User/images/favicon.png")}}"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" type="text/css" href="{{asset("template/User/css/packages.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("template/User/css/default.css")}}">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body class="sticky-menu">
<div id="loader">
    <div class="loader-ring">
        <div class="loader-ring-light"></div>
        <div class="loader-ring-track"></div>
    </div>
</div>
<div class="wrapper">
    <header id="header" class="menu-top-left">
    </header>
</div>
<div id ="order">
    <div class="container">
        <div class="row order-content">
            <div class="col-sm-8 col-xs-12 seat_content ph0">
                <h2>order a ticket</h2>
                <div class="entry-order-content">
                    <form id="msform" name="msform" method="post" action="{{ url('') }}">
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="wpc-content">
                                <h3 class="mt3">Date</h3>
                                @php
                                    use Carbon\Carbon;
                                    $dt = Carbon::now('Asia/Ho_Chi_Minh');
                                    $ed = Carbon::today()->addDay(9);
                                    for ($i= $dt->toDateString(); $i < $ed; $i++){
                                        $a[] = $i;
                                    }
                                @endphp
                                <ul class="order-date">
                                    @foreach($a as $date)
                                        @foreach($movie->movieschedules as $movieschedule)
                                            @if ($date === $movieschedule->date)
                                                @break
                                            @endif
                                        @endforeach
                                        <label ><input class="btn-date" type="button" onclick="myFunction('{{$date}}','{{$movieschedule->date}}', '{{url('/book-movie-ticket-date/'.$movie->id.'') }}')" value="{{$date}}" id="btn-date" name="btn_date"></label>
                                    @endforeach

                                </ul>
                                <h3 class="mt3">TIME</h3>
                                <ul class="order-time">

                                </ul>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset class="seat-content">
                            <div class="wpc-content">
                                <h3 class="seat_title">seat</h3>
                                <div id="seat-map"></div>
                                <div id="legend"></div>
                            </div>
                            <input type="button" name="previous" class="action-button previous" value="Previous" />
                            <input type="button" name="next" class="next1 action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="wpc-content">
                                <h3 class="seat_title" > Payment</h3>
                            </div>
                            <div style="display: flex;margin-right: 350px" >
                                <input type="radio" id="vnpay" value="vnpay" name="payment" class="radio" style="margin-top: 10px">
                                    <img src="https://marketingworks.vn/storage/logo_company/1616032400.png" alt="" style="width: 50px">
                                <label style="margin-left: 10px" for="vnpay">VNPAY</label>
                            </div>
                            <input type="button" name="previous" class="action-button previous" value="Previous" />
{{--                            <a href="{{ url('/payment-vnpay?abc=1&xyz=2') }}" type="button">Payment</a>--}}
                            <input type="button" name="submit" class="submit action-button" value="Payment" />
{{--                            <button type="submit" class="btn btn-success">Payment</button>--}}
                        </fieldset>
                        @csrf
                    </form>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 order_sidebar ph0">
                <form id="order-detail" method="post">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                <h2>Your Information</h2>
                <div class="order-details">
                    <span> Movie:</span><br><p><input value="{{$movie->movie_name}}" disabled></p>
                    <span> Date:</span><br><p><input id="date-movie" name="date_movie" disabled ></p>
                    <span id="time">Time:</span><br><p><input id="date-time" name="date_time" disabled></p>
                    <span>Seat: </span>
                    <ul id="selected-seats"></ul>
                    <div>Tickets: <span id="counter">0</span></div>
                    <div>Total: <b><span id="total">0</span> VNĐ</b></div>
                </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Scripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
<script type="text/javascript" src="{{asset("template/User/js/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{asset("template/User/js/packages.js")}}"></script>
<script type="text/javascript" src="{{asset("template/User/js/scripts.js")}}"></script>
<script type="text/javascript" src="{{ asset("template/js/main.js") }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery easing plugin -->
</body>
</html>
