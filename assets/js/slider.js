$(document).ready(function(){

  initSliders();

  //add event listener

  //add action for next slide
  $("[role=sliderNextPrev] [role=nextslide]").click(function(){

      sliderId=$(this).parents("[role=slider]").attr("id");
      sliderSlideNext(sliderId);

  });
  //add action for previous slide
  $("[role=sliderNextPrev] [role=prevslide]").click(function(){

      sliderId=$(this).parents("[role=slider]").attr("id");
      sliderSlidePre(sliderId);

  });
  //add action for change slide to special slide
  $("[role=sliderPaginations] li").click(function(){

    sliderId = $(this).parents("[role=slider]").attr("id");

    slideIndex = $(this).attr("sliderIndex");
    sliderSlideSpecial(sliderId,slideIndex);

  });

  $("[role=nextprotofile]").click(function(){
    sliderId=$(this).parents("[role=slider]").attr("id");
    protofileNext(sliderId);
  });
  $("[role=previousprotofile]").click(function(){
    sliderId=$(this).parents("[role=slider]").attr("id");
    protofilePrev(sliderId);
  });


});

function initSliders(){
  // IDEA: this funciton must hide all slider in document
  // step1: hide all slideritems;
  // step2 show the first slide of sliders
  // step3 show next and repat it

  //step1
  $("[role=slider] [role=sliderItemHolder]").hide();
  //step2
  var sliders=$("[role=slider]");

  for(i=0;i<sliders.length;i++){
    //show the 1st slide of each slider
    //step 1 must get the slides of each sliders
    //step 2 show the first of the slide

    // IDEA: must check the slider type if is protofile must go to protofile init
    // <div class="" id="test" role="slider"  pagination="true" type="protofile" arrang="vertical" >

    // //if have horizontal/vertical get width/height of the box and than valculate
    // //the number of slide can show in the one slide
    //
    // //check for arrangement attribute if have it than go the protofile function
    // var arrang = $(sliders[i]).attr("arrangement");
    //
    // if( typeof(arrang) !== "undefined" ) {
    //
    //   if(arrang=="vertical"||arrang=="horizontal"){
    //      // TODO: set the attr index
    //
    //      // IDEA: using last slided showed attr for continuation the scroling
    //      $(sliders[i]).attr("showingslidenum","0");
    //      protofileSlider(sliderId);
    //    }
    //
    // }

    var sliderId = $(sliders[i]).attr("id");
    if(sliderId === undefined | sliderId == ""){
      window.console.error("you must set the id for your slider,slider index ="+i);
      return;
    }

    var type = $(sliders[i]).attr("type");

    if( type !== undefined){

        if(type == "protofile"){

          initProtofile(sliderId);

        }

    }
    else {
      slidesOfSlider=$(sliders[i]).find("[role=sliderItemHolder]");
      $(slidesOfSlider[0]).show();
      $(sliders[i]).attr("showingslidenum","0");
    }



    //check if have sycle attr must active the sycle

    if($(sliders[i]).attr("cycle")) {
      sliderId=$(sliders[i]).attr("id");
      timeInterval = $(sliders[i]).attr("cycle");
      sliderCycle(sliderId,timeInterval);
    }
    //for any slider that have pagination attr must add pagination

      if($(sliders[i]).attr("pagination")) {
          $(sliders[i]).find("[role=sliderPaginations]").append("<ul></ul>");

          slides=$(sliders[i]).find("[role=sliderItemHolder]");

          for(slideCounter=0;slideCounter<slides.length;slideCounter++){

            //if want to add content can add it in the listElemnt
            listElement='<li sliderIndex="'+slideCounter+'" class="">'+'</li>';
              $(sliders[i]).find("[role=sliderPaginations] ul").append(listElement);
          }

          sliderPaginations= $(sliders[i]).find("[role=sliderPaginations] li");

          $(sliderPaginations[0]).addClass("activeslide");

      }


  }

}//end of init sliders


function sliderSlideNext(sliderid){
  //get the slider id and show the next slide
  sliderID = "#"+sliderid; //make the sliderid as real ID

  //get the what's slide is showing now  number
  var showingSlideNum=$(sliderID).attr("showingslidenum");
  showingSlideNum = Number(showingSlideNum);//convert to integer

  //get the slide number
  lengthOfSlider=$(sliderID).find("[role=sliderItemHolder]");
  sliderLength=$(lengthOfSlider).length;

  //if have n slide than the showingSlideNum can not be grater than n-1
  //therefor must check it and change it
  if(sliderLength-1 <= showingSlideNum){
    nextSlide=0;
  }
  else{
    nextSlide=showingSlideNum+1;
  }


  var showingSlide=$(sliderID).find("[role=sliderItemHolder]");
  $(showingSlide[showingSlideNum]).hide();
  $(showingSlide[nextSlide]).show();
  //if pagination is active than must change active class to it
  if( $(sliderID).attr("pagination") ){
        //get the pagination li remove the active class and add active calss
        sliderPaginations = $(sliderID).find("[role=sliderPaginations] li");
        $(sliderPaginations[showingSlideNum]).removeClass("activeslide");
        $(sliderPaginations[nextSlide]).addClass("activeslide");
  }

  $(sliderID).attr("showingslidenum",nextSlide);

}

function sliderSlidePre(sliderid){
  //get the slider id and show the next slide
  sliderID = "#"+sliderid; //make the sliderid as real ID

  //get the what's slide is showing now  number
  var showingSlideNum=$(sliderID).attr("showingslidenum");
  showingSlideNum = Number(showingSlideNum);//convert to integer

  //get the slide number
  lengthOfSlider=$(sliderID).find("[role=sliderItemHolder]");
  sliderLength=$(lengthOfSlider).length;

  //if have n slide than the showingSlideNum can not be grater than n-1
  //therefor must check it and change it
  if( 0 >= showingSlideNum){
    preSlide=sliderLength-1;
  }
  else{
    preSlide=showingSlideNum-1;
  }


  var showingSlide=$(sliderID).find("[role=sliderItemHolder]");
  $(showingSlide[showingSlideNum]).hide();
  $(showingSlide[preSlide]).show();
  //if pagination is active than must change active class to it
  if( $(sliderID).attr("pagination") ){
        //get the pagination li remove the active class and add active calss
        sliderPaginations = $(sliderID).find("[role=sliderPaginations] li");
        $(sliderPaginations[showingSlideNum]).removeClass("activeslide");
        $(sliderPaginations[preSlide]).addClass("activeslide");
  }




  $(sliderID).attr("showingslidenum",preSlide);

}

function sliderSlideSpecial(sliderid,slideNum){

  sliderID = "#"+sliderid; //make the sliderid as real ID
  slideNum = Number(slideNum);

  var showingSlideNum=$(sliderID).attr("showingslidenum");
  showingSlideNum = Number(showingSlideNum);//convert to integer

  var showingSlide=$(sliderID).find("[role=sliderItemHolder]");

  $(showingSlide[showingSlideNum]).hide();
  $(showingSlide[slideNum]).show();
  //if pagination is active than must change active class to it
  if( $(sliderID).attr("pagination") ){
        //get the pagination li remove the active class and add active calss
        sliderPaginations = $(sliderID).find("[role=sliderPaginations] li");
        $(sliderPaginations[showingSlideNum]).removeClass("activeslide");
        $(sliderPaginations[slideNum]).addClass("activeslide");
  }

  $(sliderID).attr("showingslidenum",slideNum);


}

function sliderCycle(sliderid,time){
  //this function make sycle on slider
  //need slider id and time for sycle

  //step 1 - make next to slider
  //step 2 - make time interval for sliding

  //convert time from string to nomber
  time = Number(time);

  sliderSlideNext(sliderid);
  setTimeout(function(){sliderCycle(sliderid,time)},time);


}


// ------------------------------ protofile parents

function initProtofile(sliderId){
  // TODO: must initialize the slider that in protofile mode
  var sliderID = "#"+sliderId;

  // IDEA: know how many slide must showen
  var slidePoint = Number( slidePointCalculat(sliderId) );
  var sliderSize = $(sliderID).find("[role=sliderItemHolder]").length;
  var slideIndex = 0;
  var slides = $(sliderID).find("[role=sliderItemHolder]");

  for(slideIndex=0 ;slideIndex<slidePoint && slideIndex<sliderSize;slideIndex++){
    $(slides[slideIndex]).show();
    // TODO: must show the slide and set the attr
  }
  setAttrProtofile(sliderId ,0,slideIndex-1);


}

function slidePointCalculat(sliderId){
  // calulate how many slide can show in slider

  var sliderID = "#"+sliderId;
  var sliderArrang = $(sliderID).attr("arrang");
  var acceptedArrang = ["vertical" ,"horizontal"];
  if(sliderArrang === undefined){
    var msg = "you must set arrang attr for slider have protofile type";
    window.console.error(msg);
    window.console.error($(sliderID));
    return;
  }

  if(!acceptedArrang.includes(sliderArrang)){
    var msg = "your arrang is not in correct value,the value must be in  ";
    window.console.warn(msg);
    window.console.warn(acceptedArrang);
  }

  var totalHolder = $(sliderID).find("[role=sliderItemsHolder]");
  if( totalHolder === undefined){
    var msg="the sliderItemsHolder is not define";
    window.console.error(msg);
    return;
  }
  var componentHolder = $(sliderID).find("[role=sliderItemHolder]");
  if( componentHolder === undefined){
    var msg="the sliderItemHolder is not define";
    window.console.error(msg);
    return;
  }
  else {
    componentHolder =$(componentHolder)[0];
  }

  var totalPoint = (sliderArrang == acceptedArrang[0])? $(totalHolder).height() : $(totalHolder).width();

  var componentPoint =(sliderArrang == acceptedArrang[0])? $(comonnentHOlder).height() : $(componentHolder).width()

  var sliderPoint = Math.floor(totalPoint/componentPoint);

  return sliderPoint;

}

function changeProtofileSlide(sliderId, hideIndex ,showIndex){
  // TODO: must hide and show and set the attr of the slider
  var sliderID = "#" + sliderId;
  var slides = $(sliderID).find("[role=sliderItemHolder]");

  $(slides[hideIndex]).hide();
  $(slides[showIndex]).show();


}

function setAttrProtofile(sliderId , startSlide , endSlide){
  // TODO: must set the fist slide show and last slide show attr
  var sliderID = "#" + sliderId;
  $(sliderID).attr("startSlide",startSlide);
  $(sliderID).attr("endSlide",endSlide);

}

function protofieCycle(sliderId){
  // TODO: must set sycle protofile slider
}

function protofileNext(sliderId){
    // TODO: must change one step next in protofile
    var sliderID = "#" + sliderId;

    var slideNumbers = $(sliderID).find("[role=sliderItemHolder]").length;

    var startSlideIndex = Number($(sliderID).attr("startSlide"));
    var endSlideIndex = Number($(sliderID).attr("endSlide"));

    if (endSlideIndex < slideNumbers-1){
      var newStartSlideIndex = startSlideIndex+1;
      var newEndSlideIndex = endSlideIndex+1;
    }
    else{
      return;
    }

    changeProtofileSlide(sliderId , startSlideIndex , newEndSlideIndex);
    setAttrProtofile(sliderId , newStartSlideIndex , newEndSlideIndex);

}

function protofilePrev(sliderId){
  // TODO: must change slider one step back in protofile
  var sliderID = "#" + sliderId;

  var slideNumbers = $(sliderID).find("[role=sliderItemHolder]").length;

  var startSlideIndex = Number($(sliderID).attr("startSlide"));
  var endSlideIndex = Number($(sliderID).attr("endSlide"));

  if (startSlideIndex > 0){
    var newStartSlideIndex = startSlideIndex-1;
    var newEndSlideIndex = endSlideIndex-1;
  }
  else{
    return;
  }

  changeProtofileSlide(sliderId , endSlideIndex , newStartSlideIndex  );
  setAttrProtofile(sliderId , newStartSlideIndex , newEndSlideIndex);
}
