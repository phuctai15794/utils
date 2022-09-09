<style type="text/css">
	.res-autosearch{position:absolute;top:45px;left:0px;width:100%;z-index:999;display:none;}
	.result-autosearch{position:relative;background:#fff;padding-bottom:39px;text-align:left;}
	.list-result-autosearch{max-height:300px;overflow:auto;border:1px solid #ccc;border-bottom:0px;}
	.list-result-autosearch::-webkit-scrollbar{background:#fff;width:10px;height:10px;}
	.list-result-autosearch::-webkit-scrollbar-thumb{background:#ddd;}
	.info-autosearch{width:100%;position:absolute;background:#fff;z-index:1;bottom:0px;height:40px;left:0px;display:flex!important;align-items:center;justify-content:space-between;padding:0px 10px;border:1px solid #ccc;font-size:12px;}
	.total-autosearch{margin:0px;color:var(--color-dark-orange);}
	.close-autosearch{background:var(--color-red);display:inline-block;vertical-align:top;color:#fff!important;padding:3px 8px;border-radius:3px;cursor:pointer;}
	.search-product{display:block;color:#333!important;border-bottom:1px solid #ccc;border-right:1px solid #ccc;padding:10px;}
	.img-search-product{float:left;margin-right:10px;padding:3px;border:1px solid #ddd;background:#fff;}
	.info-search-product{float:left;width:calc(100% - 70px);}
	.title-search-product{font-size:13px;margin-bottom:5px;}
	.title-search-product.text-split{-webkit-line-clamp:1;}
	.price-search-product p{margin-bottom:0px;font-size:13px;}
	.price-old-search-product{color:#999999;text-decoration:line-through;}
	.price-new-search-product span{color:var(--color-red);padding-left:5px;font-family:'Roboto-Medium';}
</style>

<div class="search">
	<input type="text" name="keyword" id="keyword" placeholder="Tìm kiếm...">
	<div class="res-autosearch"></div>
</div>

<script type="text/javascript">
	function ascii_slug(str,format)
	{
	    // Chuyển Chuỗi Trang Chữ Thường
	    str= str.toLowerCase();
	    
	    // Chuyển Đổi Chuỗi
	    str= str.replace(/°|₀|۰/g,"0");
	    str= str.replace(/¹|₁|۱/g,"1");
	    str= str.replace(/²|₂|۲/g,"2");
	    str= str.replace(/³|₃|۳/g,"3");
	    str= str.replace(/⁴|₄|۴|٤/g,"4");
	    str= str.replace(/⁵|₅|۵|٥/g,"5");
	    str= str.replace(/⁶|₆|۶|٦/g,"6");
	    str= str.replace(/⁷|₇|۷/g,"7");
	    str= str.replace(/⁸|₈|۸/g,"8");
	    str= str.replace(/⁹|₉|۹/g,"9");
	    str= str.replace(/à|á|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|ā|ą|å|α|ά|ἀ|ἁ|ἂ|ἃ|ἄ|ἅ|ἆ|ἇ|ᾀ|ᾁ|ᾂ|ᾃ|ᾄ|ᾅ|ᾆ|ᾇ|ὰ|ά|ᾰ|ᾱ|ᾲ|ᾳ|ᾴ|ᾶ|ᾷ|а|أ|အ|ာ|ါ|ǻ|ǎ|ª|ა|अ|ا/g,"a");
	    str= str.replace(/б|β|Ъ|Ь|ب|ဗ|ბ/g,"b");
	    str= str.replace(/ç|ć|č|ĉ|ċ/g,"c");
	    str= str.replace(/ď|ð|đ|ƌ|ȡ|ɖ|ɗ|ᵭ|ᶁ|ᶑ|д|δ|د|ض|ဍ|ဒ|დ/g,"d");
	    str= str.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ę|ě|ĕ|ė|ε|έ|ἐ|ἑ|ἒ|ἓ|ἔ|ἕ|ὲ|έ|е|ё|э|є|ə|ဧ|ေ|ဲ|ე|ए|إ|ئ/g,"e");
	    str= str.replace(/ф|φ|ف|ƒ|ფ/g,"f");
	    str= str.replace(/ĝ|ğ|ġ|ģ|г|ґ|γ|ဂ|გ|گ/g,"g");
	    str= str.replace(/ĥ|ħ|η|ή|ح|ه|ဟ|ှ|ჰ/g,"h");
	    str= str.replace(/í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|į|ı|ι|ί|ϊ|ΐ|ἰ|ἱ|ἲ|ἳ|ἴ|ἵ|ἶ|ἷ|ὶ|ί|ῐ|ῑ|ῒ|ΐ|ῖ|ῗ|і|ї|и|ဣ|ိ|ီ|ည်|ǐ|ი|इ/g,"i");
	    str= str.replace(/ĵ|ј|Ј|ჯ|ج/g,"j");
	    str= str.replace(/ķ|ĸ|к|κ|Ķ|ق|ك|က|კ|ქ|ک/g,"k");
	    str= str.replace(/ł|ľ|ĺ|ļ|ŀ|л|λ|ل|လ|ლ/g,"l");
	    str= str.replace(/м|μ|م|မ|მ/g,"m");
	    str= str.replace(/ñ|ń|ň|ņ|ŉ|ŋ|ν|н|ن|န|ნ/g,"n");
	    str= str.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ø|ō|ő|ŏ|ο|ὀ|ὁ|ὂ|ὃ|ὄ|ὅ|ὸ|ό|о|و|θ|ို|ǒ|ǿ|º|ო|ओ/g,"o");
	    str= str.replace(/п|π|ပ|პ|پ/g,"p");
	    str= str.replace(/ყ/g,"q");
	    str= str.replace(/ŕ|ř|ŗ|р|ρ|ر|რ/g,"r");
	    str= str.replace(/ś|š|ş|с|σ|ș|ς|س|ص|စ|ſ|ს/g,"s");
	    str= str.replace(/ť|ţ|т|τ|ț|ت|ط|ဋ|တ|ŧ|თ|ტ/g,"t");
	    str= str.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ů|ű|ŭ|ų|µ|у|ဉ|ု|ူ|ǔ|ǖ|ǘ|ǚ|ǜ|უ|उ/g,"u");
	    str= str.replace(/в|ვ|ϐ/g,"v");
	    str= str.replace(/ŵ|ω|ώ|ဝ|ွ/g,"w");
	    str= str.replace(/χ|ξ/g,"x");
	    str= str.replace(/ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ|й|ы|υ|ϋ|ύ|ΰ|ي|ယ/g,"y");
	    str= str.replace(/ź|ž|ż|з|ζ|ز|ဇ|ზ/g,"z");
	    str= str.replace(/ع|आ|آ/g,"aa");
	    str= str.replace(/ä|æ|ǽ/g,"ae");
	    str= str.replace(/ऐ/g,"ai");
	    str= str.replace(/@/g,"at");
	    str= str.replace(/ч|ჩ|ჭ|چ/g,"ch");
	    str= str.replace(/ђ|đ/g,"dj");
	    str= str.replace(/џ|ძ/g,"dz");
	    str= str.replace(/ऍ/g,"ei");
	    str= str.replace(/غ|ღ/g,"gh");
	    str= str.replace(/ई/g,"ii");
	    str= str.replace(/ĳ/g,"ij");
	    str= str.replace(/х|خ|ხ/g,"kh");
	    str= str.replace(/љ/g,"lj");
	    str= str.replace(/њ/g,"nj");
	    str= str.replace(/ö|œ|ؤ/g,"oe");
	    str= str.replace(/ऑ/g,"oi");
	    str= str.replace(/ऒ/g,"oii");
	    str= str.replace(/ψ/g,"ps");
	    str= str.replace(/ш|შ|ش/g,"sh");
	    str= str.replace(/щ/g,"shch");
	    str= str.replace(/ß/g,"ss");
	    str= str.replace(/ŝ/g,"sx");
	    str= str.replace(/þ|ϑ|ث|ذ|ظ/g,"th");
	    str= str.replace(/ц|ც|წ/g,"ts");
	    str= str.replace(/ü/g,"ue");
	    str= str.replace(/ऊ/g,"uu");
	    str= str.replace(/я/g,"ya");
	    str= str.replace(/ю/g,"yu");
	    str= str.replace(/ж|ჟ|ژ/g,"zh");
	    str= str.replace(/©/g,"(c)");
	    str= str.replace(/Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ā|Ą|Α|Ά|Ἀ|Ἁ|Ἂ|Ἃ|Ἄ|Ἅ|Ἆ|Ἇ|ᾈ|ᾉ|ᾊ|ᾋ|ᾌ|ᾍ|ᾎ|ᾏ|Ᾰ|Ᾱ|Ὰ|Ά|ᾼ|А|Ǻ|Ǎ/g,"A");
	    str= str.replace(/Б|Β|ब/g,"B");
	    str= str.replace(/Ç|Ć|Č|Ĉ|Ċ/g,"C");
	    str= str.replace(/Ď|Ð|Đ|Ɖ|Ɗ|Ƌ|ᴅ|ᴆ|Д|Δ/g,"D");
	    str= str.replace(/É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ę|Ě|Ĕ|Ė|Ε|Έ|Ἐ|Ἑ|Ἒ|Ἓ|Ἔ|Ἕ|Έ|Ὲ|Е|Ё|Э|Є|Ə/g,"E");
	    str= str.replace(/Ф|Φ/g,"F");
	    str= str.replace(/Ğ|Ġ|Ģ|Г|Ґ|Γ/g,"G");
	    str= str.replace(/Η|Ή|Ħ/g,"H");
	    str= str.replace(/Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Į|İ|Ι|Ί|Ϊ|Ἰ|Ἱ|Ἳ|Ἴ|Ἵ|Ἶ|Ἷ|Ῐ|Ῑ|Ὶ|Ί|И|І|Ї|Ǐ|ϒ/g,"I");
	    str= str.replace(/К|Κ/g,"K");
	    str= str.replace(/Ĺ|Ł|Л|Λ|Ļ|Ľ|Ŀ|ल/g,"L");
	    str= str.replace(/М|Μ/g,"M");
	    str= str.replace(/Ń|Ñ|Ň|Ņ|Ŋ|Н|Ν/g,"N");
	    str= str.replace(/Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ø|Ō|Ő|Ŏ|Ο|Ό|Ὀ|Ὁ|Ὂ|Ὃ|Ὄ|Ὅ|Ὸ|Ό|О|Θ|Ө|Ǒ|Ǿ/g,"O");
	    str= str.replace(/П|Π/g,"P");
	    str= str.replace(/Ř|Ŕ|Р|Ρ|Ŗ/g,"R");
	    str= str.replace(/Ş|Ŝ|Ș|Š|Ś|С|Σ/g,"S");
	    str= str.replace(/Ť|Ţ|Ŧ|Ț|Т|Τ/g,"T");
	    str= str.replace(/Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ů|Ű|Ŭ|Ų|У|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ/g,"U");
	    str= str.replace(/В/g,"V");
	    str= str.replace(/Ω|Ώ|Ŵ/g,"W");
	    str= str.replace(/Χ|Ξ/g,"X");
	    str= str.replace(/Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ῠ|Ῡ|Ὺ|Ύ|Ы|Й|Υ|Ϋ|Ŷ/g,"Y");
	    str= str.replace(/Ź|Ž|Ż|З|Ζ/g,"Z");
	    str= str.replace(/Ä|Æ|Ǽ/g,"AE");
	    str= str.replace(/Ч/g,"CH");
	    str= str.replace(/Ђ/g,"DJ");
	    str= str.replace(/Џ/g,"DZ");
	    str= str.replace(/Ĝ/g,"GX");
	    str= str.replace(/Ĥ/g,"HX");
	    str= str.replace(/Ĳ/g,"IJ");
	    str= str.replace(/Ĵ/g,"JX");
	    str= str.replace(/Х/g,"KH");
	    str= str.replace(/Љ/g,"LJ");
	    str= str.replace(/Њ/g,"NJ");
	    str= str.replace(/Ö|Œ/g,"OE");
	    str= str.replace(/Ψ/g,"PS");
	    str= str.replace(/Ш/g,"SH");
	    str= str.replace(/Щ/g,"SHCH");
	    str= str.replace(/ẞ/g,"SS");
	    str= str.replace(/Þ/g,"TH");
	    str= str.replace(/Ц/g,"TS");
	    str= str.replace(/Ü/g,"UE");
	    str= str.replace(/Я/g,"YA");
	    str= str.replace(/Ю/g,"YU");
	    str= str.replace(/Ж/g,"ZH");
	    str.replace(/\xC2\xA0|\xE2\x80\x80|\xE2\x80\x81|\xE2\x80\x82|\xE2\x80\x83|\xE2\x80\x84|\xE2\x80\x85|\xE2\x80\x86|\xE2\x80\x87|\xE2\x80\x88|\xE2\x80\x89|\xE2\x80\x8A|\xE2\x80\xAF|\xE2\x81\x9F|\xE3\x80\x80/g," ");
	    str= str.replace(/`|!|\||@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|\\|{|}|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|\$|_/g,"-");
	    
	    // Chuyển các kỹ tự đặc biệt trong chuỗi sang ký tự "-"
	    str= str.replace(/-+-/g,"-"); // Thay thế 2 dấu "--" => 1 dấu "-"
	    str= str.replace(/^\-+|\-+$/g,"");// Bỏ các ký tự "-" ở đầu và cuối
	    
	    if(format=='LW') // Viết hoa ký tự đầu mỗi chữ
	    {
	        str= str.replace(/-/g," ").capitalize();
	        return str= str.replace(/ /g,"-");
	    }
	    else if(format=='UP') return str.toUpperCase(); // Chuyển sang ký tự viết hoa
	    else return str;
	    return str;
	}

	function RemoveAutoSearch()
	{
	    $(".res-autosearch").hide();
	    $(".res-autosearch").html("");
	}

	function LoadAutoSearch()
	{
	    $.ajax({
	        type: 'POST',
	        url: 'ajax/ajax_autosearch.php',
	        dataType: 'json',
	        async: false,
	        success: function(res) {
	            resTemp = res;
	        }
	    })
	}

	function ExportAutoSearch(keyword)
	{
	    // var keyword = ascii_slug(keyword);
	    var keyword = keyword.trim().toLowerCase();
	    var isArray = false;
	    var empty = false;
	    var found = false;
	    var founds = 0;
	    var nameLower = '';
	    var nameNormal = '';
	    var numSearch = 0;
	    var strSearch = '';

	    if(keyword)
	    {
	        pos = keyword.indexOf(" ");
	        if(pos > -1)
	        {
	            keyword = keyword.split(" ");
	            isArray = true;
	        }

	        if(keyword.length)
	        {
	            strSearch = "<div class='result-autosearch'><div class='list-result-autosearch'>";
	            for(var i = 0; i < resTemp.length; i++)
	            {
	                nameLower = resTemp[i].ten.toLowerCase();
	                nameNormal = resTemp[i].ten;
	                if(found) found = false;
	                if(founds) founds = 0;
	                if(isArray)
	                {
	                    for(var u = 0; u < keyword.length; u++)
	                    {
	                        if(nameLower.match(keyword[u]) || nameNormal.match(keyword[u]))
	                        {
	                            founds++;
	                        }
	                    }
	                }
	                else
	                {
	                    if(nameLower.match(keyword) || nameNormal.match(keyword))
	                    {
	                        found = true;
	                    }
	                }

	                if(found || (founds == keyword.length))
	                {
	                    numSearch++;
	                    strSearch += "<a class='search-product w-clear' href='"+resTemp[i].tenkhongdau+"'><img class='img-search-product' src='"+CONFIG_BASE+THUMBS+"/50x50x1/"+UPLOAD_PRODUCT_L+resTemp[i].photo+"' alt='"+resTemp[i].ten+"'/><div class='info-search-product'><h3 class='title-search-product text-split'>"+resTemp[i].ten+"</h3><div class='price-search-product'>"+resTemp[i].giaban+"</div></div></a>";
	                }
	            }
	            strSearch += "<div class='info-autosearch'><a class='close-autosearch'>Đóng</a><p class='total-autosearch'>Tìm thấy <b>"+numSearch+"</b> kết quả</p></div></div>";
	            $(".res-autosearch").html(strSearch);
	            $(".res-autosearch").show();
	        }
	        else empty = true;
	    }
	    else empty = true;

	    if(empty) RemoveAutoSearch();
	}

	var resTemp = null;
	LoadAutoSearch();

	$(document).ready(function() {
		$("#keyword").keyup(function(){
	        RemoveAutoSearch();
	        var keyword = $(this).val();
	        ExportAutoSearch(keyword);
	    })
	    $(".res-autosearch").on("click",".close-autosearch",function(){
	        RemoveAutoSearch();
	        $("#keyword").val("");
	    })
	});
</script>