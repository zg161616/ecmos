


<?php if ($this->_var['payform']['online']): ?>
<form action="<?php echo $this->_var['payform']['gateway']; ?>" id="payform" method="<?php echo $this->_var['payform']['method']; ?>" style="display: none">
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

<?php echo $this->fetch('member.header.html'); ?>

<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.validate.js'; ?>"></script>

<script type="text/javascript">

$(function() {
    
    $('#_form_').validate({
        errorPlacement : function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success : function(label){
            label.addClass('validate_right').text('OK!');
        },
        rules : {
            money : {
                required : true,
                number : true,
                min : 0.01
            }
        },
        messages : {
            money : {
                required : '金额不能为空',
                number : '必须输入合法的数字',
                min : '输入值不能小于0.01'
            }
        }
    });
    
});

</script>

<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.curlocal.html'); ?>
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <form id="_form_" method="post">
                <p>充值金额：<input type="text" name="money" /> </p>
                <div style="margin: 0.5em 0;">
                    <p>充值方式：</p>
                    <?php $_from = $this->_var['pay_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['data']):
?>
                    <p style="margin: 0.5em 2em 0.5em 0; display: inline-block;" onclick="$('#pay_<?php echo $this->_var['data']['payment_id']; ?>').attr('checked','checked')">
                        <input type="radio" id="pay_<?php echo $this->_var['data']['payment_id']; ?>" name="pay_id" title="<?php echo $this->_var['data']['payment_name']; ?>" value="<?php echo $this->_var['data']['payment_id']; ?>" />
                        <img src="<?php echo $this->_var['site_url']; ?>/includes/payments/<?php echo $this->_var['data']['payment_code']; ?>/logo.gif" style="vertical-align: middle; height: 2.5em;" />
                    </p>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
                <input type="submit" value="提交" style="margin-left: 2em;" />
            </form>
        </div>
        
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>

<div class="clear"></div>

<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0"></iframe>

<?php echo $this->fetch('footer.html'); ?>

<?php endif; ?>