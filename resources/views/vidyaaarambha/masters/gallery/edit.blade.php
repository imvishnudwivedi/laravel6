@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Gallry Photos')

@section('page_title', 'Gallry Photos ')


@section('page_title_sub', 'Manage Gallry Photos')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Sub Category here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">

         {!!Form::model($gallery,array('route' => array('vidyaaarambha.masters.gallery.update', $gallery->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$gallery->id)!!}

        <input type="hidden" id="public_path" name="public_path" value="{{public_path()}}">
        <input type="hidden" id="temp_file_path" name="temp_file_path">



<div class="col-md-4">
     <div class="form-group @if($errors->first('folder_id')) has-error @endif">
         {!!Form::label('folder_id','Folder Name*')!!}<br>
         {!!Form::select('folder_id',array(),null,['class' => 'form-control required','id'=>'folder_id','name'=>'folder_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('folder_id') }}</small>
      </div>
</div>






<div class="col-md-4">
  <div class="form-group @if($errors->first('gallery_name')) has-error @endif">
   {!!Form::label('gallery_name',' Name *')!!}
   {!!Form::text('gallery_name',Input::old('gallery_name'),['class' => 'form-control required','id'=>'gallery_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Sub Category ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('gallery_name') }}</small>
 </div>
</div>






 
<div class="clearfix"></div>

<!-- Attach Image field -->
<div class="col-md-4" id="attachment_div">
  {!! Form::label('Attach Image size (1024 X 768)') !!}
  <input type="file" class="form-control" id="file_name" name="file_name">
</div>



<div class="col-md-2" style="margin-top:25px;">
  {!! Form::button('Upload Image', ['class' => 'btn btn-block btn-success btn-block', 'id' => 'upload_btn']) !!}
</div>
<div class="clearfix"></div>

<div class="col-md-12" style="margin-top: 10px;">
         <div class="col-md-8" id="details_div">
           @if($gallery->gallery_display_attachment)
           <?php $gallery_display_attachment=getSubCategoryUploadedPath($gallery->gallery_display_attachment) ?>
           <img src="{{$gallery_display_attachment}}" id="disp_round_attachment" height="200px" width="200px" >
           @endif
         </div>
       </div>


<div class="clearfix"></div>
</div>

<div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.gallery.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
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

var gallery = <?php echo json_encode($gallery) ?>;

var folder = <?php echo json_encode($folder) ?>;


var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<folder.length;i++){
    dis1+='<option value='+folder[i]['id']+'>'+folder[i]['folder_name']+'</option>';
  }
  $('#folder_id').html(dis1);
  $('#folder_id').val(gallery['folder_id']);




 $(function(){


 $('[data-toggle="popover"]').popover(); 

})



   //image upload
$('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#edit-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.gallery.uploadGalleryImage")}}',

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


  if($('#folder_id').val()==0){
        $.notify("Please select Folder!",{
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
