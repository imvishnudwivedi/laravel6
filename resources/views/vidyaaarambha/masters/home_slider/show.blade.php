@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Home Slider')

@section('page_title_sub', 'View Home Slider')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">View Home Slider</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($home_slider,array('route' => array('vidyaaarambha.masters.home_slider.update', $home_slider->id), 'method' => 'PUT','files'=>true,'id'=>'view-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$home_slider->id)!!}
          
<div class="col-md-4">
 <div class="form-group @if($errors->first('heading')) has-error @endif">
   {!!Form::label('heading','Heading ')!!}
   {!!Form::text('heading',$home_slider->heading,['class' => 'form-control required','id'=>'heading',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('heading') }}</small>
 </div>
</div>

<div class="col-md-4">
 <div class="form-group @if($errors->first('sub_heading')) has-error @endif">
   {!!Form::label('sub_heading','Sub heading ')!!}
   {!!Form::text('sub_heading',$home_slider->sub_heading,['class' => 'form-control required','id'=>'sub_heading',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('sub_heading') }}</small>
 </div>
</div>




<div class="col-md-4">
  <div class="form-group @if($errors->first('description')) has-error @endif">
   {!!Form::label('description','Remarks')!!}
   {!!Form::textarea('description',Input::old('description'),['class' => 'form-control','id'=>'description',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter description","data-placement"=>"bottom",'rows'=>'3'])!!}
   <small class="text-danger">{{ $errors->first('description') }}</small>
 </div>
</div><br/>









<div class='clearfix'></div>


        <div class="col-md-4">
          <label>Attachment</label><br/>
          
          @if($home_slider->attachment)
           <?php $attachment_path=getSliderUploadedPath($home_slider->attachment) ?>
           <img src="{{$attachment_path}}" id="disp_round_attachment" height="500px" width="500px" >
           @endif
           
          </div>
          
<div class='clearfix'></div><br/>



<div class='clearfix'></div>


        <div class="col-md-4">
          <label>Attachment</label><br/>
          
          @if($home_slider->img_attachment)
           <?php $attachment_path=getSliderUploadedPath($home_slider->img_attachment) ?>
           <img src="{{$attachment_path}}" id="disp_round_attachment2" height="500px" width="500px" >
           @endif
           
          </div>
          
<div class='clearfix'></div><br/> 



          <div class='clearfix'></div>

<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.home_slider.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>

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

   $('.form-control').attr('disabled',true);


 });


function validate()
  {
    var flag=1;
    if($('#edit-form').valid()){

      if($('#item_group_id').val()==0){
        $.notify("Please select Item Group!",{
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

      flag=1;
      $('#save_btn').attr('disabled',true);
      return true;
    }else{
      return false;
    }
  }
  
</script>
@stop
