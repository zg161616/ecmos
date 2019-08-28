<?php echo $this->fetch('header.html'); ?>
<link href="<?php echo $this->res_base . "/" . 'css/login.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(function(){
    $('#login_form').validate({
        errorPlacement: function(error, element){
            $(element).parent('em').append(error); 
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup : false,
        rules : {
            user_name : {
                required : true
            },
            password : {
                required : true
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
            }
        },
        messages : {
            user_name : {
                required : '您必须提供一个用户名'
            },
            password  : {
                required : '您必须提供一个密码'
            },
            captcha : {
                required : '请输入右侧图片中的文字',
                remote   : '验证码错误'
            }
        }
    });
});
</script>
<style>

</style>
<div class="loginbg">
    <div class="loginptb">
        <div class="logleft">
            <form method="post" id="login_form">
                <div class="login">
                    <h1>用户登录</h1>
                    <ul>
                        <li><u>用户名: </u>
                            <em><input type="text" name="user_name" placeholder="用户名" /></em>
                        </li>
                    
                        <li><u>密&nbsp;&nbsp;&nbsp;码:  </u>
                            <em><input type="password" name="password" placeholder="密码" /></em>
                        </li>
                        <?php if ($this->_var['captcha']): ?>
                        <li><u>验证码:</u>
                            <em>
                                <input type="text" name="captcha" id="captcha1" />
                                <span><a href="javascript:change_captcha($('#captcha'));" class="renewedly"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a></span>
                            </em>
                        </li>
                        <?php endif; ?>
                        <li class="logintip">
                            <span class="valid_success"></span>
                            <font></font>
                        </li>
                        <ol class="a2">
                            <input type="submit" name="Submit" value="用户登录" class="Submit" />
                            <a href="<?php echo url('app=find_password'); ?>" class="clew">忘记密码？</a>
                        </ol>
                        <ol class="a2">
                            
                            <div class="noregister">如果您还不是会员，请<a href="<?php echo url('act=anyoneRegister'); ?>">匿名登陆 或者</a></div>
                            <div class="register"><div class="registera">
                                <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a></div>
                                </div>
                        </ol>
                    </ul>
                </div>
                <input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
            </form>
        </div>

        <div class="logright">
            <a href="#">
                <img src="data/files/mall/template/201309050141133314.jpg" />
            </a>
        </div>
    </div>
</div>
<style type="text/css">
    .login ol .noregister{
        width:auto;
    }
</style>

<?php echo $this->fetch('footer.html'); ?>