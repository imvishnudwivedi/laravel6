

  @extends('website.layouts.main')
@section('content')


	<!-- BANNER -->
	<div class="section banner-page" data-background="{{asset("/website/images/banner2.jpg")}}">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">Contact</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Contact</li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>

    <!-- CONTACT -->
	<div id="contact">
		<div class="content-wrap pb-0">
			<div class="container bgi-right bgi-hide-xs" data-background="images/request.jpg">
				<div class="row">
					<div class="col-12 col-md-12">
						<div class="cf-msg"></div>
						<form action="#" class="	" id="contactForm" data-toggle="validator" novalidate="true">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="p_name" placeholder="Enter Name" required="">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="email" class="form-control" id="p_email" placeholder="Enter Email" required="">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="p_subject" placeholder="Subject">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="p_phone" placeholder="Enter Phone Number">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								 <textarea id="p_message" class="form-control" rows="6" placeholder="Enter Your Message"></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<div id="success"></div>
								<button type="button" id="submit" class="btn btn-primary">Send Message</button>
							</div>
						</form>
						<div class="spacer-content"></div>

					</div>
					
				</div>
			</div>
		</div>
	</div>

	<!-- MAPS -->
	<div class="maps-wraper">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.948842444013!2d77.53070691482208!3d12.97512389085357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3ddc0eb794ff%3A0x32d3079e1b7878fe!2sVidya-Aarambha!5e0!3m2!1sen!2sin!4v1558008093202!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

			</div>

	<!-- CTA -->
	

@section('script')
@parent


@endsection
@stop
	