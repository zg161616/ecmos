<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.curlocal.html'); ?>
        <div class="profile clearfix">
            <div class="photo">
                <p>
                    <img src="<?php echo $this->_var['user']['portrait']; ?>" width="80" height="80" alt="" />
                </p>
            </div>
            <div class="info clearfix">
                <dl class="col-1 fleft">
                    <dt>
                        <span>欢迎您，</span> <strong><?php echo htmlspecialchars($this->_var['user']['user_name']); ?></strong>
                        <a href="<?php echo url('app=member&act=profile'); ?>">编辑个人资料>></a><?php if ($this->_var['store']): ?>&nbsp;&nbsp;<a href="<?php echo url('app=store&id=' . $this->_var['user']['user_id']. ''); ?>">查看店铺>></a><?php endif; ?>
                        <span>用户编号：<?php echo htmlspecialchars($this->_var['user']['user_id']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <p>用户等级: 
                        <b style="font-size:15px;color:red;">
                        <?php if ($this->_var['options_user_level'] [ $this->_var['user_ext']['grade_id'] ]): ?>
                        <?php echo $this->_var['options_user_level'][$this->_var['user_ext']['grade_id']]; ?>
                        <?php endif; ?>
                        </b>&nbsp;&nbsp; 用户积分: 
                        <b style="font-size:15px;color:red;">
                        <?php if ($this->_var['user_ext']['integral']): ?>
                        <?php echo $this->_var['user_ext']['integral']; ?>
                        <?php else: ?>
                        0
                        <?php endif; ?>
                        </b></p>
                    </dt>
                    <dd>
                        <span>上次登录 IP：<?php echo $this->_var['user']['last_ip']; ?></span>
                    </dd>
                </dl>
                <?php if ($this->_var['store'] && $this->_var['member_role'] == 'seller_admin'): ?>
                <dl class="col-2 fleft">
                    <dt> <strong>店铺动态评分</strong>
                    </dt>
                    <dd>
                        卖家信用：
                        <a href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank"><?php echo $this->_var['store']['credit_value']; ?></a> <?php if ($this->_var['store']['credit_value'] >= 0): ?>
                        <img src="<?php echo $this->_var['store']['credit_image']; ?>" align="absmiddle" /> <?php endif; ?>
                    </dd>
                    <dd>卖家好评率：<?php echo $this->_var['store']['praise_rate']; ?>%</dd>
                </dl>
                <?php endif; ?>
                <dl>
                    <p style="clear: both;"><?php echo sprintf('您有 <span class="red">%s</span> 条短消息，<a href="index.php?app=message&act=newpm">点击查看</a>', $this->_var['new_message']); ?></p>
                    <p style="line-height:25px;">
                        账户总金额：
                        <span style="font-size:16px;font-weight:bold; color:#FE5400;"><?php echo price_format($this->_var['money_info']['money']); ?></span> &nbsp;元&nbsp;&nbsp;&nbsp;&nbsp;冻结金额：
                        <span style="color:blue;"><?php echo price_format($this->_var['money_info']['money_dj']); ?></span>
                        <br />
                        <span class="epay_btn">
                            <a href="<?php echo url('app=my_money&act=withdrawal'); ?>" style="color:red">提现</a>
                        </span>
                        <span class="epay_btn">
                            <a href="<?php echo url('app=my_money&act=recharge'); ?>">充值</a>
                        </span>
                        <br>
                    </p>
                </dl>
            </div>
        </div>
        <div class="platform clearfix">
            <script type="text/javascript" src='<?php echo $this->lib_base . "/" . 'jquery.zclip.min.js'; ?>'></script>
            <style>
            .jm_tip {
                line-height: 25px;
                margin-left: 10px;
            }
            
            .information_index .title {
                background: url('') no-repeat 0 bottom;
                line-height: 35px;
            }
            /* 一键推广 */
            
            .yjtg {
                width: 890px;
                border-top: 1px dashed #dedddd;
                padding: 20px 0 0 0;
                margin-left: 20px;
                margin-top: 10px;
            }
            
            .yjtg h2 {
                width: 890px;
                font-size: 14px;
                color: #333;
                font-family: "微软雅黑";
                font-weight: normal;
                line-height: 24px;
            }
            
            .yjtg_con {
                width: 890px;
                float: left;
                margin: 20px 0 0 0;
            }
            
            .yjtg_con textarea {
                width: 95%;
                height: 63px;
                border: 1px solid #ddd;
                font-size: 14px;
                color: #666666;
                line-height: 24px;
                padding: 10px 0 0 15px;
            }
            
            .yjtg_txt {
                float: left;
                width: 890px;
                margin: 15px 0 15px 0;
            }
            
            .yjtg_button {
                width: 114px;
                height: 32px;
                background: #7cbe56;
                color: #fff;
                text-align: center;
                line-height: 32px;
                font-family: "微软雅黑";
                font-size: 16px;
                float: left;
                margin: 0 10px 0 0;
                display: inline;
                cursor: pointer;
            }
            
            .yjtg_button:hover {
                width: 114px;
                height: 32px;
                background: #8cd562;
            }
            
            .yjtg_txt span {
                float: left;
                width: 600px;
                color: #999;
                line-height: 18px;
            }
            /* 微店推广攻略 */
            
            .tg_con {
                width: 960px;
                float: left;
                border-top: 1px dashed #dedddd;
                padding: 30px 0 0 0;
                margin: 30px 0 0 0;
            }
            
            .tg_con dt {
                width: 960px;
                font-size: 20px;
                color: #333;
                font-family: "微软雅黑";
                font-weight: normal;
                line-height: 24px;
            }
            
            .tg_con dd {
                width: 960px;
                float: left;
                margin: 15px 0 0 0;
            }
            
            .tg_con dd ul {
                ;
                float: left;
                width: 300px;
                padding: 0 20px 0 0;
                overflow: hidden;
            }
            
            .tg_con dd li {
                line-height: 36px;
            }
            
            .tg_con dd li a {
                color: #0043b2;
            }
            </style>
            <div class="wrap_line margin15" style="width:auto;">
                <div class="public_index">
                    <div class="information_index">
                        <div class="remind">
                            <div class="yjtg">
                                <h2>商城推广，让会员加盟：</h2>
                                <div class="yjtg_con">
                                    <textarea name="" cols="" rows="" id="txtContent">我刚开了微店，跪求人气，来访我网店者，每人都有惊喜相送：<?php echo $this->_var['site_url']; ?>/?app=member&act=register&parent_id=<?php echo $this->_var['user']['user_id']; ?>
                                    </textarea>
                                </div>
                                <div class="yjtg_txt">
                                    <div class="yjtg_button" id="btncopy">复制内容</div>
                                    <span>复制后粘贴到QQ群、QQ、微博、博客、论坛、或者通过邮件，均可推广！ 点击此链接进入你微店的访客，会自动成为你的分销商！</span>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <script type="text/javascript">
                        $('#btncopy').zclip({
                            path: "<?php echo $this->lib_base . "/" . 'ZeroClipboard.swf'; ?>",
                            copy: function() {
                                return $('#txtContent').val();　　　　　
                            }
                        });
                        </script>
                    </div>
                </div>
                <div class="wrap_bottom"></div>
            </div>
            <div class="col-1">
                <div class="buyer-notice box-notice box">
                    <div class="hd clearfix">
                        <h2>买家提醒</h2>
                    </div>
                    <div class="bd dealt">
                        <div class="list">
                            <h4>您需要立即处理：</h4>
                            <dl class="clearfix">
                                <dt>订单提醒：</dt>
                                <dd>
                                    <span><?php echo sprintf('<a href="index.php?app=buyer_order&type=pending">待付款订单(<em>%s</em>)</a>', $this->_var['buyer_stat']['pending']); ?></span>
                                    <span>
                                    <?php echo sprintf('<a href="index.php?app=buyer_order&type=shipped">待确认的订单(<em>%s</em>)</a>', $this->_var['buyer_stat']['shipped']); ?>
                                </span>
                                    <span>
                                    <?php echo sprintf('<a href="index.php?app=buyer_order&type=finished">待评价的订单(<em>%s</em>)</a>', $this->_var['buyer_stat']['finished']); ?>
                                </span>
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                <dt>团购提醒：</dt>
                                <dd>
                                    <span>
                                    <?php echo sprintf('<a href="index.php?app=buyer_groupbuy&state=finished">待付款的团购(<em>%s</em>)</a>', $this->_var['buyer_stat']['groupbuy_finished']); ?>
                                </span>
                                    <span>
                                    <?php echo sprintf('<a href="index.php?app=buyer_groupbuy&state=canceled">已取消的团购(<em>%s</em>)</a>', $this->_var['buyer_stat']['groupbuy_canceled']); ?>
                                </span>
                                </dd>
                            </dl>
                        </div>
                        <div class="extra"></div>
                    </div>
                </div>
                <?php if ($this->_var['store'] && $this->_var['member_role'] == 'seller_admin'): ?>
                <div class="seller-notice box-notice box">
                    <div class="hd clearfix">
                        <h2>卖家提醒</h2>
                        <p></p>
                    </div>
                    <div class="bd">
                        <div class="list">
                            <dl class="clearfix">
                                <dt>订单提醒：</dt>
                                <dd>
                                    <span>
                                    <?php echo sprintf('<a href="index.php?app=seller_order&type=submitted">待处理的订单(<em>%s</em>)</a>', $this->_var['seller_stat']['submitted']); ?>
                                </span>
                                    <span>
                                    <?php echo sprintf('<a href="index.php?app=seller_order&type=accepted">待发货的订单(<em>%s</em>)</a>', $this->_var['seller_stat']['accepted']); ?>
                                </span>
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                <dt>团购提醒：</dt>
                                <dd>
                                    <span>
                                    <?php echo sprintf('<a href="index.php?app=seller_groupbuy&state=end">待确认的团购(<em>%s</em>)</a>', $this->_var['seller_stat']['groupbuy_end']); ?>
                                </span>
                                </dd>
                            </dl>
                        </div>
                        <div class="extra">
                            <span>店铺等级：<?php echo $this->_var['sgrade']['grade_name']; ?></span>
                            <span>
                            有效期：
                            <?php if ($this->_var['sgrade']['add_time']): ?>
                            <?php echo sprintf('剩余 %s 天', $this->_var['sgrade']['add_time']); ?>
                            <?php else: ?>
                            不限制
                            <?php endif; ?> </span>
                            <span>
                            商品发布：<?php echo $this->_var['sgrade']['goods']['used']; ?>/
                            <?php if ($this->_var['sgrade']['goods']['total']): ?>
                            <?php echo $this->_var['sgrade']['goods']['total']; ?>
                            <?php else: ?>
                            不限制
                            <?php endif; ?> </span>
                            <span>
                            空间使用：<?php echo $this->_var['sgrade']['space']['used']; ?>M/
                            <?php if ($this->_var['sgrade']['space']['total']): ?>
                            <?php echo $this->_var['sgrade']['space']['total']; ?>M
                            <?php else: ?>
                            不限制
                            <?php endif; ?> </span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->_var['_member_menu']['overview']): ?>
                <div class="apply-notice box-notice box">
                    <div class="hd clearfix">
                        <h2>开店提醒</h2>
                    </div>
                    <div class="bd">
                        <div class="extra">
                            <?php if ($this->_var['applying']): ?>
                            <?php echo sprintf('您的店铺正在审核中。你可以<a href="index.php?app=apply&step=2&id=%s">查看或修改店铺信息</a>', $this->_var['user']['sgrade']); ?>
                            <?php else: ?>
                            您目前不是卖家，您可以：
                            <a href="<?php echo $this->_var['_member_menu']['overview']['url']; ?>" title="<?php echo $this->_var['_member_menu']['overview']['text']; ?>"><?php echo $this->_var['_member_menu']['overview']['text']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-2">
                <div class="mall-notice box">
                    <div class="hd clearfix">
                        <h2>商城公告</h2>
                    </div>
                    <ul class="bd">
                        <?php $_from = $this->_var['system_notice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                        <li>
                            <a href="<?php echo url('app=article&act=view&article_id=' . $this->_var['article']['article_id']. ''); ?>" target="_blank"><?php echo sub_str(htmlspecialchars($this->_var['article']['title']),30); ?></a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
                <div class="mall-customer box">
                    <div class="hd">
                        <h2>平台客服联系方式</h2>
                    </div>
                    <ul class="bd">
                        <li>电话联系：021-68554667</li>
                        <li>手机联系：18216564563 小苗</li>
                        <li>电子邮件：service@zouliu.com </li>
                        <li>400电话：400-800-9358 </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
