@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Folder')

@section('page_title', 'Folder ')


@section('page_title_sub', 'Manage Folder')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Folder here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">

         {!!Form::model($folder,array('route' => array('vidyaaarambha.masters.folder.update', $folder->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$folder->id)!!}

        <input type="hidden" id="public_path" name="public_path" value="{{public_path()}}">
        <input type="hidden" id="temp_file_path" name="temp_file_path">


<div class="col-md-4">
  <div class="form-group @if($errors->first('folder_name')) has-error @endif">
   {!!Form::label('folder_name','Folder Name *')!!}
   {!!Form::text('folder_name',Input::old('folder_name'),['class' => 'form-control required','id'=>'folder_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter folder name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('folder_name') }}</small>
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
           @if($folder->folder_display_attachment)
           <?php $folder_display_attachment=getFolderUploadedPath($folder->folder_display_attachment) ?>
           <img src="{{$folder_display_attachment}}" id="disp_round_attachment" height="200px" width="200px" >
           @endif
         </div>
       </div>


<div class="clearfix"></div>
</div>

<div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.folder.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
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
$('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#edit-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.folder.uploadFolderImage")}}',

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
