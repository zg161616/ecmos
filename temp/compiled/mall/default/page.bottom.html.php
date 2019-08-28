
<?php if ($this->_var['page_info']['page_count'] > 1): ?>
<div class="page mt30 mb20">
    <?php if ($this->_var['page_info']['prev_link']): ?>
    <a href="<?php echo $this->_var['page_info']['prev_link']; ?>">上一页</a>
    <?php else: ?>
    <span>上一页</span>
    <?php endif; ?>
    <span class="page_text"><?php echo sprintf('共 %s 项', $this->_var['page_info']['item_count']); ?></span>
    <?php if ($this->_var['page_info']['first_link']): ?>
    <a href="<?php echo $this->_var['page_info']['first_link']; ?>">1&nbsp;<?php echo $this->_var['page_info']['first_suspen']; ?></a>
    <?php endif; ?>
    <?php $_from = $this->_var['page_info']['page_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('page', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['page'] => $this->_var['link']):
?>
    <?php if ($this->_var['page_info']['curr_page'] == $this->_var['page']): ?>
    <span href="<?php echo $this->_var['link']; ?>"><?php echo $this->_var['page']; ?></span>
    <?php else: ?>
    <a href="<?php echo $this->_var['link']; ?>"><?php echo $this->_var['page']; ?></a>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php if ($this->_var['page_info']['last_link']): ?>
    <a href="<?php echo $this->_var['page_info']['last_link']; ?>"><?php echo $this->_var['page_info']['last_suspen']; ?>&nbsp;<?php echo $this->_var['page_info']['page_count']; ?></a>
    <?php endif; ?>
    <span class="page_text"><?php echo $this->_var['page_info']['curr_page']; ?> / <?php echo $this->_var['page_info']['page_count']; ?></span>
    <?php if ($this->_var['page_info']['next_link']): ?>
    <a href="<?php echo $this->_var['page_info']['next_link']; ?>">下一页</a>
    <?php else: ?>
    <span>下一页</span>
    <?php endif; ?>
</div>
<?php endif; ?>
