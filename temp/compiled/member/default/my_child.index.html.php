


<?php echo $this->fetch('member.header.html'); ?>

<script type="text/javascript" src='<?php echo $this->lib_base . "/" . 'jquery.zclip.min.js'; ?>'></script>
<style>

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
</style>

<div class="content">
	<?php echo $this->fetch('member.menu.html'); ?>
	<div id="right">
		<?php echo $this->fetch('member.curlocal.html'); ?>
		<?php echo $this->fetch('member.submenu.html'); ?>
		<div class="platform clearfix">
            <div class="wrap_line margin15" style="width: auto;">
                <div class="public_index">
                    <div class="information_index">
                        <div class="remind">
                            <div class="yjtg">
                                <h2>推广下级：</h2>
                                <div class="yjtg_con">
                                    <textarea id="txtContent">我刚注册了，每人都有惊喜相送：<?php echo $this->_var['site_url']; ?>/?app=member&act=register&parent_id=<?php echo $this->_var['user_id']; ?></textarea>
                                </div>
                                <div class="yjtg_txt">
                                    <div class="yjtg_button" id="btncopy">复制内容</div>
                                    <span>复制后粘贴到微博、博客、论坛等，均可推广！点击此链接进入注册，会自动成为你的下级！</span>
                                </div>
                            </div>
                            <div style="clear: both"></div>

                        </div>
                        <script type="text/javascript">
                        $('#btncopy').zclip({
                            path: "<?php echo $this->lib_base . "/" . 'ZeroClipboard.swf'; ?>",
                            copy: function(){
                                return $('#txtContent').val();
                            }
                        });
                        </script>
                    </div>
                </div>
                <div class="wrap_bottom"></div>
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
