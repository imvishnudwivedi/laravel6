
  @extends('website.layouts.main')
@section('content')
	<!-- BANNER -->
	<div class="section banner-page" data-background="{{asset("/website/images/banner2.jpg")}}">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">Faqs</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="/">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Faqs</li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>

    <!-- FAQS -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					
					<div class="col-12 col-sm-12 col-md-12">
						
					<!-- 	<p class="text-black lead">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat.</p>
 -->
						<div class="spacer-30"></div>
						
						<div class="row">
							
							<div class="col-sm-12 col-md-12">
								<h2 class="section-heading text-primary no-after mb-4">
									FAQ
								</h2>

								<div class="accordion rs-accordion" id="accordionExample">
								   <!-- Item 1 -->
								   <div class="card">
								      <div class="card-header" id="headingOne">
								         <h3 class="title">
								            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								            How is Vidyarambh an "International" preschool?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								         <div class="card-body">
								            We are confidently categorised as international based on the following facts:
								            <p>1.International Curriculam based on the of Multiple Intelligences.<br>
								            2.International Standards:ISO cirtified operational standardsacross all that we do.<br>
								        3.International Infrastructure: Large, spacious classrooms, colorful, abundant and safe.</p>
								          
								         </div>
								      </div>
								   </div>
								   <!-- Item 2 -->
								   <div class="card">
								      <div class="card-header" id="headingTwo">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								            How do you maintain communication with parents?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								         <div class="card-body">
								            We maintain three levels of communication with our parents.
								            <p>Daily- Open Communication with us.<br>
								            Monthly- Newsletters.<br>
								            Quarterly- Parent Teacher Meet Apart from this, our center Heads are very approachable by phone or in person during working hours.
</p>
								         </div>
								      </div>
								   </div>
								   <!-- Item 3 -->
								   <div class="card">
								      <div class="card-header" id="headingThree">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								           Do you accept special children?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								         <div class="card-body">
								            <p>We are an inclusive preschool and do accept special children as long as they are allowed medically by their therapist to attend normal school and as long as they do not pose a risk to other children.</p>
								         </div>
								      </div>
								   </div>
								   <!-- Item 4 -->
								   <div class="card">
								      <div class="card-header" id="headingFour">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								           How do you choose your teachers?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								         <div class="card-body">
								            <p>From a large datatbase of resumes that we receive, candidates undergo a  3 step 	recruitment  process before they are offered a position at any of our centers. Teachers must be qualified; but more importantly they must be both patient and amicable.</p>
								         </div>
								      </div>
								   </div>





	   <!-- Item 5 -->
								   <div class="card">
								      <div class="card-header" id="headingFive">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								          How are assessments conducted?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
								         <div class="card-body">
								            <p>On a quaterly basis,all children are assessed on a grid that spans all intelligences. This grid is shared with the parents at PTM.
<br>
								            The year-end assessment also  includes an MI assessment chart that helps prents and teachers understand the child's intelligences at a glance.</p>
								         </div>
								      </div>
								   </div>








  <!-- Item 6 -->
								   <div class="card">
								      <div class="card-header" id="headingSix">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
								           How do i register my child in your school?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
								         <div class="card-body">
								            <p>The procedure is simple. Visit the center that is most convenient to you and submit the application from duly filled along with the required documents. The start date and induction plan for your child can be discussed with the center Head.</p>
								         </div>
								      </div>
								   </div>












  <!-- Item 7 -->
								   <div class="card">
								      <div class="card-header" id="headingSeven">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
								            What is the ratio of adults to children?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
								         <div class="card-body">
								            <p>The ratio vary from 	1:1 to 1:12 depending  on the age group of children.</p>
								         </div>
								      </div>
								   </div>










  <!-- Item 8 -->
								   <div class="card">
								      <div class="card-header" id="headingEight">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
								            Are the children prepared for formal school?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
								         <div class="card-body">
								            <p>Our curriculam is comprehensive. It covers aspects from CBSE/ICSE/IGCSE/IB boards no that children are equipped to join any formal school after completng senior KG at Vidyarambh. Also, all graduating children are formally prepared for the addmission interview.</p>
								         </div>
								      </div>
								   </div>













<!-- Item 9 -->
								   <div class="card">
								      <div class="card-header" id="headingNine">
								         <h3 class="title">
								            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
								            Can I watch my child while she is in school?
								            </button>
								         </h3>
								      </div>
								      <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
								         <div class="card-body">
								            <p>We have cameras installed in our centers. These cameras broadcastlive on the internet, and as a new parent,you may log in to watch your child.This facility is free of cost.</p>
								         </div>
								      </div>
								   </div>




































								</div>
								<!-- end accordion -->

							<!-- 	<p class="uk21 mt-5 text-black"><a href="contact.html">Can't find your answer?. Contact us now!</a></p> -->

							</div>
							

						</div>
					
					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- CTA -->
	

@section('script')
@parent


@endsection
@stop