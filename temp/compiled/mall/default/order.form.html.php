<?php echo $this->fetch('header1.html'); ?>

<div class="header">
    <div class="w1200 clearfix">
        <h1 class="logo fl mt15" title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>" width="236" height="70" alt="<?php echo $this->_var['site_title']; ?>"></a></h1>
        <ul class="steps fr clearfix mt30">
            <li class="step-off"><span>1</span><p class="step-off-txt">我的购物车</p></li>
            <li class="step-on"><span class="fontbold">2</span><p class="step-on-txt">确认订单信息</p></li>
            <li><span>3</span><p>付款</p></li>
            <li><span>4</span><p>确认收货</p></li>
            <li><span>5</span><p>评价</p></li>
        </ul>
    </div>
    
    <div class="clr"></div>
</div>

            <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.validate.js'; ?>" charset="utf-8"></script>
                <script type="text/javascript">
                    $('#order_form').validate({
                        invalidHandler:function(e, validator){
                         var err_count = validator.numberOfInvalids();
                         var msg_tpl = '很抱歉，您填写的订单信息中有&nbsp;<strong>{0}</strong>&nbsp;个错误(如红色斜体部分所示)，请检查并修正后再提交！:)';
                         var d = DialogManager.create('show_error');
                         d.setWidth(400);
                         d.setTitle(lang.error);
                         d.setContents('message', {type:'warning', text:$.format(msg_tpl, err_count)});
                         d.show('center');
                        },
                        errorPlacement: function(error, element){
                            var _message_box = $(element).parent().find('.field_message');
                            _message_box.find('.field_notice').hide();
                            _message_box.append(error);
                        },
                        success       : function(label){
                            label.addClass('validate_right').text('OK!');
                        },
                        rules : {
                            consignee : {
                                required : true
                            },
                            region_id : {
                                required : true,
                                min   : 1
                            },
                            address   : {
                                required : true
                            },
                            phone_tel : {
                                required : check_phone,
                                minlength:6,
                                checkTel : true
                            },
                            phone_mob : {
                                required : check_phone,
                                minlength:6,
                                digits : true
                            }
                        },
                        messages : {
                            consignee : {
                                required : '请如实填写您的收货人姓名'
                            },
                            region_id : {
                                required : '请选择所在地区',
                                min  : '请选择所在地区'
                            },
                            address   : {
                                required : '请如实填写收货人详细地址'
                            },
                            phone_tel : {
                                required : '固定电话和手机号码至少填一个',
                                minlength: '电话号码由数字、加号、减号、空格、括号组成,并不能少于6位',
                                checkTel : '电话号码由数字、加号、减号、空格、括号组成,并不能少于6位'
                            },
                            phone_mob : {
                                required : '固定电话和手机号码至少填一个',
                                minlength: '错误的手机号码,只能是数字,并且不能少于6位',
                                digits : '错误的手机号码,只能是数字,并且不能少于6位'
                            }
                        }
                    });
                function check_phone(){
                    return ($('#phone_tel').val() == '' && $('#phone_mob').val() == '');
                }
                </script>

<div class="jim-main">
  <form method="post" id="order_form">
    <div class="w1200 clearfix">
		    
      <?php echo $this->fetch('order.address.html'); ?>
		

		
		<div class="cart mt40">
			<?php echo $this->fetch('order.goods.html'); ?>
       
      <?php echo $this->fetch('order.amount.html'); ?>
	  </div>
		

    </div>    
</form>
</div>



<?php echo $this->fetch('footer.html'); ?>

</div>
</body>
<script src="<?php echo $this->lib_base . "/" . 'jquery-1.9.1.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $this->lib_base . "/" . 'allcate.js'; ?>" type="text/javascript" charset="utf-8"></script>

</html>
