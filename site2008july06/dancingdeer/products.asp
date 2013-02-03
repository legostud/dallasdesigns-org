

<%on error resume next%>
<!--#INCLUDE file = "../../dancingdeer/include/momapp.asp" -->
<%	session("department")=cstr(REQUEST.QUERYSTRING("dept"))
	session("showthispage")=request.querystring("pagenumber")
	if session("showthispage")=0 then
		session("showthispage")=1
	end if		
%>
<% 

	call sitelink.PRODUCTSINDEPT(session("clshopper"),session("department"),"","inetsdesc")
	session("pcount")=sitelink.getdata(session("clshopper"),"prodcount")%>


<html>
<head>
<META name="description" content="Dancing Deer Baking Company, creators of all natural, fresh baked cakes and cookies.">
<meta name="keywords" content="fresh baked gourmet cookies gourmet cakes brownies cookie cake brownie all natural gourmet kosher cakes food colors shortbread mail order cookies cakes medleys seasonal custom shortbread corporate large gifts canola cookies giant cookies bulk monthly munchie Mexican shortbread mom house kit fine yummy sampler nugget brandy holiday nutmeg bakery online molasses clove chocolate tangerine sugar cane lime peanut butter honey mountain trail mix maple oatmeal raisin double chocolate walnut chocolate chip Munch box painted tin Gift certificates Blueberry sour cream nut Chocolate espresso Deep dark gingerbread Ginger infused lemon cake Lime ricotta pound cake Celebration brownie Ready to bake cookie dough online Deluxe hand-crafted wooden shaker style gift box Party gourmet Chocolate lovers Giant Cookie medley Our pick Medium variety sampler Large variety sampler Cookie sack Vanilla Toffee hearts Tin Gift collection Doghouse Hopeless Rice flour savory sweet biscuits sweet home project">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Dancing Deer Goodies</title>

<link rel="stylesheet" href="../../dancingdeer/include/deerstyle.css" type="text/css">
<script language="JavaScript">

function LoadFrames()
{
	if ( !parent.bottomFrame ) {
		page = "products.asp?dept="+<%=	session("department")%> ;		
		window.location = "LoadFrameset.asp?page="+page ;
	}
}

</script>
<!-- webbot bot="HTMLMarkup" startspan -->
<!-- BEGIN WEBSIDESTORY CODE -->
<!-- COPYRIGHT 1997-2001 WEBSIDESTORY, INC. ALL RIGHTS RESERVED. U.S.PATENT PENDING. Privacy notice at: http://websidestory.com/privacy -->
<script language="javascript">
var _pn="Dancing+Deer+Goodies";    //page name(s)
var _mlc="/product";  //multi-level content category
var _cp="null";   //campaign
var _acct="WE530313J9DA41EN3"; 	//account number(s)
var _pndef="title";  //default page name
var _ctdef="full";   //default content category
var _prc="";   //commerce price
var _oid="";   //commerce order
var _dlf="";   //download filter
var _elf="";   //exit link filter
var _epg="";   //event page identifier
var _mn="wp179";			//machine name
var _gn="phg.hitbox.com";			//gateway name
var _hcv=68;function _wn(n){return((n.indexOf("NAME")>0&&n.indexOf("PUT")>-1)||
(n.indexOf("CONTENT")>-1&&n.indexOf("CATEGORY")>0))};function _gd(x,w){var _ed=
x.lastIndexOf("/");var _be=(w!="full")?x.lastIndexOf("/",_ed-2):x.indexOf("/");
return(_be==_ed)?"/":x.substring(_be,_ed);};function _gf(x){return x.substring(
x.lastIndexOf("/")+1,x.length);};function _tc(_ml){var _mll=_ml.length-1;var s=
"/";if(_ml.lastIndexOf(s)==(_mll-1)){_ml=_ml.substring(0,_mll-1)}if(_ml.indexOf
(s)!=0){_ml=s+_ml;_mll++}if(_mll){var a=_ml.substring(1,_mll).indexOf(s);if(a==
-1)return _ml;var b=_ml.substring(a+2,_mll).indexOf(s);if(b==-1)return _ml;if(b
!=-1){if(!b)b--;return _ml.substring(0,a+2+b);}};return _ml;};var _hl=location;
var _lp=_hl.protocol.indexOf('https')>-1?'https://':'http://';var _zo=(new Date
()).getTimezoneOffset();function _ps(_ip,_pml){return(_ip&&_wn(_pml))?((_pndef
=="title"&&document.title!="")?document.title:_gf(_hl.pathname)?_gf(
_hl.pathname):_pndef):_tc(_wn(_pml)?_gd(_hl.pathname,_ctdef):_pml)};function
_pm(m,_fml,h){if(m.indexOf(";")!=-1){_nml=m.substring(0,m.indexOf(";"));_rm=
m.substring(m.indexOf(";")+1,m.length);_fml+=_ps(h,_nml)+";";return _pm(_rm,
_fml,h);}else{return _fml+_ps(h,m);}};var _sv=10;var _hn=navigator;var _bn=
_hn.appName;if(_bn.substring(0,9)=="Microsoft"){_bn="MSIE";};var _bv=(
Math.round(parseFloat(_hn.appVersion)*100));if((_bn=="MSIE")&&(parseInt(_bv)==2
))_bv=301;function _ex(v){return escape(v)};var _rf=_ex(document.referrer);
_mlc=_pm(_mlc,"",0);_pn=_pm(_pn,"",1);</script><script language="javascript1.1">
_sv=11;</script><script defer src="http://stats.hitbox.com/js/hbp.js"
language="javascript1.1"></script><script language="javascript">if(_sv<11){if(
document.cookie.indexOf("CP=")>-1){_ce="y";}else{document.cookie="CP=null*; p"+
"ath=/; expires=Wed, 1 Jan 2020 00:00:00 GMT";_ce=(document.cookie.indexOf(
"CP=")!=-1)?"y":"n";};if((_rf=="undefined")||(_rf=="")){_rf="bookmark";};_x2=
"<img src='"+_lp+_gn+"/HG?hc="+_mn+"&hb="+_ex(_acct)+"&n="+_ex(_pn);_x3="&cd="+
"1&hv=6' border=0 height=1 width=1>";_ar="&bn="+_ex(_bn)+"&bv="+_bv+"&ce="+_ce+
"&ss=na&sc=na&ja=na&sv="+_sv+"&con="+_ex(_mlc)+"&vcon="+_ex(_mlc)+"&epg="+_epg+
"&hp=u&cy=u&dt=&ln=na&cp="+_ex(_cp)+"&pl=&prc="+_ex(_prc)+"&oid="+_ex(_oid)+""+
"&rf="+_rf;document.write(_x2+_ar+_x3);}document.write("<\!--");</script>
<noscript>
<!-- (more code in the if statements the individual departments END WEBSIDESTORY CODE  -->
<!-- webbot bot="HTMLMarkup" endspan -->
</head>

<% 
  ' this is when there is no dept number. This is just to get the background color ..
  ' This is done because when  the user empties the basket it is doing history(-2) and when it is loading
  ' the products page with no dept number it does not load the background color.
  if len(session("department")) = 0  then 
    session("department")= "1"
  end if
   
 %>
<body background="images/bkg-<%=cint(session("department"))%>
.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload=LoadFrames()>
<!--INCLUDE FILE = "include/sidebar.asp" -->
<!--#INCLUDE file = "../../dancingdeer/include/top.asp" -->
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="4" width="1147"> 
      <table width="400" border="0" cellspacing="3" cellpadding="3" align="center">
        <tr>
          <td width="261" class="bodytext"> 
            <p>
              <% aa=0 %>
              <% if session("department")="1" then%>
              <%session("shopmore") = cstr("products.asp?dept=1")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-1.html" -->
              <img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productCookie" border='0' width='1' height='1'></noscript>
              <!--//-->
              <% end if %>
              <% if session("department")="2" then%>
              <%session("shopmore") = cstr("products.asp?dept=2")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-2.html" -->
              <img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productCake" border='0' width='1' height='1'></noscript>
              <!--//-->
              <% end if %>
              <% if session("department")="3" then%>
              <%session("shopmore") = cstr("products.asp?dept=3")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-3.html" -->
              <img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productMedley" border='0' width='1' height='1'></noscript>
              <!--//-->
              <% end if %>
              <% if session("department")="4" then%>
              <%session("shopmore") = cstr("products.asp?dept=4")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-4.html" -->
              <img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productSeason" border='0' width='1' height='1'></noscript>
              <!--//-->
              <% end if %>
              <% if session("department")="10" then%>
              <%session("shopmore") = cstr("products.asp?dept=10")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-10.html" -->
              <img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productKids" border='0' width='1' height='1'></noscript>
              <!--//-->
              <% end if %>
              <% if session("department")="13" then%>
              <%session("shopmore") = cstr("products.asp?dept=13")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-13.html" -->
              <img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productBulk" border='0' width='1' height='1'></noscript>
              <!--//-->
              <% end if %>
              <% if session("department")="15" then%>
              <%session("shopmore") = cstr("products.asp?dept=15")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-15.html" -->
            </p>
            <p><a href="../../dancingdeer/products.asp?dept=17">Click here</a> for gifts $25-$50<img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/productUnder25" border='0' width='1' height='1'></noscript> 
              <!--//-->
              <% end if %>
              <% if session("department")="17" then%>
              <%session("shopmore") = cstr("products.asp?dept=17")%>
              <% aa=1 %>
              <!--#INCLUDE file = "../../dancingdeer/include/text-17.html" -->
            </p>
            <p><a href="../../dancingdeer/products.asp?dept=15">Click here</a> for gifts under $25<img
src="http://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Dancing+Deer+Goodies&vcon=/product25to50" border='0' width='1' height='1'></noscript> 
              <!--//-->
              <%	end if%>
            </p></td>
          <td width="112">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td colspan="4" width="1147"> 
      <%if session("pcount")>0 and aa=1 then
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
		call sitelink.setupproduct(session("clshopper"),session("temp"),session("temp2")) %>
      <!-- product START -->
      <table cellspacing="3" cellpadding="3" width="400" align="center">
        <tr valign="middle"> 
          <td align="left" width="261" class="bodytext" valign="top"> 
            <p align="left"><span class="producttitle"><a href="../../dancingdeer/prodinfo.asp?number=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)%>&variation=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)%>&aitem=<%=cstr(x)%>&mitem=<%=session("pcount")%>" class="producttitle"> 
              <b> 
              <%  =sitelink.getdata(session("clshopper"),"PRODUCTTITLE") %>
              </b></a></span><br>
              <%=sitelink.getdata(session("clshopper"),"st_inetshortd")%> <br>
              
            <form method="POST" action="../../dancingdeer/itemadd.asp?additem=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)%>&addqty=<%=session("tempqtyname")%>">
              <table align="right" width="100%">
                <tr> 
                  <td align="left" valign="top" colspan="2" class="bodytext"> 
                    <%rem - check for size color%>
                    <% if sitelink.getdata(session("clshopper"),"SIZECOLORITEM")=0 THEN%>
                    <%call sitelink.buildsizecolorlist(session("clshopper"),session("temp"),session("temp2"))%>
                    	<%if sitelink.getdata(session("clshopper"),"SIZECOLORCOUNT") >0 then%>
                    	<%FOR Y=1 TO sitelink.getdata(session("clshopper"),"SIZECOLORCOUNT")%>
                    		<%if sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),1,1)=session("temp2") then%>
                    		<input type="radio" name="txtvariant" value="<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),1,1)%>" checked>
                    		<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),2,0)%><br>
                    		<%else%>
                    			<%if Y=1 then%>
                    			<input type="radio" name="txtvariant" value="<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),1,1)%>" checked>
                    			<%else%>
                    			<input type="radio" name="txtvariant" value="<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),1,1)%>">
                    			<%end if%>
                    		<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),2,0)%>&nbsp;<%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"gasizecolor",cint(y),3,0))%> 
                    		<br>
                    <%end if%>
                    <%next%>
                    <%end if%>
                    <%else%>
                    <span class="bodytext">Price <%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"PRODUCTPRICE"))%> 
                    </span> 
                    <%end if%>
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
          <%session("tempqtyname")="txtquanto"+cstr(x)%>
          <td width="97" align="right" valign="top" class="bodytext">            <a href="../../dancingdeer/prodinfo.asp?number=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)%>&variation=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)%>&aitem=<%=cstr(x)%>&mitem=<%=session("pcount")%>"> 
              <%session("temp")=sitelink.getdata(session("clshopper"),"PRODUCTPICTURE",1)%>
              <%imagename="./images/"+session("temp")%>
              <% if len(trim(session("temp")))>0 then %>
            </a><a href="../../dancingdeer/prodinfo.asp?number=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)%>&variation=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)%>&aitem=<%=cstr(x)%>&mitem=<%=session("pcount")%>"><img src="<%=imagename%>" width=110 height=110 border="0" hspace="15"></a><a href="../../dancingdeer/prodinfo.asp?number=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)%>&variation=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)%>&aitem=<%=cstr(x)%>&mitem=<%=session("pcount")%>">
              <%else%>
              <img src="../../dancingdeer/images/cookiecake.gif" border="0" width="60" height="60"> 
              <%end if %>
			  </a>
			  <a href="../../dancingdeer/prodinfo.asp?number=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),1,1)%>&variation=<%=sitelink.getdata(session("clshopper"),"GAPRODS",cint(x),4,1)%>&aitem=<%=cstr(x)%>&mitem=<%=session("pcount")%>">more info...</a>          </td>
        </tr>
      </table>
      <% next %>
    </td>
  </tr>
  <tr> 
    <td colspan="4" width="1147" class="bodytext"> 
      <%if session("pcount")>session("limitproductdisplay") and session("limitproductdisplay")>0 then %>
      <%totpages=int(session("pcount")/session("limitproductdisplay")) 
														totpages2=session("pcount")/session("limitproductdisplay")
														if totpages=totpages2 then
															totpages=totpages-1
														end if
														if totpages>100 then
														totpages=99
														end if%>
      <p align="center">&nbsp;Page 
        <%for y=1 to totpages+1%>
        <%if y=int(session("showthispage")) then%>
        <B><%=y%></b> 
        <%else%>
        <A HREF="../../dancingdeer/products.asp?dept=<%=session("department")%>&pagenumber=<%=y%>"><%=y%></A> 
        <%end if%>
        <%if y<totpages+1 then%>
        | 
        <%end if%>
        <%next%>
        <%end if%>
    </td>
  </tr>
  <!-- bottom footer page START -->
  <%else%>
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
  <%end if%>
</table>
<table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>