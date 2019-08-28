<?php echo $this->fetch('member.header.html'); ?>
<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}
</style>
<script type="text/javascript">

$(function(){
    $('#profile_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        rules : {
            birthday : {
                dateISO:true
            },
            im_qq      : {
                digits:true
            },
            im_msn      : {
                email:true
            },
            phone_tel      : {
                checkTel     : true
            },
            portrait : {
                accept   : 'gif|jpe?g|png'
            }
        },
        messages : {
            birthday  : {
                dateISO   : '请输入正确的生日'
            },
            im_qq      : {
                digits:'QQ格式不正确'
            },
            im_msn      : {
                email:'MSN格式不正确'
            },
            phone_tel      : {
                checkTel   : '电话格式不正确'
            },
            portrait  : {
                accept   : '支持gif、jpeg、jpg、png格式'
            }
        }
    });

   

});

jQuery.validator.addMethod("phone_mob", function(value, element) {

    var length = value.length;

    var mobile =  /^[1][3-9][0-9]{9}$/

    return this.optional(element) || (length == 11 && mobile.test(value));

}, "手机号码格式错误");
</script>
<script type="text/javascript">


      //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 260; 
          var MAXHEIGHT = 180;
          var div = $('.photo p');
          if (file.files && file.files[0])
          {

              var img = document.getElementById('my_avatar');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                //img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            var img = document.getElementById('my_avatar');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.html("<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;"+sFilter+src+"\"'></div>");
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
</script> 
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
    		<?php echo $this->fetch('member.curlocal.html'); ?>
            <?php echo $this->fetch('member.submenu.html'); ?>
            <div class="wrap">
                <div class="public">
                <form method="post" enctype="multipart/form-data" id="profile_form">
                    <div class="information">
                        <?php if (! $this->_var['edit_avatar']): ?>
                        <div class="photo width13">
                            <p><img src="<?php if ($this->_var['profile']['portrait']): ?><?php echo $this->_var['profile']['portrait']; ?>?<?php echo $this->_var['random_number']; ?><?php else: ?><?php echo $this->_var['site_url']; ?>/data/system/default_user_portrait.gif<?php endif; ?>" width="120" height="120" alt="" ectype="avatar" id="my_avatar"/></p>
                           <a class="detlink float_right" href="<?php echo url('app=member_photo&act=add_photo'); ?>">修改头像</a>
                        </div>
                        <?php endif; ?>
                        <div class="info individual">
                            <table>
                                <tr>
                                    <th class="width4">用户名: </th>
                                    <td><?php echo htmlspecialchars($this->_var['profile']['user_name']); ?></td>
                                </tr>
                                <tr>
                                    <th>电子邮箱:</th>
                                    <td><?php echo $this->_var['profile']['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>手机:</th>
                                    <td><?php echo $this->_var['profile']['phone_mob']; ?></td>
                                </tr>
                                <tr>
                                    <th>真实姓名:</th>
                                    <td><input type="text" class="text width_normal" name="real_name" value="<?php echo htmlspecialchars($this->_var['profile']['real_name']); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>性别: </th>
                                    <td class="label">
                                        <label><input type="radio" name="gender" value="0" <?php if ($this->_var['profile']['gender'] == 0): ?>checked="checked"<?php endif; ?> />保密 </label>
                                        <label><input type="radio" name="gender" value="1" <?php if ($this->_var['profile']['gender'] == 1): ?>checked="checked"<?php endif; ?> />男 </label>
                                        <label><input type="radio" name="gender" value="2" <?php if ($this->_var['profile']['gender'] == 2): ?>checked="checked"<?php endif; ?> />女 </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>生日: </th>
                                    <td>
                                        <input type="text" class="text width_normal" name="birthday" id="birthday" value="<?php echo htmlspecialchars($this->_var['profile']['birthday']); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>QQ:</th>
                                    <td> <input type="text" class="text width_normal" name="im_qq" id="im_qq" value="<?php echo htmlspecialchars($this->_var['profile']['im_qq']); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>MSN:</th>
                                    <td><input type="text"  class="text width_normal"name="im_msn" id="im_msn" value="<?php echo htmlspecialchars($this->_var['profile']['im_msn']); ?>" /></td>
                                </tr>
                                <?php if ($this->_var['edit_avatar']): ?>
                                <tr>
                                    <th>头像:</th>
                                    <td><?php echo $this->_var['edit_avatar']; ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th></th>
                                    <td><input type="submit" class="btn" value="保存修改" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                </div>
                <div class="wrap_bottom"></div>
            </div>

            <div class="clear"></div>
            <div class="adorn_right1"></div>
            <div class="adorn_right2"></div>
            <div class="adorn_right3"></div>
            <div class="adorn_right4"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
