<?php /* Smarty version 2.6.28, created on 2014-08-09 06:29:12
         compiled from department.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'load_presentation_object', 'department.tpl', 2, false),)), $this); ?>
<?php echo smarty_function_load_presentation_object(array('filename' => 'department','assign' => 'obj'), $this);?>

<h1 class="title"><?php echo $this->_tpl_vars['obj']->mName; ?>
</h1>
<p class="description"><?php echo $this->_tpl_vars['obj']->mDescription; ?>
</p>
Place list of products here