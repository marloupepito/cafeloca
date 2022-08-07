<template lang="">
    <div>
        <div id="top-nav" class="top-nav">
			<!-- BEGIN container -->
			<div class="container">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown dropdown-hover">
							<a to="#" data-bs-toggle="dropdown"><img src="assets/img/flag/flag-english.png" class="flag-img" alt="" /> English <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><router-link to="#" class="dropdown-item"><img src="assets/img/flag/flag-english.png" class="flag-img" alt="" /> English</router-link></li>
								<li><router-link to="#" class="dropdown-item"><img src="assets/img/flag/flag-german.png" class="flag-img" alt="" /> German</router-link></li>
								<li><router-link to="#" class="dropdown-item"><img src="assets/img/flag/flag-spanish.png" class="flag-img" alt="" /> Spanish</router-link></li>
								<li><router-link to="#" class="dropdown-item"><img src="assets/img/flag/flag-french.png" class="flag-img" alt="" /> French</router-link></li>
								<li><router-link to="#" class="dropdown-item"><img src="assets/img/flag/flag-chinese.png" class="flag-img" alt="" /> Chinese</router-link></li>
							</ul>
						</li>
						<li><router-link to="#">Customer Care</router-link></li>
						<li><router-link to="#">Order Tracker</router-link></li>
					</ul>
					<ul class="nav navbar-nav navbar-end">
						<li><router-link to="#">Career</router-link></li>
						<li><router-link to="#">Our Forum</router-link></li>
						<li><router-link to="#">Newsletter</router-link></li>
						<li><router-link to="#"><i class="fab fa-facebook-f f-s-14"></i></router-link></li>
						<li><router-link to="#"><i class="fab fa-twitter f-s-14"></i></router-link></li>
						<li><router-link to="#"><i class="fab fa-instagram f-s-14"></i></router-link></li>
						<li><router-link to="#"><i class="fab fa-dribbble f-s-14"></i></router-link></li>
						<li><router-link to="#"><i class="fab fa-google f-s-14"></i></router-link></li>
						<li class="text-white mt-2">|</li>
						<li><a @click="logout">LOGOUT</a></li>
					</ul>
				</div>
			</div>
			<!-- END container -->
		</div>
		<!-- END #top-nav -->
		<!-- BEGIN #header -->
		<div id="header" class="header">
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN header-container -->
				<div class="header-container">
					<!-- BEGIN navbar-toggle -->
					<button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- END navbar-toggle -->
					<!-- BEGIN header-logo -->
					<div class="header-logo">
						<a @click="home()">
							<span class="brand-logo"></span>
							<span class="brand-text">
								<span>Cafe</span>Location
								<small>San Carlos City Negros Occidental</small>
							</span>
						</a>
					</div>
					<!-- END header-logo -->
					<!-- BEGIN header-nav -->
					<div class="header-nav">
						<div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav justify-content-center">
								<li class="active"><router-link to="/">Home</router-link></li>
								<li class="dropdown dropdown-full-width dropdown-hover">
									<a to="#" data-bs-toggle="dropdown">
										Our Store 
										<b class="caret"></b>
										<span class="arrow top"></span>
									</a>
									<!-- BEGIN dropdown-menu -->
									<div class="dropdown-menu p-0">
										<!-- BEGIN dropdown-menu-container -->
										<div class="dropdown-menu-container">
											<!-- BEGIN dropdown-menu-sidebar -->
											<div class="dropdown-menu-sidebar">
												<h4 class="title">Shop By Categories</h4>
												<ul class="dropdown-menu-list">
													<li><router-link to="/product">Mobile Phone</router-link></li>
													<li><router-link to="/product">Tablet</router-link></li>
													<li><router-link to="/product">Laptop</router-link></li>
													<li><router-link to="/product">Desktop</router-link></li>
													<li><router-link to="/product">TV</router-link></li>
													<li><router-link to="/product">Speaker</router-link></li>
													<li><router-link to="/product">Gadget</router-link></li>
												</ul>
											</div>
											<!-- END dropdown-menu-sidebar -->
											<!-- BEGIN dropdown-menu-content -->
											<div class="dropdown-menu-content">
												<h4 class="title">Shop By Popular Phone</h4>
												<div class="row">
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 7</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 6s</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 6</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 5s</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 5</router-link></li>
														</ul>
													</div>
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy S7</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy A9</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy J3</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy Note 5</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy S7</router-link></li>
														</ul>
													</div>
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 730</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 735</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 830</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 820</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia Icon</router-link></li>
														</ul>
													</div>
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia X</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia Z5</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia M5</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia C5</router-link></li>
															<li><router-link to="/product"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia C4</router-link></li>
														</ul>
													</div>
												</div>
												<h4 class="title">Shop By Brand</h4>
												<ul class="dropdown-brand-list mb-0">
													<li><router-link to="/product"><img src="assets/img/brand/brand-apple.png" alt="" /></router-link></li>
													<li><router-link to="/product"><img src="assets/img/brand/brand-samsung.png" alt="" /></router-link></li>
													<li><router-link to="/product"><img src="assets/img/brand/brand-htc.png" alt="" /></router-link></li>
													<li><router-link to="/product"><img src="assets/img/brand/brand-microsoft.png" alt="" /></router-link></li>
													<li><router-link to="/product"><img src="assets/img/brand/brand-nokia.png" alt="" /></router-link></li>
													<li><router-link to="/product"><img src="assets/img/brand/brand-blackberry.png" alt="" /></router-link></li>
													<li><router-link to="/product"><img src="assets/img/brand/brand-sony.png" alt="" /></router-link></li>
												</ul>
											</div>
											<!-- END dropdown-menu-content -->
										</div>
										<!-- END dropdown-menu-container -->
									</div>
									<!-- END dropdown-menu -->
								</li>
								<li class="dropdown dropdown-hover">
									<a to="#" data-bs-toggle="dropdown">
										Accessories 
										<b class="caret"></b>
										<span class="arrow top"></span>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" to="/product">Mobile Phone</a>
										<a class="dropdown-item" to="/product">Tablet</a>
										<a class="dropdown-item" to="/product">TV</a>
										<a class="dropdown-item" to="/product">Desktop</a>
										<a class="dropdown-item" to="/product">Laptop</a>
										<a class="dropdown-item" to="/product">Speaker</a>
										<a class="dropdown-item" to="/product">Gadget</a>
									</div>
								</li>
								<li><router-link to="/product">New Arrival</router-link></li>
								<li class="dropdown dropdown-hover">
									<a to="#" data-bs-toggle="dropdown">
										Pages
										<b class="caret"></b>
										<span class="arrow top"></span>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" to="index.html">Home (Default)</a>
										<a class="dropdown-item" to="index_fixed_header.html">Home (Fixed Header)</a>
										<a class="dropdown-item" to="index_inverse_header.html">Home (Inverse Header)</a>
										<a class="dropdown-item" to="search_results.html">Search Results</a>
										<a class="dropdown-item" to="/product">Product Page</a>
										<a class="dropdown-item" to="/product">Product Details Page</a>
										<a class="dropdown-item" to="checkout_cart.html">Checkout Cart</a>
										<a class="dropdown-item" to="checkout_info.html">Checkout Shipping</a>
										<a class="dropdown-item" to="checkout_payment.html">Checkout Payment</a>
										<a class="dropdown-item" to="checkout_complete.html">Checkout Complete</a>
										<a class="dropdown-item" to="my_account.html">My Account</a>
										<a class="dropdown-item" to="contact_us.html">Contact Us</a>
										<a class="dropdown-item" to="about_us.html">About Us</a>
										<a class="dropdown-item" to="faq.html">FAQ</a>
										
									</div>
								</li>
								
							</ul>
						</div>
					</div>
					<!-- END header-nav -->
					<!-- BEGIN header-nav -->
					<div class="header-nav">
						<ul class="nav justify-content-end">
						
							<li class="dropdown dropdown-hover">
									<a to="#" data-bs-toggle="dropdown" style="float: right !important;width:100% !important">
										<i class="fa fa-search search-btn"></i>
										<span class="arrow top"></span>
									</a>
									<div class="dropdown-menu p-15px">
										<form action="search_results.html" method="POST" name="search_form">
											<div class="input-group">
												<input type="text" placeholder="Search" class="form-control bg-light" />
												<button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
											</div>
										</form>
									</div>
								</li>
								
						</ul>
					</div>
					<!-- END header-nav -->
				</div>
				<!-- END header-container -->
			</div>
			<!-- END container -->
		</div>
		
    </div>
</template>
<script>
export default {
    methods: {
		logout(){
			axios.post('/logout')
			.then(res=>{
				window.location='/login'
			})
		},
		home(){
			window.location='/'
		}
	},
}
</script>
<style lang="">
    
</style>