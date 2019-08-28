<?php echo $this->fetch('header1.html'); ?>
<script type="text/javascript">
$(function() {
    // 全选
    $("input[name='sellect_all']").click(function() {
        $("input[type='checkbox']").prop("checked", this.checked);
        set_amount();
    });
    $("#check_all").click(function() {
        $("input[type='checkbox']").prop("checked", this.checked);
        set_amount();
    });
    // 店铺全选
    $(".order-list  input[name='store_id']").click(function(event) {
        $(".order-list ul li .cart-checkbox input[id='" + $(this).val() + "']").prop("checked", this.checked);
        $(".order-list input[value='" + $(this).val() + "']").prop("checked", this.checked);
        set_amount();
    });

    // 批量删除/收藏
    $(".operation a").click(function() {
        var name = this.name;
        var id = this.id;
        var checked = 0;
        var _class = $(this).attr('class');
        if (_class == 'back') {
            return;
        }

        $(".goods_list input[type='checkbox']").each(function() {
            if ($(this).prop("checked") == true) {
                srg = $(this).val().split(":");
                if (name == "batch_del") {
                    drop_cart_item(srg[0], srg[1]);
                } else {
                    batch_move_favorite(srg[0], srg[1], srg[2], checked == 0);
                }
                checked++;
            }
        });
        if (!checked) {
            alert('你未选择任何项');
        }
        set_amount();
    });

    $("input[type='submit']").click(function() {

        var checked = 0;
        $(".goods_list input[type='checkbox']").each(function() {
            if ($(this).prop("checked") == true) {
                checked++;
            }
        });
        if (!checked) {
            alert('你未选择任何商品');
            return false;
        }
        set_amount();
    });

    $(".goods_list input[type='checkbox']").click(function(event) {
        set_amount();
        var id = this.id;
        $(".order-list  input[name='store_id[" + id + "]']").val(id);
    });

});

function set_amount() {
    var amount = 0;
    var cart_amount = 0;
    var cart_quantity = 0;
    $(".goods_list input[type='checkbox']").each(function(index, el) {
        var id = this.id;

        if ($(this).prop("checked") == true) {
            srg = $(this).val().split(":");
            //change_amount_by_check(srg[1]);
            amount = get_subtotal(srg[1]);
            quantity = 1;

        } else {
            srg = $(this).val().split(":");
            //change_amount_by_check_sub(srg[1]);
            amount = 0;
            quantity = 0;
        }
        cart_amount = parseFloat(amount) + parseFloat(cart_amount);
        cart_quantity = parseFloat(cart_quantity) + parseFloat(quantity);
    });

    $("#cart_amount_bottom").attr('amount', cart_amount);
    $("#cart_amount_bottom").html(price_format(cart_amount));
    $("#cart_amount_top").html(price_format(cart_amount));
    $('#cart_quantity').html(cart_quantity);
}

function get_subtotal(rec_id) {
    var amount = $("#item" + rec_id + "_subtotal").attr("amount");
    return amount;
}
/*function change_amount_by_check(rec_id)
{
   var amount=$("#item"+rec_id+"_subtotal").attr("amount");
   var cart_amount=$("#cart_amount_bottom").attr('amount');
   
   if(!amount)
   {
    amount=0;
   }
   if(!cart_amount)
   {
     cart_amount=0;
   }
   var total_amount=parseFloat(amount)+parseFloat(cart_amount);
   $("#cart_amount_bottom").attr('amount',total_amount);
   $("#cart_amount_bottom").html(price_format(total_amount));
   $("#cart_amount_top").html(price_format(total_amount));
}
function change_amount_by_check_sub(store_id,rec_id)
{
  var amount=$("#item"+rec_id+"_subtotal").attr("amount");
  var cart_amount=$("#cart_amount_bottom").attr('amount');
  if(!amount)
  {
    amount=0;
   }
   if(!cart_amount)
   {
     cart_amount=0;
   }
   var total_amount=parseFloat(cart_amount)-parseFloat(amount);
   if (total_amount<=0) {
      total_amount=0;
    }
   $("#cart_amount_bottom").attr('amount',total_amount);
   $("#cart_amount_bottom").html(price_format(total_amount));
   $("#cart_amount_top").html(price_format(total_amount));
}*/
</script>

<div class="header">
    <div class="w1200 clearfix">
        <h1 class="logo fl mt15" title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>" width="236" height="70" alt="<?php echo $this->_var['site_title']; ?>"></a></h1>
        <ul class="steps fr clearfix mt30">
            <li class="step-on"><span class="fontbold">1</span>
                <p class="step-on-txt">我的购物车</p>
            </li>
            <li><span>2</span>
                <p>确认订单信息</p>
            </li>
            <li><span>3</span>
                <p>付款</p>
            </li>
            <li><span>4</span>
                <p>确认收货</p>
            </li>
            <li><span>5</span>
                <p>评价</p>
            </li>
        </ul>
    </div>
</div>


<div class="jim-main">
    <div class="w1200 clearfix">
        
        <div class="cart mt40">
            <h2><strong>我的购物车</strong><span style="display:;">已选商品(不含运费)：<b class="color02" id="cart_amount_top"><?php echo price_format($this->_var['carts']['cart_amount']); ?></b><i>结算</i></span></h2>
            <div class="cart-main">
                <div class="cart-table-th clearfix fontsimsun">
                    <div class="th-chk fl">
                        <div class="cart-checkbox">
                            <input type="checkbox" value="true" name='sellect_all' id="sellect_all">
                        </div>
                        全选/反选
                    </div>
                    <div class="th-item fl">商品信息</div>
                    <div class="th-info fl">&nbsp;</div>
                    <div class="th-price fl">单价（元）</div>
                    <div class="th-amount fl">数量</div>
                    <div class="th-sum fl">金额（元）</div>
                    <div class="th-op fl" style="text-align: center;">操作</div>
                </div>
            </div>
            <div class="order-list fontsimsun">
                <form method="get" enctype="multipart/form-data">
                    <input type="hidden" name="app" value="order" />
                    <input type="hidden" name="goods" value="cart" />
                    <?php $_from = $this->_var['carts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('store_id', 'cart');if (count($_from)):
    foreach ($_from AS $this->_var['store_id'] => $this->_var['cart']):
?>
                    <div class="shopbar">
                        <div class="shop-info">
                            <div class="cart-checkbox" id="<?php echo $this->_var['cart']['store_id']; ?>">
                                <input type="checkbox" name="store_id" value="<?php echo $this->_var['store_id']; ?>">店铺:
                                <a href="<?php echo url('app=store&id=' . $this->_var['store_id']. ''); ?>">
                                    <u><?php echo htmlspecialchars($this->_var['cart']['store_name']); ?></u>
                                </a>
                                <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=1009618401&site=cntaobao&s=2&charset=utf-8">
                                    <img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=1009618401&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息" />
                                </a>&nbsp;
                                <a target=blank href=http://wpa.qq.com/msgrd?V=1&Uin=1009618401&Site=商城客服&Menu=yes>
                                    <img border="0" SRC=http://wpa.qq.com/pa?p=1:1009618401:8 alt="点击这里给我发消息"></a>
                            </div>
                        </div>
                        <div class="order-promot-info"></div>
                    </div>
                    <div class="goods_list">
                        <?php $_from = $this->_var['cart']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <ul class="item-content clearfix">
                            <li class="td-chk fl">
                                <div class="cart-checkbox">
                                    <input type="checkbox" id="<?php echo $this->_var['store_id']; ?>" name="rec_id[<?php echo $this->_var['goods']['rec_id']; ?>]" value="<?php echo $this->_var['store_id']; ?>:<?php echo $this->_var['goods']['rec_id']; ?>:<?php echo $this->_var['goods']['goods_id']; ?>">
                                </div>
                            </li>
                            <li class="td-item fl">
                                <div class="td-inner">
                                    <div class="item-pic fl">
                                        <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="80" height="80"></a>
                                    </div>
                                    <div class="item-info fl ml10">
                                        <div class="item-basic-info lineheight18"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></div>
                                        <div class="item-other-info">
                                            <!--<a href="#" target="_blank"><img src="themes/mall/skin//images/zheng-01.gif" alt=""></a>-->
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="td-info fl lineheight18">
                                <p class="sku-line">&nbsp;<?php echo htmlspecialchars($this->_var['goods']['specification']); ?></p>
                            </li>
                            <li class="td-price fl">&nbsp;<?php echo price_format($this->_var['goods']['price']); ?></li>
                            <li class="td-amount fl">
                                <input id="min1" onclick="decrease_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);" alt="减少" class="addreduce" name="" type="button" value="-" />
                                <input id="input_item_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['quantity']; ?>" orig="<?php echo $this->_var['goods']['quantity']; ?>" changed="<?php echo $this->_var['goods']['quantity']; ?>" onkeyup="change_quantity(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['spec_id']; ?>, this);" type="text" style=" width:30px; text-align:center; border:1px solid #ccc;" />
                                <input id="add1" onclick="add_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);" alt="增加" class="addreduce" name="" type="button" value="+" />
                            </li>
                            <li class="td-sum fl"><b class="color02" id="item<?php echo $this->_var['goods']['rec_id']; ?>_subtotal" amount="<?php echo $this->_var['goods']['subtotal']; ?>"><?php echo price_format($this->_var['goods']['subtotal']); ?></b></li>
                            <li class="td-op fl lineheight18" style="text-align: center;"><a class="move" href="javascript:;" onclick="move_favorite(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['goods_id']; ?>);">加入收藏夹</a>
                                <br><a class="del" href="javascript:;" onclick="drop_cart_item(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>);">删除</a></li>
                        </ul>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <div class="cal-bar mt20 fontsimsun clearfix">
                        <div class="operation">
                            <div class="cart-checkbox">
                                <input type="checkbox" id="check_all">
                            </div>全选
                            <a href="javascript:;" name="batch_del" id="s<?php echo $this->_var['store_id']; ?>" title="批量删除">批量删除</a>|
                            <a href="javascript:;" name="batch_collect" id="s<?php echo $this->_var['store_id']; ?>" title="批量收藏">移入收藏夹</a>
                            <a href="<?php echo url('app=default'); ?>" class="back">继续购物</a>
                        </div>
                        <div class="total clearfix">
                            <div class="allselected fl">已选商品 <span class="color02 fontbold fontsize16 fontyahei" id="cart_quantity">0</span> 件</div>
                            <div class="transpay fl ml20">商品总价:&nbsp;&nbsp;<span class="color02 fontbold fontsize18 fontyahei" id="cart_amount_bottom" amount='<?php echo $this->_var['carts']['cart_amount']; ?>'><?php echo price_format($this->_var['carts']['cart_amount']); ?></span></div>
                            <div class="checkout fl">
                                <input type="submit" class="" value="填写并确认订单" id="submit" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        
        <ul class="ohterproduct mt30 clearfix">
            <?php $_from = $this->_var['interest']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <li>
                <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['default_image']; ?>" width="200" height="200" alt="">
                    <p style="text-overflow: ellipsis;white-space:nowrap;overflow:hidden;"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),42); ?></p>
                </a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        
    </div>
</div>


<?php echo $this->fetch('footer.html'); ?>

</div>
</body>

<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery/jquery-1.12.4.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery/jquery-migrate-1.4.1.js'; ?>" charset="utf-8"></script>

</html>
