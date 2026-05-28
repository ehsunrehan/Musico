<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Musico - Music For Everyone</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('website/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css')}}">
  </head>
  <body>





  	<div class="container-fluid px-md-5  pt-4 pt-md-5">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<a class="navbar-brand" href="{{ url('/') }}"> <span>Musico</span> <small>Musics For everyone</small></a>
						</div>
						
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    		</p>
	        </div>
				</div>
			</div>
		</div>






    



		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav m-auto">
    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="{{ route('music.all') }}" class="nav-link">Music</a></li>
    <li class="nav-item"><a href="{{ route('video.all') }}" class="nav-link">Videos</a></li>
    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
    <li class="nav-item"><a href="{{ route('all.reviews') }}" class="nav-link">Reviews</a></li>

@auth
    <li class="nav-item"><a href="{{ route('bookmarks') }}" class="nav-link"><i class="fa fa-bookmark"></i> Bookmarks</a></li>
    <li class="nav-item">
        <span class="nav-link" style="color: #ff6a00; display: inline-flex; align-items: center; gap: 8px; font-size: 1.1rem;">
          <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
          </span>
    </li>
    <li class="nav-item" style="display: flex; align-items: center;">
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button class="btn btn-sm" style="color: #ff6a00; background: transparent; border: 1px solid #ff6a00; border-radius: 20px; padding: 2px 12px; margin-top: 2px;">Logout</button>
        </form>
    </li>
@else

    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
@endauth
</ul>
	      </div>
	    </div>
	  </nav>








    @yield('content')









    <footer class="ftco-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo"><a href="#">Connect</a></h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-2">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Extra Links</h2>
              <ul class="list-unstyled">
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Affiliate Program</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Business Services</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Education Services</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Gift Cards</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Legal</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('register') }}"><span class="fa fa-chevron-right mr-2"></span>Join us</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Privacy &amp; Policy</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Company</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('about') }}"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                <li><a href="{{ route('contact') }}"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                <li><a href="{{ url('/') }}"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map marker"></span><span class="text">APWA Complex, 1st Floor, Agha Khan 3 Rd, Garden East Saddar Town, Karachi, 74400, Pakistan</span></li>
	                <li><a href="tel:+923313689607"><span class="icon fa fa-phone"></span><span class="text">+92 331-3689607</span></a></li>
	                <li><a href="mailto:ehsunredmi@gmail.com"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">ehsunredmi@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-0 py-5 bg-black">
      	<div class="container">
      		
      	</div>
      </div>
    </footer>
    
    <script src="{{asset('website/js/jquery.min.js')}}"></script>
    <script src="{{asset('website/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('website/js/popper.min.js')}}"></script>
    <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('website/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('website/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('website/js/google-map.js')}}"></script>
    <script src="{{asset('website/js/main.js')}}"></script>
  </body>
</html>