<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#article_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        rules : {    
         
        },
        messages : {
          
        }
    });
});


</script>

<div id="rightTop">
    <p>管理</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=wxmenu">微信菜单</a></li>
       
    </ul>
</div>


<div class="info">
    <form method="post" enctype="multipart/form-data" id="article_form">
            <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    接口配置URL:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="url" type="text" name="url" value="<?php echo htmlspecialchars($this->_var['wx_config']['url']); ?>" readonly/>
                </td>
            </tr>
           
            <tr>
                <th class="paddingT15">
                    接口配置Token:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="token" type="text" name="token" value="<?php echo htmlspecialchars($this->_var['wx_config']['token']); ?>" readonly/>
                    <a href="javascript:void(0);"  target="_blank" class="btn1 create_rand">生成TOKEN</a>
                </td>
            </tr>

             <tr>
                <th class="paddingT15">
                    微信APPID</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="appid" type="text" name="appid" value="<?php echo htmlspecialchars($this->_var['wx_config']['appid']); ?>" />
                    
                </td>
            </tr>

             <tr>
                <th class="paddingT15">
                    微信APPSECRET</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="appsecret" type="text" name="appsecret" value="<?php echo htmlspecialchars($this->_var['wx_config']['appsecret']); ?>" />
                </td>
            </tr>
            
        <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="提交" />
                <input class="formbtn" type="reset" name="Submit2" value="重置" />
            </td>
        </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
$('.create_rand').click(function(){
   var rand_code=generateMixed(12);
   $('#token').val(rand_code);
});

function generateMixed(n) {
    var chars = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
     var res = "";
     for(var i = 0; i < n ; i ++) {
         var id = Math.ceil(Math.random()*35);
         res += chars[id];
     }
     return res;
}
</script>
<?php echo $this->fetch('footer.html'); ?>
