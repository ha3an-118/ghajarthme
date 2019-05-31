<div id="hasendcomment" class="comment"
  beforewidth="100%" beforeheight="0" beforepositiontop="0" beforepositionleft="0"
  afterwidth="100%" afterheight="100%" afterpositiontop="0" afterpositionleft="0" >
  <div class="container">
    <button type="button" class="btn ha-btn m-2" expandwinid="hasendcomment">
      <i class="fa fa-times fa-2x text-8 hover-bg-1"></i>
    </button>

  </div>

    <form class="container" >
      <div class="d-flex flex-column text-Center justify-content-center form-group">


        <label for="" class="text-center flg text-10">
              ارسال نظر
        </label>
        <div class="form-group">
          <div class="form-row justify-content-between">
              <div class="col-9">
                <input class="p-2 bg-10 text-12  form-control "
                    type="text" name="hacontactlink" value="" placeholder="پست الکترونیک یا شماره تماس ">
              </div>
              <div class="col-3">
                <input class="btn form-control p-2 bg-4 text-12 dg-footer-input"
                      type="button" name="submit" placeholder="ارسال" value="ارسال" onclick="sendMessagAjax()">
              </div>

          </div>


        </div>
        <div class="form-group">
          <textarea  class="p-2 bg-10 text-12 dg-footer-input form-control "
              name="hamessage" rows="8" cols="" width="100%" placeholder="پیغام خود را بنویسید"></textarea>

        </div>
          <input type="hidden" name="postid" value="<?php echo the_id() ?>">

      </div>
    </form>
  </div>
<script type="text/javascript">

  function sendMessagAjax(){
    var data = {
                'action': 'save_message',
                'link' : $('[name=hacontactlink]').val(),
                'message' : $('[name=hamessage]').val(),
                'postid'  : $('[name=postid]').val(),
              };

    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    //ajaxurl = "http://localhost/wordpress/wp-admin/admin-ajax.php";
    //ajaxurl = my_ajax_obj.ajax_url;
    ajaxurl = '<?php echo get_bloginfo("wpurl")."/wp-admin/admin-ajax.php";  ?>';
    jQuery.post(ajaxurl, data, function(response) {
          if(response != '0'){
            alert('پیام شما ثبت شده است  -- '+response);
            $("[expandwinid=hasendcomment]").first().click();
          }
          else{
            alert("خطایی رخ داده است با تیم پشتیبانی تماس بگیرید یا دوباره امتحان کنید");
          }
    });
  }

</script>
