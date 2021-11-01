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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("template/User/mages/favicon.png")}}"/>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" type="text/css" href="{{ asset("template/User/css/packages.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("template/User/css/default.css")}}">
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
        <div class="container" style="height: auto">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-4">
                    <a href="./" id="logo" title="Tenguu" class="logo-image-white" data-bg-image="{{asset("template/User/images/logo.png")}}">Tenguu
                    </a>
                </div>
                <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-8 phl0">
                    <div class="header_author">
                        <a href="">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                    </div>
                    <div class="header_ticket">
                        <a href="{{'/signout'}}" class="nav-link">Logout</a>
                    </div>
                    <div class="header_ticket">
                        <a href="#order" class="order_btn">My tickets</a>
                    </div>
                    <a href="javascript:;" id="header-search"></a>
                    <div class="button_container" id="toggle">
                        <span class="top"></span>
                        <span class="middle"></span>
                        <span class="bottom"></span>
                    </div>
                    <div class="overlay" id="overlay">
                        <a href="javascript:;" class="close-window"></a>
                        <nav class="overlay-menu">
                            <ul >
                                <li><a href="{{ url('/main') }}" class="active">Home</a></li>
                                <li><a href="{{ url('/list-movie-user') }}">Blog</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section-content pv12 bg-cover" style="height: auto" data-bg-image="{{asset("template/User/images/blog/bg-single.jpeg")}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article class="blog-item single" >
                        <div class="col-md-4 col-sm12 post-image hover-dark" data-bg-image="{{$movie->image}}">
                            <a href="{{$movie->link}}" class="video-player"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12 ph0">
                            <div class="post-content bg-cover" data-bg-image="{{asset("template/User/images/blog/post-single.jpeg")}}">
                                <div class="content-meta">
                                    <h2 class="entry-title">
                                        {{$movie->movie_name}}
                                        <span>Description</span>
                                    </h2>
                                    <div class="social-links">
                                        <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                        <a href="javascript:;"><i class="fa fa-user"></i></a>
                                    </div>
                                </div>
                                <p class="entry-text">{{$movie->description}}</p>
                                <div class="info-content" style="height: auto">
                                    @php
                                        $dt = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                    @endphp
                                    <ul class="item-info">
                                        <li><span>Running Time:</span>  <p>{{$movie->time}} minutes</p></li>
                                        <li><span>Categories:</span>  <p>@foreach($movie->categories as $category)
                                                    {{$category->name}},
                                                @endforeach</p></li>
                                        <li><span>Director:</span>  <p>Timothy Miller</p></li>
                                        <li><span>Cast:</span>  <p>Monica Baccarin , Ryan Ray</p></li>
                                        <li><span>Date:</span><p>
                                                @foreach($movie->movieschedules as $movieSchedule)
                                                    @if($dt->toDateString() == $movieSchedule->date)
                                                        {{$movieSchedule->date}}
                                                    @endif
                                                    @break
                                                @endforeach
                                            </p></li>
                                    </ul>
                                    <div class="item-info-rate">
                                        <div class="chart-cirle">
                                            <div class="chart-circle-l">
                                                <div class="circle-chart" data-circle-width="7" data-percent="64" data-text="6.4">
                                                </div>
                                                <span>AMDB Rating</span>
                                            </div>
                                            <div class="chart-circle-r">
                                                <div class="circle-chart" data-circle-width="7" data-percent="84" data-text="8.4">
                                                </div>
                                                <span>Rotten Rating</span>
                                            </div>
                                        </div>

                                        <div class="wpc-skills animated">
                                            <div class="skill-block">
                                                <span class="timer" data-to="70" data-speed="500">70 - Metacritic </span>
                                                <div class="skill-line">
                                                    <div class="line-fill" data-width-pb="70%" style="width: 70%;"></div>
                                                </div>
                                            </div>
                                            <div class="skill-block">
                                                <span class="timer" data-to="56" data-speed="500"> 5.6 - Metacritic </span>
                                                <div class="skill-line">
                                                    <div class="line-fill" data-width-pb="56%" style="width: 56%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-footer" >
                                    @foreach($rooms as $room)
                                        @foreach($room->movieschedules as $movieSchedules)
                                            @if($room->id == $movieSchedules->room_id && $movie->id == $movieSchedules->movie_id)
                                                <span>Room {{$room->room_name}}:</span>
                                            @endif
                                        @endforeach
                                        <ul class="mdate" style="height: auto">
                                            @foreach($room->movieschedules as $movieSchedules )
                                                @if($dt->toDateString() == $movieSchedules->date && $room->id == $movieSchedules->room_id && $movie->id == $movieSchedules->movie_id)
                                                    <li><a href="javascript:;"><i>{{date('H:i', strtotime($movieSchedules->start_time))}}</i></a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endforeach
                                    <a href="#order" class="order_btn btn order text-right"> By ticket</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <div class="section-content pvb0">
        <div class="container  pv8">
            <div class="row">
                <div class="col-sm-6">
                    <div id="comments" class="comments-area">
                        <div class="comments-wrapper">
                            <h2 class="comments-title">Comments (2)</h2>
                            <ol class="comment-list">
                                <li>
                                    <article>
                                        <div class="comment-avatar">
                                            <img alt="Image" src="images/blog/user-1.jpg" class="avatar">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <a href="#" class="comment-author">DANIAL RADCLIFFE</a>
                                            </div>
                                            <div class="comment-content">
                                                Dramatically grow market positioning human capital rather than professional data. Authoritatively reconceptualize equity invested sources with adaptive materials.
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <div class="comment-avatar">
                                            <img alt="Image" src="images/blog/user-2.jpg" class="avatar">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <a href="#" class="comment-author">DANIEL CRAIG</a>
                                            </div>
                                            <div class="comment-content">
                                                Progressively repurpose extensive partnerships and one-to-one technology. Competently impact market positioning solutions before user friendly alignments. Energistically deploy reliable process improvements via interdependent.
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Leave a comment</h3>
                        <form id="commentform" class="comment-form" novalidate="">
                            <div class="row">
                                <p class="comment-form-author col-sm-6">
                                    <input id="author" name="author" type="text" value="" size="30" placeholder="Name *">
                                </p>
                                <p class="comment-form-email col-sm-6">
                                    <input id="email" name="email" type="email" value="" size="30" placeholder="E-mail *">
                                </p>
                            </div>
                            <p class="comment-form-comment">
                                <textarea id="comment" name="comment" placeholder="Comments"></textarea>
                            </p>
                            <p class="form-submit">
                                <button type="submit" class="button fill rectangle">Send to us</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fullscreen-section">
        <div id="tt-google-map" class="tt-google-map" data-lat="47.919311" data-lng="106.917643" data-zoom="16" data-saturation="-100" data-color="#333" data-marker="images/marker.png">
            <div id="gmap_content">
                <div class="gmap-item">
                    <label class="label-title">Keep in Touch</label>
                </div>
                <div class="gmap-item">
                    <label>
                        <i class="fa fa-map-marker"></i>
                    </label>
                    <span>Address : 86 New Design Street, Melbourne 105</span>
                </div>
                <div class="gmap-item">
                    <label>
                        <i class="fa fa-phone"></i>
                    </label>
                    <span>Phone: (01) 200 123 544</span>
                </div>
                <div class="gmap-item">
                    <label>
                        <i class="fa fa-envelope"></i>
                    </label>
                    <span>Email: info@example.com</span>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('template/User/js/google-maps.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
    <footer id="footer">
        <div class="container footer-container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">Menu</h5>
                        <ul class="menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Coming soon</a></li>
                            <li><a href="#">Order</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <div class="social-links">
                            <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">Address information</h5>
                        <p>
                            California. AMC Dine-In Theatres Marina,
                            Street 26, Distritc 543 #108
                        </p>
                        <p>
                            <i class="fa fa-mail"></i>Example@mail.com<br>
                            <i class="fa fa-phone"></i> + 123 456 7890
                        </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="widget">
                        <h5 class="widget-title">Leave a message</h5>
                        <form class="contact_form transparent">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" class="inputValidation" name="name" placeholder="Name *">
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="inputValidation" name="email" placeholder="Email *">
                                </div>
                                <div class="col-sm-12 ">
                                    <textarea class="inputValidation" placeholder="Message *"></textarea>
                                    <button type="submit" class="button fill rectangle">Send to us</button>
                                </div>
                            </div>
                        </form>
                        <div class="errorMessage"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row copyright-text">
                    <div class="col-sm-12 text-center">
                        <p class="mv3 mvt0">&copy; Copyrights 2017 Tenguu. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Overlay Search -->
<div id="overlay-search">
    <form method="get" action="./">
        <input type="text" name="s" placeholder="Search..." autocomplete="off">
        <button type="submit">
            <i class="fa fa-search"></i>
        </button>
    </form>
    <a href="javascript:;" class="close-window"></a>
</div>
<div id="order">
    <div class="container">
        <div class="row order-content">
            <div class="col-sm-8 col-xs-12 seat_content ph0">
                <h2>order a ticket</h2>
                <div class="entry-order-content">
                    <form id="msform" name="msform">
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="wpc-content">
                                <h3>location</h3>
                                <select name="location">
                                    <option>Tenguu Cinema Tysons corner</option>
                                    <option>Tenguu Cinema </option>
                                    <option>Tenguu Cinema corner</option>
                                    <option>Tenguu Cinema Tysons</option>
                                </select>
                                <h3 class="mt3">Movie</h3>
                                <select>
                                    <option>Dead pool</option>
                                    <option>THE BATTLE OF ALGIERS (DI ALGERI)</option>
                                    <option>LORD OF THE RINGS: THE RETURN OF THE KINGS</option>
                                    <option>Tenguu Cinema Tysons corner</option>
                                </select>
                                <h3 class="mt3">Date</h3>
                                <input type='date' class="datetime"/>
                                <h3 class="mt3">TIME</h3>
                                <ul class="order-date">
                                    <li><a href="javascript:;"><i>11:50</i></a></li>
                                    <li><a href="javascript:;"><i>13:40</i></a></li>
                                    <li><a href="javascript:;"><i>16:35</i></a></li>
                                    <li><a href="javascript:;"><i>17:30</i></a></li>
                                    <li><a href="javascript:;"><i>19:50</i></a></li>
                                    <li><a href="javascript:;"><i>21:10</i></a></li>
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
                            <input type="submit" name="submit" class="submit action-button" value="Submit" />
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 order_sidebar ph0">
                <h2>Your Information</h2>
                <div class="order-details">
                    <span> Location:</span><p id="locationp">Tenguu Cinema Tysons corner</p>
                    <span>Time:</span>  <p>2016.3.8 18:30</p>
                    <span>Seat: </span>
                    <ul id="selected-seats"></ul>
                    <div>Tickets: <span id="counter">0</span></div>
                    <div>Total: <b>$<span id="total">0</span></b></div>
                </div>
                <a href="javascript:;" class="close-window"><i class="fa fa-times"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Scripts -->
<script type="text/javascript" src="{{ asset("template/User/js/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("template/User/js/packages.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("template/User/js/scripts.min.js")}}"></script>
<!-- jQuery easing plugin -->
</body>
</html>
