
<?php echo $this->fetch('member.header.html'); ?>

<script type="text/javascript">
$(function() {
    $('#add_time_from').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#add_time_to').datepicker({
        dateFormat: 'yy-mm-dd'
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
                        <span>时间: </span>
                        <input type="text" class="text1 width2" name="add_time_from" id="add_time_from" value="<?php echo $this->_var['query']['add_time_from']; ?>" /> &#8211;
                        <input type="text" class="text1 width2" name="add_time_to" id="add_time_to" value="<?php echo $this->_var['query']['add_time_to']; ?>" />

                        <span>类型: </span>
                        <select class="querySelect" name="point_type">
                            <option value="">请选择...</option>
                            <?php echo $this->html_options(array('options'=>$this->_var['options_type'],'selected'=>$_GET['point_type'])); ?>
                        </select>

                        <input type="hidden" name="app" value="point_logs" />
                        <input type="hidden" name="act" value="index" />

                        <input type="submit" class="btn" value="搜索" />
                        <?php if ($this->_var['query']['add_time_from'] || $this->_var['query']['add_time_to']): ?>
                        <a class="detlink float_right" href="<?php echo url('app=point_logs&act=index'); ?>">取消检索</a>
                        <?php endif; ?>
                    </form>
                </div>

                <table>
                    <?php if ($this->_var['data']): ?>
                    <tr class="line gray">
                        <th>用户名</th>
                        <th>积分</th>
                        <th>时间</th>
                        <th>类型</th>
                        <th>备注</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['v']['iteration']++;
?>
                    <tr class="line_bold">
                        <td><?php echo $this->_var['val']['user_name']; ?></td>
                        <td><?php echo $this->_var['val']['point']; ?></td>
                        <td><?php echo local_date("Y-m-d H:i:s",$this->_var['val']['addtime']); ?></td>
                        <td><?php echo $this->_var['options_type'][$this->_var['val']['type']]; ?></td>
                        <td><?php echo $this->_var['val']['remark']; ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="5" class="member_no_records padding6"><?php echo $this->_var['lang'][$_GET['act']]; ?>没有符合条件的记录</td>
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