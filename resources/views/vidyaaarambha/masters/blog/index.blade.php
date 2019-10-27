@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Blog')

@section('page_title', 'Blog')

@section('content')

<div class='row' style="padding:2px;">

 <div class="box box-primary">
  <div class="box-header with-border">
   <div class="box-body table-responsive no-padding">


    <div class="clearfix"></div>

    <div class="box-header with-border">
      <h3 class="box-title">List of blogs</h3>
    </div>
    <div class="col-md-12">
      <div class="pull-right">

        <a href="{{route('vidyaaarambha.masters.blog.create')}}" class="btn bg-green margin" data-toggle="tooltip" data-placement="bottom" title="Click here to add" id="add_asset">
         <i class="glyphicon glyphicon-pencil"></i> Add blog
       </a>



     </div><div class="clearfix"></div>


     <table class="table table-bordered" id="view">
      <thead>
        <tr class="bg-blue">
         <th>Title</th>
         <th>Author</th>
         <th>Description</th>
        

         <th width="10%">Action</th>


       </tr>
       <tr tr class="bg-blue">
         <th><input type="text" class="form-control filter" data-col="title" name="filter_type"></th>
         <th><input type="text" class="form-control filter" data-col="author" name="filter_type"></th>
        
         <th><input type="text" class="form-control filter" data-col="description" name="filter_type"></th>


         
       
         <th></th>


       </tr>


     </thead>
     <tbody id="row">
       @foreach($blog as $b)
       <tr>


        <td>{{$b->title}}</td>
        <td>{{$b->author}}</td>
        <td>{{$b->description}}</td>
       

        

        <td>
          <a href="{{URL::to('/')}}/vidyaaarambha/masters/blog/{{$b->id}}/edit" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
            <i class="glyphicon glyphicon-edit"></i>
          </a>

          <a href="{{URL::to('/')}}/vidyaaarambha/masters/blog/{{$b->id}}" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
            <i class="glyphicon glyphicon-eye-open"></i>
          </a>

   <a href="{{URL::to('/')}}/vidyaaarambha/masters/blog/pushblog/{{$b->id}}" class="td-action-btn" id="" data-toggle="tooltip" data-placement="top" title="click push/pull">
                    <i class="glyphicon glyphicon-sort"></i> 
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



//  function confirm_delete(status){
//   if(status){
//     if (!confirm('Do you really want to Activate...?')) {
//       return false;
//     }
//   }else{
//     if (!confirm('Do you really want to Deactivate...?')) {
//       return false;
//     }
//   }
// }

</script>











<script type="text/javascript">
var blog=<?php echo json_encode($blog) ?>;
console.log(blog);

$('#description').val(blog['description']);
$('#details').val(blog['details']);


  $(function(){
   $('[data-toggle="popover"]').popover();


loadTinyMc();
loadTinyMc2();



 });

function validate()
  {
    var flag=1;
    if($('#edit-form').valid()){

      if($('#blog_group_id').val()==0){
        $.notify("Please select blog Group!",{
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
        selector: '#details ',
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