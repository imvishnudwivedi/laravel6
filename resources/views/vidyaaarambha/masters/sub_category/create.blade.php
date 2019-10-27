@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Sub Category')

@section('page_title_sub', 'Add Sub Category')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Sub Category here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::open(array('route' => array('vidyaaarambha.masters.sub_category.store'), 'method' => 'POST','files'=>true,'id'=>'add-form','onsubmit'=>'return validate()'))!!}


<div class="col-md-4">
     <div class="form-group @if($errors->first('category_id')) has-error @endif">
         {!!Form::label('category_id','Category*')!!}<br>
         {!!Form::select('category_id',array(),null,['class' => 'form-control required','id'=>'category_id','name'=>'category_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('category_id') }}</small>
      </div>
</div>



<div class="col-md-4">
  <div class="form-group @if($errors->first('name')) has-error @endif">
   {!!Form::label('name','Sub Category *')!!}
   {!!Form::text('name',Input::old('name'),['class' => 'form-control required','id'=>'name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Sub Category ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('name') }}</small>
 </div>
</div>


<div class="col-md-4">
  <div class="form-group @if($errors->first('description')) has-error @endif">
   {!!Form::label('description','Description')!!}
   {!!Form::textarea('description',Input::old('description'),['class' => 'form-control','id'=>'description',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Description","data-placement"=>"bottom",'rows'=>'3'])!!}
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
  <img src="" id="disp_round_attachment" height="200px" width="200px">
</div>
</div>


<div class="clearfix" ></div></br>






<div class="col-md-2 pull-right">
  <a href="{{URL::route('vidyaaarambha.masters.sub_category.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
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
var category = <?php echo json_encode($category) ?>;


var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<category.length;i++){
    dis1+='<option value='+category[i]['id']+'>'+category[i]['name']+'</option>';
  }
  $('#category_id').html(dis1);

  $(function(){
   $('[data-toggle="popover"]').popover();

 });


  //image upload
$('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#add-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.sub_category.uploadSubCategory")}}',

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
    if($('#add-form').valid()){

      if($('#category_id').val()==0){
        $.notify("Please select Category",{
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
