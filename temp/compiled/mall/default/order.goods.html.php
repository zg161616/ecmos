
          <h2><strong>确认订单信息</strong></h2>
            <div class="confirm-order-th clearfix">
                <div class="s-title fl">店铺宝贝</div>
                <div class="s-price fl">单价(元)</div>
                <div class="s-amount fl">数量</div>
                <div class="s-agio fl">优惠方式(元)</div>
                <div class="s-total fl">小计(元)</div>
            </div>
      <?php $_from = $this->_var['carts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
        <div class="store" id="<?php echo $this->_var['store']['store_id']; ?>">
            <div class="shopbar">
                <div class="shop-info">
                    <div class="cart-checkbox">店铺:&nbsp;<a href="<?php echo url('app=store&store_id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank"><u><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></u></a>
                      <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=1009618401&site=cntaobao&s=2&charset=utf-8" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=1009618401&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息" /></a>&nbsp;<a target=blank href=http://wpa.qq.com/msgrd?V=1&Uin=1009618401&Site=商城客服&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:1009618401:8 alt="点击这里给我发消息"></a>
                    </div>
                </div>
              <div class="order-promot-info"></div>
          </div>
        <?php $_from = $this->_var['store']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <ul class="item-confirm clearfix">
              <li class="td-s-title fl">
                      <div class="td-inner">
                          <div class="item-pic fl"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="80" height="80"></a></div>
                          <div class="item-info fl ml10">
                              <div class="item-basic-info lineheight18"><a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><p style="width:300px;"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></p></a></div>
                          </div>
                      </div>
                  </li>
              <li class="td-s-price fl"><?php echo price_format($this->_var['goods']['subtotal']); ?></li>
              <li class="td-s-amount fl"><?php echo $this->_var['goods']['quantity']; ?></li>
              <li class="td-s-agio fl">无优惠</li>
              <li class="td-s-total fl"><span class="color6f0e0e fontbold fontsize14"><?php echo price_format($this->_var['goods']['subtotal']); ?></span></li>
          </ul>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <div class="confirm-order-info">
              <table width="100%">
                  <tr>
                    <td width="45%" rowspan="2" style="line-height: 75px;padding-left: 30px;">
                      
                      <?php echo $this->fetch('order.postscript.html'); ?>

                    </td>
                    <td width="45%" colspan="">选择配送方式：
                <div class="fashion_list">
                    <?php $_from = $this->_var['store']['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping_method');$this->_foreach['shipping_select'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping_select']['total'] > 0):
    foreach ($_from AS $this->_var['shipping_method']):
        $this->_foreach['shipping_select']['iteration']++;
?>
                    <ul class="receive_add cursor" shipping_id="<?php echo $this->_var['store']['amount']; ?>:<?php echo $this->_var['store']['quantity']; ?>:<?php echo $this->_var['shipping_method']['shipping_id']; ?>" style="width: 600px;" store_id='<?php echo $this->_var['store']['store_id']; ?>'>
                        <li class="radio"><input type="radio" name="shipping_id[<?php echo $this->_var['store']['store_id']; ?>]" value="<?php echo $this->_var['shipping_method']['shipping_id']; ?>" <?php if (($this->_foreach['shipping_select']['iteration'] <= 1)): ?>checked<?php endif; ?> shipping_fee='<?php echo $this->_var['shipping_method']['price']; ?>' /></li>
                        <li class="fashion">
                          <?php echo htmlspecialchars($this->_var['options_shipping'][$this->_var['shipping_method']['shipping_name']]); ?></li>
                        <li class="pay">配送费用:&nbsp;<span class="money" ectype="shipping_fee">&yen; <?php echo $this->_var['shipping_method']['price']; ?></span></li>
                        <li class="explain"><?php echo htmlspecialchars($this->_var['shipping_method']['shipping_desc']); ?></li>
                    </ul>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div></td>
                  </tr>
                  <!--<tr style="display: none;">
                    <td>运费险：<input type="checkbox" />卖家已为您的运费投保，最高赔付</td>
                    <td style="display: none;"><b class="color6f0e0e">10000.00</b></td>
                  </tr>-->
                  <tr>
                    <td colspan="3" align="right">店铺合计(含运费)：<b class="color6f0e0e fontsize18" id='amount_<?php echo $this->_var['store']['store_id']; ?>' amount='<?php echo $this->_var['store']['amount']; ?>'><?php echo price_format($this->_var['store']['amount']); ?></b></td>
                  </tr>
               </table>
          </div>
  
  <div class="make_coupon mb5 mt5" style="display: none;">
  <p>
    <?php if ($this->_var['store']['allow_coupon']): ?>&nbsp;&nbsp;
      <input type="button" class="btn1" value="使用优惠券" id="use_coupon" />
    <?php endif; ?>
  </p>
    <?php if ($this->_var['store']['allow_coupon']): ?>
      <p class="p2">优惠券编号:&nbsp;
        <input type="text" name="coupon_sn" id="coupon_sn" class="text1" />
        <input type="hidden" name="my_coupon" id="my_coupon" value='0' />  
        <input type="button" value="检查" class="check" id="check_coupon" style="margin-left: 28px;" />
        <span class="usable">有效 该优惠券的优惠价格为</span> 
        <span class="unusable">无效的优惠券.您可以到 <a href='index.php?app=my_coupon' target='_black'>我的优惠券</a> 登记,或者查询具体的优惠券信息</span>
      </p>
    <?php endif; ?>
  </div>
  
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>