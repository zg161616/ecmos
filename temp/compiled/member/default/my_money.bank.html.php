


<?php echo $this->fetch('member.header.html'); ?>

<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'dialog/dialog.js'; ?>" id="dialog_js"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.ui/jquery.ui.js'; ?>"></script>

<script type="text/javascript">

$(function() {
});

</script>

<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.curlocal.html'); ?>
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="eject_btn_two eject_pos1" title="新增银行卡"><b class="ico3" ectype="dialog" dialog_title="新增银行卡" dialog_id="bank_add" dialog_width="640" uri="<?php echo url('app=my_money&act=bank_add'); ?>">新增银行卡</b></div>
            <br/><br/>
            <div class="public table">
                <table>
                    <?php if ($this->_var['bank_list']): ?>
                    <tr class="line gray">
                        <th>卡号 / 账户</th>
                        <th>持卡人 / 姓名</th>
                        <th>开户行 / 账户类型</th>
                        <th>开户行地址</th>
                        <th>操作</th>
                    </tr>
                    <?php endif; ?>

                    <?php $_from = $this->_var['bank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['data']):
?>
                    <tr class="line_bold" align="center">
                        <td><?php echo $this->_var['data']['card_number']; ?></td>
                        <td><?php echo $this->_var['data']['cardholder']; ?></td>
                        <td><?php echo $this->_var['data']['bank_name']; ?></td>
                        <td><?php echo $this->_var['data']['bank_address']; ?></td>
                        <td>
                            <a href="javascript:drop_confirm('您确定要删除它吗？', '<?php echo url('app=my_money&act=bank_drop&id=' . $this->_var['data']['id']. ''); ?>')" class="delete float_none">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="5" class="member_no_records padding6">没有符合条件的记录</td>
                    </tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
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

<div class="clear"></div>

<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0"></iframe>

<?php echo $this->fetch('footer.html'); ?>
