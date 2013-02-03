<?php /* Smarty version 2.6.18, created on 2008-04-02 16:13:58
         compiled from calendar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'calendar.tpl', 7, false),)), $this); ?>
<html>
<head>
<title>Calendar</title>
</head>
<body>
<b><?php echo $this->_tpl_vars['title']; ?>
</b>
<?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['special_days'],'cols' => 7), $this);?>

</body>
</html>