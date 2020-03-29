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
<?php if (have_posts()) : ?>
	<div class="gg-top-main-content">
		<div id="content" class="site-content container">
			<div class="row">
				<div id="primary" class="content-area col-md-12">
					<main id="main" class="site-main">
						<div class="tours-result-filter">
							<div id="sort" class="button-group">
								<span>Sort by:</span>
								<a data-sort-by="name"><span data-hover="Title">Title</span></a>
								<span class="sep">|</span>
								<a data-sort-by="number"><span data-hover="Price">Price</span></a>
							</div>
						</div>
						<ul class="filters blog-filters tour-filter hidden-xs">
							<li><a href="#" data-filter="*" class="current"><span data-hover="All">All</span></a><span class="sep">|</span></li>
							<?php $terms = get_terms([
								'taxonomy' => 'destination',
								'hide_empty' => true,
								'parent' => 0
							]); ?>
							<?php foreach ($terms as $term) : ?>
								<li><a href="#" data-filter=".<?php echo $term->slug; ?>"><span data-hover="<?php echo $term->name; ?>"><?php echo $term->name; ?></span></a><span class="sep">|</span></li>
							<?php endforeach; ?>
						</ul>
						<div class="dropdown xs-filter visible-xs-block">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Select Country <span class="caret"></span>
							</button>
							<ul class="filters dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="#" data-filter="*" class="current">All</a></li>
								<?php foreach ($terms as $term) : ?>
									<li><a href="#" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div id="isotope-tours">
							<ul class="tour-results sorter" style="position: relative; height: 720.8px;">
								<?php while (have_posts()) : the_post(); ?>
									<?php $term_obj_list = get_the_terms(get_the_ID(), 'destination');
									$terms_string = join(' ', (is_array($term_obj_list) ? wp_list_pluck($term_obj_list, 'slug') : [])); ?>
									<li class=" col-md-6 col-sm-6 tour-item <?php echo $terms_string; ?> " style=" position: absolute; left: 0px; top: 0px;">
										<div class="card hvr-underline-from-center">
											<div class="card-image">
												<?php the_post_thumbnail('activator', ['class' => 'activator']); ?>
											</div>
											<div class="card-content">
												<div class="card-title activator"><?php the_title(); ?> <i class="mdi-navigation-more-vert pull-right"></i></div>
												<div class="card-details">
													<span class="card-price price-sort">
														TICKET PRICING
														<?php if (have_rows('cost')) : ?>
															<ul>
																<?php while (have_rows('cost')) : the_row(); ?>
																	<?php $product = wc_get_product(get_sub_field('type')); ?>
																	<li><small><?php echo $product->get_title(); ?> </small>
																		<br><span class="price-sidebars"><?php echo $product->get_price_html(); ?></span>
																	</li>
																<?php endwhile; ?>
															</ul>
														<?php endif; ?>
													</span>
													<span>
														<br>
													</span>
													<span class="card-date pull-rights">

														<ul>
															<li class="side-title">FROM</li>
															<?php if (get_field('from')) : ?>
																<li><?php the_field('from'); ?></li>
															<?php endif; ?>
															<li class="side-title">TO</li>
															<?php if (get_field('to')) : ?>
																<li><?php the_field('to'); ?></li>
															<?php endif; ?>
														</ul>
													</span>
												</div>
											</div>
											<div class="card-reveal">
												<span class="card-title tour-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													<i class="mdi-navigation-close pull-right"></i>
												</span>
												<!-- <p><i>Brasil</i></p> -->
												<ul>
													<li class="side-title">REMAINING SLOTS</li>
													<?php if (have_rows('cost')) : ?>
														<ul>
															<?php while (have_rows('cost')) : the_row(); ?>
																<?php $product = wc_get_product(get_sub_field('type')); ?>
																<li><span><?php echo $product->get_title(); ?> </span><span class="price-sidebar"><?php the_sub_field('available'); ?></span>
																</li>
															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
												</ul>
												<?php if (have_rows('includes')) : ?>
													<ul>
														<li class="side-title">INCLUDED</li>
														<?php while (have_rows('includes')) : the_row(); ?>
															<li><i class="fa fa-check"></i> <?php the_sub_field('item'); ?></li>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>
												<a class="simple-link hvr-pop" href="<?php the_permalink(); ?>">View more</a>
											</div>
										</div>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</main>
				</div>

				<div class="col-md-12">
					<nav class="navigation pagination" role="navigation">
						<h2 class="screen-reader-text">Posts navigation</h2>
						<div class="nav-links">
							<?php osen_pagination(); ?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>