<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $this->_var['charset']; ?>" />
<title>商城后台 </title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<link href="templates/style/zx/font/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="templates/style/zx/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
var menu = <?php echo $this->_var['menu_json']; ?>;
</script>

<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/index.js'; ?>" charset="utf-8"></script>
</head>
<body>
<div class="back_nav">
    <div class="back_nav_list">
    <?php $_from = $this->_var['back_nav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'menu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['menu']):
?>
        <dl>
            <dt><?php echo $this->_var['menu']['text']; ?></dt>
            <?php $_from = $this->_var['menu']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sub_key', 'sub_menu');if (count($_from)):
    foreach ($_from AS $this->_var['sub_key'] => $this->_var['sub_menu']):
?>
            <dd><a href="javascript:;" onclick="openItem('<?php echo $this->_var['sub_key']; ?>','<?php echo $this->_var['key']; ?>');none_fn();"><?php echo $this->_var['sub_menu']['text']; ?></a></dd>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </dl>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <div class="shadow"></div>
    <div class="close_float"><img src="templates/style/images/close2.gif" /></div>
</div>
<div id="head">
    <div id="logo"><a href="index.php"><img src="templates/style/images/logo.png" alt="" /></a></div>
    <div id="license"></div>    
    <div id="menu"><span>您好，<strong><?php echo $this->_var['visitor']['user_name']; ?></strong> <a href="index.php?act=logout" class="nav-icon-item"><i class="fa fa-sign-out"></i></a> <a href="<?php echo $this->_var['site_url']; ?>/index.php" target="_blank" class="nav-icon-item"><i class="fa fa-home"></i></a></span>
    <a href="javascript:;"  id="iframe_refresh" class="nav-icon-item"><i class="fa fa-refresh"></i></a>
    <a href="javascript:;" id="clear_cache" class="nav-icon-item"><i class="fa fa-trash"></i></a>
    </div>
    <ul id="nav">
    </ul>
    <div id="headBg"></div>
</div>
<div id="content">
    <div id="left">
        <div id="leftMenus">
            <dl id="submenu">
                <dt><i class=" fa fa-th-list"></i><a class="" id="submenuTitle" href="javascript:;"></a></dt>
            </dl>
            <dl id="history" class="history">
                <dt>
                    <i class="fa fa-clock-o"></i><a class= id="historyText" href="#">操作历史</a>
                </dt>
            </dl>
         </div>
    </div>
    <div id="right">
        <iframe frameborder="0" style="display:none;" width="100%" id="workspace"></iframe>
    </div>
</div>


<script type="text/javascript">
   

</script>
<style type="text/css">
    #logo {left:10px;}
</style>
</body>
</html>
