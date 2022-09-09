<!-- Loại 1 -->
<script type="text/javascript">
    $(document).bind('contextmenu', function (e) {
          e.preventDefault();
        });
    $(document).ready(function() {
        $('img').on('dragstart', function(event) { event.preventDefault(); });
    });
    function disableSelection(target)
    {
        if (typeof target.onselectstart!="undefined")
            target.onselectstart=function(){return false}
        else if (typeof target.style.MozUserSelect!="undefined")
            target.style.MozUserSelect="none"
        else
            target.onmousedown=function(){return false}
        target.style.cursor = "default"
    }
    disableSelection(document.body)
</script>

<!-- Loại 2 -->
<script type="text/javascript">
    var message="Đây là bản quyền thuộc về <?=$row_setting['ten'.$lang]?>";
    function clickIE()
    {
        if(document.all)
        {
            (message);
            return false;
        }
    }
    function clickNS(e)
    {
        if(document.layers||(document.getElementById&&!document.all))
        {
            if(e.which==2||e.which==3)
            {
                alert(message);
                return false;
            }
        }
    }
    if(document.layers)
    {
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown=clickNS;
    }
    else
    {
        document.onmouseup=clickNS;
        document.oncontextmenu=clickIE;
        document.onselectstart=clickIE
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e)
    {
        return false 
    }
    function reEnable()
    {
        return true 
    }
    document.onselectstart=new Function ("return false")
    if(window.sidebar)
    {
        document.onmousedown=disableselect 
        document.onclick=reEnable
    } 
</script>

<!-- Loại 3 (Cho copy hình ảnh) -->
<script type="text/javascript">
    function disableSelection(target)
    {
        if(typeof target.onselectstart!="undefined")
            target.onselectstart=function(){return false}
        else if(typeof target.style.MozUserSelect!="undefined")
            target.style.MozUserSelect="none"
        else
            target.onmousedown=function(){return false}
        target.style.cursor = "default"
    }
    disableSelection(document.body)
</script>