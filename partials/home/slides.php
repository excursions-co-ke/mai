<section class="gg-section hero ">
    <h2 class="hide">Presentation</h2>
    <div class="homeslider">
        <div class="flexslider homeflex">
            <ul class="slides">
                <?php foreach (get_posts(["post_type" => "excursion"]) as $post) : setup_postdata($post); ?>
                    <?php if (get_field('from') && (strtotime(get_field('from')) < time())) : ?>
                        <li>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                            <div class="content-wrapper">
                                <div class="flex-caption ">
                                    <h2><?php the_title(); ?></h2>
                                    <p class="hero-subtitle"><?php the_excerpt(); ?></p>

                                    <a class="btn" href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
    <div class="visible-only-lg ">
        <form role="search" method="get" class="searchtours animated fadeInUp searchform form-inline" action="<?php echo home_url('/'); ?>">
            <div class="cont-search container">
                <div class="row">
                    <div class="col-md-4 wpd">
                        <label for="s">DESTINATION</label>
                        <input type="hidden" name="search" value="t-search">
                        <input type="text" value="" name="s" id="s" placeholder="City, Country or keywords" />
                        <input type="hidden" value="" name="sentence" />
                        <input type="hidden" value="tours" name="post_type" />
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="budget-max col-md-4 col-sm-4 col-xs-2">
                                <label for="budget">BUDGET &#36;</label>
                                <input type="number" name="budget" id="budget" min="" placeholder="Ex. 00">
                            </div>
                            <div class="input-group date col-md-4 col-sm-4 datetimepicker-from">
                                <label for="from">DEPARTURE</label>
                                <input type="text" name="from" id="from" class="form-control" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <div class="input-group date col-md-4 col-sm-4 datetimepicker-to">
                                <label for="to">RETURN</label>
                                <input type="text" name="to" id="to" class="form-control" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 wpd">
                        <button type="submit" class="btn btn-searchform searchsubmit t-submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="accordion-s-destination" class="panel-group animated fadeInUp ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="panel-title accordion-toggle" data-toggle="collapse" href="#dest-search">Search
                    Destination <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i>
                </a>
            </div>
            <div id="dest-search" class="panel-collapse collapse">
                <form role="search" method="get" class="searchtours searchform form-inline" action="<?php echo home_url('/'); ?>">
                    <div class="cont-search container">
                        <div class="col-md-4 wpd">
                            <label for="s2">DESTINATION</label>
                            <input type="hidden" name="search" value="t-search2">
                            <input type="text" value="" name="s" id="s2" placeholder="City, Country or keywords" />
                            <input type="hidden" value="" name="sentence" />
                            <input type="hidden" value="tours" name="post_type" />
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="budget-max col-md-4 col-sm-4 col-xs-2">
                                    <label for="budget2">BUDGET &#36;</label>
                                    <input type="number" name="budget" id="budget2" min="" placeholder="Ex. 00">
                                </div>
                                <div class="input-group date col-md-4 col-sm-4 datetimepicker-from">
                                    <label for="from2">DEPARTURE</label>
                                    <input type="text" name="from" id="from2" class="form-control" readonly="readonly" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <div class="input-group date col-md-4 col-sm-4 datetimepicker-to">
                                    <label for="to2">RETURN</label>
                                    <input type="text" name="to" id="to2" class="form-control" readonly="readonly" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 wpd">
                            <button type="submit" class="btn btn-searchform searchsubmit t-submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>