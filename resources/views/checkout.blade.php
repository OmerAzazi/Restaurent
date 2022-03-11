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
    <script src="index.js">   </script>
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
        <br><br><br><br>


        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-3 bg-white rounded">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="text-uppercase" style="font-weight: bold;font-size: 50px;">Invoice</h1>
                                <div class="billed"><span class="font-weight-bold text-uppercase">Billed:</span><span class="ml-1">Mr. & Mrs. Bun.</span></div>
                                <div class="billed"><span class="font-weight-bold text-uppercase">Date:</span><span id="time"> </span></div>
                                <div class="billed"><span class="font-weight-bold text-uppercase">Pickup From:</span><span class="ml-1">Abdon</span></div>
                            </div>

                        </div>


                        <div class="mt-3">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="{{url('/orderplace',Auth::user()->id)}}" method="post">
                                            @csrf

                                        @foreach($data as $data)
                                        <tr>
                                            <td><input type="text" name="foodname" value="{{$data->title}}" hidden="">{{$data->title}}</td>
                                            <td><input type="text" name="quantity" value="{{$data->quantity}}" hidden="">{{$data->quantity}}</td>
                                            <td>{{$data->price}}</td>
                                            <td>{{$data->totalprice}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td><input type="text" name="price" value="{{$total}}" hidden="">{{$total}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input class="btn" type="submit" value="Order Confirm"></td>

                                        </tr>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
       `use strict`;
    function refreshTime() {
    const timeDisplay = document.getElementById("time");
    const dateString = new Date().toLocaleString();
    const formattedString = dateString.replace(", ", " - ");
     timeDisplay.textContent = formattedString;
  }
  setInterval(refreshTime, 1000);
  </script>

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
