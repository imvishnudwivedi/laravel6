@extends('vidyaaarambha.layouts.app')

@section('title', 'Home slider')

@section('page_title_sub', 'Add Home slider')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Silder</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::open(array('route' => array('vidyaaarambha.masters.home_slider.store'), 'method' => 'POST','files'=>true,'id'=>'add-form','onsubmit'=>'return validate()'))!!}
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
   {!!Form::text('sub_heading',Input::old('sub_heading'),['class' => 'form-control required','id'=>'sub_heading',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Sub Heading","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('sub_heading') }}</small>
 </div>
</div>






<div class="col-md-4">
  <div class="form-group @if($errors->first('description')) has-error @endif">
   {!!Form::label('description','Remarks')!!}
   {!!Form::textarea('description',Input::old('description'),['class' => 'form-control','id'=>'description',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Remarks","data-placement"=>"bottom",'rows'=>'3'])!!}
   <small class="text-danger">{{ $errors->first('description') }}</small>
 </div>
</div>


          



<!-- Attach Image field -->
<div class="col-md-4" id="attachment_div">
  {!! Form::label('Attach Image') !!}
  <input type="file" class="form-control" id="file_name" name="file_name">
</div>


<div class="col-md-2" style="margin-top:25px;">
  {!! Form::button('Upload Image', ['class' => 'btn btn-block btn-success btn-block', 'id' => 'upload_btn']) !!}
</div>

<div class="clearfix" ></div>

<div class="col-md-12" id="details_div" hidden style="margin-top:25px;">

 <div class="col-md-8">
  <img src="" id="disp_round_attachment" height="500px" width="500px">
</div>
</div>


<div class="clearfix" ></div></br>




<!-- Attach Image field -->
<div class="col-md-4" id="attachment_div2">
  {!! Form::label('Attach Image') !!}
  <input type="file" class="form-control" id="file_name2" name="file_name2">
</div>


<div class="col-md-2" style="margin-top:25px;">
  {!! Form::button('Upload Image', ['class' => 'btn btn-block btn-success btn-block', 'id' => 'upload_btn2']) !!}
</div>

<div class="clearfix" ></div>

<div class="col-md-12" id="details_div2" hidden style="margin-top:25px;">

 <div class="col-md-8">
  <img src="" id="disp_round_attachment2" height="500px" width="500px">
</div>
</div>






<div class="clearfix" ></div></br>













<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.home_slider.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>
<div class="col-md-2 pull-right">
  <div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-block btn-success btn-block','id'=>'save_btn']) !!}
  </div>
</div>


          {!!Form::close()!!}
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->



<



  </div>
</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">







  $(function(){
   $('[data-toggle="popover"]').popover(); 





 });







  //image upload
  $('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#add-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.home_slider.uploadSlider")}}',

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

$('#upload_btn2').click(function(){
console.log(11111111);
  var formData = new FormData($('#add-form')[0]);

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
    if($('#add-form').valid()){

      if($('#item_group_id').val()==0){
        $.notify("Please select Item Group!",{
          type:'danger',
        });
         return false;
      }


  if($('#item_type_id').val()==0){
        $.notify("Please select Item Type!",{
          type:'danger',
        });
         return false;
      }

      if($('#uom_master_id').val()==0){
        $.notify("Please select UoM!",{
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
