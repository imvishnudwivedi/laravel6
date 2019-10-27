@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Home Slider')

@section('page_title', 'Home Slider ')


@section('page_title_sub', 'Manage Home Slider')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Home Slider here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">

         {!!Form::model($home_slider,array('route' => array('vidyaaarambha.masters.home_slider.update', $home_slider->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$home_slider->id)!!}

        <input type="hidden" id="public_path" name="public_path" value="{{public_path()}}">
        <input type="hidden" id="temp_file_path" name="temp_file_path">


<div class="col-md-4">
  <div class="form-group @if($errors->first('heading')) has-error @endif">
   {!!Form::label('heading','Heading *')!!}
   {!!Form::text('heading',Input::old('heading'),['class' => 'form-control required','id'=>'heading',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item heading","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('heading') }}</small>
 </div>
</div>


<div class="col-md-4">
  <div class="form-group @if($errors->first('sub_heading')) has-error @endif">
   {!!Form::label('sub_heading','Sub Heading')!!}
   {!!Form::text('sub_heading',Input::old('sub_heading'),['class' => 'form-control required','id'=>'sub_heading',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item sub_heading","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('sub_heading') }}</small>
 </div>
</div>






<div class="col-md-4">
  <div class="form-group @if($errors->first('description')) has-error @endif">
   {!!Form::label('description','Remarks')!!}
   {!!Form::textarea('description',Input::old('description'),['class' => 'form-control','id'=>'description',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Description","data-placement"=>"bottom",'rows'=>'3'])!!}
   <small class="text-danger">{{ $errors->first('description') }}</small>
 </div>
</div>





 
<div class="clearfix"></div>


 
<div class="clearfix"></div>

<!-- Attach Image field -->
<div class="col-md-4" id="attachment_div">
  {!! Form::label('Attach Image') !!}
  <input type="file" class="form-control" id="file_name" name="file_name">
</div>



<div class="col-md-2" style="margin-top:25px;">
  {!! Form::button('Upload Image', ['class' => 'btn btn-block btn-success btn-block', 'id' => 'upload_btn']) !!}
</div>
<div class="clearfix"></div>

<div class="col-md-12" style="margin-top: 10px;">
         <div class="col-md-8" id="details_div">
           @if($home_slider->attachment)
           <?php $attachment_path=getSliderUploadedPath($home_slider->attachment) ?>
           <img src="{{$attachment_path}}" id="disp_round_attachment" height="500px" width="500px" >
           @endif
         </div>
       </div>


<div class="clearfix"></div>
<div class="col-md-4" id="attachment_div2">
  {!! Form::label('Attach Image') !!}
  <input type="file" class="form-control" id="file_name2" name="file_name2">
</div>



<div class="col-md-2" style="margin-top:25px;">
  {!! Form::button('Upload Image', ['class' => 'btn btn-block btn-success btn-block', 'id' => 'upload_btn2']) !!}
</div>
<div class="clearfix"></div>

<div class="col-md-12" style="margin-top: 10px;">
         <div class="col-md-8" id="details_div2">
           @if($home_slider->img_attachment)
           <?php $attachment_path=getSliderUploadedPath($home_slider->img_attachment) ?>
           <img src="{{$attachment_path}}" id="disp_round_attachment2" height="500px" width="500px" >
           @endif
         </div>
       </div>




       <div class="clearfix"></div>

<div class="clearfix"></div>
</div>

<div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.home_slider.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>
<div class="col-md-2 pull-right">
  <div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-block btn-success btn-block']) !!}
  </div>
</div>
          
          <div class="clearfix"></div>
          {!!Form::close()!!}
        </div>
        
      </div><!-- /.box -->
    </div><!-- /.col -->

  </div>
</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">






 $(function(){


 $('[data-toggle="popover"]').popover(); 

})



   //image upload



   //image upload
   $('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#edit-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.home_slider.uploadSliderImage")}}',

    data: formData,
    contentType: false,
    processData: false
  }).done(function(result) {
        console.log(result);
        if(result){

          console.log($('#public_path').val());
          var public_path=$('#public_path').val();
          
          var path=public_path+result['path'];
          console.log("path");
          console.log(path);
          $('#temp_file_path').val(path);
          $('#disp_round_attachment').attr('src',result['path']);

           $('#details_div').show();
         }else{
          $.notify(" Please Choose file.",{
            type:'danger',
          });
          return false;
        }
      })
  .fail(function() {
    alert("fail");
  });

});


   //image upload
   $('#upload_btn2').click(function(){
console.log(11111111);
  var formData = new FormData($('#edit-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.home_slider.uploadImgSlider")}}',

    data: formData,
    contentType: false,
    processData: false
  }).done(function(result) {
        console.log(result);
        if(result){

          console.log($('#public_path').val());
          var public_path=$('#public_path').val();
          
          var path=public_path+result['path'];
          console.log("path");
          console.log(path);
          $('#temp_file_path').val(path);
          $('#disp_round_attachment2').attr('src',result['path']);

           $('#details_div2').show();
         }else{
          $.notify(" Please Choose file.",{
            type:'danger',
          });
          return false;
        }
      })
  .fail(function() {
    alert("fail");
  });

});




     
function validate()
  {
    var flag=1;
    if($('#edit-form').valid()){
  
  if($('#hsn_code').val()==0){
        $.notify("Please select HSN Code!",{
          type:'danger',
        });
         return false;
      }


  if($('#country_id').val()==0){
        $.notify("Please select Country!",{
          type:'danger',
        });
         return false;
      }


  if($('#state_id').val()==0){
        $.notify("Please select state!",{
          type:'danger',
        });
         return false;
      }
  
      $('#save_btn').attr('disabled',true);
    
      return true;
    }else{
      return false;
    }
  }
  



</script>
@stop
