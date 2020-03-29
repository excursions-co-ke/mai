<?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <div id="<?php the_ID(); ?>" <?php post_class(); ?> data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;">
        <div class="post_type_icon hvr-reveal">
            <a href="<?php the_permalink(); ?>">
                <i class="fa"></i>
            </a>
        </div>
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <div class="entry-meta">
                <span class="posted-on">
                    <time class="entry-date published" datetime="2016-11-13T17:11:37+00:00"><?php the_date('M d, Y'); ?></time>
                    <time class="updated" datetime="2017-03-18T15:43:46+00:00"><?php the_date('M d, Y'); ?></time>
                </span>
                <span class="byline"> by <span class="author vcard">
                        <a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                    </span>
                </span>
            </div>

        </header>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>

    </div>
<?php endwhile; ?>

<nav class="navigation pagination" role="navigation">
    <h2 class="screen-reader-text">Posts navigation</h2>
    <div class="nav-links">
        <?php osen_pagination(); ?>
    </div>
</nav>