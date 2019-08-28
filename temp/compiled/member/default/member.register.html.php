<?php echo $this->fetch('header.html'); ?>
<link href="<?php echo $this->res_base . "/" . 'css/login.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//注册表单验证
$(function(){
    $('#register_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('em');
            error_td.find('.field_notice').hide();
            error_td.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup: false,
        rules : {
            user_name : {
                required : true,
                byteRange: [3,15,'<?php echo $this->_var['charset']; ?>'],
                remote   : {
                    url :'index.php?app=member&act=check_user&ajax=1',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#user_name').val();
                        }
                    },
                    beforeSend:function(){
                        var _checking = $('#checking_user');
                        _checking.prev('.field_notice').hide();
                        _checking.next('label').hide();
                        $(_checking).show();
                    },
                    complete :function(){
                        $('#checking_user').hide();
                    }
                }
            },
            password : {
                required : true,
                minlength: 6
            },
            password_confirm : {
                required : true,
                equalTo  : '#password'
            },
            email : {
                required : true,
                email    : true
            },
            captcha : {
                required : true,
                remote   : {
                    url : 'index.php?app=captcha&act=check_captcha',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha1').val();
                        }
                    }
                }
            },
            agree : {
                required : true
            }
        },
        messages : {
            user_name : {
                required : '您必须提供一个用户名',
                byteRange: '用户名必须在3-15个字符之间',
                remote   : '您提供的用户名已存在'
            },
            password  : {
                required : '您必须提供一个密码',
                minlength: '密码长度应在6-20个字符之间'
            },
            password_confirm : {
                required : '您必须再次确认您的密码',
                equalTo  : '两次输入的密码不一致'
            },
            email : {
                required : '您必须提供您的电子邮箱',
                email    : '这不是一个有效的电子邮箱'
            },
            captcha : {
                required : '请输入右侧图片中的文字',
                remote   : '验证码错误'
            },
            agree : {
                required : '您必须阅读并同意该协议,否则无法注册'
            }
        }
    });
});
</script>
<div class="loginbg" style="height: 600px;">
    <div class="loginptb">
        <div class="logleft">
            <form name="" id="register_form" method="post" action="">
                <div class="login">
                    <h1>填写注册信息</h1>
                    <ul>
                        <li><u>用户名:</u>
                            <em><input type="text" id="user_name" name="user_name" placeholder="用于登录的名字" />
                                <label class="field_notice"></label>
                                <label id="checking_user" class="checking"></label>
                            </em>
                        </li>
                        <li>
                            <u>密&nbsp;&nbsp;&nbsp;码:</u>
                            <em><input type="password" id="password" name="password" placeholder="您的密码" />
                                <label class="field_notice"></label>
                            </em>
                        </li>
                        <li>
                            <u>确认密码:</u>
                            <em><input type="password" name="password_confirm" placeholder="重复输入您的密码" />
                                <label class="field_notice"></label>
                            </em>
                        </li>
                        <li>
                            <u>电子邮箱:</u>
                            <em><input type="text" name="email" placeholder="请输入一个有效的电子邮箱地址" />
                                <label class="field_notice"></label>
                            </em>
                        </li>
                        <li>
                            <u>直接上级:</u>
                            <em>
                                <input type="text" name="parent_name" value="<?php echo $this->_var['parent_name']; ?>" placeholder="推荐你注册的用户名" />
                            </em>
                        </li>
                        <?php if ($this->_var['captcha']): ?>
                        <li>
                            <u>验证码:</u>
                            <em>
                                <input type="text" name="captcha" id="captcha1" placeholder="请输入图片中的文字,点击图片以更换" />
                                <a href="javascript:change_captcha($('#captcha'));"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a>
                                <label class="field_notice"></label>
                            </em>
                        </li>
                        <?php endif; ?>
                        <li>
                            <b>
                            <i><input id="clause" type="checkbox" name="agree" value="1" /> <label for="clause">我已阅读并同意 <a href="<?php echo url('app=article&act=system&code=eula'); ?>" target="_blank" class="agreement">《用户服务协议》</a></label></i></b>
                        </li>

                        <li class="logintip">
                            <span class="valid_success"></span>
                            <font></font>
                        </li>   
                        <li>
                            <u></u>
                            <ol colspan="2"><input type="submit" name="Submit" value="立即注册" class="Submit" title="立即注册" /></ol><input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
                        </li>
                    </ul>
                </div>
            </form>
        </div>

        <div class="logright">
            <a href="#">
                <img src="data/files/mall/template/201309050141133314.jpg" />
            </a>
            <div class="login" style="border-right: 0;margin-bottom: 10px;">
                <ol class="a2">
                    <div class="nologin" >已经拥有账号</div>
                    <div class="register"><div class="registera">
                        <a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">用户登录</a></div>
                    </div>&nbsp;
                    或者
                    <a href="<?php echo url('app=find_password'); ?>" class="clew">找回密码</a>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>
