
@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Clients')

@section('page_title', 'Clients')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">View Clients</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($clients,array('route' => array('vidyaaarambha.masters.clients.update', $clients->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onsubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$clients->id)!!}


<div class="col-md-4">
  <div class="form-group @if($errors->first('name')) has-error @endif">
   {!!Form::label('name','Name *')!!}
   {!!Form::text('name',Input::old('name'),['class' => 'form-control required','id'=>'name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('name') }}</small>
 </div>
</div>

<div class="clearfix"></div>




<div class="col-md-4">
  <div class="form-group @if($errors->first('domain')) has-error @endif">
   {!!Form::label('domain','domain *')!!}
   {!!Form::text('domain',Input::old('domain'),['class' => 'form-control required','id'=>'domain',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter domain","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('domain') }}</small>
 </div>
</div>

<div class="clearfix"></div>




 <div >
          <div class="col-md-12"><div class="form-group"><label for="description">Description</label><textarea class="form-control" placeholder="Enter Description" name="description" id="description">

          </textarea></div></div>
          </div>









<div class='clearfix'></div>


        <div class="col-md-4">
          <label>Attachment</label><br/>

          @if($clients->image)
           <?php $attachment_path = getClientsUploadedPath($clients->image)?>
           <img src="{{$attachment_path}}" id="disp_round_attachment" height="200px" width="200px" >
           @endif

          </div>

<div class='clearfix'></div><br/>




          <div class='clearfix'></div>

<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.clients.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>

          {!!Form::close()!!}
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->

  </div>
  </div>
</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">
var clients=<?php echo json_encode($clients) ?>;


$('#description').val(clients['description']);
$('#name').attr('disabled',true);

$('#save_btn').hide();



$(function(){
  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif

 loadTinyMc();


});



   function loadTinyMc(){

  tinymce.init({
        selector: '#description',
        height: 250,
            theme: 'modern',
            plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools jbimages'
            ],
           toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
           toolbar2: 'print preview media | forecolor backcolor emoticons fontsizeselect jbimages',
           image_advtab: true,
           fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
           templates: [
           { title: 'Test template 1', content: 'Test 1' },
           { title: 'Test template 2', content: 'Test 2' }
           ],
           content_css: ['https://fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            'https://www.tinymce.com/css/codepen.min.css'
           ],
            font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
           relative_urls: false,
            readonly:true

    });





}
function validate()
  {
    if($('#edit-form').valid())
    {
      return true;
    }else{
      return false;
    }
  }


</script>
@stop
