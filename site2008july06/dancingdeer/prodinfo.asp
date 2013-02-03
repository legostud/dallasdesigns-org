<!--#INCLUDE FILE = "../../dancingdeer/include/momapp.asp" -->

<% rem make call to define all product properties%>
<%  call sitelink.setupproduct(session("clshopper"),cstr(REQUEST.QUERYSTRING("number")),cstr(REQUEST.QUERYSTRING("variation"))) %>

<HTML><HEAD>
<TITLE>Dancing Deer Baking Company - Main Page</TITLE>
<META http-equiv="description" content="Dancing Deer Baking Company, creators of all-natural, fresh baked cakes and cookies.">
<META http-equiv="keywords" content="fine cakes and cookies, chocolate tangerine cookies, molasses clove cookies, sugar cane lime cookies, canola cookie sampler, Lavender Scented and Mexican Chocolate Shortbread, cookie medley, holiday cookies, shortbread nugget collection, cakes, blueberry sourcream nut cake, Brandy Holiday Nutmeg cake, Chocolate Expresso Pound cake, Deep Dark Gingerbread cake, Ginger Infused Lemon cake, Lime Ricotta Cake, Maple Pumpkin Cranberry cake, A Tim of Hearts for Mom, Earth Grown Food Colors, Gingerbread Cookie Tin, Gingerbread House Kit, corporate gifts, fine gifts, yummy cookies, yummy cakes, fine baking">
<meta HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../dancingdeer/include/deerstyle.css" type="text/css">
<script language="JavaScript">
function openWindow0ref() 
{   
  popupWin = window.open('viewNutrionInfo.asp?item=<%=REQUEST.QUERYSTRING("number")%>', '', 'top=100,left=150,resizable,width=535,height=235')		
}
</script>
<!-- <script language="javascript" type="text/javascript">
// frameJammer_hp v3.3.1 framestuffer
if (window.name!='mainFrame' && window.name!='booker_'
		 && !((self.innerHeight == 0) && (self.innerWidth == 0)))
		top.location.replace('prodinfo-frame.asp?prodinfo.asp~mainFrame');
// frameJammer_hp End
</script> -->
</head>
<body background="../../dancingdeer/images/prodinfo-bkg.gif">
<!--#INCLUDE FILE = "../../dancingdeer/include/top.asp" -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="../../dancingdeer/images/prodinfo-timeforsweets.gif" width="448" height="132"></td>
  </tr>
</table>
<table border="0" cellspacing="0" width="750" cellpadding="0">
  <tr> 
    <td width="900">
      <form method="POST" action="../../dancingdeer/basket.asp?ADDITEM=<%=sitelink.getdata(session("clshopper"),"PRODUCTNUMBER",0,0,1)%>&addqty=%27txtquanto%27&size=%27txtvariant%27">
        <table width="100%" border="0"  cellpadding="10" cellspacing="0" >
          <tr > 
            <td valign="top" class="bodytext" > 
              <%session("temp")=sitelink.getdata(session("clshopper"),"PRODUCTPICTURE")%>
              <%imagename="./images/"+session("temp")%>
              <% if len(trim(session("temp")))>0 then %>
              <img src="<%=imagename%>" border="1" > 
              <%else%>
              No image. 
              <%end if %>
              <table width="230" border="0">
                <tr> 
                  <td align="left" width="109"> 
                    <%  =sitelink.previousbutton2(session("clshopper"),cstr(REQUEST.QUERYSTRING("number")),cstr(REQUEST.QUERYSTRING("variation")),cstr(request.querystring("aitem")),cstr(request.querystring("mitem")),session("department")) %>
                  </td>
                  <td align="center" width="24"><img src="../../dancingdeer/images/Prodinfo-More.gif" width="38" height="11"> 
                  </td>
                  <td align="right" width="110"> 
                    <%  =sitelink.nextbutton2(session("clshopper"),cstr(REQUEST.QUERYSTRING("number")),cstr(REQUEST.QUERYSTRING("variation")),cstr(request.querystring("aitem")),cstr(request.querystring("mitem")),session("department")) %>
                  </td>
                </tr>
              </table>

            </td>
            <td valign="top" align="center" > 
              <table border="0" cellpadding="5" cellspacing="0" width="100%">
                <tr> 
                  <td valign="top" align="left" class="bodytext"><!-- b --> <span class="producttitle">
                    <% =sitelink.getdata(session("clshopper"),"PRODUCTTITLE") %>
                    </span> <br>
                    <%=sitelink.getdata(session("clshopper"),"PRODUCTDESCRIPTION") %><!-- /b --></td>
                </tr>
                <tr> 
                  <td valign="top" align="left" class="bodytext"> 
                    <!-- <p>
                    <b>Retail Price:</b> <strike> 
                    <%if session("showcomparativeprice")="TRUE" then%>
                    <%IF sitelink.getdata(session("clshopper"),"st_inetcprice")>0 THEN %>
                    <%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"st_inetcprice"))%> 
                    <%else%>
                    - - 
                    <%END IF	
						end if%>
                    </strike><br>
                    -->
                   <table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <%rem - check for size color%>
                      <% if sitelink.getdata(session("clshopper"),"SIZECOLORITEM")=0 THEN%>
							 <%call sitelink.buildsizecolorlist(session("clshopper"),cstr(REQUEST.QUERYSTRING("number")),cstr(REQUEST.QUERYSTRING("variation")))%>
							  <%if sitelink.getdata(session("clshopper"),"SIZECOLORCOUNT") >0 then%>
							     <tr> 
						         <td></td>
						       </tr>
						       <tr> 
						         <td class="bodytext"> 
							        <%session("notbright")=0%>
							     <%FOR X=1 TO sitelink.getdata(session("clshopper"),"SIZECOLORCOUNT")%>
			                          <%if sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),1,1)=cstr(request.querystring("variation")) then%>
						              <input type="radio" name="txtvariant" value="<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),1,1)%>" checked>
									  <%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),2,0)%>&nbsp;
									  <% if sitelink.getdata(session("clshopper"),"SPECIALPRICEITEM")=0 THEN%>
                          			  	<a href="../../dancingdeer/specialprices.asp?item=<%=sitelink.getdata(session("clshopper"),"PRODUCTNUMBER",0,0,1)%>&variation=&size=%27txtvariant%27"><%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"PRODUCTPRICE"))%></a> 
			                          <%else%>
            			              <%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"PRODUCTPRICE"))%> 
                        			  <%end if%>
									  <%session("notbright")=session("notbright")+1
									  if session("notbright")=2 then
										session("notbright")=0%>
									<br>
										<%else%>
										&nbsp;&nbsp;
										<%end if%>
			                          <%else%>
										<%if x=1 then%>
									  <input type="radio" name="txtvariant" value="<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),1,1)%>" checked>
										<%else%>
										<input type="radio" name="txtvariant" value="<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),1,1)%>">
										<%end if%>
                    					<%=sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),2,0)%>&nbsp;<%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"gasizecolor",cint(x),3,0))%> 

									  <%session("notbright")=session("notbright")+1
									  if session("notbright")=2 then
										session("notbright")=0%>
									<br>
										<%else%>
										&nbsp;&nbsp;
										<%end if%>
									  <%end if%>
                                <%next%>
                                <font color="#FFFFFF">
                                <%else%>
                                </font>								   </td>
								</tr>
								<%end if%>
							
							<%else%>
							<tr>
							
                        <td class="bodytextbold"> <b><font color="#000000">Price</font></b> 
                          <font color="#FFFFFF"> 
                          <% if sitelink.getdata(session("clshopper"),"SPECIALPRICEITEM")=0 THEN%>
                          <!--<a href="specialprices.asp?item=<%=sitelink.getdata(session("clshopper"),"PRODUCTNUMBER",0,0,1)%>&amp;variation=&amp;size='txtvariant'"><%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"PRODUCTPRICE"))%></a> -->
                          
                          <%=FORMATCURRENCY(sitelink.getdata(session("clshopper"),"PRODUCTPRICE"))%> 
                          <%end if%>
                          </font> </td>
					</tr>
					
							
							<%end if%>	


                                                
                       <!--   <%rem - check for special pricing%>
                          <% if sitelink.getdata(session("clshopper"),"SPECIALPRICEITEM")=0 THEN%> 
                      <tr> 
                        <td></td>
                      </tr>
                      <tr> 
                        <td colspan="3" class="bodytext"><a href="specialprices.asp?item=<%=sitelink.getdata(session("clshopper"),"PRODUCTNUMBER",0,0,1)%>&amp;variation=&amp;size='txtvariant'">Special 
                          prices available</a></td>
                      </tr>
                      <%END IF %> -->
                      <%rem - check for custom information%>
                      <% if sitelink.getdata(session("clshopper"),"st_inetcustom")=0 THEN%>
                      <tr> 
                        <td colspan="3" class="bodytext"><%=sitelink.getdata(session("clshopper"),"st_inetcprmpt",0,0,0)%></td>
                      </tr>
                      <tr> 
                        <td colspan="3" class="bodytext"> 
                          <textarea name="txtcustominfo" cols="30" rows="2"></textarea>
                          <%else%>
                          <input type="hidden" name="txtcustominfo" value=" ">
                          <%END IF %>
                    </table>
                  </td>
                </tr>
              </table>
              <table border="0" cellspacing="0" width="100%" cellpadding="5">
                <tr> 
                  <td width="100%"> 
                    <table border="0"  cellpadding="2" cellspacing="0">
                      <tr> 
                        <td class="bodytext"> 
                          <p align="left"><b>Quantity: </b> 
                            <input type="text" name="txtquanto" value="1" size="5" maxlength="5" valign="bottom" >
                            &nbsp;</p>
                        </td>
                        <td valign="middle"> 
                          
                            
                          <input type="image" alt="Add to Cart" src="../../dancingdeer/images/btn-addtocart.gif" valign="bottom" name="I1" border="0">
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
<!-- webbot bot="HTMLMarkup" startspan -->
<!-- BEGIN WEBSIDESTORY CODE -->
<!-- COPYRIGHT 1997-2001 WEBSIDESTORY, INC. ALL RIGHTS RESERVED. U.S.PATENT PENDING. Privacy notice at: http://websidestory.com/privacy -->
<script language="javascript">
var _pn="Product+Details";    //page name(s)
var _mlc="/prodInfo";  //multi-level content category
var _cp="null"; //campaign
var _acct="WE530313J9DA41EN3"; 	//account number(s)
var _pndef="title"; //default page name
var _ctdef="full"; //default content category
var _prc="<%=sitelink.getdata(session("clshopper"),"PRODUCTTITLE")%>"; //commerce price
var _oid="<%=session("ordernumber")%>"; //commerce order id
var _epg="n"; //event page identifier
var _mn="wp179";			//machine name
var _gn="phg.hitbox.com";			//gateway name
var _dt,_oe=0,_et=0,_ss="na",_sc="na",_ln="na",_pl="",_ce="",_ja="na",_rf,_bn;
var _bv,_ar,_we;function _ex(v){return escape(v)};var _hcv=68,_ot=0;
function _wn(n){return((n.indexOf("NAME")>0&&n.indexOf("PUT")>-1)||
(n.indexOf("CONTENT")>-1&&n.indexOf("CATEGORY")>0))};function _gd(x,w){var _ed=
x.lastIndexOf("/");var _be=(w!="full")?x.lastIndexOf("/",_ed-2):x.indexOf("/");
return(_be==_ed)?"/":x.substring(_be,_ed);};function _gf(x){return x.substring(
x.lastIndexOf("/")+1,x.length);};function _tc(_ml){var _mll=_ml.length-1;var s=
"/";if(_ml.lastIndexOf(s)==(_mll-1)){_ml=_ml.substring(0,_mll-1)}if(_ml.indexOf
(s)!=0){_ml=s+_ml;_mll++}if(_mll){var a=_ml.substring(1,_mll).indexOf(s);if(a<0
)return _ml;var b=_ml.substring(a+2,_mll).indexOf(s);if(b<0)return _ml;if(b>-1)
{if(!b)b--;return _ml.substring(0,a+2+b);}};return _ml;};var _hL=location;var
_lp=(_hL.protocol.indexOf('https')>-1)?'https://':'http://';function _ps(_ip,_pml
){return(_ip&&_wn(_pml))?((_pndef=="title"&&document.title!="")?document.title:
_gf(_hL.pathname)?_gf(_hL.pathname):_pndef):_tc(_wn(_pml)?_gd(_hL.pathname,
_ctdef):_pml)};function _pm(m,_fml,h){if(m.indexOf(";")>-1){_nml=m.substring(0,
m.indexOf(";"));_rm=m.substring(m.indexOf(";")+1,m.length);_fml+=_ps(h,_nml)+";"
return _pm(_rm,_fml,h);}else{return _fml+_ps(h,m);}};var _sv=10;var _hN=navigator
var _bn=_hN.appName;if(_bn.substring(0,9)=="Microsoft"){_bn="MSIE";};var _bv=(
Math.round(parseFloat(_hN.appVersion)*100));if(_bn=="MSIE"&&(parseInt(_bv)==2))
_bv=301;function _ex(v){return escape(v)};function _sb(_k){eval("var _gt=/(\\w"+
"*\\.)*(\\w*\\.)/i;");_gt.exec(_hL.hostname);var _fr="co.com.org.net.";if(
_fr.indexOf(RegExp.$2)>-1){eval("var _uf=/(\\w*\\.)*(\\w*\\.)(\\w*\\.)/;");
_uf.exec(_hL.hostname);}if((_k.href.indexOf(RegExp.$2)<0)&&(_k.protocol!="java"+
"script:")){if(_bn=="Netscape"){_hk=_k.href;setTimeout("_hbi.src=_ar+'&el='+es"+
"cape(_hk);",1);}else{_hbi.src=_ar+"&el="+escape(_k.href);}}return true;};
function _ri(_k,_w,_i){_fl=_gf(_k.pathname);if(_fl!=""){var _pt=new RegExp("\."+
".?html?|\.asp|\.cfm|\.jsp|\.cgi|\.php[3-4]?|\.pl|\.taf|\.dll","i");if(
(!_pt.test(_fl))&&(_fl.indexOf(".")>-1)){if(_bn=="Netscape"){setTimeout("_hbi."+
"src=_ar+'&fn='+escape(_fl);",1);}else{_hbi.src=_ar+"&fn="+escape(_fl);}}else{
_sb(_k);}}else{_sb(_k);}if(_w.li&&_w.li[_i]&&_w.li[_i].oc){return _w.li[_i].oc()
}else{return true};};function _it(){if(_ot)_wo();_lo=new Object();_lo.li=
new Array(document.links.length);for(var i=0;i<document.links.length;i++){
if(document.links[i].onclick){_lo.li[i]=document.links[i];_lo.li[i].oc=
document.links[i].onclick;}eval("document.links[i].onclick=function(){return _"+
"ri(this,_lo,"+i+");}");}};function _cr(_x,_w){_ed=(_w=="*")?
_x.indexOf("*"):_x.length;if(_x.indexOf("CP=")>=0){_be=_x.indexOf("CP=")+3}else{
return"null";}return _x.substring(_be,_ed);}var _rf=_ex(document.referrer);_mlc=
_pm(_mlc,"",0);_pn=_pm(_pn,"",1);</script>
<script language="javascript1.1">_sv=11
_dt=(new Date()).getHours();_lm=Date.parse(document.lastModified);if(_bn=="MSIE"
&&(_bv>=400)){_ln=_hN.userLanguage;}if(_bn=="Netscape"){if(_bv>=400)_ln=
_hN.language;if(_bv>300)for(var i=0;i<_hN.plugins.length;i++)
_pl+=_hN.plugins[i].name+":"};if(_hL.search&&_cp=="null"){_cp=_cr(location.search,
"x")};if(document.cookie.indexOf("CP=")>-1){_ce="y";_hd=_cr(document.cookie,"*")
if((_hd!="null")&&(_cp=="null")){_cp=_hd;}else{document.cookie="CP="+_cp+"*; p"+
"ath=/; expires=Wed, 1 Jan 2020 00:00:00 GMT";}}else{document.cookie="CP="+_cp+
"*; path=/; expires=Wed, 1 Jan 2020 00:00:00 GMT";_ce=(document.cookie.indexOf(
"CP=")>-1)?"y":"n";};_ja=_hN.javaEnabled()?"y":"n";</script>
<script
language="javascript1.2">_sv=12;_ss=screen.width+"*"+screen.height;_sc=
(_bn=="MSIE")?screen.colorDepth:screen.pixelDepth;if(_sc=="undefined")_sc="na"
</script>
<script language="javascript1.3">_sv=13;</script>
<script
language="javascript">var _zo=(new Date()).getTimezoneOffset();_ar=_lp+_gn+"/H"+
"G?hc="+_mn+"&hb="+_acct+"&n="+escape(_pn)+"&cd=1&hv=6&bn="+_ex(_bn)+"&"+
"bv="+_bv+"&ce="+_ce+"&ss="+_ss+"&sc="+_sc+"&dt="+_dt+"&sv="+_sv+"&vcon="+_ex(
_mlc)+"&cp="+_ex(_cp)+"&epg="+_epg+"&lm="+_lm+"&zo="+_zo+"&ja="+_ja+"&ln="+_ln+
"&prc="+_ex(_prc)+"&oid="+_ex(_oid)+"&pl="+_ex(_pl)+"&rf=";</script>
<script
language="javascript1.1">function _re(_ms,_ur,_el){return false;}function _se(
_ms,_ur,_el){if((_rf=="undefined")||(_rf=="")){_rf="bookmark";};if(_et){
window.onerror=_we;}else{window.onerror=_re;};_oe=1;_ar+=_rf+"&ec=1";(new
Image()).src=_ar;return true;}_imac=(_hN.userAgent.indexOf('Mac')>-1)?1:0;_iie5=
(_hN.userAgent.indexOf('MSIE 5')>-1)?1:0;if(!_imac){if(window.onerror){_we=
window.onerror;_et=1;};};window.onerror=_se;if(_iie5){eval("try{_rf=escape(top"+
".document.referrer)+\"\";}catch(_e){_rf=escape(document.referrer)+\"\";}");}
else{if(top.document){_rf=escape(top.document.referrer)+"";}};</script>
<script
language="javascript">if(!_oe){if((_rf=="undefined")||(_rf==""))_rf="bookmark";
if(_et){window.onerror=_we;}else{window.onerror=_re;};if(_sv<11){_t2="<img src='"+
_ar;_t3="' border=0 height=1 width=1>";document.write(_t2+_rf+_t3);}else{
_hbi=new Image();_is=_ar+_rf;_hbi.src=_is;}if((_sv>11)&&(!_imac)){
if(window.onload){_wo=window.onload;_ot=1;};window.onload=_it;}document.write(
"<\!--");}</script>
<noscript>
<img 
src="https://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Product+Details&vcon=/ProdInfo" border='0' width='1' height='1'>
</noscript>
<!--//-->
<!--  END WEBSIDESTORY CODE  -->
<!-- webbot bot="HTMLMarkup" endspan -->

</body>
</html>