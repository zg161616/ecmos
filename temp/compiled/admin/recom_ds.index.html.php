<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>推荐分类</p>
    <ul class="subnav">
        <li><?php if (! $this->_var['type']): ?><span>管理</span><?php else: ?><a class="btn1" href="index.php?app=recom_ds">管理</a><?php endif; ?></li>
        <li><?php if ($this->_var['type'] == image): ?><span>图片广告</span><?php else: ?><a class="btn1" href="index.php?app=recom_ds&amp;type=image">图片广告</a><?php endif; ?></li>
        <li><?php if ($this->_var['type'] == goods): ?><span>推荐商品</span><?php else: ?><a class="btn1" href="index.php?app=recom_ds&amp;type=goods">推荐商品</a><?php endif; ?></li>
        <li><?php if ($this->_var['type'] == brand): ?><span>推荐品牌</span><?php else: ?><a class="btn1" href="index.php?app=recom_ds&amp;type=brand">推荐品牌</a><?php endif; ?></li>
        <li><?php if ($this->_var['type'] == recommend): ?><span>推荐分类</span><?php else: ?><a class="btn1" href="index.php?app=recom_ds&amp;type=recommend">推荐分类</a><?php endif; ?></li>
        <li><a class="btn1" href="index.php?app=recom_ds&amp;act=add&amp;type=image">添加广告</a></li>
        <li><a class="btn1" href="index.php?app=recom_ds&amp;act=add&amp;type=goods">添加商品</a></li>
        <li><a class="btn1" href="index.php?app=recom_ds&amp;act=add&amp;type=brand">添加品牌</a></li>
        <li><a class="btn1" href="index.php?app=recom_ds&amp;act=add&amp;type=recommend">添加推荐</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
                <input type="hidden" name="app" value="recom_ds" />
                <input type="hidden" name="act" value="index" />
                <input type="hidden" name="type" value="<?php echo $this->_var['type']; ?>" />
                名称:
                <input class="queryInput" type="text" name="name" value="<?php echo htmlspecialchars($this->_var['query']['name']); ?>" />
                显示位置:
                <select class="querySelect" name="cate_id">
                    <option value="">请选择...</option>
                    <?php echo $this->html_options(array('options'=>$this->_var['rcate_data'],'selected'=>$_GET['cate_id'])); ?>
                </select>
                <input type="submit" class="formbtn" value="查询" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=recom_ds&type=<?php echo $this->_var['type']; ?>">撤销检索</a>
            <?php endif; ?>
            <span></span>
        </form>
    </div>
    <div class="fontr">
        <?php if ($this->_var['recom_data']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['recom_data']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
            <td align="left"><span ectype="order_by" fieldname="name">名称</span></td>
            <td align="left"><span ectype="order_by" fieldname="cate_id">显示位置</span></td>
            <td align="left"><span ectype="order_by" fieldname="r_type">推荐分类</span></td>
            <td align="left" class="table-center">图片标识</td>
             <td class="table-center"><span ectype="order_by" fieldname="sort_order">排序</span></td>
            <td class="table-center"><span ectype="order_by" fieldname="recommended">是否显示</span></td>
            <td class="handler">操作</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['recom_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'recom');if (count($_from)):
    foreach ($_from AS $this->_var['recom']):
?>
        <tr class="tatr2">
            <td class="firstCell"><input value="<?php echo $this->_var['recom']['id']; ?>" class='checkitem' type="checkbox" /></td>
            <td align="left"><?php echo htmlspecialchars($this->_var['recom']['name']); ?></td>
            <td align="left"><?php echo htmlspecialchars($this->_var['recom']['cate_name']); ?></td>
            <td align="left"><?php echo $this->_var['type_data'][$this->_var['recom']['r_type']]; ?></td>
            <td align="left" class="table-center"><?php if ($this->_var['recom']['logo']): ?><img src="<?php echo $this->_var['recom']['logo']; ?>" height="30"/><?php endif; ?></td>
            <td class="table-center"><?php echo $this->_var['recom']['sort_order']; ?></td> 
            <td class="table-center"><?php if ($this->_var['recom']['if_show'] == 1): ?><img src="templates/style/images/positive_enabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['recom']['id']; ?>" fieldvalue="1"/><?php else: ?><img src="templates/style/images/positive_disabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['recom']['id']; ?>" fieldvalue="0"/><?php endif; ?></td>
            <td class="handler">
            <a href="index.php?app=recom_ds&amp;act=edit&amp;type=<?php echo $this->_var['recom']['type']; ?>&amp;id=<?php echo $this->_var['recom']['id']; ?>">编辑</a>  |  <a name="drop" href="javascript:drop_confirm('您确定要删除它吗？', 'index.php?app=recom_ds&amp;act=drop&amp;type=<?php echo $this->_var['recom']['type']; ?>&amp;id=<?php echo $this->_var['recom']['id']; ?>');">删除</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['recom_data']): ?>
    <div id="dataFuncs">
        <div id="batchAction" class="left paddingT15">
            &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="显示" name="id" uri="index.php?app=recom_ds&act=pass" />
             &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="不显示" name="id" uri="index.php?app=recom_ds&act=refuse" />
            &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=recom_ds&act=drop" presubmit="confirm('您确定要删除它吗？');" />
            
        </div>
        <div class="pageLinks">
            <?php if ($this->_var['recom_data']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
