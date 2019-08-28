


<?php echo $this->fetch('member.header.html'); ?>

<style>
.money_info>p {
    font-size: 1.2em;
}
.money_info>p>span {
    font-weight: bold;
    color: red;
}
.money_operation {
    margin-top: 2em;
}
.money_operation>input {
    margin-right: 1em;
    color: white;
    padding: 0.2em 0.5em;
}
.recharge_btn {
    border: 1px solid #007bcc;
    border-radius:4px;
    background: #007bcc;
}
.transfer_btn {
    border: 1px solid #ff8000;
    border-radius:4px;
    background: #ff8000;
}
.withdrawal_btn {
    border: 1px solid #ff8000;
    border-radius:4px;
    background: #ff8000;
}

</style>

<div class="content">
	<?php echo $this->fetch('member.menu.html'); ?>
	<div id="right">
		<?php echo $this->fetch('member.curlocal.html'); ?>
		<?php echo $this->fetch('member.submenu.html'); ?>
		<div class="wrap">
            <div class="money_info">
                <p>账户总余额：<span><?php echo price_format($this->_var['money_info']['money']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;总冻结：<span><?php echo price_format($this->_var['money_info']['money_dj']); ?></span></p>
                <p></p>
            </div>
            <div class="money_operation">
                <input class="recharge_btn" type="button" onclick="location.href = '<?php echo url('app=my_money&act=recharge'); ?>'" value="充值" />
                <input class="transfer_btn" type="button" onclick="location.href = '<?php echo url('app=my_money&act=transfer'); ?>'" value="转账" />
                <input class="withdrawal_btn" type="button" onclick="location.href = '<?php echo url('app=my_money&act=withdrawal'); ?>'" value="提现" />
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
