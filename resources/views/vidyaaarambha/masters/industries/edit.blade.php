@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Industries')

@section('page_title', 'Industries')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Industries</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
{!!Form::model($industries,array('route' => array('vidyaaarambha.masters.industries.update', $industries->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$industries->id)!!}

<div class="col-md-4">
  <div class="form-group @if($errors->first('name')) has-error @endif">
   {!!Form::label('name','Name *')!!}
   {!!Form::text('name',Input::old('name'),['class' => 'form-control required','id'=>'name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('name') }}</small>
 </div>
</div>

<div class="clearfix"></div>

 <div >
          <div class="col-md-12"><div class="form-group"><label for="description">Description</label><textarea class="form-control" placeholder="Enter Description" name="description" id="description">

          </textarea></div></div>
          </div>


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
           @if($industries->image)
           <?php $attachment_path = getIndustryUploadedPath($industries->image)?>
           <img src="{{$attachment_path}}" id="disp_round_attachment" height="200px" width="200px" >
           @endif
         </div>
       </div>
          <div class="clearfix"></div>

          <div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.industries.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>
<div class="col-md-2 pull-right">
  <div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-block btn-success btn-block','id'=>'save_btn']) !!}
  </div>
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
var industries=<?php echo json_encode($industries) ?>;
$('#description').val(industries['description']);
$(function(){
  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif

 loadTinyMc();


});

 $('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#edit-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.industries.uploadIndustry")}}',

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


function validate()
  {
    if($('#edit-form').valid())
    {
      return true;
    }else{
      return false;
    }
  }




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
           toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help fontselect fontsizeselect',
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

    });





}

</script>
@stop
