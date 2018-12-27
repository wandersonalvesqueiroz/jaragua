<!--Slide-->

<div id="modpartners">

    <div class="partners">

        <div class="slider-wrap">

            <div class="slider">

                <ul>

                    <?php

                    foreach ($partners as $partner) {
                        $paramLogo = json_decode($partner->params);
                        $image = $partner->image;

                        $link = $paramLogo->link_url;
                    ?>
                        <li>
                            <div>
                                <div class="partner">
                                    <?php if ($link): ?>
                                    <a href="<?= $paramLogo->link_url; ?>" class="partner-logo" style="background-image: url('<?= $image ?>'); "></a>
                                    <?php else: ?>
                                    <div class="partner-logo" style="background-image: url('<?= $image ?>'); "></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>

                    <?php

                    }

                    ?>

                </ul>

            </div>

            <a href="#" class="slider-arrow sa-left"><i class="fa fa-chevron-left fa-1x" aria-hidden="true"></i></a>

            <a href="#" class="slider-arrow sa-right"><i class="fa fa-chevron-right fa-1x"
                                                         aria-hidden="true"></i></a>

        </div>

    </div>

</div>


<script src="./modules/mod_partners/assets/js/jquery.lbslider.js"></script>

<script>

    jQuery('.slider').lbSlider({

        leftBtn: '.sa-left',

        rightBtn: '.sa-right',

        visible: 5,

        autoPlay: true,

        autoPlayDelay: 5


    });


    jQuery(function () {
        jQuery(window).on('resize', function () {

            var largura = jQuery(window).width();

            if (largura > 1000){
                jQuery('.slider').mouseover(function () {

                    jQuery('.slider-arrow').css('opacity', '1');

                });

                jQuery('.slider').mouseout(function () {

                    jQuery('.slider-arrow').css('opacity', '0');

                });

                jQuery('.slider-arrow').mouseover(function () {

                    jQuery('.slider-arrow').css('opacity', '1');

                });

                jQuery('.slider-arrow').mouseout(function () {

                    jQuery('.slider-arrow').css('opacity', '0');

                });
            }
        }).trigger('resize');
    });

    jQuery(function () {
        jQuery(window).on('resize', function () {

            var largura = jQuery(window).width();

//            if (largura > 1714) {
//                jQuery('#modpartners .slider').css('width', 1714);
//            }
//            if (largura <= 1714 && largura > 1464) {
//                jQuery('#modpartners .slider').css('width', 1464);
//            }
//            if (largura <= 1464 && largura > 1220) {
//                jQuery('#modpartners .slider').css('width', 1220);
//            }
//            if (largura <= 1220 && largura > 976) {
//                jQuery('#modpartners .slider').css('width', 976);
//            }
//            if (largura <= 976 && largura > 732) {
//                jQuery('#modpartners .slider').css('width', 732);
//            }
//            if (largura <= 732 && largura > 488) {
//                jQuery('#modpartners .slider').css('width', 488);
//            }
//            if (largura <= 488) {
//                jQuery('#modpartners .slider').css('width', 244);
//            }

            var tamFoto = jQuery('#modpartners .slider .partner').width();
            jQuery('#modpartners .slider .partner').css('height', tamFoto);


        }).trigger('resize');
    });



</script>