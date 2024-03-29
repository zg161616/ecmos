<?php echo $this->fetch('header.html'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->lib_base . "/" . 'toastr/toastr.css'; ?>">
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'toastr/toastr.js'; ?>"></script>
<script language="javascript">
toastr.options = {
  "closeButton": true,
 "debug": false,
  "positionClass": "toast-top-full-width",
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
$(function(){
    
});


<?php if ($this->_var['dangerous_apps']): ?>
var dangerous_apps = '';
<?php $_from = $this->_var['dangerous_apps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'da');if (count($_from)):
    foreach ($_from AS $this->_var['da']):
?>
dangerous_apps += "<?php echo $this->_var['da']; ?>\r\n";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
alert(dangerous_apps);
<?php endif; ?>
</script>
<div id="rightTop">
<p>
    您好，<b><?php echo $this->_var['admin']['user_name']; ?></b>，欢迎使用 ECMOS。
    <!--[ <a target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=message&amp;act=inbox" class="tidings">新消息</a>: <?php echo $this->_var['new']['total']; ?> ]
-->    您上次登录的时间是 <?php echo local_date("Y-m-d H:i:s",$this->_var['admin']['last_login']); ?> ，IP 是 <?php echo $this->_var['admin']['last_ip']; ?>
</p>
</div>
<dl id="rightCon">
<?php if ($this->_var['dangerous_apps']): ?>
<dt>警告！！！</dt>
<dd>
    <ul style="color:red; font-weight:bold;">
        <?php $_from = $this->_var['dangerous_apps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'da');if (count($_from)):
    foreach ($_from AS $this->_var['da']):
?>
        <li><?php echo $this->_var['da']; ?></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
</dd>
<?php endif; ?>
<dt>ECMOS 动态</dt>
<dd>
    <ul id="news">
    <li><b>系统：</b><?php echo $this->_var['upgrade']['system_remark']; ?></li>
    <li><b>当前版本：</b><?php echo $this->_var['upgrade']['currentVersion']; ?></li>
    <?php if ($this->_var['upgrade']['upgrade']): ?>
    <li><b>更新版本：</b><span style="color:red;font-size: 14px;font-weight: 600"><?php echo $this->_var['upgrade']['nextVersion']; ?> </span> <a href='/admin/?app=upgrade&act=update'>更新到最新版</a></li>
    <li><b>新版说明：</b><?php echo $this->_var['upgrade']['remark']; ?></li>
    <script type="text/javascript">
    $(document).ready(function() {
          toastr.success('<span style="font-weight:600;font-size:13px;">当前系统可升级到最新版<?php echo $this->_var['upgrade']['nextVersion']; ?></span><br><?php echo $this->_var['upgrade']['remark']; ?>');
    });
      
    </script>
    <?php else: ?>
    <li><b>新版说明：</b><?php echo $this->_var['upgrade']['remark']; ?></li>
    <?php endif; ?>
    </ul>
</dd>
<?php if ($this->_var['remind_info']): ?>
<dt>站长提醒</dt>
<dd>
    <ul>
        <?php $_from = $this->_var['remind_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'remind');if (count($_from)):
    foreach ($_from AS $this->_var['remind']):
?>
        <li><?php echo $this->_var['remind']; ?></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
</dd>
<?php endif; ?>
<dt>一周动态</dt>
<dd>
    <table>
        <tr>
            <th>新增会员数:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_user_qty']; ?></td>
            <th>新增店铺数/申请数:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_store_qty']; ?>/<?php echo $this->_var['news_in_a_week']['new_apply_qty']; ?></td>
        </tr>
        <tr>
            <th>新增商品数:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_goods_qty']; ?></td>
            <th>新增订单数:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_order_qty']; ?></td>
        </tr>
    </table>
</dd>
<dt>统计信息</dt>
<dd>
    <table>
        <tr>
            <th>会员总数:</th>
            <td class="td"><?php echo $this->_var['stats']['user_qty']; ?></td>
            <th>店铺总数/申请总数:</th>
            <td class="td"><?php echo $this->_var['stats']['store_qty']; ?>/<?php echo $this->_var['stats']['apply_qty']; ?></td>
        </tr>
        <tr>
            <th>商品总数:</th>
            <td class="td"><?php echo $this->_var['stats']['goods_qty']; ?></td>
            <th>订单总数:</th>
            <td class="td"><?php echo $this->_var['stats']['order_qty']; ?></td>
        </tr>
        <tr>
            <th>订单总金额:</th>
            <td class="td"><?php echo price_format($this->_var['stats']['order_amount']); ?></td>
            <th></th>
            <td class="td"></td>
        </tr>
    </table>
</dd>
<dt>系统信息</dt>
<dd>
    <table>
        <tr>
            <th>服务器操作系统:</th>
            <td class="td"><?php echo $this->_var['sys_info']['server_os']; ?></td>
            <th>WEB 服务器:</th>
            <td class="td"><?php echo $this->_var['sys_info']['web_server']; ?></td>
        </tr>
        <tr>
            <th>PHP 版本:</th>
            <td class="td"><?php echo $this->_var['sys_info']['php_version']; ?></td>
            <th>MYSQL 版本:</th>
            <td class="td"><?php echo $this->_var['sys_info']['mysql_version']; ?></td>
        </tr>
        <tr>
            <th>ECMOS 版本:</th>
            <td class="td"><?php echo $this->_var['sys_info']['ecmall_version']; ?></td>
            <th>安装日期:</th>
            <td class="td"><?php echo $this->_var['sys_info']['install_date']; ?></td>
        </tr>
    </table>
</dd>
</dl>
<?php echo $this->fetch('footer.html'); ?>
