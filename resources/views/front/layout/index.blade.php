
<!DOCTYPE html>
<html lang="en">
<head>
	@include('front.home.head')
    <style>

.main-content-page{

margin-top: 100px;
}
.wrap-menu-desktop{
background-color: #222 !important ;

}

    </style>
</head>
<body class="animsition">


	<!-- Header -->



	@include('parts.navbar')

	@include('parts.cart')


<div class="main-content-page">
@yield('content')
</div>



	<!-- Product -->



	<!-- Footer -->
@include('parts.footer')

	<!-- Modal1 -->

@include('front.home.scripts')

</body>
</html>

