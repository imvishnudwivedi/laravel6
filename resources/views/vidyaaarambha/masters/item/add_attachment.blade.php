  @extends('vidyaaarambha.layouts.dashboard')

  @section('title', 'Add Attachments')

  @section('page_title_sub', 'Add Attachments')

  @section('content')
  <div class='row'>
    <div class='col-md-12'>
      <!-- Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Attachments</h3>
          <div class="box-tools pull-right">
            <a href="{{URL::route('vidyaaarambha.masters.item.index')}}"><button class="btn btn-danger" ><i class="fa fa-arrow-left"></i> Back</button></a>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
          <div class="clearfix"></div>
          <div class="pull-right" id="btn_div">

  <a class="btn bg-green margin" id="add_document_details_btn" data-toggle="tooltip" data-placement="bottom" title="Click here to add Document">
    <i class="glyphicon glyphicon-pencil"></i> Add
  </a>


</div><div class="clearfix"></div>

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">



        <div class="clearfix"></div>

<table class="table table-bordered" id="view">
  <thead>
    <tr class="bg-blue">
      <th>Sl.No.</th>
      <th>Document Type</th>
      <!-- <th>Document Name</th> -->
      <th>Attachment</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody id="document_details_row">


            <?php $k = 1;?>

            @foreach($item_document as $itm)

            <tr id="doc_tr_{{$itm->id}}">
              <td>{{$k++}}</td>
              <td>{{$itm->document_type}}</td>
              @if($itm->document_path)
              <td><a target="_blank" href="/vidyaaarambha/images/item_documents/{{$itm->document_path}}">{{$itm->document_path}}</a></td>

               @else
                  <td> --- </td>
                  @endif
                  <td>
            <a style="cursor:pointer;" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteItemDocument('{{$itm->id}}')"><i class="glyphicon glyphicon-trash text-red"></i></a></td>


            </tr>
            @endforeach

  </tbody>
  <div class="clearfix"></div>

</table>

<div class="modal fade" id="document_details_modal" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true" hidden>
<div class="modal-dialog" >
 <div class="modal-content">
   <!-- Modal Header -->
   <div class="modal-header">
     <button type="button" class="close"
     data-dismiss="modal">
     <span aria-hidden="true">&times;</span>
     <span class="sr-only">Close</span>
   </button>
   <h4 class="modal-title" id="myModalLabel">
    Add Attachment Details
  </h4>

</div>


<!-- Modal Body -->
<div class="modal-body">
  {!!Form::open(array('method' => 'POST','files'=>true,'id'=>'document-details-form'))!!}
  <input type="hidden" id="document_temp_file_path" name="document_temp_file_path">
 <input type="hidden" name="item_id" id="item_id" value="{{$item->id}}">


  <div class="col-md-6">
    <div class="form-group @if($errors->first('document_type_id')) has-error @endif" id="religion_div">
      {!!Form::label('document_type_id','Document Type *')!!}
      {!! Form::documentTypeSelect('document_type_id',null) !!}
      <small class="text-danger">{{ $errors->first('document_type_id') }}</small>
    </div>
  </div>

  <div class="clearfix"></div>
  <hr>
  <div class="clearfix"></div>
  <div class="col-md-6" id="document_attachment_div">
    {!! Form::label('Attach Document') !!}
    <input type="file" class="form-control" id="document_file_name" name="document_file_name">
  </div>

  <div class="col-md-3" style="margin-top:25px;">
    {!! Form::button('Upload', ['class' => 'btn btn-block btn-primary btn-block', 'id' => 'document_upload_btn', 'type' => 'button']) !!}
  </div>

  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <div class="col-md-12" id="document_details_div" hidden style="margin-top:25px;">



   <div class="col-md-8">
     <a href="" id="document_document" target="_blank"><span id="document_file_display_name"></span> </a>

     <button id="document_document_delete_btn" type="button" onclick='deleteTempItemDocument()'>X</button>
   </div>
 </div>

</div>
{!!Form::close()!!}
<div class="clearfix"></div>

<!-- Modal Footer -->
<div class="modal-footer">
 <div class="col-md-2 pull-right">
  <a class="btn btn-block btn-danger btn-block" data-dismiss="modal">
    Cancel </a>
  </div>
  <div class="col-md-2 pull-right">
   {!! Form::button("Save", ['class' => 'btn btn-block btn-success btn-block','id' => 'save_modal_document_btn']) !!}
 </div>
 <div class="clearfix"></div>
</div>
</div>
</div>
</div>





</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">
$(function(){
  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif


$('#add_document_details_btn').click(function(){
  $('#document-details-form')[0].reset();
  $('#document_details_modal').modal('show');
});

  $('#cancel_btn').click(function(){
    $('#modal_add').modal('hide');
  });


  $('.filter').multifilter({'target':$('#view')});


  $('#document_upload_btn').click(function(){
  var formData = new FormData($('#document-details-form')[0]);

  console.log(formData,213);
  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("vidyaaarambha.masters.uploadItemDocument")}}',
    data: formData,
    contentType: false,
    processData: false
  }).done(function(result) {
    console.log(result);
    if(result){
      var str=result['path'].split('/').pop();
      $('#document_temp_file_path').val(str);
      $('#document_file_display_name').text(str);
      $('#document_document').attr('href',result['path']);
      $('#document_details_div').show();
      $('#document_file_name').val('');
      $('#document_document_delete_btn').attr('onclick','deleteTempItemDocument()');
    }else{
      $.notify({
        text:'Please choose file to upload!',
        type:'error',
        dismissQueue:1,
        theme:"agileUI",
        layout:'top',
        timeout:5000
      });
      return false;
    }
  })
  .fail(function() {
    alert("fail");
  });
});



$('#save_modal_document_btn').click(function(){

  if(validateItemDocument()){
    var formData = new FormData($('#document-details-form')[0]);
    formData.append('item_id',$('#item_id').val());
    console.log(item_id,8989);

     formData.append('document_file_name',$('#document_file_name').val());
     console.log(document_file_name,678678);

     if(document_file_name==""){
        $.notify(" Please Choose file.",{
          type:'danger',
        });
      }else{

    var ajax = $.ajax({
      type: 'post',
      url:'{{URL::route("vidyaaarambha.masters.storeDocumentDetails")}}',
      data: formData,
      contentType: false,
      processData: false
    }).done(function(result) {
      console.log(result);
      console.log("result");
      var item_document=result['item_document'];
      console.log(item_document,7878);

      location.reload();

      var cust_dis='';
      for(var j=0;j<item_document.length;j++){
        cust_dis+='<tr>';
        cust_dis+='<td>'+(j+1)+'</td>';
        cust_dis+='<td>'+item_document[j]['document_type']+'</td>';
        // cust_dis+='<td>'+item_document[j]['remarks']+'</td>';
        if(item_document[j]['document_path']){
          cust_dis+='<td><a target="_blank" href="/vidyaaarambha/images/item/'+item_document[j]['document_path']+'">'+item_document[j]['document_path']+'</a></td>';
        }else{
          cust_dis+='<td>---</td>';
        }

     // cust_dis+='<td><a style="cursor:pointer;" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteItemDocument('+item_document[j]['id']+')"><i class="glyphicon glyphicon-trash text-red"></i></a></td>'
        cust_dis+='</tr>';
      }
      $('#document_details_row').html(cust_dis);

      $('#document_temp_file_path').val('');
      $('#document_file_display_name').text('');
      $('#document_document').attr('href','');
      $('#document_details_div').hide();
      $('#document_file_name').val('');
      $('#document_details_modal').modal('hide');

    })
  }
  }
});


});




function validateItemDocument(){
  if($('#document-details-form').valid()){
    if($('#document_file_name').val()){

      $.notify("Please upload selected file!",{
        type:'danger',
      });
      return false;
      // notify({
      //   text:'Please upload selected file!',
      //   type:'error',
      //   dismissQueue:1,
      //   theme:"agileUI",
      //   layout:'top',
      //   timeout:5000
      // });
      // return false;
    }else{
      return true;
    }
  }else{
    return false;
  }
}


function deleteItemDocument(item_attach_id) {

   var ajax = $.ajax({
        type: 'GET',
        url:'{{URL::route("vidyaaarambha.masters.deleteItemSpeicificDocument")}}',
        data: {item_attach_id:item_attach_id}
      }).done(function(result) {
       $("#doc_tr_"+item_attach_id).hide();

       location.reload();
      });
}


function deleteTempItemDocument(){
    $.ajax({
    type: 'get',
    url:'{{URL::route("vidyaaarambha.masters.deleteTempImage")}}',
    dataType: 'json',
    data:{path:$('#document_file_display_name').text()},
  }).done(function(result){
        $('#document_temp_file_path').val('');
        $('#document_file_display_name').text('');
        $('#document_document').attr('href','');
        $('#document_details_div').hide();
        $('#document_file_name').val('');
  });
}

  function no_select(){
    $.notify("Please select row from below table",{
      type:'danger',
    });
  }

  function confirm_delete(){
    if (!confirm('Do you really want to delete?')) {
      return false;
    }
  }

  function addValidate(){
    var flag=1;

    if($('#add-form').valid()){
      flag=1;
      $('#save_btn').attr('disabled',true);
      return true;
    }else{
      return false;
    }
  }

  function editValidate(){

    if($('#edit-form').valid()){
      flag=1;
      $('#update_btn').attr('disabled',true);
      return true;
    }else{
      return false;
    }
  }

  </script>
  @stop
