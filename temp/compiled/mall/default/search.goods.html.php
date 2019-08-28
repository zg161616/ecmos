<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_goods.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
var upimg = '<?php echo $this->res_base . "/" . 'images/up.gif'; ?>';
var downimg = '<?php echo $this->res_base . "/" . 'images/down.gif'; ?>';
imgUping = new Image();
imgUping.src = upimg;

$(function() {
    //调整排序
    var order = '<?php echo $_GET['order']; ?>';
    var css = '';
    <?php if ($_GET['order']): ?> 

    order_arr = order.split(' ');
    switch (order_arr[1]) {
        case 'desc':
            css = 'con-on  con';
            break;
        case 'asc':
            css = 'con-on  con-up';
            break;
        default:
            css = ' con';
    }
    $('.condition-bar a[ectype =' + order_arr[0] + ']').attr('class', 'con ' + css);
    <?php endif; ?>

    $(".condition-bar a").click(function() {
        if (this.id == '') {
            dropParam('order'); // default order
            return false;
        } else {
            dd = " desc";
            if (order != '') {
                order_arr = order.split(' ');
                if (order_arr[0] == this.id && order_arr[1] == "desc")
                    dd = " asc";
                else dd = " desc";
            }
            replaceParam('order', this.id + dd);
            return false;
        }
    });
    //调整价格
    <?php if ($_GET['price']): ?>
    var filter_price = '<?php echo $_GET['price']; ?>';
    filter_price = filter_price.split('-');
    $('input[name="start_price"]').val(number_format(filter_price[0], 0));
    $('input[name="end_price"]').val(number_format(filter_price[1], 0));
    <?php endif; ?>
    //展开/收起条件

    $('.condition .show-more').click(function() {
        $(this).parent().parent().find('.toggle').toggle();
        if ($(this).find('span').html() == '展开') {
            $(this).find('span').html('收起');
            $(this).find('b').attr('class', 'hide-more');
        } else {
            $(this).find('span').html('展开');
            $(this).find('b').attr('class', '');
        }
    });
});
</script>

<script>
/* add cart */
function add_to_cart(spec_id, quantity) {
    var url = SITE_URL + '/index.php?app=cart&act=add';
    $.getJSON(url, {
        'spec_id': spec_id,
        'quantity': quantity
    }, function(data) {
        if (data.done) {
            alert('购物车加入成功！');
        } else {
            alert(data.msg);
        }
    });
}
</script>

<div class="jim-main">
    <div class="w1200 clearfix">
        
        <div class="left">
            <div class="navbar fontsimsun mt20 clearfix">
                <?php echo $this->fetch('curlocal.html'); ?>
                <div class="sreach-data fr">共 <span class="color02"><?php echo $this->_var['goods']['goods_list_count']; ?></span> 件宝贝</div>
            </div>
            <div class="shoprec mt10">
                <div class="leftLoop2">
                    <div class="hd">
                        <a class="next"></a>
                        <a class="prev"></a>
                    </div>
                    <div class="bd">
                        <ul class="picList2 clearfix">
                            <?php $_from = $this->_var['recomd_store']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');$this->_foreach['fe_store'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_store']['total'] > 0):
    foreach ($_from AS $this->_var['store']):
        $this->_foreach['fe_store']['iteration']++;
?>
                            <?php if ($this->_foreach['fe_brand']['iteration'] <= 10): ?>
                            <li>
                                <div class="pic">
                                    <a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><img src="<?php echo htmlspecialchars($this->_var['store']['store_logo']); ?>" width="50" height="50" alt="<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>" /></a>
                                </div>
                                <div class="shoptit"><strong><?php echo sub_str(htmlspecialchars($this->_var['store']['store_name']),20); ?></strong>
                                    <p> <?php echo sub_str(htmlspecialchars($this->_var['store']['business_scope']),30); ?></p>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="doyoufind mt10" style="display: none;">
                <strong>您是不是要找：</strong><a href="#">苹果4s</a><a href="#">苹果5s</a><a href="#">苹果6</a><a href="#">预定苹果5</a><a href="#">苹果4</a><a href="#">苹果4s</a>
            </div>
            <div class="select">
                <strong>按条件筛选</strong>
                <ul class="condition">
                    <?php if ($this->_var['by_category']['stats']): ?>
                    <li class="scate" ectype="ul_cate"><b>商品分类:</b>
                        <?php $_from = $this->_var['by_category']['stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
                        <a href="javascript:void(0);" id="<?php echo $this->_var['category']['cate_id']; ?>" class='<?php if ($this->_foreach['fe_category']['iteration'] >= 10): ?>toggle hidden<?php endif; ?>'><?php echo htmlspecialchars($this->_var['category']['cate_name']); ?>(<?php echo $this->_var['category']['count']; ?>)</a>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </li>
                    <?php endif; ?>
                    <?php if ($this->_var['by_brand']['stats'] && ! $this->_var['filters']['brand']): ?>
                    <li class="scate" ectype="ul_brand"><b>按品牌:</b>
                        <?php $_from = $this->_var['by_brand']['stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_brand'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_brand']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_brand']['iteration']++;
?>
                        <a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>" class='<?php if ($this->_foreach['fe_brand']['iteration'] >= 10): ?>toggle hidden<?php endif; ?>'><?php echo htmlspecialchars($this->_var['row']['brand']); ?>(<?php echo $this->_var['row']['count']; ?>)</a>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php endif; ?>
                        <?php if ($this->_var['by_price']['stats'] && ! $this->_var['filters']['price']): ?>
                    </li>
                    <li ectype="ul_price"><b>按价格：</b>
                        <?php $_from = $this->_var['by_price']['stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                        <a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>" id="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>"><?php echo price_format($this->_var['row']['min']); ?> - <?php echo price_format($this->_var['row']['max']); ?>(<?php echo $this->_var['row']['count']; ?>)</a>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </li>
                    <?php endif; ?>
                    <?php if ($this->_var['by_region']['stats'] && ! $this->_var['filters']['region_id']): ?>
                    <li class="scate" ectype="ul_region"><b>按地区：</b>
                        <?php $_from = $this->_var['by_region']['stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_region'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_region']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_region']['iteration']++;
?>
                        <a href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo $this->_var['row']['region_name']; ?>" class="<?php if ($this->_foreach['fe_region']['iteration'] >= 10): ?>toggle hidden<?php endif; ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?>(<?php echo $this->_var['row']['count']; ?>)</a>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </li>
                    <?php endif; ?>
                    <div class="show-more">
                        <ins></ins>
                        <b><span>展开</span>分类<i></i></b>
                    </div>
                </ul>
                <?php if ($this->_var['filters']): ?>
                <strong>您已选择</strong>
                <ul class="condition">
                    <li class="selected-attr"><b>商品分类:</b>
                        <?php $_from = $this->_var['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter');if (count($_from)):
    foreach ($_from AS $this->_var['filter']):
?>
                        <a href="javascript:;" id="<?php echo $this->_var['filter']['key']; ?>" title="点击删除条件"><b><?php echo $this->_var['filter']['name']; ?>：</b><?php echo $this->_var['filter']['value']; ?><span></span></a>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
            <div class="search-type mt10 clearfix">
                <div class="float-left btn-type" style="margin-bottom: 0px;">
                    <a href="<?php echo url('app=search'); ?>" class="current">搜索商品</a>
                    <a href="<?php echo url('app=search&act=store'); ?>">搜索店铺</a>
                    <a href="<?php echo url('app=search&act=groupbuy'); ?>">搜索团购</a>
                </div>
            </div>
            
            <div class="condition-bar">
                <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'order');$this->_foreach['fe_order'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_order']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['order']):
        $this->_foreach['fe_order']['iteration']++;
?>
                <?php if (! $this->_var['k']): ?>
                <a id="<?php echo $this->_var['k']; ?>" href="javascript:;" class="con con-on" style="padding-right: 5px;"><?php echo $this->_var['order']; ?></a>
                <?php else: ?>
                <a ectype="<?php echo $this->_var['k']; ?>" id="<?php echo $this->_var['k']; ?>" href="javascript:;" class="con"><?php echo $this->_var['order']; ?><b></b></a>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <div class="price-area">价格
                    <input type="text" class="con" style="width: 42px;" name="start_price" maxlength="6" value="">
                    <i>-</i>
                    <input type="text" class="con" style="width: 42px;" name="end_price" maxlength="6" value="">
                    <input type="submit" class="con-btn" value="确定" />
                </div>
            </div>
            
            <?php if ($this->_var['goods_list']): ?>
            <div class="grid clearfix">
                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                <div class="product">
                    <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="" target="_blank">
                        <img src="<?php echo $this->_var['goods']['default_image']; ?>" class="product-img" width="223" height="223" alt="">
                        <div class="price"><strong><?php echo price_format($this->_var['goods']['price']); ?></strong>
                            <del><?php echo price_format($this->_var['goods']['market_price']); ?></del>
                        </div>
                        <h2><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></h2>
                    </a>
                    <ul class="product-info">
                        <a onclick="collect_goods('<?php echo $this->_var['goods']['goods_id']; ?>')" href="javascript:void(0);">
                            <li><img src="themes/mall/default/styles/default/images/star.png">收藏 <span class="color6f0e0e">(<?php echo ($this->_var['goods']['collects'] == '') ? '0' : $this->_var['goods']['collects']; ?>)</span></li>
                        </a>
                        <a href="javascript:add_to_cart(<?php echo $this->_var['goods']['spec_id']; ?>,1);">
                            <li style="border:none;">加入购物车</li>
                        </a>
                    </ul>
                </div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
            <?php else: ?>
            <div id="no_results">很抱歉! 没有找到相关商品</div>
            <?php endif; ?>
            
            
            <?php echo $this->fetch('page.bottom.html'); ?>
            
        </div>
        
        
        <?php if ($this->_var['statist_views_goods']): ?>
        <div class="side mt10">
            <div class="side-tit"><strong>搜索推荐</strong></div>
            <div class="side-txt">
                <ul class="side-list">
                    <?php $_from = $this->_var['statist_views_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
                    <?php if (($this->_foreach['fe_goods']['iteration'] - 1) < 7): ?>
                    <li>
                        <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="" target="_blank"><img src="<?php echo $this->_var['goods']['default_image']; ?>" width="168" height="168" alt=""></a>
                        <h3><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),58); ?></a></h3>
                        <p><b><?php echo price_format($this->_var['goods']['price']); ?></b>
                            <del><?php echo price_format($this->_var['goods']['market_price']); ?></del>
                        </p>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="clr"></div>
        
        <?php if ($this->_var['statist_sales_goods']): ?>
        <div class="mt30" style="border:1px solid #e5e5e5;">
            <div class="side-tit"><strong>热卖推荐</strong></div>
            <ul class="ohterproduct clearfix">
                <?php $_from = $this->_var['statist_sales_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
                <?php if (($this->_foreach['fe_goods']['iteration'] - 1) < 5): ?>
                <li>
                    <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['default_image']; ?>" width="200" height="200" alt="">
                        <p style="width:200px;text-overflow: ellipsis;white-space:nowrap;overflow:hidden;margin-left: 5px;"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></p>
                    </a>
                </li>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
        <?php endif; ?>
        
    </div>
</div>


<?php echo $this->fetch('footer.html'); ?>

</body>
<script src="<?php echo $this->lib_base . "/" . 'jquery-1.9.1.min.js'; ?>"></script>
<script src="<?php echo $this->lib_base . "/" . 'jim-focus.js'; ?>"></script>
<script src="<?php echo $this->lib_base . "/" . 'jq_scroll.js'; ?>"></script>
<script src="<?php echo $this->lib_base . "/" . 'jquery.SuperSlide.js'; ?>"></script>
<script type="text/javascript">
jQuery(".leftLoop2").slide({
    mainCell: ".bd ul",
    effect: "leftLoop",
    vis: 3,
    scroll: 3,
    autoPlay: false
});
</script>

</html>
