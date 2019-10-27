@extends('vidyaaarambha.layouts.dashboard')

@section('title', 'Clients')

@section('page_title', 'Clients')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Clients here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::open(array('route' => array('vidyaaarambha.masters.clients.store'), 'method' => 'POST','files'=>true,'id'=>'add-form','onsubmit'=>'return validate()'))!!}


          <div class="col-md-4">
            <div class="form-group @if($errors->first('name')) has-error @endif">
             {!!Form::label('name','Name *')!!}
             {!!Form::text('name',Input::old('name'),['class' => 'form-control required','id'=>'name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Name","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('name') }}</small>
           </div>
         </div>
         <div class="col-md-4">
            <div class="form-group @if($errors->first('domain')) has-error @endif">
             {!!Form::label('domain','domain *')!!}
             {!!Form::text('domain',Input::old('domain'),['class' => 'form-control required','id'=>'domain',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter domain","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('domain') }}</small>
           </div>
         </div>

         <div class="col-md-12">
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" placeholder="Enter Description" name="description" id="description">  </textarea>
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
        <a href="{{URL::route('vidyaaarambha.masters.clients.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
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

  $(function(){
   $('[data-toggle="popover"]').popover();

   loadTinyMc();

 });


  //image upload
  $('#upload_btn').click(function(){
    console.log(11111111);
    var formData = new FormData($('#add-form')[0]);

    var ajax = $.ajax({
      type: 'post',
      url:'{{URL::route("vidyaaarambha.masters.clients.uploadClientsImg")}}',

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
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help fontselect fontsizeselect',
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
