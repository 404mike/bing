<html>
<head>
<style type="text/css">
#mij_wrapper{margin: 0 auto;}
#mij_main{position: relative;}
#mij_main img{float: left;}
.mij_container{height:150px;left:517px;position:absolute;top:50px;width:150px;}
.mij_box{width:50px;height: 50px;background-color: black;opacity:0.5;position: absolute;border: 1px solid #fff;left: 50px;top: 50px;}
.mij_info{background-color:black;border:1px solid white;color:white;opacity:1;padding:4px;width:215px;display: block;position: absolute;}
textarea,#show{display: none;margin-top: 10px;}
#howto{margin-bottom: 10px;}
</style>
<script language="javaScript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
// Chrome bug!
// get the width of the image here first
$(window).load(function() {
  var pic = $('#mij_main img');

  pic.removeAttr("width"); 
  pic.removeAttr("height");

  img_width = pic.width() ;
 // alert( pic.height() );
});

jQuery(document).ready(function(){
	num = 1;
	img_width = $('#mij_main img').width();
   $("#mij_main img").click(function(e){
      //left = e.pageX - 85;
     // top = e.pageY - 85;
      
      if(e.pageX > (img_width - 250)) info_left = e.pageX - 261;
      else info_left = e.pageX + 18;
      
      
      info_top = e.pageY - 35;
            
      $("#mij_main").append(
      '<div class="mij_container" id="mij_container'+num+'" style="left:'+(e.pageX - 85)+'px;top:'+(e.pageY - 85)+'px;">\n\t <div class="mij_box" id="mij_box'+num+'"></div>\n </div>\n\n ' +
      ' <a href="#" class="mij_info" id="mij_info'+num+'" style="left:'+info_left+'px;top:'+info_top+'px;"> \n\t' +
      '	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n' +
      ' </a>\n\n');
      
      num++;
   }); 
   
	$('#finish').click(function(){
		res = $('#mij_wrapper').html();
		txt = $('#code');
		txt.val( txt.val() + res);

		$('#code,#show').show();
	});
   
})
</script>
<body>

<div id="mij_wrapper">
	<div id="mij_main">
		<img src="<?php echo $_POST['image']; ?>" />
	</div>
</div>

<div style="clear:both;margin-bottom:10px;"></div>


<div id="howto">
	Click on the image to place your markers then click finish.
</div>


<button id="finish">Finish</button>
<form action="preview.php" method="post">
<textarea id="code" rows="10" cols="90" name="ta">
<script language="javaScript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){

	$('.mij_box').animate({ opacity: 0.4},1000,function(){
		$('.mij_box').animate({ opacity: 0},800);
	});

    $(".mij_container").hover(function() { 
    	num = this.id.replace("mij_container", "");
        $(this).stop(true,true).fadeTo('fast',1);
        $(this).css({'overflow' : 'visible'});
        $('#mij_box'+num).stop(true,true).animate({ opacity: 0.4,}, 300);
    }, function() {         
        $(this).css({overflow: "hidden"});
        $('#mij_box'+num).stop(true,true).animate({ opacity: 0,}, 500);
        $('#mij_info'+num).stop(true,true).ccs({ opacity: 0,display: 'none'});
    });      

	$('.mij_box').mouseenter(function() {
		num = this.id.replace("mij_box", "");
		$('#mij_info'+num).stop(true,true).css({overflow: 'visible',display:'block'});
		$('#mij_info'+num).animate({opacity: 0.7},800);
	}).mouseleave(function(){
		$('#mij_info'+num).stop(true,true).animate({ opacity: 0}, 500,function(){
			$(this).css({display: 'none'});
		});
	});
	
	$('.mij_info').mouseenter(function(){
		num = this.id.replace("mij_info", "");
		$('#'+this.id).stop(true,true).css({ opacity: 0.7,overflow: 'visible',display:'block'});    	
        $(this).stop(true,true).css({'overflow' : 'visible'});
        $(this).css({'overflow' : 'visible'});
        $('#mij_box'+num).stop(true,true).css({ opacity: 0.4});		
	}).mouseleave(function(){
		$('#'+this.id).stop(true,true).css({ opacity: 0,overflow: 'visible',display:'hidden'});
		$(this).css({ opacity: 0.4,display: 'none'});
		$(this).stop(true,true).css({'overflow' : 'visible'});
        $(this).css({'overflow' : 'visible'});
        $('#mij_box'+num).stop(true,true).animate({ opacity: 0},300);		
	});  	
	
});
</script>

<style type="text/css">
#mij_main{margin: 0 auto;position: relative;}
.mij_container{height:150px;left:517px;position:absolute;top:50px;width:150px;overflow: hidden;}
.mij_box{width:50px;height: 50px;background-color: black;opacity:0;position: absolute;border: 1px solid #fff;left: 50px;top: 50px;display: block;}
.mij_info{background-color:black;border:1px solid white;color:white;left:103px;opacity:0;padding:4px;position:absolute;top:48px;width:215px;display: none;}
</style>

</textarea>
<input type="submit" value="Show me what this looks like" id="show" />
</form>






</body>
</html>
