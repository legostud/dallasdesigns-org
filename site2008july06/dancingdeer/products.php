<?php
if(isset($dept)){}else{$dept=1;}
if(isset($pagenumber)){
	if ($pagenumber==0){
		$pagenumber=1;
	}
}			
?>
<?php 
//	call sitelink.PRODUCTSINDEPT(session("clshopper"),session("department"),"","inetsdesc")
//	session("pcount")=sitelink.getdata(session("clshopper"),"prodcount")
?>


<html>
<head>
<META name="description" content="Dancing Deer Baking Company, creators of all natural, fresh baked cakes and cookies.">
<meta name="keywords" content="fresh baked gourmet cookies gourmet cakes brownies cookie cake brownie all natural gourmet kosher cakes food colors shortbread mail order cookies cakes medleys seasonal custom shortbread corporate large gifts canola cookies giant cookies bulk monthly munchie Mexican shortbread mom house kit fine yummy sampler nugget brandy holiday nutmeg bakery online molasses clove chocolate tangerine sugar cane lime peanut butter honey mountain trail mix maple oatmeal raisin double chocolate walnut chocolate chip Munch box painted tin Gift certificates Blueberry sour cream nut Chocolate espresso Deep dark gingerbread Ginger infused lemon cake Lime ricotta pound cake Celebration brownie Ready to bake cookie dough online Deluxe hand-crafted wooden shaker style gift box Party gourmet Chocolate lovers Giant Cookie medley Our pick Medium variety sampler Large variety sampler Cookie sack Vanilla Toffee hearts Tin Gift collection Doghouse Hopeless Rice flour savory sweet biscuits sweet home project">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Dancing Deer Goodies</title>

<link rel="stylesheet" href="include/deerstyle.css" type="text/css">
<script language='JavaScript'>
{
function LoadFrames()
{
	if ( !parent.bottomFrame )
	{
		window.location = "LoadFrameset.asp?page=products.asp?dept="+$department;
	}
}
}
</script>
</head>
<body background="images/bkg-'$department'.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload=LoadFrames()>
<!--#INCLUDE file = "include/top.asp" -->
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="4" width="1147"> 
      <table width="400" border="0" cellspacing="3" cellpadding="3" align="center">
        <tr>
          <td width="261" class="bodytext"> 
              <?
			  $session["shopmore"]='products.asp?dept=$department';
			  $aa=1;
              if ($department==1){
			  ?>
              	<!--#INCLUDE file = "include/text-1.html" -->
              	<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productCookie" border='0' width='1' height='1'>;
              <?
			  }
			  elseif ($department==2){ 
              	<!--#INCLUDE file = "include/text-2.html" -->
              	<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productCake" border='0' width='1' height='1'>;
              }
			  elseif ($department==3){
              	<!--#INCLUDE file = "include/text-3.html" -->
              	<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productMedley" border='0' width='1' height='1'>;
              }
			  elseif ($department==4){
              	<!--#INCLUDE file = "include/text-4.html" -->
              	<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productSeason" border='0' width='1' height='1'>;
	          }
			  elseif ($department==10){
              	<!--#INCLUDE file = "include/text-10.html" -->
              	<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productKids" border='0' width='1' height='1'>;
			  }
              elseif ($department==13){
              	<!--#INCLUDE file = "include/text-13.html"-->
              	<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productBulk" border='0' width='1' height='1'>;
              }
			  elseif ($department==15){
              	<!--#INCLUDE file = "../../dancingdeer/include/text-15.html" -->
            	<p><a href="../../dancingdeer/products.asp?dept=17">Click here</a> for gifts $25-$50</p>;
              	<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productUnder25" border='0' width='1' height='1'>;
              }
			  elseif ($department==17){
              	<!--#INCLUDE file = "include/text-17.html" -->
            	<p><a href="../../dancingdeer/products.asp?dept=15">Click here</a> for gifts under $25</p>;
				<img src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/product25to50" border='0' width='1' height='1'>;
              }
			  else{
			  	$aa=0;
			  }
			  ?>
            </td>
          <td width="112">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td colspan="4" width="1147"> 
      <?if session("pcount")>0 and aa=1 then
      if session("pcount")<session("limitproductdisplay") or session("limitproductdisplay")=0 then
												proddisplay=session("pcount")
												startprod=1
											else
												proddisplay=session("limitproductdisplay")
												startprod=1
											end if
											if session("showthispage")>1 then 
												proddisplay=(session("showthispage")*session("limitproductdisplay"))
												startprod=startprod+((session("showthispage")-1)*session("limitproductdisplay"))
											end if
											if proddisplay>session("pcount") then
												proddisplay=session("pcount")
											end if
											session("mcount")=0
      for x=startprod to proddisplay
		session("temp")=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)
		session("temp2")=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)
		call sitelink.setupproduct(session("clshopper"),session("temp"),session("temp2")) ?>
      <!-- product START -->
      <table cellspacing="3" cellpadding="3" width="400" align="center">
        <tr valign="middle"> 
          <td align="left" width="261" class="bodytext" valign="top"> 
            <p align="left"><span class="producttitle"><a href="../../dancingdeer/prodinfo.asp?number=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)?>&variation=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)?>&aitem=<?=cstr(x)?>&mitem=<?=session("pcount")?>" class="producttitle"> 
              <b> 
              <?  =sitelink.getdata(session("clshopper"),"PRODUCTTITLE") ?>
              </b></a></span><br>
              <?=sitelink.getdata(session("clshopper"),"st_inetshortd")?> <br>
              
            <form method="POST" action="../../dancingdeer/itemadd.asp?additem=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)?>&addqty=<?=session("tempqtyname")?>">
              <table align="right" width="100%">
                <tr> 
                  <td align="left" valign="top" colspan="2" class="bodytext"> 
                    <?rem - check for size color?>
                    <? if sitelink.getdata(session("clshopper"),"SIZECOLORITEM")=0 THEN?>
                    <?call sitelink.buildsizecolorlist(session("clshopper"),session("temp"),session("temp2"))?>
                    	<?if sitelink.getdata(session("clshopper"),"SIZECOLORCOUNT") >0 then?>
                    	<?FOR Y=1 TO sitelink.getdata(session("clshopper"),"SIZECOLORCOUNT")?>
                    		<?if sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),1,1)=session("temp2") then?>
                    		<input type="radio" name="txtvariant" value="<?=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),1,1)?>" checked>
                    		<?=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),2,0)?><br>
                    		<?else?>
                    			<?if Y=1 then?>
                    			<input type="radio" name="txtvariant" value="<?=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),1,1)?>" checked>
                    			<?else?>
                    			<input type="radio" name="txtvariant" value="<?=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),1,1)?>">
                    			<?end if?>
                    		<?=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),2,0)?>&nbsp;<?=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),3,0))?> 
                    		<br>
                    <?end if?>
                    <?next?>
                    <?end if?>
                    <?else?>
                    <span class="bodytext">Price <?=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"PRODUCTPRICE"))?> 
                    </span> 
                    <?end if?>
                  </td>
                </tr>
                <tr> 
                  <td align="middle" valign="top" width="75" class="basketinfo"> 
                    <input type="hidden" name="txtquanto" value="1" size="4" valign="bottom">
                  </td>
                  <td align="middle" valign="top" width="92"> 
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td align="right"> 
                          <input type="image" alt="Add to Cart" src="../../dancingdeer/images/btn-addtocart.gif" valign="bottom" name="I1" border="0">
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </form>
          </td>
          <?session("tempqtyname")="txtquanto"+cstr(x)?>
          <td width="97" align="right" valign="top" class="bodytext">            <a href="../../dancingdeer/prodinfo.asp?number=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)?>&variation=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)?>&aitem=<?=cstr(x)?>&mitem=<?=session("pcount")?>"> 
              <?session("temp")=sitelink.getdata(session("clshopper"),"PRODUCTPICTURE",1)?>
              <?imagename="./images/"+session("temp")?>
              <? if len(trim(session("temp")))>0 then ?>
            </a><a href="../../dancingdeer/prodinfo.asp?number=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)?>&variation=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)?>&aitem=<?=cstr(x)?>&mitem=<?=session("pcount")?>"><img src="<?=imagename?>" width=110 height=110 border="0" hspace="15"></a><a href="../../dancingdeer/prodinfo.asp?number=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)?>&variation=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)?>&aitem=<?=cstr(x)?>&mitem=<?=session("pcount")?>">
              <?else?>
              <img src="../../dancingdeer/images/cookiecake.gif" border="0" width="60" height="60"> 
              <?end if ?>
			  </a>
			  <a href="../../dancingdeer/prodinfo.asp?number=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)?>&variation=<?=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)?>&aitem=<?=cstr(x)?>&mitem=<?=session("pcount")?>">more info...</a>          </td>
        </tr>
      </table>
      <? next ?>
    </td>
  </tr>
  <tr> 
    <td colspan="4" width="1147" class="bodytext"> 
      <?if session("pcount")>session("limitproductdisplay") and session("limitproductdisplay")>0 then ?>
      <?totpages=int(session("pcount")/session("limitproductdisplay")) 
														totpages2=session("pcount")/session("limitproductdisplay")
														if totpages=totpages2 then
															totpages=totpages-1
														end if
														if totpages>100 then
														totpages=99
														end if?>
      <p align="center">&nbsp;Page 
        <?for y=1 to totpages+1?>
        <?if y=int(session("showthispage")) then?>
        <B><?=y?></b> 
        <?else?>
        <A HREF="../../dancingdeer/products.asp?dept=<?=session("department")?>&pagenumber=<?=y?>"><?=y?></A> 
        <?end if?>
        <?if y<totpages+1 then?>
        | 
        <?end if?>
        <?next?>
        <?end if?>
    </td>
  </tr>
  <!-- bottom footer page START -->
  <?else?>
  <table width="100%" border="0">
    <tr> 
      <td ALIGN="LEFT" colspan="2"> No products in selected department/sub-department 
      </td>
      <td align="right"> 
        <input type="hidden" name="TXTQUANTM" value="0" size="4" valign="bottom">
        <input type="hidden" name="TXTQUANTM" value="0" size="4" valign="bottom">
      </td>
    </tr>
  </table>
  <?end if?>
</table>
<table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>