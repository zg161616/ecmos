<?php echo $this->fetch('header1.html'); ?>

<div class="header">
    <div class="w1200 clearfix">
        <h1 class="logo fl mt15" title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>" width="236" height="70" alt="<?php echo $this->_var['site_title']; ?>"></a></h1>
        <ul class="steps fr clearfix mt30">
            <li class="step-on"><span class="fontbold">1</span><p class="step-on-txt">我的购物车</p></li>
            <li><span>2</span><p>确认订单信息</p></li>
            <li><span>3</span><p>付款</p></li>
            <li><span>4</span><p>确认收货</p></li>
            <li><span>5</span><p>评价</p></li>
        </ul>
    </div>
</div>



<div class="jim-main" style="margin-top: 80px;">
    <div class="w1200 clearfix">
        <div class="step_main">
            <div class="null_shopping">
                <h4>您的购物车是空的，您可以</h4>
                <p>
                    <a href="index.php">选购商品>></a>
                    <a href="<?php echo url('app=buyer_order'); ?>">查看订单>></a>
                </p>
            </div>
            <div class="clear"></div>
        </div>
        
        
        <?php if ($this->_var['best_items']): ?>
        <div class="mt30" style="border:1px solid #e5e5e5;">        
            <div class="side-tit"><strong>精品推荐</strong></div>
            <ul class="ohterproduct clearfix">
            <?php $_from = $this->_var['best_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                <?php if (($this->_foreach['goods']['iteration'] - 1) < 5): ?>
                <li>
                    <a href="<?php echo url('app=goods&goods_id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['default_image']; ?>" width="200" height="200" alt=""><p style="width:200px;text-overflow: ellipsis;white-space:nowrap;overflow:hidden;margin-left: 5px;"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),58); ?></p></a>
                    <h3><strong style="color: #cd1616;float: left;" class="ml10"><?php echo price_format($this->_var['goods']['price']); ?></strong><span></span></h3>
                </li>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
        <?php endif; ?>
        
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>