
<div class="cart mt40">
    <h2><strong>收货人地址</strong><span><a class="color688fab" href="<?php echo url('app=my_address'); ?>" target="_blank">管理收货地址</a></span></h2>
    <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'mlselection.js'; ?>" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.validate.js'; ?>" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'dialog/dialog.js'; ?>" id="dialog_js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.ui/jquery.ui.js'; ?>" id="dialog_js" charset="utf-8"></script>
    <script type="text/javascript">
        var shippings = <?php echo $this->_var['shippings']; ?>;
        var addresses = <?php echo $this->_var['addresses']; ?>;
        var order_amount=0;

        $(function(){

            regionInit("region");
            set_amount();

            $('ul[shipping_id]').click(function(event) {
                var store_id=$(this).attr('store_id');
                var this_radio=$(this).find('input[name="shipping_id['+store_id+']"]');
                this_radio.prop('checked',true);
                
                set_amount();
            });

            $('.address_item').click(function(){
                
                $(this).find("input[name='address_options']").prop('checked', true);
                $('.address_item').removeClass('address-on');
                $(this).addClass('address-on');
                set_address();
            });

            //init
            set_address();
        });

        function set_amount(){
            var _amount=0;
            var shipping_fee=0;
            $('.store').each(function() {
                var store_id=this.id;
                var amount_store=$(this).find('#amount_'+store_id).attr('amount');
                    
                $('ul[shipping_id]').each(function() {
                    var this_radio=$(this).find('input[name="shipping_id['+store_id+']"]');
                    if (this_radio.prop("checked")==true) {
                        shipping_fee=this_radio.attr('shipping_fee');
                        
                    }
                    
                });
                var _amount_store  = Number(amount_store) + Number(shipping_fee);
                $('#amount_'+store_id).html(price_format(_amount_store));
                _amount+=Number(_amount_store);
            });
            order_amount=_amount;
            $('#order_amount').html(price_format(_amount));
        }

        function check_phone(){
            return ($('#phone_tel').val() == '' && $('#phone_mob').val() == '');
        }

        function hide_error(){
            $('#region').find('.error').hide();
        }

        function set_address(){
                
            var addr_id = $("input[name='address_options']:checked").val();
            if(addr_id == 0)
            {
                $('#consignee').val("");
                $('#region_name').val("");
                $('#region_id').val("");
                $('#region select').show();
                $("#edit_region_button").hide();
                $('#region_name_span').hide();

                $('#address').val("");
                $('#zipcode').val("");
                $('#phone_tel').val("");
                $('#phone_mob').val("");
                $('#popup').show();
                $('#s-address').html("");
                $('#s-name').html("");
            }
            else
            {
                $('#popup').hide();
                fill_address_form(addr_id);
            }
        }

        function fill_address_form(addr_id){
            var addr_data = addresses[addr_id];
            var html_address;
            var html_name;
            html_address=addr_data['region_name']+" "+addr_data['address'];
            html_name=addr_data['phone_tel']?addr_data['consignee']+" "+addr_data['phone_tel']:addr_data['consignee']+" "+addr_data['phone_mob'];
                //alert(html_name);
            for(k in addr_data){
                switch(k){
                    case 'consignee':
                    case 'address':
                    case 'zipcode':
                    case 'email':
                    case 'phone_tel':
                    case 'phone_mob':
                    case 'region_id':
                        $("input[name='" + k + "']").val(addr_data[k]);
                    break;
                    case 'region_name':
                        $("input[name='" + k + "']").val(addr_data[k]);
                        $('#region select').hide();
                        $('#region_name_span').text(addr_data[k]).show();
                        $("#edit_region_button").show();
                    break;
                }
            }
                $('#s-address').html(html_address);
                $('#s-name').html(html_name);
        }

        function set_default(addr_id){
            $.getJSON('index.php?app=my_address&act=set_default&addr_id=' + addr_id, function(result){

                if(result){
                    //alert('设置成功！');
                    window.location.reload();    //刷新
                }else{
                    alert('设置失败！');
                }
            });
        }
    </script>
            
<?php if ($this->_var['my_address']): ?>
<ul class="address-list mt20 cursor">
    <?php $_from = $this->_var['my_address']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'address');$this->_foreach['address_select'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['address_select']['total'] > 0):
    foreach ($_from AS $this->_var['address']):
        $this->_foreach['address_select']['iteration']++;
?>
    <li class="<?php if ($this->_var['address']['set_default'] == 1): ?> address-on<?php endif; ?> address_item">
        <input type="radio" id="address_<?php echo $this->_var['address']['addr_id']; ?>" <?php if ($this->_var['address']['set_default'] == 1): ?> checked="true" <?php endif; ?> name="address_options" value="<?php echo $this->_var['address']['addr_id']; ?>" /><?php echo htmlspecialchars($this->_var['address']['region_name']); ?>&nbsp;&nbsp;<?php echo htmlspecialchars($this->_var['address']['address']); ?> (收货人姓名: <?php echo htmlspecialchars($this->_var['address']['consignee']); ?> 收)
        <?php if ($this->_var['address']['phone_mob']): ?><?php echo $this->_var['address']['phone_mob']; ?>
        <?php else: ?><?php echo $this->_var['address']['phone_tel']; ?>
        <?php endif; ?>
        <?php if ($this->_var['address']['set_default'] == 1): ?>
        <b class="color688fab fontnormal fontsize12 ml10"><img src="data/files/mall/template/address.png" />默认地址</b>
        <?php else: ?>
        <a href="javascript:set_default(<?php echo $this->_var['address']['addr_id']; ?>);" id="<?php echo $this->_var['address']['addr_id']; ?>" class="defaultadd color688fab ml10">设置为默认收货地址</a>
        <?php endif; ?>
        <span style="float: right;"><a href="<?php echo url('app=my_address'); ?>" target="_blank" class="color688fab">修改本地址</a></span>
    </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php endif; ?>
<div class="new-address mt10 ml20 address_item">
    <input type="radio" name="address_options" id="use_new_address" value="0" />
    <a href="javascript:void(0);"><img src="data/files/mall/template/new-address.png" style="vertical-align:text-bottom;" /></a>
</div>
<ul id="popup" style="border: 1px solid #ccc;padding: 20px 20px;margin-top: 20px;margin-left: 40px;">
    <li class="mt10">
        <strong>收货人姓名:</strong>
        <input type="text" name="consignee" id="consignee" class="text1" />
        <i class="fongsimsun color999">请填写真实姓名</i>
        <div class="clr"></div>
    </li>
    <li class="mt10"><strong>所在地区:</strong>
        <div id="region" style="display: inline">
            <span style="display:none;" id="region_name_span"></span>
            <input id="edit_region_button" type="button" class="edit_region" value="编辑" style="display:none;" />
            <select onchange="hide_error();">
                <option value="0">请选择...</option>
                <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
            </select>
            <input type="hidden" class="mls_id" name="region_id" id="region_id" />
            <input type="hidden" name="region_name" class="mls_names" id="region_name" />
            <b style="font-weight:normal;" class="field_message explain"><i class="fongsimsun color999">请选择地区</i><div class="clr"></div></b>
        </div>
    </li>
    <li class="mt10">
        <strong>详细地址:</strong>
        <input type="text" name="address" id="address" class="text1 width1" /><i class="fongsimsun color999">请填写真实地址，不需要重复填写所在地区</i>
        <div class="clr"></div>
    </li>
    <li class="mt10">
        <strong>邮政编码:</strong>
        <input type="text" name="zipcode" id="zipcode" class="text1" /><i class="fongsimsun color999">邮政编码</i>
        <div class="clr"></div>
    </li>
    <li class="mt10">
        <strong>电话号码:</strong>
        <input type="text" name="phone_tel" id="phone_tel" class="text1" />
        <i class="fongsimsun color999">固定电话和手机至少填一项</i>
        <div class="clr"></div>
    </li>
    <li class="mt10">
        <strong>手机号码:</strong>
        <span><input type="text" id="phone_mob" name="phone_mob" class="text1" /></span>
        <i class="fongsimsun color999">手机和固定电话至少填一项</i>
        <div class="clr"></div>
    </li>
    <li class="mt10">
        <input style="border:0;" type="checkbox" value="1" id="save_address" name="save_address"><span class="explain f66" style="letter-spacing: 2px;">自动保存收货地址<i class="fongsimsun color999">(选择后该地址将会保存到您的收货地址列表)</i></span>
    </li>
    <li class="pl20 mt10" style="display: none;">
        <a href="javascript:void();"><img src="data/files/mall/template/new-address-sure.gif" /></a>
        <a href="javascript:void();"><img src="data/files/mall/template/new-address-cancel.gif" /></a>
    </li>
</ul>
</div>
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>

