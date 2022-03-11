<!DOCTYPE html>
<html>

<head>
    <base href="/public">
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Mr. & Mrs. Bun.</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="css/templatemo-style.css" rel="stylesheet" />

</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->
<body>

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house-01.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Mr. & Mrs. Bun.</h1>

							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="{{url('/home')}}" class="tm-nav-link active">Home</a></li>

                                @if (Route::has('login'))
                                @auth
                                <li class="tm-nav-li"><a href="{{url('/showcart',Auth::user()->id)}}" class="tm-nav-link">Cart [{{$count}}]</a></li>
                                <li class="tm-nav-li" >
                                <x-app-layout>

                                </x-app-layout>
                                </li>
                                @else
                                <li class="tm-nav-li" ><a href="{{ route('login') }}" class="tm-nav-link">Log in</a></li>
                                @if (Route::has('register'))
                                <li class="tm-nav-li"> <a href="{{ route('register') }}" class="tm-nav-link">Register</a>
                                @endif
                                        @endauth

                                @endif
                                </li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to Mr. & Mrs. Bun.</h2>
				<p class="col-12 text-center">A Mr. & Mrs. Bun. is a business that prepares and serves food and drinks to customers. Meals are generally served and eaten on the premises. </p><br><br>
                @if (Route::has('login'))<br><br>
                @auth
                @else<br><br>
                <p class="col-12 text-center" style="color: red;font-size:12px">* To place your order you need to log in first</p>
                @endauth
                @endif

			</header>
<!-- food  -->

            <div class="tm-paging-links">
                <button type="button" class="btn" style=" background-color: #4CAF50;border: none;color: white;padding: 10px 10px;text-decoration: none;margin: 4px 2px;cursor: pointer;">Menu</button>
            </div>

            <!-- Gallery -->
            <div class="row tm-gallery">
                <!-- gallery page 1 -->
                <div id="tm-gallery-page-pizza" class="tm-gallery-page">

                    @foreach($data as $data)
                    <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                        <figure>
                            <form action="{{url('/addcart',$data->id)}}" method="post">
                                @csrf
                            <img src="{{ asset('foodimage/' . $data->image) }}" alt="Image" class="img-fluid tm-gallery-img"  />
                            <figcaption>
                                <h4 class="tm-gallery-title">{{$data->title}}</h4>
                                <p class="tm-gallery-description">{{$data->description}}</p>
                                <p class="tm-gallery-price">{{$data->price}}JD</p>
                                @if (Route::has('login'))
                                @auth
                                <input type="number" name="quantity" min="1" value="1" style="width:80px;">
                                <input type="hidden" name="price" value="{{$data->price}}">
                                <input type="submit" value="Add To Cart" class="tm-btn tm-btn-default tm-right">
                                @endauth
                                @endif
                            </figcaption>
                        </form>

                        </figure><br>
                    </article>
                    @endforeach

                </div> <!-- gallery page 1 -->
            </div>
<!-- end of food -->

            <hr><br>
			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure"><br><br>
                            <video width="500" autoplay muted loop>
                                <source src="/foodimage/movie.mp4" type="video/mp4">
                              </video>
						</figure>
					</div>
					<div class="col-md-6">
						<div class="tm-description-box">
							<h4 class="tm-gallery-title">About Us</h4>
							<p class="tm-mb-45">A Mr. & Mrs. Bun. is a business that prepares and serves food and drinks to customers. Meals are generally served and eaten on the premises. </p>
                            <h4 class="tm-gallery-title">Branch</h4>
                            <p class="tm-mb-45">Abdon</p>
                            <h4 class="tm-gallery-title">Opening & Closing</h4>
                            <p class="tm-mb-45">We open everyday from 11:00 AM to 10:00 PM</p>




						</div>
					</div>
				</div>
			</div>
		</main>

        <hr><br>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2022 Mr. & Mrs. Bun.

            </p>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();

				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>
</body>
</html>
