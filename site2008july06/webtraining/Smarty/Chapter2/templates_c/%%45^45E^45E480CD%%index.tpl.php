<?php /* Smarty version 2.6.18, created on 2008-03-26 13:32:20
         compiled from index.tpl */ ?>
<html>
<head> <title> Site Architecture Example </title> 
</head>

<body>

<table border="0" width="100%">
 <tr>
   <td align="left">
     <a href="http://www.packtpub.com">
      <img src="images\PacktLogoSmall.png" border="0">
     </a>
     <img src="images\focused.gif">
   </td>
   <td>
   <h1> Chapter 2 Example </h1>
   </td>
 </tr>
</table> 

<br> 
Here are the books in a two-column table : 
<br> <br>

<table border="1" width="100%">

<?php unset($this->_sections['tbl']);
$this->_sections['tbl']['name'] = 'tbl';
$this->_sections['tbl']['loop'] = is_array($_loop=$this->_tpl_vars['book']->title) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tbl']['show'] = true;
$this->_sections['tbl']['max'] = $this->_sections['tbl']['loop'];
$this->_sections['tbl']['step'] = 1;
$this->_sections['tbl']['start'] = $this->_sections['tbl']['step'] > 0 ? 0 : $this->_sections['tbl']['loop']-1;
if ($this->_sections['tbl']['show']) {
    $this->_sections['tbl']['total'] = $this->_sections['tbl']['loop'];
    if ($this->_sections['tbl']['total'] == 0)
        $this->_sections['tbl']['show'] = false;
} else
    $this->_sections['tbl']['total'] = 0;
if ($this->_sections['tbl']['show']):

            for ($this->_sections['tbl']['index'] = $this->_sections['tbl']['start'], $this->_sections['tbl']['iteration'] = 1;
                 $this->_sections['tbl']['iteration'] <= $this->_sections['tbl']['total'];
                 $this->_sections['tbl']['index'] += $this->_sections['tbl']['step'], $this->_sections['tbl']['iteration']++):
$this->_sections['tbl']['rownum'] = $this->_sections['tbl']['iteration'];
$this->_sections['tbl']['index_prev'] = $this->_sections['tbl']['index'] - $this->_sections['tbl']['step'];
$this->_sections['tbl']['index_next'] = $this->_sections['tbl']['index'] + $this->_sections['tbl']['step'];
$this->_sections['tbl']['first']      = ($this->_sections['tbl']['iteration'] == 1);
$this->_sections['tbl']['last']       = ($this->_sections['tbl']['iteration'] == $this->_sections['tbl']['total']);
?>

 <?php if (!((1 & $this->_sections['tbl']['index']))): ?>

 <tr>
 <?php endif; ?>

 <td align="left">
  <table>
   <tr>
    <td> 
      <img src="images\<?php echo $this->_tpl_vars['book']->image[$this->_sections['tbl']['index']]; ?>
" width="220">
    </td>
 
    <td valign="top">
      <font size=+1><b> <?php echo $this->_tpl_vars['book']->title[$this->_sections['tbl']['index']]; ?>
 </b></font><br> 
      <font size=-1 color=blue><b>  <?php echo $this->_tpl_vars['book']->author[$this->_sections['tbl']['index']]; ?>
 </b></font><br>
      <?php echo $this->_tpl_vars['book']->description[$this->_sections['tbl']['index']]; ?>
 <br>
      Year: <?php echo $this->_tpl_vars['book']->year[$this->_sections['tbl']['index']]; ?>
 <br>
      <font size=-1>Cover Price: <s>$<?php echo $this->_tpl_vars['book']->price[$this->_sections['tbl']['index']]; ?>
</s></font> <br>
      Our Price: $<?php echo $this->_tpl_vars['book']->discounted[$this->_sections['tbl']['index']]; ?>
 
      <font color=red> save <?php echo $this->_tpl_vars['book']->discount[$this->_sections['tbl']['index']]; ?>
 % </font>
    </td>
   </tr>
  </table>
 </td> 

 <?php if ((1 & $this->_sections['tbl']['index'])): ?>

 </tr>
 <?php endif; ?>

<?php endfor; endif; ?>

</table>

</body>

</html>
