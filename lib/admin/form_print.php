<?php
function ha_print_admin_form(){
  ?>
  <div class="wrap">
    <form class="" action="#" method="post">


      <table class="form-table">

        <tr>
          <p>

              این صفحه برای تنظیمات خاص تم میباشد

          </p>
        </tr>

        <tr>
          <th>
              <label for="hatellone">
                شماره تلفن اول
               </label>
          </th>
          <td>
              <input id="hatellone" type="text" name="hatellone" class="regular-text code"
                    value="<?php echo get_option("haTellphoneone"); ?>" >
              <p class="description">
                این شماره تلفن در سربرگ و پابرگ نشان داده میشود
              </p>
          </td>
        </tr>

        <tr>
          <th>
              <label for="hatelltwo">
                    شماره تلفن دوم
               </label>
          </th>
          <td>
              <input id="hatelltwo" type="text" name="hatelltwo" class="regular-text code"
                    value="<?php echo get_option("haTellphonetwo"); ?>" >
              <p class="description">
                این شماره تلفن در سربرگ و پابرگ نشان داده میشود
              </p>
          </td>
        </tr>

        <tr>
          <th>
              <label for="haadress">
                    نشانی
               </label>
          </th>
          <td>
              <input id="haadress" type="text" name="haadress" class="regular-text "
                      value="<?php echo get_option("haAdress"); ?>" >
              <p class="description">
                آدرسی که در سربرگ یا پابرگ نمایش داده میشود
              </p>
          </td>
        </tr>

        <tr>
          <th>
              <label for="hainstagram">
                        instagram (url)
               </label>
          </th>
          <td>
              <input id="hainstagram" type="url" name="hainstagram" class="regular-text code"
                      value="<?php echo get_option("hainstagram"); ?>" >
              <p class="description">
                این ادرس برای پیوند به صفحه اینستاگرام شما استفاده میشود
              </p>
          </td>
        </tr>

        <tr>
          <th>
              <label for="hatelegram">
                        telegram (url)
               </label>
          </th>
          <td>
              <input id="hatelegram" type="url" name="hatelegram" class="regular-text code"
                  value="<?php echo get_option("hatelegram"); ?>" >
              <p class="description">
                  این آدرس برای پیوند با صفحه تلگرام شما استفاده میشود
              </p>
          </td>
        </tr>


      </table>
      <p>
          <input type="submit" name="submit" value="ذخیره تغییرات " class="button button-primary">
      </p>

    </form>

  </div>




  <?php
}

function ha_set_default_option(){

  add_option("haTellphoneone","-");
  add_option("haTellphonetwo","-");
  add_option("haAdress","-");
  add_option("hainstagram","http://example.com");
  add_option("hatelegram","http://example.com");


}

function ha_update_option(){

  update_option("haTellphoneone",$_POST['hatellone']);
  update_option("haTellphonetwo",$_POST['hatelltwo']);
  update_option("haAdress",$_POST['haadress']);
  update_option("hainstagram",$_POST['hainstagram']);
  update_option("hatelegram",$_POST['hatelegram']);

}

 ?>
