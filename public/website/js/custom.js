jQuery(function($) {'use strict',
    //copyrights year
    today=new Date();
   year=today.getFullYear();
   var start=2019;
   if(year>start){
       $('#c_year').text(start+' - '+year);
   }else{
       $('#c_year').text(start);
   }
   if(year<start){
       $('#c_year').text(start);
   }
 });

    //#main-slider
    $('#submit').on('click', function() {
        console.log('called');
        var fname = $('#p_name').val();
        var subject = $('#p_subject').val();
        var email = $('#p_email').val();
        var tele = $('#p_phone').val();
        var message = $('#p_message').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!regex.test(email)) {
            alert('Please enter valid email');
            return false;
        }

        fname = $.trim(fname);
        subject = $.trim(subject);
        email = $.trim(email);
        tele = $.trim(tele);
        message = $.trim(message);

        if (fname != '' && email != '' && tele != '') {
            var values = "fname=" + fname + "&subject=" + subject + "&email=" + email + " &tele=" + tele+ " &message=" + message;
            $.ajax({
                type: "POST",
                url: "mail.php",
                data: values,
                success: function() {
                    $('#p_name').val('');
                    $('#p_subject').val('');
                    $('#p_email').val('');
                    $('#p_phone').val('');
                    $('#p_message').val('');

                    $('.cf-msg').fadeIn().html('<div class="alert alert-success"><strong>Success!</strong> Email has been sent successfully.</div>');
                    setTimeout(function() {
                        $('.cf-msg').fadeOut('slow');
                    }, 4000);
                }
            });
        } else {
            $('.cf-msg').fadeIn().html('<div class="alert alert-danger"><strong>Warning!</strong> Please fillup the informations correctly.</div>')
        }
        return false;
    });