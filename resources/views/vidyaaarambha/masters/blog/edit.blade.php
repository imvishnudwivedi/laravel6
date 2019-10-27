@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Blogs')

@section('page_title', 'Blogs')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Blog here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($blog,array('route' => array('vidyaaarambha.masters.blog.update', $blog->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$blog->id)!!}
           <input type="hidden" id="public_path" name="public_path" value="{{public_path()}}">
           <input type="hidden" id="temp_file_path" name="temp_file_path">
           <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


<div class="col-md-3">
  <div class="form-group @if($errors->first('title')) has-error @endif">
   {!!Form::label('title','Title *')!!}
   {!!Form::text('title',Input::old('title'),['class' => 'form-control required','id'=>'title',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter blog Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('title') }}</small>
 </div>
</div>


<div class="col-md-3">
  <div class="form-group @if($errors->first('author')) has-error @endif">
   {!!Form::label('author','Author *')!!}
   {!!Form::text('author',Input::old('author'),['class' => 'form-control required','id'=>'author',"data-toggle"=>"popover","data-trigger"=>"focus","author"=>"","data-content"=>"Enter blog Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('author') }}</small>
 </div>
</div>





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
           @if($blog->image)
           <?php $attachment_path = getblogUploadedPath($blog->image)?>
           <img src="{{$attachment_path}}" id="disp_round_attachment" height="200px" width="200px" >
           @endif
         </div>
       </div>


       <div class="clearfix"></div>
       <div class="clearfix"></div>

<div >
          <div class="col-md-12"><div class="form-group"><label for="description">Description</label><textarea class="form-control" placeholder="Enter Description" name="description" id="description">{{$blog->description}}

          </textarea></div></div>
          </div>




<div >
<div class="col-md-12"><div class="form-group"><label for="details">details</label><textarea class="form-control" placeholder="Enter details" name="details" id="details">{{$blog->details}}
 </textarea></div></div>
          </div>
      
      
        <div class="clearfix" ></div>



<div class='clearfix'></div><br/>





      <div class='clearfix'></div><br/>

<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.blog.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
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


var token=$('#token').val();

var blog=<?php echo json_encode($blog) ?>;
console.log(blog);
$('#description').val(blog['description']);
$('#details').val(blog['details']);



  $(function(){
   $('[data-toggle="popover"]').popover();

loadTinyMc();
loadTinyMc2();

});












  

  //image upload
$('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#edit-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.blog.uploadBlogImg")}}',

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










function deleteRow(blog_id){
  $('#blog_line'+blog_id).remove();
  }

function validate()
  {

    var flag=1;
    blog_array={};
    link_array={};

  $('#s2id_autogen4').attr('id','industry_ids');


    if($('#edit-form').valid()){

if(flag){
      $('#blog_array').val(JSON.stringify(blog_array));

      $('#save_btn').attr('disabled',true);
      return true;
       }
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
        selector: '#details ',
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
