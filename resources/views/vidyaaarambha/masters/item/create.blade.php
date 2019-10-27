@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Items')

@section('page_title', 'Items')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Item here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::open(array('route' => array('vidyaaarambha.masters.item.store'), 'method' => 'POST','files'=>true,'id'=>'add-form','onsubmit'=>'return validate()'))!!}
           <input type="hidden" id="public_path" name="public_path" value="{{public_path()}}">
           <input type="hidden" id="temp_file_path" name="temp_file_path">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">



  <div>
          <div class="col-md-3"><div class="form-group"><label for="item_name">Item Name</label><input type="" class="form-control" placeholder="Enter Item Name" name="item_name" id="item_name">

          </textarea></div></div>



<div class="col-md-3" id="principal_id_div">
     <div class="form-group @if($errors->first('principal_id')) has-error @endif">
         {!!Form::label('principal_id','Principal*')!!}<br>
         {!!Form::select('principal_id',$principals,null,['class' => 'form-control required','id'=>'principal_id','name'=>'principal_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('principal_id') }}</small>
      </div>
</div>





<div class="col-md-3">
     <div class="form-group @if($errors->first('category_id')) has-error @endif">
         {!!Form::label('category_id','Category*')!!}<br>
         {!!Form::select('category_id',$category,null,['class' => 'form-control required','id'=>'category_id','name'=>'category_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('category_id') }}</small>
      </div>
</div>



<div class="col-md-3" id="sub_category_div">
     <div class="form-group @if($errors->first('sub_category_id')) has-error @endif">
         {!!Form::label('sub_category_id','Sub Category')!!}<br>
         {!!Form::select('sub_category_id',$sub_category,null,['class' => 'form-control','id'=>'sub_category_id','name'=>'sub_category_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('sub_category_id') }}</small>
      </div>
</div>


<div class="clearfix" ></div></br>



<div class="col-md-4" id="industry_ids_div">
     <div class="form-group @if($errors->first('industry_ids')) has-error @endif">
         {!!Form::label('industry_ids','Industry*')!!}<br>
         {!!Form::select('industry_ids[]',array(),null,['class' => 'form-control ','id'=>'industry_ids','name'=>'industry_ids[]','notequal'=>'0','data-live-search'=>'true','multiple']) !!}
         <small class="text-danger">{{ $errors->first('industry_ids') }}</small>
      </div>
</div>


<!--
<div class="col-md-4" id="industry_ids_div">
  <div class="form-group @if($errors->first('industry_ids')) has-error @endif" >
    <div class="input-group" >
     {!!Form::label('industry_ids','Industry*')!!}
     {!!Form::select('industry_ids[]', array(),null, ['class' => 'form-control select2-select required','id'=>'industry_ids','multiple'=>'multiple']) !!}
     </div>
     <small class="text-danger">{{ $errors->first('industry_ids') }}</small>
   </div>
 </div> -->

<div class="clearfix" ></div></br>

            <div class="col-md-12"><div class="form-group"><label for="description">Brief Description</label><textarea class="form-control" placeholder="Enter Description" name="description" id="description">

          </textarea></div>
          </div>
          </div>


<div class="clearfix" ></div></br>


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
  <img src="" id="disp_round_attachment" height="200px" width="200px">
</div>
</div>

<div class='clearfix'></div><br/>










 <div class="col-md-12"><div class="form-group"><label for="item_description"> Description</label><textarea class="form-control" placeholder="Enter Description" name="item_description" id="item_description">

          </textarea></div>
          </div>
<div class='clearfix'></div><br/>

<div class='clearfix'></div><br/>

 <div class="col-md-12"><div class="form-group"><label for="specification"> Specification</label><textarea class="form-control" placeholder="Enter Specification" name="specification" id="specification">

          </textarea></div>
          </div>
<div class='clearfix'></div><br/>

<div class="col-md-12"><div class="form-group"><label for="application"> Application</label><textarea class="form-control" placeholder="Enter Application" name="application" id="application">

          </textarea></div>
          </div>
<div class='clearfix'></div><br/>


<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.item.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
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







  </div>
</div><!-- /.row -->

@endsection
@section('script')
@parent
<script type="text/javascript">

var category=<?php echo json_encode($category) ?>;
var sub_category=<?php echo json_encode($sub_category) ?>;
var industries=<?php echo json_encode($industries) ?>;
var principals=<?php echo json_encode($principals) ?>;

var token=$('#token').val();


  var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<principals.length;i++){
    dis1+='<option value='+principals[i]['id']+'>'+principals[i]['name']+'</option>';
  }
  $('#principal_id').html(dis1);


var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<category.length;i++){
    dis1+='<option value='+category[i]['id']+'>'+category[i]['name']+'</option>';
  }
  $('#category_id').html(dis1);

var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<sub_category.length;i++){
    dis1+='<option value='+sub_category[i]['id']+'>'+sub_category[i]['name']+'</option>';
  }
  $('#sub_category_id').html(dis1);

  var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<industries.length;i++){
    dis1+='<option value='+industries[i]['id']+'>'+industries[i]['name']+'</option>';
  }
  console.log(dis1);
  $('#industry_ids').html(dis1).selectpicker();


  $(function(){
   $('[data-toggle="popover"]').popover();

loadTinyMc();
loadTinyMc2();
loadTinyMc3();
loadTinyMc4();


  $('#category_id').change(function(){

    $('#sub_category_id').html('');
    $('#sub_category_div').html('<label>Select Option *</label><select class="form-control" id="sub_category_id" name="sub_category_id" data-live-search="true"></select>');

    var category_id=$('#category_id').val();

     $.ajax({
      type: 'get',
      url:'{{URL::route("getSubCategory")}}',
      dataType: 'json',
      data:{category_id:category_id},
      async:false
    }).done(function(result1) {
     console.log(result1);

      result=result1['sub_category_details'];
        var dis_su='<option value=0>Select Sub Category</option>';
        for(i=0;i<result.length;i++){
         dis_su+='<option value='+result[i]['id']+'>'+result[i]['name']+'</option>';
       }
       $('#sub_category_id').html(dis_su);
  });

});



 });





  //image upload
$('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#add-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.item.uploadImg")}}',

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
    console.log("serialise");

    var flag=1;

        $('#s2id_autogen2').attr('id','industry_ids');


    if($('#add-form').valid()){





if(flag){

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
        selector: '#item_description',
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

function loadTinyMc3(){
  tinymce.init({
        selector: '#application',
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

function loadTinyMc4(){
  tinymce.init({
        selector: '#specification',
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
