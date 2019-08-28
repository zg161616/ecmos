<script type="text/javascript">
$(function(){
  $('#use_coupon').click(function(event) {
    $(this).parent('p').next().toggle();
    $('#coupon_sn').val('');
    $('#my_coupon').val(0);
    if ($(this).val()=='使用优惠券') {

      $(this).val('不使用优惠券'); 
    }else{
      $(this).val('使用优惠券'); 
    }
    compute_amount();
  });
   $('#check_coupon').click(function(){
       var coupon_sn = $('#coupon_sn').val();
       if(coupon_sn == '')
       {
           return;
       }
       $.getJSON("index.php?app=order&act=check_coupon", {coupon_sn: coupon_sn, store_id: '<?php echo $_GET['store_id']; ?>'}, function(data){
           if(data['retval'])
           {
               $('.unusable').hide();
               var msg = '有效 该优惠券的优惠价格为';
               var str = price_format(data['retval']['price']);
               $('.usable').show().html(msg + str).css("display","block");
               $('#my_coupon').val(data['retval']['price']);
           }
           else
           {
               $('.usable').hide();
               $('.unusable').show().css("display","block");
               $('#coupon_sn').val('');
               $('#my_coupon').val(0);
           }
           compute_amount();
       });
   });
  $('#use_money').click(function(){
    $(this).parent('p').next().toggle();
    
    var my_money=<?php echo ($this->_var['my_money']['money'] == '') ? '0' : $this->_var['my_money']['money']; ?>;
    var my_coupon=$('#my_coupon').val();
    my_coupon=parseFloat(my_coupon);
    my_money=parseFloat(my_money);
    var _amount=order_amount-my_coupon;
    var min=my_money<_amount ? my_money :_amount;
      min=deal(min);
      //alert(min);
    if($(this).val()=='使用余额'){
      
      $('#submit').hide();
      
      $('#my_money').val(min);
      $(this).val('不使用余额'); 
      $('.my_money_note').html('');
      
    }else{
      
      $('#my_money').val(0);
      $(this).val('使用余额')
      $('#submit').show();
      
    }
    compute_amount();

  }); 

  $('#my_money').blur(function(event) {
    var my_money_can=$('#my_money').val();
    var my_money=<?php echo ($this->_var['my_money']['money'] == '') ? '0' : $this->_var['my_money']['money']; ?>;
    if (my_money_can>my_money) {

      $(this).val(0);
      $('.my_money_note').html('输入余额超出最大值！');

    }else{
      my_money_can=deal(my_money_can);
      $(this).val(my_money_can);
   
      compute_amount();
      $('.my_money_note').html('');
    }

  });
  $('#submit').click(function(event) {
      
      compute_amount();
  });
  $('#use_password').click(function(event) {
    var password=$('#password').val();
    $.getJSON('/index.php?app=member&act=valid_pwd&password='+ password, 
      function(data) {  
        if(data)
        {
          $('#submit').show();
        }else{
          $('#submit').hide();
          alert('密码错误，请重输入');
      } 
    });
  });

  function compute_amount()
  {
    var my_money= $('#my_money').val();
    var my_coupon= $('#my_coupon').val();
    my_money=parseFloat(my_money);
    my_coupon=parseFloat(my_coupon);

    var _amount=order_amount-my_coupon-my_money;

    if(_amount<0)
    {
      _amount=0;
    }
    _amount=_amount.toFixed(2);
     $('#order_amount').html(price_format(_amount));
  }
  function deal(number){
    number=parseFloat(number);
    number=number*100;
    number=Math.round(number);
    number=number/100;
    return number;
  }
});
</script>
<style type="text/css">
.make_coupon{background-color: #f9f9f9;padding: 5px 10px;float: right;width: 98%;}
.make_coupon .btn1{height: 30px;width: 100px;text-align: center;border: 0;line-height: 30px;background-color: #9ddc9d;margin-left:90%;color: #fff;font-weight: bold;}
.make_coupon .p2{display: none;margin: 5px 0 5px 67%;padding: 5px 5px;border: 1px solid #eee;}
.make_coupon .p2 .check{height: 25px;width: 100px;text-align: center;border: 0;line-height: 25px;background-color: #9ddc9d;color: #fff;font-weight: bold;margin-left: 8px;}
.make_coupon span{margin: 5px 0;line-height: 30px;padding: 5px;}
.make_coupon .usable{margin-left: -1;display: none;}
.make_coupon .unusable{margin-left: -1;display: none;}

.make_coupon .p2 b{line-height: 30px;display: block;}
.nota {background-color: #ccc;}
</style>



<div class="make_coupon mb5 mt5" style="display: none;">
  <p>  
    <input id="use_money" type="button" class="btn1" value="使用余额" />
  </p>  
  <p class="p2">
    请输入抵扣余额：
    <input name="my_money" id="my_money"  class='text1' value="0" type="text">
    <?php echo price_format($this->_var['my_money']['money']); ?>
    <span class='my_money_note' style="color: #BD0000;"></span>
    <b style="<?php if ($this->_var['my_money']['zf_pass']): ?>display:none;<?php endif; ?>">
        <font color="red">警告！你还没有设置支付密码，请</font>      
        <a href="<?php echo url('app=my_money&act=setting'); ?>" target="_blank">设置支付密码</a>
        <span class="epay_btn">
          <a href="javascript:history.go(0);" target="_blank">设置支付密码后，刷新页面即可</a>
        </span>
    </b>   
    
    <b style="<?php if (! $this->_var['my_money']['zf_pass']): ?>display:none;<?php endif; ?>">
      请输入支付密码：
      <input name="password" id="password"  class='text1' type="password" style="width: 117px;">
      <input id="use_password" type="button" class="check" style="margin-left: 10px;" value="验证密码" />
    </b>
  </p>
  
</div>


<div class="card-border fr">
    <div class="card">
        <p><strong>实付款：</strong><span class="color02 fontbold fontsize24" id="order_amount"><?php echo price_format($this->_var['goods_info']['amount']); ?></span></p>
        <p><strong>寄送至:</strong> <span id="s-address" class="color666"></span></p>
        <p><strong>收货人:</strong><span id="s-name" class="color666"></span></p>
    </div>
</div>

<div class="clr"></div>

<div class="order-list-btn fr">
  <a href="<?php echo url('app=cart&store_id=' . $this->_var['goods_info']['store_id']. ''); ?>" class="back-cart fontsimsun" style="height: 40px;line-height: 40px;"> << 返回购物车</a>
    <a href="javascript:void($('#order_form').submit());" id="submit" class="dpl-button ml10">提交订单</a>
</div>

<div class="clr"></div>