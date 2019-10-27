@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Category')

@section('page_title', 'Category')

@section('content')
<div class='row'>

  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">List of Category</h3>
      </div>

      <div class="box-body no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="pull-right">




            <button class="btn bg-green margin" id="add_btn" data-toggle="tooltip" data-placement="bottom" title="Click here to add ">
             <i class="glyphicon glyphicon-pencil"></i> Add Category
           </button>


         </div><div class="clearfix"></div>

         <div class="clearfix"></div>
         {!!Form::open(array('route' => array('vidyaaarambha.masters.category.store'), 'method' => 'POST','files'=>true,'id'=>'add-form'))!!}

         <table class="table table-bordered" id="view">
          <thead>
            <tr class="bg-blue">

              <th width="10%">Name</th>
              <th width="5%">Description</th>

              <th width="5%">Status</th>
              <th width="5%">Actions</th>
            </tr>


            <tr tr class="bg-blue">

            <th><input type="text" class="form-control filter" data-col="Name" name="filter_type"></th>
            <th><input type="text" class="form-control filter" data-col="Description" name="filter_type"></th>


           <th><input type="text" class="form-control filter" data-col="Status" name="filter_type"></th>


            <th></th>

             </tr>

          </thead>
          <tbody id="row">
            @foreach($category as $dt)
            <tr id="category_tr{{$dt->id}}"  style="page-break-inside: avoid;" tabindex="-1" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" data-content="Created by: {{$dt->created_by}} <br> Created at: {{getFormatedDate($dt->created_at)}} <br> Updated by:{{$dt->updated_by}} <br> Updated at:{{getFormatedDate($dt->updated_at)}}">

              <td>{{$dt->name}}</td>
              <td>{{$dt->description}}</td>

              @if($dt->deleted_at==null)
              <td><i class="fa fa-check text-green"></i></td>
              @else
              <td><i class="fa fa-times-circle-o text-red"></i></td>
              @endif
              <td>


                <a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Edit " onclick="editCategory('{{$dt->id}}')">
                  <i class="glyphicon glyphicon-edit"></i>
                </a>



                <a href="{{URL::to('/')}}/vidyaaarambha/masters/category/deactivate/{{$dt->id}}" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="Activate/Deactivate" onclick="return confirmDelete('{{$dt->deleted_at}}')">
                  <i class="fa fa-lock text-red" style='font-size:18px;'></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <div class="clearfix"></div>

        </table>
        {!!Form::close()!!}
        <div class="clearfix"></div>

    </div>
  </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
 </div>
@endsection
@section('script')
@parent

<script type="text/javascript">
var specific_category=0;
var edit_flag=0;

var category=<?php echo json_encode($category) ?>;
console.log(category);


$(function(){

    $('.filter').multifilter({'target':$('#view')});



  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif




$('#add_btn').click(function(){
  if(edit_flag === 1){
    cancelEdit();
  }
  $(this).attr('disabled',true);
  $(this).tooltip('hide');
  var dis='';
  dis+='<tr>';
  dis+='<td><input type="text" class="form-control required" id="name" name="name"></td>';
  dis+='<td><input type="text" class="form-control " id="description" name="description"></td>';

   dis+='<td></td>';
  dis+='<td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Save" onclick=saveCategory()><i class="fa fa-floppy-o"></i></a><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Cancel" onclick=cancelAdd()><i class="glyphicon glyphicon-remove text-red"></i></a></td>';
  dis+='</tr>';

  $('#row').prepend(dis);









});

});

function cancelAdd(){
  $('#row tr:first').remove();
  $('#add_btn').attr('disabled',false);
}

function saveCategory()
{


    if($('#add-form').valid()){

      var formData = new FormData($('#add-form')[0]);

      var ajax = $.ajax({
        type: 'post',
        url:'{{URL::route("vidyaaarambha.masters.category.store")}}',
        data: formData,
        contentType: false,
        processData: false
      }).done(function(result) {
        console.log(result);

        if(result==1){
         $.notify("This Category already been taken",{
          type:'danger',
        });

         return false;
       }else{
        window.location.reload();

        $.notify("Category Saved Successfully!",{
          type:'success',
        });
      }
    });
    }

}


function editCategory(id)
{
  if(edit_flag == 1){
    cancelEdit();
  }
  specific_category=0;

  for(var v=0;v<category.length;v++)
  {
    if(id == category[v]['id'])
    {
      specific_category=category[v];
      break;
    }
  }

if(specific_category['deleted_at']==null){
  edit_flag=1;
  if($('#add_btn').attr('disabled') == 'disabled'){
    cancelAdd();
  }
  var dis='';
  dis+='<td><input type="text" class="form-control required" id="name" name="name"></td>';
  dis+='<td><input type="text" class="form-control " id="description" name="description"></td>';

   dis+='<td></td>';
  dis+='<td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Update" onclick=updateCategory('+id+')><i class="fa fa-floppy-o"></i></a><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Cancel" onclick=cancelEdit()><i class="glyphicon glyphicon-remove text-red"></i></a></td>';

  $('#category_tr'+id).html(dis);





  $('#name').val(specific_category['name']);
  $('#description').val(specific_category['description']);


  }else{
  $.notify({message: 'Cannot edit Deactivated Category.'},{ type: 'danger'});
  return false;
}
}


function updateCategory(id)
{

    if($('#add-form').valid()){

      var formData = new FormData($('#add-form')[0]);

      formData.append('id',id);
      var ajax = $.ajax({
        type: 'post',
        url:'{{URL::route("vidyaaarambha.masters.category.updateCategory")}}',
        data: formData,
        contentType: false,
        processData: false
      }).done(function(result) {
        console.log(result);
        if(result==1){

         $.notify("Category already exists",{
          type:'danger',
        });
         return false;
       }else{
        window.location.reload();
        $.notify("Category Updated Successfully!",{
          type:'success',
        });
      }
    });
    }

}

function cancelEdit()
{
  var new_dis='';

  new_dis+='<td>'+specific_category['name']+'</td>';
  new_dis+='<td>'+specific_category['description']+'</td>';




  if(specific_category['deleted_at']==null){
    new_dis+='<td><i class="fa fa-check text-green"></i></td>';
  }else{
    new_dis+='<td><i class="fa fa-times-circle-o text-red"></i></td>';
  }

  new_dis+='<td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Edit DepositType" onclick="editCategory('+specific_category['id']+')"><i class="glyphicon glyphicon-edit"></i></a><a href="{{URL::to('/')}}/vidyaaarambha/masters/category/deactivate/'+specific_category['id']+'" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="Activate/Deactivate" onclick="return confirmDelete('+specific_category['deleted_at']+')">  <i class= "fa fa-lock text-red"></i></a></td>';
  $('#category_tr'+specific_category['id']).html(new_dis);
}


function confirmDelete(status)
{
  if(status){
    if (!confirm('Do you really want to Activate...?')) {
      return false;
    }
  }else{
    if (!confirm('Do you really want to Deactivate...?')) {
      return false;
    }
  }
}

</script>
@stop