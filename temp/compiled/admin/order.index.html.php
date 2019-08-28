<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
});

 function goods_toggle(id)
    {
       $('.order_'+id).toggle();
    }
</script>

<style>
  .show_spec{position: relative;
    top:0; z-index: 999; }
  .tar3{height: 0px;}
  .show_spec ul li{float:left; width:12%;}
  .show_spec ul {margin-left: 5%;  width: 95%;}
</style>
<div id="rightTop">
    <p>订单管理</p>
    <ul class="subnav">
        <li><span>管理</span></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
             <div class="left">
                <input type="hidden" name="app" value="order" />
                <input type="hidden" name="act" value="index" />
                <select class="querySelect" name="field"><?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
                </select>:<input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
                <select class="querySelect" name="status">
                    <option value="">订单状态</option>
                    <?php echo $this->html_options(array('options'=>$this->_var['order_status_list'],'selected'=>$this->_var['query']['status'])); ?>
                </select>
                下单时间从:<input class="queryInput2" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" class="pick_date" />
                至:<input class="queryInput2" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" class="pick_date" />
                订单金额从:<input class="queryInput2" type="text" value="<?php echo $this->_var['query']['order_amount_from']; ?>" name="order_amount_from" />
                至:<input class="queryInput2" type="text" style="width:60px;" value="<?php echo $this->_var['query']['order_amount_to']; ?>" name="order_amount_to" class="pick_date" />
                <input type="submit" class="formbtn" value="查询" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=order">撤销检索</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="fontr">
        <?php if ($this->_var['orders']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['orders']): ?>
        <tr class="tatr1">
            <td width="15%" class="firstCell"><span ectype="order_by" fieldname="seller_id">店铺名称</span></td>
            <td width="15%"><span ectype="order_by" fieldname="order_sn">订单号</span></td>
            <td width="15%"><span ectype="order_by" fieldname="add_time">下单时间</span></td>
            <td width="10%"><span ectype="order_by" fieldname="buyer_name">买家名称</span></td>
            <td width="15%"><span ectype="order_by" fieldname="order_amount">订单总价</span></td>
            <td>支付方式</td>
            <td width="10%"><span ectype="order_by" fieldname="status">订单状态</span></td>
            <td width="10%">操作</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2">
            <td class="firstCell"><?php if ($this->_var['order']['order_merge']): ?><b style="color: red;">合并订单</b><?php else: ?><?php echo htmlspecialchars($this->_var['order']['seller_name']); ?><?php endif; ?></td>
            <td><?php echo $this->_var['order']['order_sn']; ?>&nbsp;&nbsp;<?php if ($this->_var['order']['extension'] == 'groupbuy'): ?>[团购]<?php endif; ?></td>
            <td><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['buyer_name']); ?></td>
            <td><?php echo price_format($this->_var['order']['order_amount']); ?></td>
            <td><?php echo (htmlspecialchars($this->_var['order']['payment_name']) == '') ? '-' : htmlspecialchars($this->_var['order']['payment_name']); ?></td>
            <td><?php echo call_user_func("order_status",$this->_var['order']['status']); ?></td>
            <td><?php if ($this->_var['order']['order_merge']): ?><b><a href="javascript:goods_toggle(<?php echo $this->_var['order']['order_id']; ?>);">详细</a></b><?php else: ?><a href="index.php?app=order&amp;act=view&amp;id=<?php echo $this->_var['order']['order_id']; ?>">查看</a><?php endif; ?>
                
            </td>
        </tr>
        <?php if ($this->_var['order']['order_merge']): ?>
        <tr class="tatr1 tar3">
          <td colspan="8">
            <div  class="show_spec order_<?php echo $this->_var['order']['order_id']; ?>" style="display:none;">
               <ul>
                    <li>合并订单号</li>
                    <?php $_from = $this->_var['order']['order_sns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('order_id', 'order_sn');if (count($_from)):
    foreach ($_from AS $this->_var['order_id'] => $this->_var['order_sn']):
?>
                    <li><a href="index.php?app=order&amp;act=view&amp;id=<?php echo $this->_var['order_id']; ?>"><?php echo $this->_var['order_sn']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
               <div class="clear"></div>
            </div>
          </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php if ($this->_var['orders']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
