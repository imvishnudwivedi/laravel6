@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Items')

@section('page_title', 'Items')

@section('content')

<div class='row' style="padding:2px;">

 <div class="box box-primary">
  <div class="box-header with-border">
   <div class="box-body table-responsive no-padding">


    <div class="clearfix"></div>

    <div class="box-header with-border">
      <h3 class="box-title">List of items</h3>
    </div>
    <div class="col-md-12">
      <div class="pull-right">

        <a href="{{route('vidyaaarambha.masters.item.create')}}" class="btn bg-green margin" data-toggle="tooltip" data-placement="bottom" title="Click here to add" id="add_asset">
         <i class="glyphicon glyphicon-pencil"></i> Add Item
       </a>



     </div><div class="clearfix"></div>


     <table class="table table-bordered" id="view">
      <thead>
        <tr class="bg-blue">
         <th>Item Name</th>
         <th>Principal</th>
         <th>Category</th>
         <th>Sub Category</th>
         <th>Industry</th>
         <th>Description</th>


         <th width="10%">Action</th>


       </tr>
       <tr tr class="bg-blue">
         <th><input type="text" class="form-control filter" data-col="Item Name" name="filter_type"></th>
         <th><input type="text" class="form-control filter" data-col="Principal" name="filter_type"></th>
         <th><input type="text" class="form-control filter" data-col="Category" name="filter_type"></th>
         <th><input type="text" class="form-control filter" data-col="Sub Category" name="filter_type"></th>


         <th><input type="text" class="form-control filter" data-col="Industry" name="filter_type"></th>
         <th><input type="text" class="form-control filter" data-col="Description" name="filter_type"></th>
         <th></th>


       </tr>


     </thead>
     <tbody id="row">
       @foreach($item as $itm)
       <tr style="page-break-inside: avoid;" tabindex="-1" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" data-content="Created by: {{$itm->created_by}}<br> Created at: {{getFormatedDate($itm->created_at)}} <br> Updated by:{{$itm->updated_by}} <br> Updated at:{{getFormatedDate($itm->updated_at)}}">


        <td>{{$itm->item_name}}</td>
        <td>{{$itm->princial_name}}</td>
        <td>{{$itm->name}}</td>
        <td>{{$itm->sub_category_name}}</td>

        <td>{{$itm->industry_name}}</td>

        <td>{!! $itm->description !!}</td>

        <td>
          <a href="{{URL::to('/')}}/vidyaaarambha/masters/item/{{$itm->id}}/edit" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
            <i class="glyphicon glyphicon-edit"></i>
          </a>

          <a href="{{URL::to('/')}}/vidyaaarambha/masters/item/{{$itm->id}}" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
            <i class="glyphicon glyphicon-eye-open"></i>
          </a>

            <a href="{{URL::to('/')}}/vidyaaarambha/masters/item/{{$itm->id}}/addAttachment" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Attachment">
              <i class="glyphicon glyphicon-plus"></i>
            </a>


        </td>





      </tr>
      @endforeach
    </tbody>
    <div class="clearfix"></div>

  </table>


  <div class="clearfix"></div>


</div>

</div>
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->

@endsection

@section('script')
@parent

<script type="text/javascript">



 $(function(){
  $('.filter').multifilter({'target':$('#view')});
  $('input[name=ch]:radio').attr('checked',false);


  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif







});



 function confirm_delete(status){
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