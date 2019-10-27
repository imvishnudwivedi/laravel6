@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Clients')

@section('page_title', 'Clients')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">List of Clients </h3>
      </div>
      <div class="box-body table-responsive no-padding">

        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="pull-right">

            <a class="btn bg-green margin" href="{{route('vidyaaarambha.masters.clients.create')}}" data-toggle="tooltip" data-placement="bottom" title="Click here to add new terms & condition">
             <i class="glyphicon glyphicon-pencil"></i> Add
           </a>



        </div><div class="clearfix"></div>
        <table class="table table-bordered" id="view">
          <thead>
            <tr class="bg-blue">

              <th>Name</th>

              <th>Domain</th>
             <th>Description</th>
              <th>Status</th>
               <th width="10%">Action</th>
            </tr>

            <tr tr class="bg-blue">

              <th><input type="text" class="form-control filter" data-col="Name"></th>
              <th><input type="text" class="form-control filter" data-col="Domain"></th>
             <th><input type="text" class="form-control filter" data-col="Description"></th>
              <th></th>
              <th></th>


            </tr>
          </thead>
          <tbody>
            @foreach($clients as $prn)
            <tr style="page-break-inside: avoid;" tabindex="-1" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" data-content="Created by: {{$prn->created_by}}<br> Created at: {{($prn->created_at)}} <br> Updated by:{{$prn->updated_by}} <br> Updated at:{{($prn->updated_at)}}">

              <td>{{$prn->name}}</td>
              <td>{{$prn->domain}}</td>
             <td>{!! $prn->description !!}</td>

              @if($prn->deleted_at==null)
              <td><i class="fa fa-check text-green"></i></td>
              @else
              <td><i class="fa fa-times-circle-o text-red"></i></td>
              @endif
              <td>
                <a href="{{URL::to('/')}}/vidyaaarambha/masters/clients/{{$prn->id}}/edit" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                  <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{URL::to('/')}}/vidyaaarambha/masters/clients/{{$prn->id}}" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                  <i class="glyphicon glyphicon-eye-open"></i>
                </a>



                @if($prn->deleted_at==null)
                  <a href="{{URL::to('/')}}/vidyaaarambha/masters/clients/deactivate/{{$prn->id}}" class="td-action-btn text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Deactivate" onclick="return confirm_delete('Deactivate'); ">
                    <i class="fa fa-lock"></i>
                  </a>
                @else
                  <a href="{{URL::to('/')}}/vidyaaarambha/masters/clients/deactivate/{{$prn->id}}" class="td-action-btn text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Activate" onclick="return confirm_delete('Activate');">
                    <i class="fa fa-lock"></i>
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
function no_select(){
  $.notify("Please select row from below table",{
    type:'danger',
  });
}
function confirm_delete(status){
  if (!confirm('Do you really want to '+status+' Clients?')) {
    return false;
  }
}

</script>
@stop