

  @extends('website.layouts.main')
@section('content')
	<!-- BANNER -->
	<div class="section banner-page" data-background="images/banner-single.jpg">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">Events</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Events</li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>

    <!-- OUR EVENTS -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">				

				<div class="row">
					
						<div class="row">
								@foreach($events as $n)
								<!-- Item 1 -->
								<div class="col-sm-12 col-md-6 col-lg-4 mb-5">
									<div class="rs-news-1">
										<div class="media-box">
											<a><img src="{{$n->image_path}}" alt="" class="img-fluid"></a>
										</div>
										 
										<div class="body-box">
											<div class="title">
												<a href="page-news-single.html">{{$n->news_heading}}</a></div>
											<div class="meta-date"> </div>
											<p>{!!$n->news_description !!}</p>
										</div>
									</div>
								</div>
			 @endforeach
			
							</div>

				 

				</div>

			</div>
		</div>
	</div>

	<!-- CTA -->
	<div class="section bg-tertiary">
		<div class="content-wrap py-5">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-12 col-md-12">
						<div class="cta-1">
			              	<div class="body-text mb-3">
			                	<h3 class="my-1 text-secondary">Let's join the best kindergarten now!</h3>
			                	<p class="uk18 mb-0 text-white">We provide high standar clean website for your business solutions</p>
			              	</div>
			              	<div class="body-action">
			                	<a href="contact.html" class="btn btn-primary mt-3">CONTACT US</a>
			              	</div>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>

@section('script')
@parent


@endsection
@stop