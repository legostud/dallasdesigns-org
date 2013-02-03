<html>
<head>
<meta name="GENERATOR" content="Microsoft Visual InterDev 1.0">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>New Products</title>
<link rel="stylesheet" href="include/deerstyle.css" type="text/css">

<body bgcolor="#75a4d2">
<!--#INCLUDE file = "include/top.asp" -->


<form name="custinfoform" method="POST" action="INITORDER.ASP">
  <table width="700" border="0"  cellspacing="0" cellpadding="0" align="center">
    <tr align="left"> 
      <th  colspan="2" class="producttitle" >Create New Products</th>
    </tr>
    <tr> 
      <td width="15%" class="bodytext" >SKU </td>
      <td width="85%" class="smallwhitetext"><input type="text" name="txtfirstname" size="20,1" maxlength="10" value="<% =session("firstname") %>"> 
        &nbsp;* </td>
    </tr>
    <tr> 
      <td class="bodytext">Size</td>
      <td class="bodytext"><input type="text" name="txtphone" size="20,1" maxlength="10" value="<% =session("phone") %>"></td>
    </tr>
    <tr> 
      <td class="bodytext">Title </td>
      <td class="bodytext"><input type="text" name="txtlastname" size="30,1" maxlength="20" value="<% =session("lastname") %>"> 
        <font color="#FFFFFF">*</font></td>
    </tr>
    <tr> 
      <td class="bodytext"> Short Description&nbsp; </td>
      <td class="bodytext"> <input type="text" name="txtcompany" size="50,1" maxlength="40" value="<% =session("company") %>"> 
      </td>
    </tr>
    <tr> 
      <td class="bodytext" > Long Description&nbsp; </td>
      <td class="bodytext"> <input type="text" name="txtaddress1" size="50,1" maxlength="40" value="<% =session("address1") %>"> 
        <font color="#FFFFFF">*</font> </td>
    </tr>
    <tr> 
      <td class="bodytext" > Image Thumb</td>
      <td class="bodytext"> <input type="text" name="txtaddress2" size="50,1" maxlength="40" value="<% =session("address2") %>"> 
      </td>
    </tr>
    <tr> 
      <td class="bodytext" > Image Full</td>
      <td class="bodytext"> <input type="text" name="txtcity" size="25,1" maxlength="20" value="<% =session("city") %>"> 
        <font color="#FFFFFF">*</font> &nbsp;&nbsp;State&nbsp; 
        <!--
        <input type="text" name="txtstate" size="5,1" maxlength="3" value="<% =session("state") %>">
		-->
        <select name="txtstate"  class="plaintext">
          <option value=" " >--Select State-- 
          <option value="AL" <% if session("state")="AL" then response.write("selected") end if %>>Alabama 
          <option value="AK" <% if session("state")="AK" then response.write("selected") end if %>>Alaska 
          <option value="AZ" <% if session("state")="AZ" then response.write("selected") end if %>>Arizona 
          <option value="AR" <% if session("state")="AR" then response.write("selected") end if %>>Arkansas 
          <option value="CA" <% if session("state")="CA" then response.write("selected") end if %>>California 
          <option value="CO" <% if session("state")="CO" then response.write("selected") end if %>>Colorado 
          <option value="CT" <% if session("state")="CT" then response.write("selected") end if %>>Connecticut 
          <option value="DE" <% if session("state")="DE" then response.write("selected") end if %>>Delaware 
          <option value="DC" <% if session("state")="DC" then response.write("selected") end if %>>District 
          of Columbia 
          <option value="FL" <% if session("state")="FL" then response.write("selected") end if %>>Florida 
          <option value="GA" <% if session("state")="GA" then response.write("selected") end if %>>Georgia 
          <option value="HI" <% if session("state")="HI" then response.write("selected") end if %>>Hawaii 
          <option value="ID" <% if session("state")="ID" then response.write("selected") end if %>>Idaho 
          <option value="IL" <% if session("state")="IL" then response.write("selected") end if %>>Illinois 
          <option value="IN" <% if session("state")="IN" then response.write("selected") end if %>>Indiana 
          <option value="IA" <% if session("state")="IA" then response.write("selected") end if %>>Iowa 
          <option value="KS" <% if session("state")="KS" then response.write("selected") end if %>>Kansas 
          <option value="KY" <% if session("state")="KY" then response.write("selected") end if %>>Kentucky 
          <option value="LA" <% if session("state")="LA" then response.write("selected") end if %>>Louisiana 
          <option value="ME" <% if session("state")="ME" then response.write("selected") end if %>>Maine 
          <option value="MD" <% if session("state")="MD" then response.write("selected") end if %>>Maryland 
          <option value="MA" <% if session("state")="MA" then response.write("selected") end if %>>Massachusetts 
          <option value="MI" <% if session("state")="MI" then response.write("selected") end if %>>Michigan 
          <option value="MN" <% if session("state")="MN" then response.write("selected") end if %>>Minnesota 
          <option value="MS" <% if session("state")="MS" then response.write("selected") end if %>>Mississippi 
          <option value="MO" <% if session("state")="MO" then response.write("selected") end if %>>Missouri 
          <option value="MT" <% if session("state")="MT" then response.write("selected") end if %>>Montana 
          <option value="NE" <% if session("state")="NE" then response.write("selected") end if %>>Nebraska 
          <option value="NV" <% if session("state")="NV" then response.write("selected") end if %>>Nevada 
          <option value="NH" <% if session("state")="NH" then response.write("selected") end if %>>New 
          Hampshire 
          <option value="NJ" <% if session("state")="NJ" then response.write("selected") end if %>>New 
          Jersey 
          <option value="NM" <% if session("state")="NM" then response.write("selected") end if %>>New 
          Mexico 
          <option value="NY" <% if session("state")="NY" then response.write("selected") end if %>>New 
          York 
          <option value="NC" <% if session("state")="NC" then response.write("selected") end if %>>North 
          Carolina 
          <option value="ND" <% if session("state")="ND" then response.write("selected") end if %>>North 
          Dakota 
          <option value="OH" <% if session("state")="OH" then response.write("selected") end if %>>Ohio 
          <option value="OK" <% if session("state")="OK" then response.write("selected") end if %>>Oklahoma 
          <option value="OR" <% if session("state")="OR" then response.write("selected") end if %>>Oregon 
          <option value="PA" <% if session("state")="PA" then response.write("selected") end if %>>Pennsylvania 
          <option value="RI" <% if session("state")="RI" then response.write("selected") end if %>>Rhode 
          Island 
          <option value="SC" <% if session("state")="SC" then response.write("selected") end if %>>South 
          Carolina 
          <option value="SD" <% if session("state")="SD" then response.write("selected") end if %>>South 
          Dakota 
          <option value="TN" <% if session("state")="TN" then response.write("selected") end if %>>Tennessee 
          <option value="TX" <% if session("state")="TX" then response.write("selected") end if %>>Texas 
          <option value="UT" <% if session("state")="UT" then response.write("selected") end if %>>Utah 
          <option value="VT" <% if session("state")="VT" then response.write("selected") end if %>>Vermont 
          <option value="VA" <% if session("state")="VA" then response.write("selected") end if %>>Virginia 
          <option value="WA" <% if session("state")="WA" then response.write("selected") end if %>>Washington 
          <option value="WV" <% if session("state")="WV" then response.write("selected") end if %>>West 
          Virginia 
          <option value="WI" <% if session("state")="WI" then response.write("selected") end if %>>Wisconsin 
          <option value="WY" <% if session("state")="WY" then response.write("selected") end if %>>Wyoming 
        </SELECT> <font color="#FFFFFF">*</font>&nbsp;&nbsp;Zip Code&nbsp; <input type="text" name="txtzipcode" size="10,1" maxlength="10" value="<% =session("zipcode") %>"> 
        <font color="#FFFFFF">*</font> </td>
    </tr>
    <tr> 
      <td class="bodytext" > Active </td>
      <td class="bodytext"> <SELECT NAME="billtocountry" >
          <%=sitelink.listcountries(session("ordernumber"),session("clshopper"),"B")%> 
        </SELECT> </td>
    </tr>
    <tr> 
      <td class="bodytext" >E-Mail&nbsp; </td>
      <td class="bodytext"> <input type="text" name="txtemail" size="50,1" maxlength="60" value="<% =session("email") %>"> 
        <font color="#FFFFFF">*</font> </td>
    </tr>
  </table>
<table width="700" border="0" align="center">
	<tr>
	  <td align="left" valign="bottom">&nbsp;</td>
	  <td align="center" valign="bottom" >&nbsp;</td>
	  <td align="right" valign="bottom" >&nbsp;</td>
    </tr>
	<tr>
	  <td width="25%" align="left" valign="bottom">
	  <%if len(trim(session("shopmore")))=0 then 
					response.write("<a href=""Javascript:history.go(-1)"">")
				 else
				 	aa = "<a href=" + session("shopmore") + ">"
				 	response.write(aa)
				end if%>
              <img src="images/btn-shopmore.gif" border="0">
              <% response.write("</a>") %>
	  </td>
	  <td width="50%" height="35" align="center" valign="bottom" ><a href="basket.asp"><img src="images/btn-modify-cart.gif" width="68" height="24" border="0"></a> </td>
	  <td width="25%" align="right" valign="bottom" ><input name="Image" type="Image" value="Total" src="images/btn-contcheckout.gif" alt="Continue Checkout" border="0"></td>
	</tr>
</table>

</form>	
<!-- webbot bot="HTMLMarkup" startspan -->
<!-- BEGIN WEBSIDESTORY CODE -->
<!-- COPYRIGHT 1997-2001 WEBSIDESTORY, INC. ALL RIGHTS RESERVED. U.S.PATENT PENDING. Privacy notice at: http://websidestory.com/privacy -->
<script language="javascript">
var _pn="Customer+Information";    //page name(s)
var _mlc="/checkout";  //multi-level content category
var _cp="null"; //campaign
var _acct="WE530313J9DA41EN3"; 	//account number(s)
var _pndef="title"; //default page name
var _ctdef="full"; //default content category
var _prc="<%=session("emailtotal")%>"; //commerce price
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
src="https://phg.hitbox.com/HG?hc=wp179&cd=1&hv=6&ce=u&hb=WE530313J9DA41EN3&n=Customer+Information&vcon=/checkout" border='0' width='1' height='1'>
</noscript>
<!--//-->
<!--  END WEBSIDESTORY CODE  -->
<!-- webbot bot="HTMLMarkup" endspan -->
</body>
</html>