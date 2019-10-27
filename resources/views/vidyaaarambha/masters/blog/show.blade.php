
@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'blogs')

@section('page_title', 'blogs')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">View blog here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($blog,array('route' => array('vidyaaarambha.masters.blog.update', $blog->id), 'method' => 'PUT','files'=>true,'id'=>'view-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$blog->id)!!}


<div class="col-md-3">
  <div class="form-group @if($errors->first('title')) has-error @endif">
   {!!Form::label('title','Title Name')!!}
   {!!Form::text('title',Input::old('title'),['class' => 'form-control required','id'=>'title',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Title Name","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('title') }}</small>
 </div>
</div>




<div class="col-md-3">
  <div class="form-group @if($errors->first('author')) has-error @endif">
   {!!Form::label('author','author Name')!!}
   {!!Form::text('author',Input::old('author'),['class' => 'form-control required','id'=>'author',"data-toggle"=>"popover","data-trigger"=>"focus","author"=>"","data-content"=>"Enter author Name","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('author') }}</small>
 </div>
</div>




<div class="clearfix" ></div></br>



        @if($blog->image)

        <div class="col-md-4">
          <label>Attachment</label><br/>

          <?php $attachment_path = getBlogUploadedPath($blog->image)?>
          <img src="{{$attachment_path}}" id="disp_round_attachment" height="200px" width="200px" >

        </div>
        @endif

<div class="clearfix" ></div></br>




<div>
 <div class="col-md-12"><div class="form-group"><label for="description">Description</label><textarea class="form-control" placeholder="Enter Description" name="description" id="description" disabled>
</textarea></div></div>
  </div>




<div class="clearfix" ></div></br>


   <div class="clearfix" ></div><br/>


<div class='clearfix'></div><br/>

<div class='clearfix'></div><br/>


<div class='clearfix'></div><br/>
<div>
 <div class="col-md-12"><div class="form-group"><label for="details">details</label><textarea class="form-control" placeholder="Enter details" name="details" id="details" disabled>
</textarea></div></div>
  </div>

<div class='clearfix'></div><br/>




<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.blog.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div><br><br><br><br>

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
var blog=<?php echo json_encode($blog) ?>;
console.log(blog);

$('#description').val(blog['description']);
$('#details').val(blog['details']);


  $(function(){
   $('[data-toggle="popover"]').popover();


loadTinyMc();
loadTinyMc2();



 });

function validate()
  {
    var flag=1;
    if($('#edit-form').valid()){

      if($('#blog_group_id').val()==0){
        $.notify("Please select blog Group!",{
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

    });
}

 function loadTinyMc2(){
  tinymce.init({
        selector: '#details	',
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

    });

}


</script>
@stop
