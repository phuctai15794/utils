<style type="text/css">
    .skiptranslate{display:none!important;}
    .lang-header-top{position:relative;}
    .lang-header-top .lang-header-main{border:1px solid #4fa57c;width:130px;height:27px;border-radius:3px;text-align:center;padding:0px 7px;cursor:pointer;display:flex;align-items:center;justify-content:space-between;}
    .lang-header-top .lang-header-main strong{display:flex;align-items:center;justify-content:space-between;font-weight:normal;}
    .lang-header-top .lang-header-main strong span{font-size:12.5px;width:70px;text-align:left;padding-right:5px;}
    .lang-header-top .lang-header-main strong img{width:25px;height:20px;margin-top:1px;}
    .lang-header-top .lang-header-main i{margin-top:-4px;}
    .lang-header-top .lang-header-ul{display:none;position:absolute;width:100%;top:28px;left:0px;background:#333;font-size:13px;padding:3px;}
    .lang-header-top .lang-header-ul.active{display:block;}
    .lang-header-top .lang-header-ul li{cursor:pointer;margin-bottom:5px;padding:5px;display:flex;align-items:center;justify-content:space-between;}
    .lang-header-top .lang-header-ul li:hover{background:#007d41;}
    .lang-header-top .lang-header-ul li:last-child{margin-bottom:0px;}
    .lang-header-top .lang-header-ul li span{width:80px;text-align:left;padding-right:5px;}
</style>

<div class="lang-header-top">
    <p class="lang-header-main">
        <strong>
            <span class="notranslate">Tiếng việt</span>
            <img src="assets/images/vi.jpg" alt="Tiếng việt">
        </strong>
        <i class="fa fa-sort-down"></i>
    </p>
    <ul class="lang-header-ul">
        <li class="lang-vi" onclick="doGoogleLanguageTranslator('vi'); return false;">
            <span class="notranslate">Tiếng việt</span>
            <img src="assets/images/vi.jpg" alt="Tiếng việt">
        </li>
        <li class="lang-en" onclick="doGoogleLanguageTranslator('en'); return false;">
            <span class="notranslate">Tiếng anh</span>
            <img src="assets/images/en.jpg" alt="Tiếng anh">
        </li>
        <li class="lang-zh-CN" onclick="doGoogleLanguageTranslator('zh-CN'); return false;">
            <span class="notranslate">Tiếng trung</span>
            <img src="assets/images/cn.jpg" alt="Tiếng trung">
        </li>
        <li class="lang-ko" onclick="doGoogleLanguageTranslator('ko'); return false;">
            <span class="notranslate">Tiếng hàn</span>
            <img src="assets/images/ko.jpg" alt="Tiếng hàn">
        </li>
    </ul>
</div>

<!-- Language Google Translate -->
<script type="text/javascript">
    function GTranslateFireEvent(a, b)
    {
        try {
            if (document.createEvent) {
                var c = document.createEvent("HTMLEvents");
                c.initEvent(b, true, true);
                a.dispatchEvent(c)
            } else {
                var c = document.createEventObject();
                a.fireEvent('on' + b, c)
            }
        } catch(e) {}
    }
    function doGoogleLanguageTranslator(a)
    {
        if (a.value) a = a.value;
        if (a == '') return;
        var b = a;
        var c;
        var d = document.getElementsByTagName('select');
        for (var i = 0; i < d.length; i++) if (d[i].className == 'goog-te-combo') c = d[i];
        if (document.getElementById('google_language_translator') == null || document.getElementById('google_language_translator').innerHTML.length == 0 || c.length == 0 || c.innerHTML.length == 0) {
            setTimeout(function () {
                doGoogleLanguageTranslator(a)
            },
            100)
        } else {
            c.value = b;
            GTranslateFireEvent(c, 'change');
            GTranslateFireEvent(c, 'change')
        }
    }
    function GoogleLanguageTranslatorInit()
    { 
        new google.translate.TranslateElement({pageLanguage: 'vi', autoDisplay: false }, 'google_language_translator');
    }
    function readCookie(name)
    {
        var c = document.cookie.split('; '),
        cookies = {}, i, C;
        for (i = c.length - 1; i >= 0; i--)
        {
            C = c[i].split('=');
            cookies[C[0]] = C[1];
        }
        return cookies[name];
    }
    $(document).ready(function(){
        $(".lang-header-main").click(function(){
            if($(".lang-header-ul").hasClass("active"))
            {
                $(".lang-header-ul").removeClass("active");
                $(".lang-header-ul").hide();
            }
            else
            {
                $(".lang-header-ul").addClass("active");
                $(".lang-header-ul").show();
            }
        })
        $(".lang-header-ul li").click(function(){
            $(".lang-header-main strong").html($(this).html());
            $(".lang-header-ul").removeClass("active");
        })
    })
    $(window).load(function(){
        $("h1.title.gray").remove();
    })
    if(readCookie('googtrans'))
    {
        var g = readCookie('googtrans');
        g = g.split('/vi/');
        $(".lang-header-main strong").html($(".lang-"+g[1]).html());
    }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit"></script>
<div id="google_language_translator" style="display: none;"></div>