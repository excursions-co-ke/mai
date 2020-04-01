<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<header class="post-img-full page-img-header" data-type="background" data-speed="10"
    style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center;">
    <div class="pattern-color"></div>
    <div class="container text-center">
        <div class="page-name-wrap">
            <div class="ggts-name">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <nav class="woocommerce-breadcrumb"><a
                        href="<?php echo home_url('/'); ?>">Home</a>&nbsp;/&nbsp;<?php the_title(); ?></nav>
            </div>
        </div>
    </div>
</header>

<div class="gg-top-main-content">
    <div id="content" class="site-content container">
        <div class="row">
            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main">
                    <div>
                        <div id="<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <section class="sc-section slice section-fullwidth"
                                    style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') 0 0/70% fixed;">
                                    <div class="col-lg-6 col-sm-12 hidden-xs"></div>
                                    <div class="section-sc-wrap col-lg-6 col-sm-12 slice-right pull-right">
                                        <div class="slice-wrap">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </section>
                                <section class="team-members team-style2">
                                    <?php

                                            $args = array(
                                                'role'    => 'traveller',
                                                'orderby' => 'user_nicename',
                                                'order'   => 'ASC'
                                            );
                                            $users = get_users($args); ?>
                                    <ul class="row blog-row">
                                        <?php foreach ($users as $user) : ?>
                                        <?php $udata = get_user_meta($user->ID); ?>
                                        <li class="col-md-4 col-sm-6 col-xs-12">
                                            <?php $avatar = get_field('avatar', 'user_' . $user->ID); ?>
                                            <img width="600" height="600" src="<?php echo $avatar; ?>"
                                                class="attachment-iter_gioga_team_thumb size-iter_gioga_team_thumb wp-post-image"
                                                alt="" srcset="<?php echo $avatar; ?>"
                                                sizes="(max-width: 600px) 100vw, 600px" data-id="93" />
                                            <div class="post-details">
                                                <h3 class="blog-post-title"><?php echo esc_html($user->display_name); ?>
                                                </h3>
                                                <p class="position">
                                                    <a class="btn btn-block"
                                                        href="<?php echo esc_url(get_author_posts_url($user->ID)); ?>"
                                                        title="<?php echo esc_attr($user->display_name); ?>">View
                                                        Journal</a>
                                                </p>
                                                <div class="post-excerpt">
                                                    <p><?php $udata['description']; ?></p>
                                                </div>
                                            </div>
                                            <div class="post-labels">

                                                <?php foreach (['facebook', 'twitter', 'instagram', 'pinterest', 'youtube'] as $network) : ?>
                                                <?php if (!empty($udata["social_{$network}"][0])) : ?>
                                                <a target="_blank"
                                                    href="<?php echo $udata["social_{$network}"][0]; ?>"><i
                                                        class="fa fa-<?php echo $network; ?>"></i></a>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </section>

                            </div>

                            <footer class="entry-footer">
                            </footer>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>