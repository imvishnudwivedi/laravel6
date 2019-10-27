
  @extends('website.layouts.main')
@section('content')

	<!-- BANNER -->
    <div id="oc-fullslider" class="banner">
    
	    <div class="custom-nav owl-nav"></div>
    </div>	

    <!-- SHORTCUT -->
	<div class="section services">
		<div class="content-wrap pb-3">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="row col-0 overlap no-gutters">
							<div class="col-sm-12 col-md-4 col-lg-4">
								<!-- BOX 1 -->
								<div class="rs-feature-box-1 bg-primary">
									<i class="fa fa-clock-o"></i>
									<div class="body">
										<h4>Mission</h4>
										<p>Our Mission is to provide world class early childhood education and care using innovation and technology while maintaining ethics, ISO standards a high level of professionalism in all aspects of our operations.</p>
										<div class="spacer-10"></div>
										<!-- <a href="#" class="btn">LEARN MORE</a> -->
									</div>
					            </div>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4">
								<!-- BOX 2 -->
								<div class="rs-feature-box-1 bg-secondary">
									<i class="fa fa-home"></i>
									<div class="body">
										<h4>Vision</h4>
										<p>Our vision is to be the world leader in preschooling to support families by being their trusted parenting partner child care, counseling & training.</p>
										<div class="spacer-10"></div>
										<!-- <a href="#" class="btn">LEARN MORE</a> -->
									</div>
					            </div>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4">
								<!-- BOX 3 -->
								<div class="rs-feature-box-1 bg-tertiary">
									<i class="fa fa-trophy"></i>
									<div class="body">
										<h4>Specialities</h4>
										<p>All our classes have CCTV camera's.</p>
										<div class="spacer-10"></div>
										<!-- <a href="#" class="btn">LEARN MORE</a> -->
									</div>
					            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<!-- WELCOME TO KIDS -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-6">
						<img src="{{asset("/website/images/welcome.jpg")}}" alt="" class="img-fluid img-border mb-3">
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6">
						<h2 class="section-heading">
							Welcome to Vidyaaarambha
						</h2>
						<p>World Class Facilities because for your child. Nothing but the best. The facilities at vidya-aarambha are designed to provide a safe stimulating and fun learning environmentfor your child.</p>

<p class="p-check " style="font-size:14px;line-height:18px;">Our center is equipped with learning spaces that have.</p><br>

<p class="p-check " style="font-size:14px;line-height:18px;">Temperature controlled indoor environmens. </p><br>

<p class="p-check " style="font-size:14px;line-height:18px;">Secure access system and real time cctv access.</p><br>

<p class="p-check " style="font-size:14px;line-height:18px;">Trained Nursing staff.</p>
						<div class="spacer-10"></div>
						<!-- <a href="#" class="btn btn-secondary">DISCOVER MORE</a> -->
						<div class="spacer-30"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FUNFACT -->
	<div class="section bgi-overlay bgi-cover-center" data-background="{{asset("/website/images/middlebcbanner.jpg")}}">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<!-- Item 1 -->
					<div class="col-sm-6 col-md-3">
						<div class="rs-funfact bg-primary">
						<!-- 	<div class="box-fun"><h2>852</h2></div>
							<div class="title">Students</div>	 --><br><br><br>
						</div>
					</div>
					<!-- Item 2 -->
					<div class="col-sm-6 col-md-3">
						<div class="rs-funfact bg-secondary">
							<!-- <div class="box-fun"><h2>125</h2></div>
							<div class="title">Teachers</div>	 --><br><br><br>
						</div>
					</div>
					<!-- Item 3 -->
					<div class="col-sm-6 col-md-3">
						<div class="rs-funfact bg-tertiary">
							<!-- <div class="box-fun"><h2>32</h2></div>
							<div class="title">Class Rooms</div>	 --><br><br><br>
						</div>
					</div>
					<!-- Item 4 -->
					<div class="col-sm-6 col-md-3">
						<div class="rs-funfact bg-quaternary">
							<!-- <div class="box-fun"><h2>15</h2></div>
							<div class="title">Bus Schools</div> -->	<br><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- POPULAR CLASSES -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<!-- <p class="supheading text-center">Our Programs</p> -->
						<h2 class="section-heading text-center mb-5">
							Our Programs
						</h2>
					</div>
				</div>

				<div class="row mt-4">
					
					<!-- Item 1 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class1.png")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Infant<font color="#79421B"> (Cuddles)</font></div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>As children reach school age, our comprehensive kindergarten program helps them explore, communicate and create - all in a nurturing, small-class setting. Curriculum includes reading, language arts, math, science, and life skills presented in a fun way to encourage a lifelong love of learning.</p>
								<div class="detail">
									<div class="age col">6mths to 1yr</div>
									
								</div>
							</div>
						</div>
					</div>

					<!-- Item 2 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class2.jpg")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Toddler<font color="#79421B"> (Giggles)</font></div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>Giggles are experiencers. Their routine is based on the fact that toddlers learn best through direct hands-on experiences with people, objects, events and ideas.</p>
								<div class="detail">
									<div class="age col">15 to 21mths</div>
									
								</div>
							</div>
						</div>
					</div>

					<!-- Item 3 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class3.png")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Playgroup<font color="#79421B"> (Twinkles)</font></div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>Twinkles are explorers. Their interactions with trusted adults provide the emotional fuel these children need to puzzle out the mysteries of the social and physical world. They wonder, explore, communicate, observe, listen and learn in their own way and at their own pace. Regular newsletters to parents detail each theme, rhyme and activity. </p>
								<div class="detail">
									<div class="age col">1yr 10mths onwards</div>
									
								</div>
							</div>
						</div>
					</div>



<!-- Item 4 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class3.png")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Nursery<font color="#79421B"> (Sparkles)</font></div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>Sparkles are active learners. Teachers and children become active partners in the learning process. Learning activities in four main content areas: 1. language, literacy & communication; 2. social and emotional development; 3. physical development, health, and well-being; and 4. arts and sciences. Phonics and writing is introduced. Regular newsletters to parents detail each theme, rhyme and activity. Each child is assessed in all areas of development - language, intellectual, motor - gross and fine, art and music, social and emotional and life skills - each term.</p>
								<div class="detail">
									<div class="age col">2yrs 10mths onwards</div>
									
								</div>
							</div>
						</div>
					</div>






<!-- Item 5 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class2.jpg")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Junior Kindergarten</div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>Kindergarten is an exciting time of exploration for your child. As the child's motor coordination increases, so too will his/her sense of independence, self-reliance, and self-confidence. As the year progresses, the child will be expected to complete assignments with less outside help, accept more responsibilities, and follow rules more closely.</p>
								<div class="detail">
									<div class="age col">3yrs 10mths to 4yrs</div>
									
								</div>
							</div>
						</div>
					</div>




<!-- Item 6 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class1.png")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Senior Kindergarten</div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>As children reach school age, our comprehensive kindergarten program helps them explore, communicate and create - all in a nurturing, small-class setting. Curriculum includes reading, language arts, math, science, and life skills presented in a fun way to encourage a lifelong love of learning.</p>
								<div class="detail">
									<div class="age col">3yrs 10mths to 6yrs</div>
									
								</div>
							</div>
						</div>
					</div>




<!-- Item 7 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class1.png")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">After School Childcare</div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
								<div class="detail">
									<div class="age col">All Age Group</div>
									
								</div>
							</div>
						</div>
					</div>






<!-- Item 8 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class2.jpg")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Evening and Weekend</div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
								<div class="detail">
									<div class="age col">All Age Group</div>
									
								</div>
							</div>
						</div>
					</div>





<!-- Item 9 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-class-box mb-5">
							<div class="media-box">
								<img src="{{asset("/website/images/class3.png")}}" alt="" class="img-fluid">
							</div>
							<div class="body-box">
								<div class="class-name">
									<div class="title">Summer Camps</div>
									<!-- <div class="price">$20</div> -->
								</div>
								<!-- <div class="open-class">Open Class : <span>08:00 am - 10:00 am</span></div> -->
								<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
								<div class="detail">
									<div class="age col">All Age Group</div>
									
								</div>
							</div>
						</div>
					</div>











				</div>

		<!-- 		<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="text-center">
							<a href="#" class="btn btn-primary">SEE MORE CLASSES</a>
						</div>
					</div>
				</div> -->

			</div>
		</div>
	</div>

	<!-- WHY CHOOSE US -->
	<div class="section bgi-repeat" data-background="{{asset("/website/images/school2.jpg")}}">
		<div class="content-wrap pb-0">
			<div class="container">
				<div class="row align-items-end">
					<div class="col-sm-12 col-md-12 col-lg-7">
						<p class="supheading">Why the Trust</p>
						<h2 class="section-heading">
							World Class High Quality
						</h2>
						<p class="p-check text-white">Non-Franchise model to ensure the quality of  childcare service is high.</p>
						<br>
						<p class="p-check text-white">Process complaint Highly Complain and process oriented child care service.</p>
						<p class="p-check text-white">Tranceparency:Our school is very highly dedicated young  & visionary.</p>
						
						<div class="spacer-content"></div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-5">
						<img src="{{asset("/website/images/singleimg1.png")}}" alt="" class="img-fluid">
					</div>
				</div>
				
			</div>
		</div>
	</div>

	 

	<!-- OUR EVENTS -->
	<div class="section bgi-cover-center" data-background="{{asset("/website/images/event-bg.png")}}">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<p class="supheading text-center">Our Events</p>
						<h2 class="section-heading text-center mb-5">
							Don't miss our event
						</h2>
					</div>
				</div>

				<div class="row mt-4">
					
						

				</div>

			</div>
		</div>
	</div>



	<!-- CTA -->
	




@section('script')
@parent


@endsection
@stop