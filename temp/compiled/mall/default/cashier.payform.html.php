<?php if ($this->_var['payform']['online']): ?>
  <h3>正在连接支付网关, 请稍等...</h3>
  <form action="<?php echo $this->_var['payform']['gateway']; ?>" id="payform" method="<?php echo $this->_var['payform']['method']; ?>" style="display:none">
  <?php $_from = $this->_var['payform']['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('_k', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['_k'] => $this->_var['value']):
?>
    <input type="hidden" name="<?php echo $this->_var['_k']; ?>" value="<?php echo $this->_var['value']; ?>" />
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </form>
  <script type="text/javascript">
      document.getElementById('payform').submit();
  </script>
<?php else: ?>
<?php echo $this->fetch('header.html'); ?>
<style type="text/css">
.payment_desc {margin:10px 10px 10px 0px; background:#eee; padding:5px;padding-bottom:15px;}
.payment_desc h3 {margin:5px; border-bottom:#ddd 1px dotted; padding-bottom:5px;}
.payment_desc .detail {text-indent:2em;}
.backindex{margin:20px 0;padding-bottom: 20px;}
.backindex .submit{width: 20px;height: 30px;}
</style>

<div class="jim-main">
    <div class="w1200 clearfix">
      <div class="navbar fontsimsun mt20 clearfix">
        <?php echo $this->fetch('curlocal.html'); ?>
      </div>
        <div class="payreturn mt10">
            <div class="detail">
                <div class="payment_desc">
                    <h3>支付方式简介</h3>
                    <div class="detail">
                    <?php echo $this->_var['payform']['desc']; ?>
                    </div>
                </div>
            </div>
            <form id="pay_message_form" action="index.php?app=cashier&act=offline_pay&order_id=<?php echo $this->_var['order']['order_id']; ?>" method="POST">
            <ul class="payment">
                <li>
                    <p class="radio" style="line-height:30px;">请输入支付信息<span class="desc">(如:转账的账号,时间等)</span></p>
                    <p class="explain"><textarea name="pay_message" cols="80" rows="5" style="line-height: 20px;"><?php echo htmlspecialchars($this->_var['order']['pay_message']); ?></textarea></p>
                </li>
            </ul>
            <div class="backindex">
              <input type="submit"  calss="submit"style="float:left;margin-bottom: 20px;width: 100px;height: 30px;border: 0;" value="提交&nbsp;&raquo;" />
            </div>
        </form>
        </div>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>
<?php endif; ?>
