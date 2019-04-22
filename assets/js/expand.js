/*
  author: hasan abedi
  website: ha3an.ir
  github link:
  Date : 2-20-2019
*/

/*
  this file containe function that acting on html element for expand menu
  -----------------------------------------------------------------------
  this code is dependence on jquery-3.3.1
  -----------------------------------------------------------------------
*/

/* function one must get the div and expand it for full screen
    for this must get the screen full size

    funtion change element size to 0 0
      --have transation

    function change element size fo max max
      --have transation
        --must have switch case for diffrence transation

    in button must padd id to funtion

*/
$(document).ready(function(){

//when the element with expandwinid attribute is clicked
//must get the element with the id of expandwinid and read the attr of this
//and than set this attribute to the object

$("[expandwinid]").click(function() {

  //step 1 must get the object id an find the object

  var expandwinid=$(this).attr("expandwinid"); //get the objectid
  var expandobject=$("#"+expandwinid); //find object
/*
  beforewidth="" beforheight="" beforepositiontop="" beforepositionleft=""
  afterwidth="" afterheight="" afterpositiontop="" afterpositionleft=""
  */

  //get the object attribute

  var beforewidth = $(expandobject).attr("beforewidth");
  var beforeheight = $(expandobject).attr("beforeheight");
  var beforepositiontop = $(expandobject).attr("beforepositiontop");
  var beforepositionleft = $(expandobject).attr("beforepositionleft");

  var afterwidth = $(expandobject).attr("afterwidth");
  var afterheight = $(expandobject).attr("afterheight");
  var afterpositiontop = $(expandobject).attr("afterpositiontop");
  var afterpositionleft = $(expandobject).attr("afterpositionleft");

  //if the befor position is null must get the this position to position
  if(beforewidth == ""){
    beforewidth=$(expandobject).width()+"px";
    console.log(beforewidth);
  }
  if(beforeheight == ""){
    beforeheight=$(expandobject).height()+"px";
  }
  if(beforepositiontop == ""){
    beforepositiontop = $(expandobject).position()["top"]+"px";
  }
  if(beforepositionleft == ""){
    beforepositionleft = $(expandobject).position()["left"]+"px";
  }

  //run the attribute

  $(expandobject).css({
                    "position":"absolute",
                    "transition":"all 1s ease",
                    "width": afterwidth,
                    "height": afterheight,
                    "top":afterpositiontop,
                    "left":afterpositionleft
                  });

  //exchange attribute



  $(expandobject).attr({
                  "afterwidth" :beforewidth,
                  "beforewidth":afterwidth,
                  "afterheight":beforeheight,
                  "beforeheight":afterheight,
                  "afterpositiontop":beforepositiontop,
                  "beforepositiontop":afterpositiontop,
                  "afterpositionleft":beforepositionleft,
                  "beforepositionleft":afterpositionleft
                  });

  console.log(expandobject);
});





});

//get the windows height and width
