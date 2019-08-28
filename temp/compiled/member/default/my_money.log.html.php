


<?php echo $this->fetch('member.header.html'); ?>

<script type="text/javascript">

$(function() {
    
    $('#start_time').datepicker({
        dateFormat : 'yy-mm-dd'
    });

    $('#end_time').datepicker({
        dateFormat : 'yy-mm-dd'
    });

});
</script>

<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.curlocal.html'); ?>
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="public table">
                <div class="user_search">
                    <form method="get">
                        <input type="hidden" name="app" value="my_money" />
                        <input type="hidden" name="act" value="log" />
                
                        <span>日期：</span>
                        <input type="text" class="text1 width2" name="start_time" id="start_time" value="<?php echo $this->_var['query']['start_time']; ?>" />
                        <span>-</span>
                        <input type="text" class="text1 width2" name="end_time" id="end_time" value="<?php echo $this->_var['query']['end_time']; ?>" />
                        
                        <span>类型：</span>
                        <select name="type">
                            <option value="">全部类型</option>
                            <?php echo $this->html_options(array('options'=>$this->_var['money_log_type_options'],'selected'=>$this->_var['query']['type'])); ?>
                        </select>
                        
                        <input type="submit" class="btn" value="查询" />
                    </form>
                </div>

                <table>
                    <?php if ($this->_var['money_log_list']): ?>
                    <tr class="line gray">
                        <th style="width: 12em;">日期</th>
                        <th style="width: 22em;">金额</th>
                        <th style="width: 10em;">类型</th>
                        <th style="width: 8em;">交易对方</th>
                        <th style="width: 6em;">状态</th>
                        <th>备注</th>
                    </tr>
                    <?php endif; ?>

                    <?php $_from = $this->_var['money_log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['data']):
?>
                    <tr class="line_bold">
                        <td><?php echo local_date("Y-m-d H:i:s",$this->_var['data']['add_time']); ?></td>
                        <td>
                            <p style="color: blue; float: left; width: 49%; display: inline-block;"><?php echo $this->_var['flow_options'][@constant("FLOW_IN")]; ?>: <?php if ($this->_var['data']['flow'] == @constant("FLOW_IN")): ?><?php echo price_format($this->_var['data']['money']); ?><?php else: ?><?php echo price_format($this->_var['data']['money_1']); ?><?php endif; ?></p>
                            <p style="color: red; float: right; width: 49%; display: inline-block;"><?php echo $this->_var['flow_options'][@constant("FLOW_OUT")]; ?>: <?php if ($this->_var['data']['flow'] == @constant("FLOW_OUT")): ?><?php echo price_format($this->_var['data']['money']); ?><?php else: ?><?php echo price_format($this->_var['data']['money_1']); ?><?php endif; ?></p>
                        </td>
                        <td><?php echo $this->_var['money_log_type_options'][$this->_var['data']['type']]; ?></td>
                        <td><?php echo $this->_var['data']['party_name']; ?></td>
                        <td>
                            <?php if ($this->_var['data']['type'] == @constant("MONEY_L_T_CZ") && $this->_var['data']['status'] == @constant("MONEY_L_S_GO")): ?>
                            <a href="<?php echo url('app=my_money&act=recharge&id=' . $this->_var['data']['id']. ''); ?>" target="_blank"><?php echo $this->_var['money_log_status_options'][$this->_var['data']['status']]; ?></a>
                            <?php else: ?>
                            <?php echo $this->_var['money_log_status_options'][$this->_var['data']['status']]; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                        <?php echo $this->_var['data']['user_name']; ?> <?php echo $this->_var['money_log_type_options'][$this->_var['data']['type']]; ?> <?php echo $this->_var['flow_options'][$this->_var['data']['flow']]; ?><?php echo price_format($this->_var['data']['money']); ?>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="5" class="member_no_records padding6">没有符合条件的记录</td>
                    </tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </table>

                <?php echo $this->fetch('member.page.bottom.html'); ?>
            </div>
            <div class="wrap_bottom"></div>
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
