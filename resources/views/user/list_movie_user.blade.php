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
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-4">
                    <a href="{{ url('/main') }}" id="logo" title="Tenguu" class="logo-image" data-bg-image="{{asset("template/User/images/logo.png")}}">Cinema
                    </a>
                </div>
                <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-8 phl0">
                    <div class="header_author">
                        <a href="{{ url('/login') }}">
                            Signin/Signup
                        </a>
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
                                <li ><a href="{{ url('/main') }}">Home</a></li>
                                <li><a href="{{ url('/list-movie-user') }}">Blog</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section-content pv12 bg-cover" data-bg-image="{{ asset("template/User/images/coming-bg.jpeg")}}">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 page-title mt5 mb5">
                    <h2 class="blog-title">Blog</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/main') }}" class="active">Home</a></li>
                        <li><a href="{{ url('/list-movie-user') }}">Blog</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 ph0">
                    @if ($movies)
                        @php
                        $movie = \App\Models\Movie::orderBy('created_at', 'desc')->first();
                        @endphp
                        <article class="blog-item featured" >
                            <div class="col-sm-4 col-xs-12">
                                <div class="post-image" data-bg-image="{{$movie->image}}"></div>
                            </div>
                            <div class="col-sm-8 ml-r-15">
                                <span class="featured_news">Featured news</span>
                                <div class="overlay bg-cover" data-bg-image="{{$movie->image}}"></div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="category">
                                            @foreach($movie->categories as $category)
                                                <li value="{{$category->id}}"><a>{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="social-links">
                                            <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                            <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                            <a href="javascript:;"><i class="fa fa-user"></i></a>
                                        </div>
                                    </div>
                                    <h2 class="entry-title"><a>{{$movie->movie_name}}</a></h2>
                                    <p class="entry-excepts">{{$movie->description}}</p>
                                    <a href="{{ url('/detail-movie-user/'.$movie->id.'') }}" class="btn more mt2"> Read more</a>
                                    <div class="social-icon mt2">
                                        <span><i class="fa fa-thumbs-o-up"></i>14</span>
                                        <span><i class="fa fa-comment-o"></i>11</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endif
                </div>
            </div>
        </div>
        <div class="container mt4">
            <div class="row">
                <div class="col-sm-8 col-xs-12 pl0">
                    <div class="blog-container">
                        @foreach($movies as $movie)
                            <article class="blog-item">
                                <div class="col-sm-4 col-xs-12 ">
                                    <div class="post-image" data-bg-image="{{$movie->image}}"></div>
                                </div>
                                <div class="col-sm-8 ml-r-15">
                                    <div class="overlay bg-cover" data-bg-image="{{$movie->image}}"> </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="category">
                                                @foreach($movie->categories as $category)
                                                    <li value="{{$category->id}}"><a>{{ $category->name }}</a></li>
                                                @endforeach
                                            </ul>
                                            <div class="social-links">
                                                <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                                <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                                <a href="javascript:;"><i class="fa fa-user"></i></a>
                                            </div>
                                        </div>
                                        <h2 class="entry-title"><a href="javascript:;">{{$movie->movie_name}}</a></h2>
                                        <p class="entry-excepts">{{$movie->description}}</p>
                                        <a href="{{ url('/detail-movie-user') }}" class="btn more mt1"> Read more</a>
                                        <div class="social-icon mt1">
                                            <span><i class="fa fa-thumbs-o-up"></i>14</span>
                                            <span><i class="fa fa-comment-o"></i>11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="post-navigation mv3">
                        <ul>
                            <li>{{ $movies->links() }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 sidebar">

                    <div class="widget">
                        <h5 class="widget-title">Search</h5>
                        <form class="search_form">
                            <input type="text" name="2" placeholder="Search and hit Enter">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>


                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <a href="" >{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">twitter widget</h5>
                        <ul class="recent-posts">
                            <li>
                                <a href="javascript:;" class="rp-media">
                                    <img src="{{ asset("template/User/images/post-thumb.jpeg") }}" alt="image">
                                </a>
                                <div class="rp-info">
                                    <a href="javascript:;" class="link-post">Smashing Mag <i>@Smag 3m</i> </a>
                                    <p>One of the craziest food truck
                                        designs we’ve ever seen!
                                        <a href="javascript:;">http://on.be.net/1s5LE1e</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;" class="rp-media">
                                    <img src="{{ asset("template/User/images/post-thumb-2.jpeg") }}" alt="image">
                                </a>
                                <div class="rp-info">
                                    <a href="javascript:;" class="link-post">Smashing Mag <i>@Smag 3m</i> </a>
                                    <p>One of the craziest food truck
                                        designs we’ve ever seen!
                                        <a href="javascript:;">http://on.be.net/1s5LE1e</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;" class="rp-media">
                                    <img src="{{ asset("template/User/images/post-thumb.jpeg") }}" alt="image">
                                </a>
                                <div class="rp-info">
                                    <a href="javascript:;" class="link-post">Smashing Mag <i>@Smag 3m</i> </a>
                                    <p>One of the craziest food truck
                                        designs we’ve ever seen!
                                        <a href="javascript:;">http://on.be.net/1s5LE1e</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="widget">
                        <h5 class="widget-title"><span>Recent Posts</span></h5>
                        <ul class="recent-posts">
                            <li>
                                <a href="javascript:;" class="rp-media">
                                    <img src="{{ asset("template/User/images/post-thumb.jpeg") }}" alt="image">
                                </a>
                                <div class="rp-info">
                                    <a href="javascript:;" class="link-post">The movie star the professor and Mary Ann</a>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;" class="rp-media">
                                    <img src="{{ asset("template/User/images/post-thumb-2.jpeg") }}" alt="image">
                                </a>
                                <div class="rp-info">
                                    <a href="javascript:;" class="link-post">Adventure help you create more
                                        in your work
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div class="widget">
                        <h5 class="widget-title">Archive</h5>
                        <ul>
                            <li>
                                <a href="javascript:;">January 2016<span>4</span></a>

                            </li>
                            <li>
                                <a href="javascript:;">Febrary  2015<span>3</span></a>
                            </li>
                            <li>
                                <a href="javascript:;">March 2016 <span>2</span></a>
                            </li>
                            <li>
                                <a href="javascript:;">April 2015 <span>14</span></a>
                            </li>
                            <li>
                                <a href="javascript:;">May 2017<span>23</span></a>

                            </li>
                        </ul>
                    </div>

                </div>        </div>
        </div>
    </section>

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
    <script type="text/javascript" src="{{asset("template/User/js/google-maps.js")}}"></script>
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
