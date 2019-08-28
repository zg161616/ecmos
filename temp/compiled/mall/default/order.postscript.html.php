    <script type="text/javascript">
    function postscript_activation(tt){
        if (!tt.name)
        {
            tt.value    = '';
            tt.name = tt.id;
            tt.style.height = '70px';
        }

    }
    </script>
    给卖家留言：<textarea class="confirm-order-info-textarea" onclick="postscript_activation(this);" style="height: 50px;padding: 5px;line-height: 30px" id="postscript[<?php echo $this->_var['store']['store_id']; ?>]" >选填，可以告诉卖家您对商品的特殊需求，如颜色、尺码等</textarea>