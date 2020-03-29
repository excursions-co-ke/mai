<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */

?>
<div class="col-md-4 col-sm-12 contacts-boxes">
    <aside id="newsletter-sc" class="hidden-xs newsletter-sticky" style="background: url('<?php echo get_template_directory_uri(); ?>/images/newsletter-back.jpg');">
        <h3 class="widget-title">Newsletter</h3>
                                        <div class="nwsletter-wrap">
                                            <div role="form" class="wpcf7" id="wpcf7-f117-o2" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response"></div>
                                                <form action="https://giogadesign.com/demo/iter/video/contacts/#wpcf7-f117-o2" method="post" class="wpcf7-form" novalidate="novalidate">
                                                    <div style="display: none;">
                                                        <input type="hidden" name="_wpcf7" value="117" />
                                                        <input type="hidden" name="_wpcf7_version" value="4.9.2" />
                                                        <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f117-o2" />
                                                        <input type="hidden" name="_wpcf7_container_post" value="0" />
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        <br />
                                                        <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail*" /></span> </p>
                                                    <p>
                                                        <input type="submit" value="Subscribe" class="wpcf7-form-control wpcf7-submit" />
                                                    </p>
                                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </aside>
                                    <div class="contact-mail contacts-box">
                                        <i class="lnr lnr-envelope"></i>
                                        <div>
                                            <p>
                                                <a href="mailto:<?php os_theme_mod('email', 'twende@excursions.co.ke'); ?>"><?php os_theme_mod('email', 'twende@excursions.co.ke'); ?>
                                            </a></p>
                                        </div>
                                    </div>
                                    <div class="contact-loc contacts-box">
                                        <i class="lnr lnr-map-marker"></i>
                                        <div>
                                            <p>Via del Corso, 23 Roma</p>
                                            <p>Viale Mazzini, 19 Roma</p>
                                            <p>Via dell&#039;Arrone, 46 Roma</p>
                                        </div>
                                    </div>
                                    <div class="contact-phones contacts-box">
                                        <i class="lnr lnr-phone-handset"></i>
                                        <div>
                                            <p><a href="tel:<?php os_theme_mod('phone', '254705459494'); ?>"><?php os_theme_mod('phone', '254705459494'); ?></a></p>
                                        </div>
                                    </div>
                                    <div class="contacts-hours contacts-box">
                                        <i class="lnr lnr-clock"></i>
                                        <div>
                                            <p>Mon-Fri: 10am-5pm</p>
                                            <p>Sat: 10am-1pm</p>
                                        </div>
                                    </div>
                                </div>