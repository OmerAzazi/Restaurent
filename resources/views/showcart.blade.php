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

        <div>
            <br><br><br><br><br>
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">TotalPrice</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $data)
                  <tr>
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->totalprice}}</td>
                    <td><a href="/removecart/{{$data->cart_id}}">Remove</td>
                  </tr>
                  @endforeach
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><a href="{{url('/check',Auth::user()->id)}}" class="badge badge-info" style="  padding: 10px 10px;">Checkout</a></td>
                  </tr>
                </tbody>

              </table>


        </div>




        <br>

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
