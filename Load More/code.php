<!-- Load by scroll -->
<div class="list-gianhang scroll-bar">
    <div class="scroll-list-gianhang w-clear">
    </div>
</div>
<input type="hidden" class="lmfrom" value="12">

<script type="text/javascript">
    var allstore = <?=(count($gianhang))?count($gianhang):0?>;
    var idstore = <?=($idstore)?$idstore:0?>;
    var lmfrom = 0;
    function loadMoreGianHang()
    {
        if(allstore && lmfrom <= allstore)
        {
            lmfrom = $(".lmfrom").val();
            var lmget = 12;

            $.ajax({
                url: 'ajax/ajax_loadmore_store.php',
                type: 'post',
                dataType: 'html',
                data: {idstore:idstore,lmfrom:lmfrom,lmget:lmget},
                success: function(result){
                    if(result)
                    {
                        $(".lmfrom").val(parseInt(lmfrom)+parseInt(lmget));
                        $(".scroll-list-gianhang").append(result);
                    }
                }
            });
        }
    };

    $(document).ready(function() {
        $(".list-gianhang").scroll(function(){
            var $this = $(this);
            var $results = $(".scroll-list-gianhang");

            if($this.scrollTop() + $this.height() == $results.height()) loadMoreGianHang();
        });
    });
</script>

<!-- Load by click -->
<div class="wrap-product-list wrap-content">
    <div class="ajax-loadprolist">
        
    </div>
    <?php if(count($sp_list_nb_all)>6) { ?>
        <input type="hidden" class="lmfrom" value="6">
        <input type="hidden" class="prolist_all" value="<?=count($sp_list_nb_all)?>">
        <span class="xemtiep transition">Xem tiếp những sản phẩm hấp dẫn khác</span>
    <?php } ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("span.xemtiep").click(function(){
            var lmfrom=$(".lmfrom").val();
            var lmget=1;
            $.ajax({
                url:'ajax/ajax_loadprolist.php',
                type: "POST",
                dataType: 'html',
                data: {lmfrom:lmfrom,lmget:lmget},
                success: function(kt){
                    $('.ajax-loadprolist').append(kt);
                    $(".lmfrom").val(parseInt(lmfrom)+1);
                }
            }).done(function(){
                var prolist_all=$(".prolist_all").val();
                var box_pronb=$(".box-pronb").length;
                if(parseInt(box_pronb)==parseInt(prolist_all)){$("span.xemtiep").fadeOut();}
            });
        })
    })
</script>