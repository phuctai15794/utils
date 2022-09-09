<div class="info-header">
    <p><?=$row_setting['mota'.$lang]?></p>
    <b><?=$row_setting['ten'.$lang]?></b>
    <strong><?=$row_setting['slogan']?></strong>
</div>

<!-- Begin Text Animation -->
<script src="assets/textanimation/jquery.lettering.js"></script>
<script src="assets/textanimation/jquery.textillate.js"></script>
<script type="text/javascript">
    /* flash bounce shake tada swing wobble pulse flip flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeInUpBig fadeInDownBig fadeInLeftBig fadeInRightBig fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight fadeOutUpBig fadeOutDownBig fadeOutLeftBig fadeOutRightBig bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight hinge rollIn rollOut */
    $(document).ready(function() {
        $('.info-header').find('p').textillate({
            in:{
                effect: 'fadeInLeft'
            },
            out: {
                effect: 'fadeInRight'
            },
            loop: true
        });
        $('.info-header').find('b').textillate({
            in:{
                effect: 'bounceIn'
            },
            out: {
                effect: 'bounceOut'
            },
            loop: true
        });
        $('.info-header').find('strong').textillate({
            in:{
                effect: 'rotateIn'
            },
            out: {
                effect: 'rotateOut'
            },
            loop: true
        });
    });
</script>
<!-- End Text Animation -->