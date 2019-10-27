@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Sub Category')

@section('page_title', 'Sub Category')

@section('content')

<div class='row' style="padding:2px;">

 <div class="box box-primary">
      <div class="box-header with-border">
       <div class="box-body table-responsive no-padding">


        <div class="clearfix"></div>

       <div class="box-header with-border">
        <h3 class="box-title">List of Sub Category</h3>
      </div>
        <div class="col-md-12">
          <div class="pull-right">

            <a href="{{route('vidyaaarambha.masters.sub_category.create')}}" class="btn bg-green margin" data-toggle="tooltip" data-placement="bottom" title="Click here to add" id="add_asset">
             <i class="glyphicon glyphicon-pencil"></i> Add
           </a>






        </div><div class="clearfix"></div>


        <table class="table table-bordered" id="view">
          <thead>
            <tr class="bg-blue">

              <th>Category</th>
              <th>Name</th>
              <th>Description</th>


              <th>Status</th>
              <th width="10%">Action</th>

            </tr>


        </thead>
          <tbody id="row">
          @foreach($sub_category as $sd)
            <tr style="page-break-inside: avoid;" tabindex="-1" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" data-content="Created by: {{$sd->created_by}}<br> Created at: {{getFormatedDate($sd->created_at)}} <br> Updated by:{{$sd->updated_by}} <br> Updated at:{{getFormatedDate($sd->updated_at)}}">


              <td>{{$sd->category_name}}</td>
              <td>{{$sd->name}}</td>
                 <td>{{$sd->description}}</td>



              @if($sd->deleted_at==null)
              <td><i class="fa fa-check text-green"></i></td>
              @else
              <td><i class="fa fa-times-circle-o text-red"></i></td>
              @endif

                <td>
                <a href="{{URL::to('/')}}/vidyaaarambha/masters/sub_category/{{$sd->id}}/edit" class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Edit">
                  <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{URL::to('/')}}/vidyaaarambha/masters/sub_category/{{$sd->id}}" class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="View" >
                  <i class="glyphicon glyphicon-eye-open"></i>
                </a>

               @if($sd->deleted_at==null)
                  <a href="{{URL::to('/')}}/vidyaaarambha/masters/sub_category/deactivate/{{$sd->id}}" class="td-action-btn text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Deactivate" onclick="return confirm_delete('Deactivate'); ">
                    <i class="fa fa-lock text-red" style='font-size:18px;'></i>
                  </a>
                @else
                  <a href="{{URL::to('/')}}/vidyaaarambha/masters/sub_category/deactivate/{{$sd->id}}" class="td-action-btn text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Activate" onclick="return confirm_delete('Activate');">
                    <i class="fa fa-lock text-red" style='font-size:18px;'></i>
                  </a>
                @endif
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
    if (!confirm('Do you really want to '+status+'Sub Category?')) {
    return false;
  }
}
</script>
@stop