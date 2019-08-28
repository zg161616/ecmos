<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>
<meta name="author" content="" />



<link href="<?php echo $this->res_base . "/" . 'css/ecmall.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/jimcommon.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/jimstyle.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/style.css'; ?>" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/header.css'; ?>" rel="stylesheet" />

<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/nav.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/kissy.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/switchable/switchable-pkg.js'; ?>"></script>

<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';

//]]>
</script>

<style type="text/css">
.allcate{display:none;}
.lia{background: #88766e; color:#fff; width: 210px;}
</style>
<?php echo $this->_var['_head_tags']; ?>
<!--<editmode></editmode>-->
</head>

<body>
<div class="scroll-nav">
    <ul>      
      <?php $_from = $this->_var['hot_keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'keyword');if (count($_from)):
    foreach ($_from AS $this->_var['keyword']):
?>
      <li><a href="<?php echo url('app=search&keyword=' . $this->_var['keyword']. ''); ?>" title="<?php echo $this->_var['keyword']; ?>"><?php echo $this->_var['keyword']; ?></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
</div>

  <div class="top-bg">
      <div class="top fontsimsun clearfix">
          <div class="login_info">您好,<a href="<?php echo url('app=member'); ?>"><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></a>
            <?php if (! $this->_var['visitor']['user_id']): ?>
            [<a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">登录</a>]
            [<a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a>]
            <?php else: ?>
            [<a href="<?php echo url('app=member&act=logout'); ?>">退出</a>]
            <?php endif; ?> </div>
            <ul class="quick-menu">
              <li class="item">
                <div class="menu mytb"><a class="menu-hd" href="<?php echo url('app=member'); ?>">用户中心<b></b></a>
                  <div class="menu-bd">
                    <div class="menu-bd-panel">
                      <div>
                    <?php if ($this->_var['visitor']['store_id']): ?>
                    <p><a href="<?php echo url('app=my_goods'); ?>">商品管理</a></p>
                    <p><a href="<?php echo url('app=seller_order'); ?>">订单管理</a></p>
                    <p><a href="<?php echo url('app=my_qa'); ?>">咨询管理</a></p>
                    <?php else: ?>
                    <p><a href="<?php echo url('app=buyer_order'); ?>">我的订单</a></p>
                    <p><a href="<?php echo url('app=buyer_groupbuy'); ?>">我的团购</a></p>
                    <p><a href="<?php echo url('app=my_question'); ?>">我的咨询</a></p>
                    <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="service"><a href="<?php echo url('app=article&code=' . $this->_var['acc_help']. ''); ?>" title="">帮助中心</a></li>
              <li class="service"><a href="<?php echo url('app=message&act=newpm'); ?>" title="站内消息">站内消息<?php if ($this->_var['new_message']): ?>(<?php echo $this->_var['new_message']; ?>)<?php endif; ?></a></li>
              <li class="item">
                <div class="menu favorite"><a class="menu-hd" href="<?php echo url('app=my_favorite'); ?>" title="收藏夹">收藏夹<b></b></a>
                  <div class="menu-bd">
                    <div class="menu-bd-panel">
                      <div>
                        <p><a href="<?php echo url('app=my_favorite&type=goods'); ?>" title="收藏的商品">收藏的商品</a></p>
                        <p><a href="<?php echo url('app=my_favorite&type=store'); ?>" title="收藏的店铺">收藏的店铺</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="service"><a href="<?php echo url('app=cart'); ?>" title="">购物车</a></li>
            </ul>
        </div>
    </div>


<div class="header">
  <div class="w1200 clearfix">
      <h1 class="logo fl mt15" title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>" width="236" height="70" alt="<?php echo $this->_var['site_title']; ?>"></a></h1>
      <form method="GET" action="<?php echo url('app=search'); ?>">
        <div class="soso fl mt30 clearfix">
        <div class="search-type clearfix">
            <div class="float-left btn-type" style="margin-bottom: 0px;border-bottom: 0px;">
                <a href="javascript:;" class="current-soso" id="index">搜索商品</a>
                <a href="javascript:;" id="store" style="border-left: 0;border-right: 0;">搜索店铺</a>
                <a href="javascript:;" id="groupbuy">搜索团购</a>
            </div>
            <input type="hidden"  id="act"name="act" value="index" />
        </div>
            <input type="text" class="soso-input fl" value="<?php echo $_GET['keyword']; ?>" name="keyword">
            <input type="hidden" name="app" value="search" />
            <input type="submit" class="soso-btn fontyahei fl" value="搜索">
        </div>
      </form>
        <div class="tel fr mt25"><img src="data/files/mall/template/tel.jpg" width="225" height="59" alt=""></div>
  </div>
  <div class="clr"></div>
    
    <div class="global-nav mt15">
        <div class="w1200" style=" position:relative;">
          <div class="tiao1">
            <a href="<?php echo url('app=category'); ?>" style="color: #fff;"><div class="tiao fontpyahei fontsize14 fl"><strong>所有商品分类</strong><span></span></div></a>
            
                <div class="allcate">
                    <ul>
                      <?php $_from = $this->_var['header_gcategories']['gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
                      <?php if ($this->_foreach['fe_category']['iteration'] <= 12): ?>
                        <li <?php if ($this->_foreach['fe_category']['iteration'] % 2 == 0): ?>class="li1"<?php endif; ?>>
                          
                          <a href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>" title="<?php echo $this->_var['gcate_list']['cate_name']; ?>" class="ali1"><span><img alt="" src="<?php echo $this->_var['category']['logo']; ?>" ></span><?php echo $this->_var['category']['value']; ?><b class="jt"> > </b></a>
                            <div class="sub-allcate">
                                <div class="detail-menu ml15 mr15">
                                    <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?> 
                                    <p><strong><a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>" ><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></strong>
                                      <?php $_from = $this->_var['child']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child2');$this->_foreach['fe_child2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child2']['total'] > 0):
    foreach ($_from AS $this->_var['child2']):
        $this->_foreach['fe_child2']['iteration']++;
?><a href="<?php echo url('app=search&cate_id=' . $this->_var['child2']['id']. ''); ?>" ><?php echo htmlspecialchars($this->_var['child2']['value']); ?></a><?php if (($this->_foreach['fe_child2']['iteration'] == $this->_foreach['fe_child2']['total'])): ?><?php else: ?>|<?php endif; ?>
                                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </p>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </div>
                                
                                <div class="detail-img mt15">
                                    <?php $_from = $this->_var['category']['recom_logo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'recom_logo');$this->_foreach['fe_gcategory'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_gcategory']['total'] > 0):
    foreach ($_from AS $this->_var['recom_logo']):
        $this->_foreach['fe_gcategory']['iteration']++;
?>
                                    <?php if ($this->_var['recom_logo']['logo']): ?>
                                    <div class="adv"><a href="<?php echo $this->_var['recom_logo']['url']; ?>"><img src="<?php echo $this->_var['recom_logo']['logo']; ?>" width="194" height="70" alt="<?php echo htmlspecialchars($this->_var['recom_logo']['name']); ?>"></a></div>
                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            
          </div>

            <div class="w-nav fontpyahei fontsize14 fl">
                <ul><?php $_from = $this->_var['image_4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['image_nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['image_nav']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['image_nav']['iteration']++;
?>
                    <li><a href="<?php echo $this->_var['nav']['url']; ?>" title=""><?php echo $this->_var['nav']['name']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    $(".tiao1").mouseover(function() {
          $(this).find('.allcate').show();
      });

      $(".tiao1").mouseout(function() {
          $(this).find('.allcate').hide();
      });
      $('.allcate li').mouseover(function() {
        $(this).find('.sub-allcate').show();
        $(this).find(".ali1").addClass("lia");
      });
      $('.allcate li').mouseout(function() {
        $(this).find('.sub-allcate').hide();
        $(this).find(".ali1").removeClass("lia");
      });
    $('.search-type .float-left a').click(function(event) {
        var act=this.id;
        
        $('#act').val(act);
        $('.search-type .float-left a').removeClass('current-soso');
        $(this).addClass('current-soso');
    });
    });
</script>