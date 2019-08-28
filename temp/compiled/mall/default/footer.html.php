


<div class="footer mt40">
    <div class="footer01">
        <div class="w1200">
            <div class="footer-menu clearfix">
                <?php $_from = $this->_var['footer_article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');if (count($_from)):
    foreach ($_from AS $this->_var['category']):
?>
                <ul>
                    <li><strong><?php echo $this->_var['category']['cate_name']; ?></strong></li>
                    <?php $_from = $this->_var['category']['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                    <li><a href="<?php if ($this->_var['article']['link']): ?><?php echo $this->_var['article']['link']; ?><?php else: ?><?php echo url('app=article&act=view&article_id=' . $this->_var['article']['article_id']. ''); ?><?php endif; ?>"><?php echo $this->_var['article']['title']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <ul>
                    <li><strong>关注卓信微信公众号</strong></li>
                    <li><img src="themes/mall/default/styles/default/images/erweima.jpg"></li>
                </ul>
                <ul style="margin-right: 0;">
                    <li><a href="#"><strong>400-8533-358</strong></a></li>
                    <li><a href="#">(周一至周日 8:00-18:00)</a></li>
                    <li><div class="online">24小时在线</div></li>
                </ul>
            </div>
            <div class="friendlink mt30">
                <strong>合作伙伴：</strong>
                <?php $_from = $this->_var['footer_partner_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'partner');if (count($_from)):
    foreach ($_from AS $this->_var['partner']):
?>
                <a href="<?php echo $this->_var['partner']['link']; ?>" target="_blank"><?php echo $this->_var['partner']['title']; ?></a> |
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
    </div>
    <div class="footerBar">
        <div class="w1200">
            <ul>
                <li><img
                    src="themes/mall/default/styles/default/images/footerbar01.jpg"><strong>全场正品</strong>
                <p>正品行货又便宜</p></li>
                <li><img
                    src="themes/mall/default/styles/default/images/footerbar02.jpg"><strong>先行赔付</strong>
                <p>保证金优先赔付</p></li>
                <li><img
                    src="themes/mall/default/styles/default/images/footerbar03.jpg"><strong>七天包邮包退</strong>
                <p>不满意想退就退</p></li>
            </ul>
        </div>
    </div>
    <div class="footerlast">
        <div class="w1200">
            <div class="sitemap mt20">
                <a href="#" title="" target="_blank">关于我们</a>-
                <a href="#" title="" target="_blank">帮助中心</a>-
                <a href="#" title="" target="_blank">网站地图</a>-
                <a href="#" title="" target="_blank">诚聘英才</a>-
                <a href="#" title="" target="_blank">联系客服</a>-
                <a href="#" title="" target="_blank">站长统计</a>
            </div>
            <div class="copyright">Copyright © 2012 - 2014
                360cd.cn. All Rights Reserved 成都卓信 版权所有</div>
            <div class="safeinfo mt10">
                <a href="#" target="_blank"><img
                    src="themes/mall/default/styles/default/images/logo/footer01.jpg"></a>
                <a href="#" target="_blank"><img
                    src="themes/mall/default/styles/default/images/logo/footer02.jpg"></a>
                <a href="#" target="_blank"><img
                    src="themes/mall/default/styles/default/images/logo/footer03.jpg"></a>
                <a href="#" target="_blank"><img
                    src="themes/mall/default/styles/default/images/logo/footer04.jpg"></a>
                <a href="#" target="_blank"><img
                    src="themes/mall/default/styles/default/images/logo/footer05.jpg"></a>
                <a href="#" target="_blank"><img
                    src="themes/mall/default/styles/default/images/logo/footer06.jpg"></a>
                <a href="#" target="_blank"><img
                    src="themes/mall/default/styles/default/images/logo/footer07.jpg"></a>
            </div>
        </div>
    </div>
</div>
