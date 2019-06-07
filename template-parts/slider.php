<?php
/* Template is for print slider of product
* for use must set the global $ha_slider
*
*/
  global $ha_slider;
  if(!empty($ha_slider)):
?>
    <section class="contianer-fluid d-flex flex-column flex-nowrap mt-3 bg-10">
          <div class="dg-segustion-header p-3 text-right ">
              <div class="f1r5 pr-4 ">
                  <?php echo "موارد مشابه" ?>
              </div>
              <div class="dg-header-underline mt-4"></div>
          </div>

          <div class="container-fluid p-0 d-flex flex-row flex-nowrap justify-content-between overflow-hidden"
            id="<?php echo("sugesttion")  ?>" role="slider" type="protofile" arrang="horizontal"   >
          <div class=" d-flex flex-column justify-content-center" >
            <bottom class="bg-light hover-bg-12 text-12 hover-text-3 py-3 px-2  rounded " role="nextprotofile">
              <i class="fa fa-chevron-right fa-lg"></i>
            </bottom>

          </div>

          <div class="col-9 col-md-11 p-0" >

            <div class="dg-segustion-group py-3 d-flex flex-row flex-nowrap  " role="sliderItemsHolder">
              <?php
              if($ha_slider->have_posts()):

                while($ha_slider->have_posts()):
                    $ha_slider->the_post();
                    get_template_part("template-parts/widget/widget","slidercatitem");
                endwhile;

              else:
                echo "havent eny post";
              endif;


          ?>
          </div> <!-- end [role = sliderItemsHolder]-->

        </div> <!-- end [role = slider] -->
        <div class=" d-flex flex-column justify-content-center" >
          <bottom class="bg-light hover-bg-12 text-12 hover-text-3 py-3 px-2  rounded " role="previousprotofile">
          <i class="fa fa-chevron-left fa-lg"></i>
          </bottom>

        </div>
      </div>
        </section> <!-- end of section -->
<?php endif; //end of !empty($ha_slider) ?>
