<?php echo $this->fetch('member.header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<style type="text/css">
.float_right {float: right;}
table .clearfix{display: table-cell;}
.order_merge{padding: 2px 6px;margin-left: 15px;border: 1px solid #dcdcdc;background-color: #fff;}
</style>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
    	<?php echo $this->fetch('member.curlocal.html'); ?>
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="public_index table">
            	 <table>
                 	<tr class="line_bold">
                        <th colspan="7">

                			<div class="user_search">
               					<form method="get">
                   					<?php if ($this->_var['query']['seller_name'] || $this->_var['query']['add_time_from'] || $this->_var['query']['add_time_to'] || $this->_var['query']['order_sn']): ?>
                     				<a class="detlink float_right" href="<?php echo url('app=buyer_order'); ?>">取消检索</a>
                    				<?php endif; ?>
                    				<span>下单时间: </span>
                    				<input type="text" class="text1 width2" name="add_time_from" id="add_time_from" value="<?php echo $this->_var['query']['add_time_from']; ?>"/> &#8211;
                    				<input type="text" class="text1 width2" name="add_time_to" id="add_time_to" value="<?php echo $this->_var['query']['add_time_to']; ?>"/>
                    				<span>订单号:</span>
                    				<input type="text" class="text1 width_normal" name="order_sn" value="<?php echo htmlspecialchars($this->_var['query']['order_sn']); ?>">
                    				<span>订单状态</span>
                    				<select name="type">
                    					<?php echo $this->html_options(array('options'=>$this->_var['types'],'selected'=>$this->_var['type'])); ?>
                    				</select>
                    				<input type="hidden" name="app" value="buyer_order" />
                   					<input type="hidden" name="act" value="index" />
                    				<input type="submit" class="btn" value="搜索" />
                				</form>
               				</div>
                         </th>
                     </tr>
                	<tr class="line gray">
                        <th>商品名称</th>
                        <th>价格</th>
                        <th>数量</th>
                        <th>支付方式</th>
                        <th>订单总价</th>
                        <th>订单状态</th>
                        <th>订单评价</th>
                    </tr>
                    <?php if ($this->_var['orders']): ?>
                  <tr class="sep-row"><td colspan="8"></td></tr>
                    <tr class="operations">
                        <th colspan="8">
                            <p class="position1 clearfix">
                            	<input type="checkbox" id="all" class="checkall"/>
                        		<label for="all">全选</label>
                            </p>
                            <p class="position1 clearfix">
                                <a href="javascript:void(0);" class="order_merge" uri="index.php? app=buyer_order&act=order_merge" name="order_id" ectype="batchbutton" target="_blank">合并付款</a>
                            </p>
                            <p class="position2 clearfix">
                                <?php echo $this->fetch('member.page.top.html'); ?>
                            </p>
                        </th>
                    </tr>
                    <?php endif; ?>
                <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
                <tr class="sep-row"><td colspan="7"></td></tr>
                <tr class="line-hd">
                    	<th colspan="7">
                        	<p>
                            	<input type="checkbox" value="<?php echo $this->_var['order']['order_id']; ?>" class="checkitem" <?php if ($this->_var['order']['status'] != ORDER_PENDING): ?> disabled="disabled" <?php endif; ?>/>

                            	<label>订单号：</label><?php echo $this->_var['order']['order_sn']; ?>
                            	<label>下单时间：</label><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?>
                                <a href="<?php echo url('app=store&id=' . $this->_var['order']['seller_id']. ''); ?>" target="_blank" style="margin-left:15px;"><?php echo htmlspecialchars($this->_var['order']['seller_name']); ?></a>
                                <?php if ($this->_var['order']['seller_info']['im_qq']): ?>
								<a href="http://wpa.qq.com/msgrd?v=1&amp;uin=<?php echo htmlspecialchars($this->_var['order']['seller_info']['im_qq']); ?>&amp;site=<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>&amp;menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo htmlspecialchars($this->_var['order']['seller_info']['im_qq']); ?>:5" alt="QQ" ></a>
								<?php elseif ($this->_var['order']['seller_info']['im_aliww']): ?>
								<a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo urlencode($this->_var['order']['seller_info']['im_aliww']); ?>&site=cntaobao&s=1&charset=<?php echo $this->_var['charset']; ?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo urlencode($this->_var['order']['seller_info']['im_aliww']); ?>&site=cntaobao&s=1&charset=<?php echo $this->_var['charset']; ?>" alt="Wang Wang" align="absmiddle" /></a>
								<?php elseif ($this->_var['order']['seller_info']['im_msn']): ?>
								<a target="_blank" href="http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee=<?php echo htmlspecialchars($this->_var['order']['seller_info']['im_msn']); ?>"><img src="http://messenger.services.live.com/users/<?php echo htmlspecialchars($this->_var['order']['seller_info']['im_msn']); ?>/presenceimage/" alt="im_msn" align="absMiddle" /></a>
								<?php else: ?>
								<a target="_blank" href="<?php echo url('app=message&act=send&to_id=' . $this->_var['order']['buyer_id']. ''); ?>" class="email"></a>
                            	<?php endif; ?>
                            </p>
                        </th>
                    </tr>
                    <?php $_from = $this->_var['order']['order_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
                    <tr class="line<?php if (($this->_foreach['fe_goods']['iteration'] == $this->_foreach['fe_goods']['total'])): ?> last_line<?php endif; ?>">
                        <td valign="top" class="first clearfix">
                        	<div class="pic-info fleft">
                            	<a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" width="50" height="50" /></a>
                            </div>
                            <div class="txt-info fleft">
                            	<div class="txt">
                                	<a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo sub_str($this->_var['goods']['goods_name'],70); ?></a>
                                </div>
                                <?php if ($this->_var['goods']['specification']): ?><p class="gray-color mt5"><?php echo $this->_var['goods']['specification']; ?></p><?php endif; ?>
                            </div>
                            
                        </td>
                        <td class="align2"><?php echo price_format($this->_var['goods']['price']); ?></td>
                        <td class="align2"><?php echo $this->_var['goods']['quantity']; ?></td>
                        <?php if (($this->_foreach['fe_goods']['iteration'] <= 1)): ?>
                        <td valign="top" class="align2 bottom-blue" rowspan="<?php echo $this->_var['order']['goods_quantities']; ?>">
                        	<div class="mt15"><?php if ($this->_var['order']['payment_name']): ?><?php echo htmlspecialchars($this->_var['order']['payment_name']); ?><?php endif; ?></div>
                         </td>
                        <td valign="top" class="align2 bottom-blue" rowspan="<?php echo $this->_var['order']['goods_quantities']; ?>">
                        	<div class="mt15"><b id="order<?php echo $this->_var['order']['order_id']; ?>_order_amount"><?php echo price_format($this->_var['order']['order_amount']); ?></b></div>
                        </td>
                       
                        <td valign="top" width="100" class="align2 bottom-blue" rowspan="<?php echo $this->_var['order']['goods_quantities']; ?>">
                           <div class="btn-order-status">
                            	<p><span class="<?php if ($this->_var['order']['status'] == 0): ?>gray-color<?php else: ?>color4<?php endif; ?>"><?php echo call_user_func("order_status",$this->_var['order']['status']); ?></span></p>
                                
                                
								<a href="<?php echo url('app=buyer_order&act=view&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank">查看订单</a>
                            
								<a href="<?php echo url('app=cashier&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank" id="order<?php echo $this->_var['order']['order_id']; ?>_action_pay"<?php if ($this->_var['order']['status'] != ORDER_PENDING): ?> style="display:none"<?php endif; ?> class="btn-order-status-pay">付款</a>

                                
                            	<a href="javascript:;" ectype="dialog" dialog_id="buyer_order_confirm_order" dialog_width="400" dialog_title="确认收货" uri="index.php?app=buyer_order&amp;act=confirm_order&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_confirm"<?php if ($this->_var['order']['status'] != ORDER_SHIPPED || $this->_var['order']['payment_code'] == 'cod'): ?> style="display:none"<?php endif; ?> />确认收货</a>
                            
                            	
                           		<a href="javascript:;" ectype="dialog" dialog_width="400" dialog_title="取消订单" dialog_id="buyer_order_cancel_order" uri="index.php?app=buyer_order&amp;act=cancel_order&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_cancel"<?php if ($this->_var['order']['status'] != ORDER_PENDING && $this->_var['order']['status'] != ORDER_SUBMITTED && $this->_var['order']['status'] != ORDER_ACCEPTED): ?> style="display:none"<?php endif; ?> />取消订单</a>
                         	</div>
                         </td>
                         <td width="60" class="align2 bottom-blue last" valign="top" rowspan="<?php echo $this->_var['order']['goods_quantities']; ?>">
                         	<?php if ($this->_var['order']['evaluation_status'] == '1'): ?><p class="gray-color">我已评价</p><?php endif; ?>
                            
                             <?php if ($this->_var['order']['status'] == ORDER_SHIPPED): ?><a class="btn1" href="<?php echo url('app=my_discus&act=add&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank">退货/退款</a>
                            <?php endif; ?>
                         	<a class="btn1" href="<?php echo url('app=buyer_order&act=evaluate&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank" id="order<?php echo $this->_var['order']['order_id']; ?>_evaluate"<?php if ($this->_var['order']['status'] != ORDER_FINISHED || $this->_var['order']['evaluation_status'] != 0): ?> style="display:none"<?php endif; ?>>我要评价</a>
                         </td>
                         <?php endif; ?>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endforeach; else: ?>
                    <tr><td class="member_no_records" colspan="7">没有符合条件的订单</td></tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['orders']): ?>
                    <tr class="sep-row">
                        <td colspan="7"></td>
                    </tr>
                    <tr class="operations">
                        <th colspan="7">
                        	<p class="position1 clearfix">
                            	<input type="checkbox" id="all2" class="checkall"/>
                        		<label for="all2">全选</label>
                            </p>

                            <p class="position1 clearfix">
                                <a href="javascript:void(0);" class="order_merge" uri="index.php? app=buyer_order&act=order_merge" name="order_id" ectype="batchbutton">合并付款</a>
                            </p>
                            <p class="position2 clearfix">
                                <?php echo $this->fetch('member.page.bottom.html'); ?>
                            </p>
                        </th>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<iframe id='iframe_post' name="iframe_post" src="about:blank" frameborder="0" width="0" height="0"></iframe>
<?php echo $this->fetch('footer.html'); ?>
