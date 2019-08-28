<?php echo $this->fetch('header1.html'); ?>

<div class="header">
  <div class="w1200 clearfix">
      <h1 class="logo fl mt15" title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>" width="236" height="70" alt="<?php echo $this->_var['site_title']; ?>"></a></h1>
      <form method="GET" action="<?php echo url('app=search'); ?>">

        <div class="soso fl mt30 clearfix">
        <div class="search-type clearfix">
            <div class="float-left btn-type" style="margin-bottom: 0px;border-bottom: 0px;">
                <a href="javascript:;" class="current-soso" id="index">搜索商品</a>
                <a href="javascript:;" id="store">搜索店铺</a>
                <a href="javascript:;" id="groupbuy">搜索团购</a>
            </div>
            
            <input type="hidden" name="app" value="search" />
            <input type="hidden"  id="act"name="act" value="index" />
        </div>
            <input type="text" class="soso-input fl  fontsize14" value="请输入关键词" onfocus="if(this.value=='请输入关键词'){this.value='';}"  onblur="if(this.value==''){this.value='请输入关键词';}" name="keyword">
            <input type="submit" class="soso-btn fontyahei fl" value="搜索">
        </div>
      </form>
        <div class="tel fr mt25"><img src="data/files/mall/template/tel.jpg" width="225" height="59" alt="">
        </div>
  </div>
  <div class="clr"></div>
    
    <div class="global-nav mt15">
        <div class="w1200" style=" position:relative;">
            <a href="<?php echo url('app=category'); ?>" style="color: #fff;" target="_blank"><div class="tiao fontpyahei fontsize14 fl"><strong>所有商品分类</strong></div></a>
            <div class="w-nav fontpyahei fontsize14 fl">
                <ul><?php $_from = $this->_var['image_4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['image_nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['image_nav']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['image_nav']['iteration']++;
?>
                    <li><a href="<?php echo $this->_var['nav']['url']; ?>" title="" target="_blank"><?php echo $this->_var['nav']['name']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
            
              <!-- <?php if ($this->_var['index'] == 1): ?>
                <div class="allcate">
                    <ul>
                      <?php $_from = $this->_var['header_gcategories']['gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
                      <?php if ($this->_foreach['fe_category']['iteration'] <= 12): ?>
                        <li <?php if ($this->_foreach['fe_category']['iteration'] % 2 == 0): ?>class="li1"<?php endif; ?>>
                          
                          <a href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>" title="<?php echo $this->_var['gcate_list']['cate_name']; ?>" target="_blank"><span><img alt="" src="<?php echo $this->_var['category']['logo']; ?>" ></span><?php echo $this->_var['category']['value']; ?><b class="jt"> > </b></a>
                            <div class="sub-allcate">
                                <div class="detail-menu ml15 mr15">
                                    <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?> 
                                    <p><strong><a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></strong>
                                      <?php $_from = $this->_var['child']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child2');$this->_foreach['fe_child2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child2']['total'] > 0):
    foreach ($_from AS $this->_var['child2']):
        $this->_foreach['fe_child2']['iteration']++;
?><a href="<?php echo url('app=search&cate_id=' . $this->_var['child2']['id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child2']['value']); ?></a><?php if (($this->_foreach['fe_child2']['iteration'] == $this->_foreach['fe_child2']['total'])): ?>
                                      <?php else: ?>|<?php endif; ?>
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
                                    <div class="adv"><a href="<?php echo $this->_var['recom_logo']['url']; ?>"><img src="<?php echo $this->_var['recom_logo']['logo']; ?>" width="194" height="70" alt="<?php echo htmlspecialchars($this->_var['recom_logo']['name']); ?>" target="_blank"></a></div>
                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
              <?php endif; ?> -->
            
        </div>
    </div>
</div>



<link rel="icon" href="favicon.gif" type="image/x-icon" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/header.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/main.css'; ?>" rel="stylesheet"  />

<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/kissy.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/switchable/switchable-pkg.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.lazyload.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/main.js'; ?>" charset="utf-8"></script>

<div class="top-ads w" area="top-ads" widget_type="area"> 
	<?php $this->display_widgets(array('page'=>'index','area'=>'top-ads')); ?> 
</div>

<div id="main" class="w-full">
    <div id="page-home">
        <div class="col-1 relative w">
            <div class="left" area="col-1-left" widget_type="area">
                <?php $this->display_widgets(array('page'=>'index','area'=>'col-1-left')); ?>
            </div>
            <div class="right" area="col-1-right" widget_type="area">
                <?php $this->display_widgets(array('page'=>'index','area'=>'col-1-right')); ?>
            </div>
        </div>
        <div class="col-2" area="col-2" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-2')); ?>
        </div>
        <div class="col-3 w" area="col-3" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-3')); ?>
        </div>
    </div>
</div>



<?php echo $this->fetch('footer.html'); ?>


</body>

</html>

