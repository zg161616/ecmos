<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>推荐位置</p>
    <ul class="subnav">
        <li><?php if ($this->_var['wait_verify']): ?>
            <a class="btn1" href="index.php?app=recom_cate">管理</a>
            <?php else: ?><span>管理</span>
            <?php endif; ?>
        </li>
        <li>
            <a class="btn1" href="index.php?app=recom_cate&amp;act=add">新增</a>
        </li>
        <li>
            <?php if ($this->_var['wait_verify']): ?><span>待审核</span><?php else: ?>
            <a class="btn1" href="index.php?app=recom_cate&amp;wait_verify=1">待审核</a>
            <?php endif; ?>
        </li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
                <input type="hidden" name="app" value="recom_cate" />
                <input type="hidden" name="act" value="index" />
                <input type="hidden" name="wait_verify" value="<?php echo $this->_var['wait_verify']; ?>">
                名称:
                <input class="queryInput" type="text" name="cate_name" value="<?php echo htmlspecialchars($this->_var['query']['cate_name']); ?>" />
                <input type="submit" class="formbtn" value="查询" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=recom_cate&wait_verify=<?php echo $this->_var['wait_verify']; ?>">撤销检索</a>
            <?php endif; ?>
            <span></span>
        </form>
    </div>
    <div class="fontr">
        <?php if ($this->_var['rcate']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['rcate']): ?>
        <tr class="tatr1">
            <td class="table-center"><span ectype="order_by" fieldname="cate_name">名称</span></td>
            <td class="table-center"><span ectype="order_by" fieldname="text">标题</span></td>
            <td align="left" style="width: 500px;">位置说明</td>
             <td class="table-center"><span ectype="order_by" fieldname="sort_order">排序</span></td>
            <td class="table-center">显示</td>
            <td class="handler">操作</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['rcate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'recommends');if (count($_from)):
    foreach ($_from AS $this->_var['recommends']):
?>
        <tr class="tatr2">
            <td class="table-center"><?php echo htmlspecialchars($this->_var['recommends']['cate_name']); ?>
            </td>
            <td class="table-center"><?php echo htmlspecialchars($this->_var['recommends']['text']); ?>
            </td>
            <td align="left"><?php echo $this->_var['recommends']['cate_desc']; ?></td>
            <td class="table-center"><?php echo $this->_var['recommends']['sort_order']; ?></td>
            <td class="table-center">
                <?php if ($this->_var['recommends']['if_show'] == 1): ?>
                <img src="templates/style/images/positive_enabled.gif" ectype="inline_edit" fieldname="if_show" fieldid="<?php echo $this->_var['recommends']['cate_id']; ?>" fieldvalue="1"/>
                <?php else: ?>
                <img src="templates/style/images/positive_disabled.gif" ectype="inline_edit" fieldname="if_show" fieldid="<?php echo $this->_var['recommends']['cate_id']; ?>" fieldvalue="0"/>
                <?php endif; ?>
            </td>
            <td class="handler">
            <a href="index.php?app=recom_cate&amp;act=edit&amp;cate_id=<?php echo $this->_var['recommends']['cate_id']; ?>">编辑</a>  |  <a name="drop" href="javascript:drop_confirm('您确定要删除它吗？', 'index.php?app=recom_cate&amp;act=drop&amp;cate_id=<?php echo $this->_var['recommends']['cate_id']; ?>');">删除</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['rcate']): ?>
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
