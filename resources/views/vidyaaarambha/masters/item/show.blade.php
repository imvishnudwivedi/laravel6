@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Items')

@section('page_title', 'Items')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">View Item here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($item,array('route' => array('vidyaaarambha.masters.item.update', $item->id), 'method' => 'PUT','files'=>true,'id'=>'view-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$item->id)!!}


<div class="col-md-3">
  <div class="form-group @if($errors->first('item_name')) has-error @endif">
   {!!Form::label('item_name','Item Name')!!}
   {!!Form::text('item_name',Input::old('item_name'),['class' => 'form-control required','id'=>'item_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item Name","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('item_name') }}</small>
 </div>
</div>


<div class="col-md-3">
  <div class="form-group @if($errors->first('principal_id')) has-error @endif">
   {!!Form::label('principal_id','Principal')!!}
   {!!Form::text('principal_id',$item->principal_name,['class' => 'form-control required','id'=>'principal_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item Name","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('principal_id') }}</small>
 </div>
</div>



<div class="col-md-3">
  <div class="form-group @if($errors->first('category_id')) has-error @endif">
   {!!Form::label('category_id','Category')!!}
   {!!Form::text('category_id',$item->name,['class' => 'form-control required','id'=>'category_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item Name","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('category_id') }}</small>
 </div>
</div>


<div class="col-md-3">
  <div class="form-group @if($errors->first('sub_category_id')) has-error @endif">
   {!!Form::label('sub_category_id','Sub Category')!!}
   {!!Form::text('sub_category_id',$item->sub_category_name,['class' => 'form-control required','id'=>'sub_category_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Item Name","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('sub_category_id') }}</small>
 </div>
</div>







<div class="col-md-3" id="industry_ids_div">
     <div class="form-group @if($errors->first('industry_ids')) has-error @endif">
         {!!Form::label('industry_ids','Industry')!!}<br>
         {!!Form::select('industry_ids',$industries,Input::old('industry_ids'),['class' => 'form-control required','id'=>'industry_ids','name'=>'industry_ids','notequal'=>'0','multiple'=>'multiple','data-live-search'=>'true',"disabled"]) !!}
         <small class="text-danger">{{ $errors->first('industry_ids') }}</small>
      </div>
</div>

<div class="clearfix" ></div>


<div>
 <div class="col-md-12"><div class="form-group"><label for="description">Description</label><textarea class="form-control" placeholder="Enter Description" name="description" id="description" disabled>
</textarea></div></div>
  </div>


<div class="clearfix" ></div></br>



        @if($item->image)

        <div class="col-md-4">
          <label>Attachment</label><br/>

          <?php $attachment_path = getItemUploadedPath($item->image)?>
          <img src="{{$attachment_path}}" id="disp_round_attachment" height="200px" width="200px" >

        </div>
        @endif

<div class="clearfix" ></div></br>


   <div class="clearfix" ></div><br/>

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
var item=<?php echo json_encode($item) ?>;
console.log(item);

$('#description').val(item['description']);
$('#item_description').val(item['item_description']);
$('#application').val(item['application']);
$('#specification').val(item['specification']);

  $(function(){
   $('[data-toggle="popover"]').popover();


loadTinyMc();
loadTinyMc2();
loadTinyMc3();
loadTinyMc4();


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
