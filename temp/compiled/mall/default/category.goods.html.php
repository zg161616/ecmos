<?php echo $this->fetch('header.html'); ?>

<div class="jim-main">
    <div class="w1200 clearfix">
      
        <div class="left" style="width: 1200px;">
            <div class="navbar fontsimsun mt20 clearfix">
              <?php echo $this->fetch('curlocal.html'); ?>
            </div>
            <div class="search-type mb10 clearfix">
                <div class="float-left btn-type">
                    <a href="<?php echo url('app=category'); ?>" class="current">商品分类</a>
                    <a href="<?php echo url('app=category&act=store'); ?>">店铺分类</a>
                </div>
            </div>

          

          <?php if ($this->_var['gcategorys']): ?>
            <?php $_from = $this->_var['gcategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
          <div class="condition-bar mt10">
            <h1 style="line-height: 30px;margin-left: 20px;"><a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><strong><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></strong></a></h1>
          </div>

          <div class="grid clearfix" style="margin-left: 0px;">
                <?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
              <a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>" style="float: left;padding: 5px;margin-left: 10px;font-family:microsoft yahei;">
                  <h2><?php echo htmlspecialchars($this->_var['child']['value']); ?></h2>
              </a>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php endif; ?>
          
        </div>
      
      <div class="clr"></div>

    </div>
</div>



  <?php echo $this->fetch('footer.html'); ?>

</body>

<script src="<?php echo $this->lib_base . "/" . 'jquery-1.9.1.min.js'; ?>"></script>
<script src="<?php echo $this->lib_base . "/" . 'jim-focus.js'; ?>"></script>
<script src="<?php echo $this->lib_base . "/" . 'jq_scroll.js'; ?>"></script>
<script src="<?php echo $this->lib_base . "/" . 'jquery.SuperSlide.js'; ?>"></script>
</html>
