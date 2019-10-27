
  @extends('website.layouts.main')
@section('content')
	<!-- BANNER -->
	<div class="section banner-page" data-background="{{asset("/website/images/banner2.jpg")}}">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">Gallery</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="/">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>

   <!-- OUR GALLERY -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<p class="supheading text-center">Our Gallery</p>
						<h2 class="section-heading text-center mb-5">
							Moment from kids
						</h2>
					</div>
				</div>
				
				<div class="row popup-gallery gutter-5">
					@foreach($gallery as $photo)
					<!-- Item 1 -->
					<div class="col-xs-12 col-md-6 col-lg-4">
						<div class="box-gallery">
							<a href="/{{$photo->gallery_display_attachment}}" title="{{$photo->gallery_name}}">
								<img src="/{{$photo->gallery_display_attachment}}" alt="" class="img-fluid">
								<div class="project-info">
									<div class="project-icon">
										<span class="fa fa-search"></span>
									</div>
								</div>
							</a>
						</div>
					</div>
					@endforeach
				 





 



				</div>
				
			</div>
		</div>
	</div>

	<!-- CTA -->
	

	
@section('script')
@parent


@endsection
@stop