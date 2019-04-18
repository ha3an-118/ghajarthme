<!--          footer part                        -->
<footer class="continer-fluid dg-footer">

  <div class="d-flex flex-row flex-nowrap">

    <div class="col-4 text-right text-light py-5" id="aboutusfooter">

        <!-- <div class="h4">
            این یک تست برای درباره ما است
        </div>
        <article class="text-justify">
          لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا
        </article> -->

        <?php dynamic_sidebar("footer1"); ?>


    </div>
    <div class="col-4 text-right py-5" id="contactus">


        <div class="d-flex flex-row flex-nowrap justify-content-start" id="footerphone">

            <div class="col-2 d-flex justify-content-center">

                <div class="align-self-center">
                  <i class="fa fa-2x fa-phone text-1 "></i>
                </div>

            </div>

            <div class="col-9 d-flex flex-column justify-content-center align-items-start">
                <a  href="tellto:<?php echo get_option("haTellphoneone"); ?>"class="pr-3 text-light" target="_blank">
                    <?php echo get_option("haTellphoneone"); ?>
                </a>
                <a  href="tellto:<?php echo get_option("haTellphonetwo"); ?>"class="pr-3 text-light" target="_blank">
                  <?php echo get_option("haTellphonetwo"); ?>
                </a>

            </div>

        </div>


        <div class="d-flex flex-row flex-nowrap justify-content-start mt-2" id="footerphone">

          <div class="col-2 d-flex justify-content-center ">

              <div class="align-self-center">
                <i class="fa fa-2x fa-map-marker text-1"></i>
              </div>

          </div>


          <div class="col-9 d-flex flex-column justify-content-center">


            <div class="align-self-center">
              <span class="pr-3 text-light"> <?php echo get_option("haAdress"); ?></span>
            </div>



          </div>



        </div>
        <div class="pt-3">
          <form class="" action="index.html" method="post">
            <label for="submiteournews" class="h4 text-light"> عضویت در خبر نامه</label>
            <input id="submiteournews" type="text" name="" value="" class=" w-100">
          </form>
        </div>

        <div class="d-flex flex-row flex-wrap justify-content-center mt-3">

          <div class="mx-2">

              <a href="<?php echo get_option("hainstagram"); ?>" target="_blank">
                  <i class="fab fa-4x fa-instagram text-1"></i>
              </a>

          </div>
          <div class="mx-2">

              <a href="<?php echo get_option("hatelegram"); ?>" target="_blank" >
                  <i class="fab fa-4x fa-telegram text-1"></i>
              </a>

          </div>

        </div>
        <?php //dynamic_sidebar("footer2"); ?>

    </div>
    <div class="col-4">

        <!-- <div class="">
          google.map
        </div> -->
        <?php dynamic_sidebar("footer3"); ?>

    </div>
  </div>

</footer>







</body>
</html>
