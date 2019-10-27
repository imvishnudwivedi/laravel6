
  @extends('website.layouts.main')
	@section('content')
	
		<!-- BANNER -->
		<div class="section banner-page" data-background="{{asset("/website/images/banner2.jpg")}}">
			<div class="content-wrap pos-relative">
				<div class="d-flex justify-content-center bd-highlight mb-3">
					<div class="title-page">Admission Form</div>
				</div>
				<div class="d-flex justify-content-center bd-highlight mb-3">
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb ">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Admission Form</li>
						</ol>
					</nav>
					</div>
			</div>
		</div>
	
		 <!-- CONTENT -->
		<div id="class" class="">
			<div class="content-wrap">
				<div class="container">
	
					<div class="row">
						
						<div class="col-sm-12 col-md-12 col-lg-9">
							
							<div class="single-news">
								<div class="media">
									<img src="{{asset("/website/images/form-001.jpg")}}" alt="" class="rounded img-fluid">
								</div>
								<div class="media">
										<img src="{{asset("/website/images/form-002.jpg")}}" alt="" class="rounded img-fluid">
									</div>
	 
	
							
	
	 
	  					</div>
						 
	
						</div>		
	
						<div class="col-sm-12 col-md-12 col-lg-3">
	
							<div class="widget categories">
								<ul class="category-nav">
									<li class="active"><a href="/admission_form">Admission Form</a></li>
								
									<li><a href="/checklist">Checklist</a></li>
									<li><a href="/faq">FAQ</a></li>
							
								</ul>
							</div>
	
				 
						</div>
						<!-- end sidebar -->			
	
					</div>
	
				</div>
			</div>
		</div>
	
		<!-- CTA -->
		
	
		
	@section('script')
	@parent
	
	
	@endsection
	@stop