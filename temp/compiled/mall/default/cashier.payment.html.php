<?php echo $this->fetch('header1.html'); ?>

<div class="header">
    <div class="w1200 clearfix">
        <h1 class="logo fl mt15" title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>" width="236" height="70" alt="<?php echo $this->_var['site_title']; ?>"></a></h1>
        <ul class="steps fr clearfix mt30">
            <li class="step-off"><span>1</span><p class="step-off-txt">我的购物车</p></li>
            <li class="step-off"><span>2</span><p class="step-off-txt">确认订单信息</p></li>
            <li class="step-on"><span class="fontbold">3</span><p class="step-on-txt">付款</p></li>
            <li><span>4</span><p>确认收货</p></li>
            <li><span>5</span><p>评价</p></li>
        </ul>
    </div>
    
    <div class="clr"></div>
</div>

<style>
.sucess{font-size: 1.5em;}
.detail{width:300px;margin: 0 auto;}
.order_information{width:98%;padding: 0 10px; text-align: center; margin: 20px 0;}
.order_information b {padding-right: 20px;}
.order_information b a:hover {color: #c00;}
.defray {width:1115px;height: 28px; line-height: 28px; background: #f5f5f5; padding-left: 20px; font-weight: bold; color: #333;}
.payment li {background:none;width: 982px; overflow: hidden; padding-top: 10px;}
.payment li .radio {float: left; width: 65px; text-align: center; padding-top: 14px;}
.payment li .logo {float: left; width: 140px;}
.payment li .explain {float: left; width: 777px; line-height: 45px; color: #787878;}
.backindex{margin:20px 0;}
</style>

<div class="jim-main">
    <div class="w1200 clearfix">
        <div class="payreturn mt40">
            
            <div class="detail">
            <h2 class="sucess"><strong>订单提交成功！</strong></h2>
                您的订单已成功生成，选择您想用的支付方式进行支付
            </div>            
            <?php if (! $this->_var['order']['order_merge']): ?>
            <div class="order_information">
                <b>订单号&nbsp;:<span class="color02 fontbold fontsize16"><?php echo $this->_var['order']['order_sn']; ?></span></b>
                <b>订单总价&nbsp;:<span class="color02 fontbold fontsize16"><?php echo price_format($this->_var['order']['order_amount']); ?></span></b>
                <b><a href="<?php echo url('app=buyer_order'); ?>" target="_blank">查看该订单</a></b>
            </div>
            <?php else: ?>
            <div class="order_information">
                <b>订单号&nbsp;:<span class="color02 fontbold fontsize16"><?php echo $this->_var['order']['order_sn_num']; ?></span></b>
                <b>订单总价&nbsp;:<span class="color02 fontbold fontsize16"><?php echo price_format($this->_var['order']['order_amount']); ?></span></b>
                <b><a href="<?php echo url('app=buyer_order'); ?>" target="_blank">查看该订单</a></b>
            </div>
            <?php endif; ?>
            
            <form action="index.php?app=cashier&act=goto_pay&order_id=<?php echo $this->_var['order']['order_id']; ?>" method="POST" id="goto_pay">
                
            <div class="buy">
                <h3><b>选择支付方式并付款</b></h3>
            </div>

            <ul class="payment">
                <div class="defray">余额支付&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>帐户余额：<span style=" color:#FF4D0F"> <?php echo $this->_var['money']['money']; ?>&nbsp;</span></b></div>
                <li>
                    <p class="radio"><input id="payment_epay" type="radio" name="payment_id" value="0" checked /></p>
                    <p class="logo"><label for="payment_epay"><img src="<?php echo $this->res_base . "/" . 'images/yeb.jpg'; ?>" alt="余额支付" title="余额支付" width="125" height="47" /></label></p>
                    <p class="explain">使用ecmall站内余额支付</p>
                </li>
            </ul>

            <?php if ($this->_var['payments']['online']): ?>
            <ul class="payment">
                <div class="defray">在线支付</div>
                <?php $_from = $this->_var['payments']['online']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                <li>
                    <p class="radio"><input id="payment_<?php echo $this->_var['payment']['payment_code']; ?>" type="radio" name="payment_id" value="<?php echo $this->_var['payment']['payment_id']; ?>" /></p>
                    <p class="logo"><label for="payment_<?php echo $this->_var['payment']['payment_code']; ?>"><img src="<?php echo $this->_var['site_url']; ?>/includes/payments/<?php echo $this->_var['payment']['payment_code']; ?>/logo.gif" alt="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" title="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" width="125" height="47" /></label></p>
                    <p class="explain"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></p>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            <?php endif; ?>

            <!-- <?php if ($this->_var['payments']['offline']): ?>
            <ul class="payment">
                <div class="defray">线下支付</div>
                <?php $_from = $this->_var['payments']['offline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                <li>
                    <p class="radio"><input type="radio" id="payment_<?php echo $this->_var['payment']['payment_code']; ?>" name="payment_id" value="<?php echo $this->_var['payment']['payment_id']; ?>" /></p>
                    <p class="logo"><label for="payment_<?php echo $this->_var['payment']['payment_code']; ?>"><img alt="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" title="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" src="<?php echo $this->_var['site_url']; ?>/includes/payments/<?php echo $this->_var['payment']['payment_code']; ?>/logo.gif" width="125" height="47" /></label></p>
                    <p class="explain"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></p>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            <?php endif; ?> -->

            <ul class="payment">
                <div class="defray">确认支付</div>
                <div class="backindex"><a href="javascript:$('#goto_pay').submit();">确认支付</a></div>
            </ul>
        </form>
        </div>
    </div>
</div>


<?php echo $this->fetch('footer.html'); ?>

</div>
</body>
<script src="<?php echo $this->lib_base . "/" . 'jquery-1.9.1.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $this->lib_base . "/" . 'allcate.js'; ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $this->lib_base . "/" . 'popup.js'; ?>" type="text/javascript" charset="utf-8"></script>

</html>
