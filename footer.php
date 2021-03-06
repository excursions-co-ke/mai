<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */
?>

<div class="site-footer sticky-footer d-none d-md-block d-lg-block" role="contentinfo">
    <footer class="last-footer">
        <div class="site-info container">
            <div class="row footer-content">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p>
                        &copy; <?php echo date('Y'); ?> - An <a href="https://osen.co.ke">Osen Concept</a> </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="footer-social-nav">
                        <li><a target="_blank" href="<?php os_theme_mod('os_twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="<?php os_theme_mod('os_facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="<?php os_theme_mod('os_instagram'); ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="<?php os_theme_mod('os_youtube'); ?>"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<script type='text/javascript'>
    /* <![CDATA[ */
    var iter_gioga_home_map_tours = [
        ["The Wonderful Rio", "7 days", "from <strong>1450<\/strong> &#36;", "index.html\/\/giogadesign.com\/demo\/iter\/wp-content\/uploads\/2016\/11\/img-default.jpg", "index.html\/\/giogadesign.com\/demo\/iter\/tours\/the-wonderful-rio\/", "Rio De Janeiro, Brasile", "", ""],
        ["Wow Prague InSpires", "14 days", "from <strong>1200<\/strong> &#36;", "index.html\/\/giogadesign.com\/demo\/iter\/wp-content\/uploads\/2016\/11\/prague.jpg", "index.html\/\/giogadesign.com\/demo\/iter\/tours\/wow-prague-inspires\/", "Prague, Czech Republic", "", ""],
        ["Le Cinque Terre", "7 days", "from <strong>600<\/strong> &#36;", "index.html\/\/giogadesign.com\/demo\/iter\/wp-content\/uploads\/2016\/11\/cinqueterre.jpg", "index.html\/\/giogadesign.com\/demo\/iter\/tours\/le-cinque-terre\/", "Manarola, Italia", "", ""],
        ["The magnificent Mt. Fuji", "5 days", "from <strong>3000<\/strong> &#36;", "index.html\/\/giogadesign.com\/demo\/iter\/wp-content\/uploads\/2016\/11\/mt-fuji.jpg", "index.html\/\/giogadesign.com\/demo\/iter\/tours\/the-magnificent-mt-fuji\/", "Mount Fuji, Fujinomiya, Giappone", "", ""],
        ["100% Pure New Zealand", "7 days", "from <strong>700<\/strong> &#36;", "index.html\/\/giogadesign.com\/demo\/iter\/wp-content\/uploads\/2016\/11\/new-zealand.jpg", "index.html\/\/giogadesign.com\/demo\/iter\/tours\/100-pure-new-zealand\/", "New Zealand", "", ""],
        ["Experience Meteora", "14 days", "from <strong>750<\/strong> &#36;", "index.html\/\/giogadesign.com\/demo\/iter\/wp-content\/uploads\/2016\/11\/greece.jpg", "index.html\/\/giogadesign.com\/demo\/iter\/tours\/experience-meteora\/", "Kalambaka 422 00, Grecia", "", ""]
    ];
    var iter_gioga_home_map_icons = {
        "iter_home_cluster": "<?php echo get_template_directory_uri(); ?>\/images\/cluster.png",
        "iter_home_icon": "<?php echo get_template_directory_uri(); ?>/images\/pin.png",
        "iter_gioga_style_map": "1",
        "iter_map_details": "Details",
        "iter_home_map_alert": "Geocode was not successful for the following reason: "
    };
    /* ]]> */
</script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var iter_gioga_php_vars = {
        "logo_img_less767": "<?php echo get_template_directory_uri(); ?>/images\/logo-b.png",
        "logo_alt_name": "Iter",
        "logo_img_plus767": "<?php echo get_template_directory_uri(); ?>/images\/logo-w.png",
        "logo_img_plus767inner": "<?php echo get_template_directory_uri(); ?>/images\/logo-b.png",
        "iter_yt_url": "-eJG0nLhX5w"
    };
    /* ]]> */
</script>
<?php wp_footer(); ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/home-map.js'></script>
</body>

</html>