<section class="gg-section testimonial" data-type="background" data-speed="10">
	<div class="texture-overlay"></div>
	<div class="slogan-cont">
		<div class="text-center slogan">
			<div>
				<h2 class="over-texture">Create an account for more seamless usage</h2>
				<p class="over-texture">Get all your trips here</p>
				<a class="btn transparent animated fadeInLeft" href="<?php echo home_url('register'); ?>">Traveller</a>
				<a class="btn animated fadeInRight" href="<?php echo home_url('operator-signup'); ?>">Tour Operator</a>
			</div>
		</div>
	</div>
	<div class="cont-fluid">
		<div class="under-slogan">
			<div class="flexslider partners-gallery col-md-5">
				<ul class="slides text-center">
					<?php foreach (get_posts() as $post) : setup_postdata($post); ?>
						<li style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');" class="compat-object-fit">
							<?php the_post_thumbnail('object-img-fit', ['class' => 'object-img-fit']); ?>
						</li>
					<?php endforeach;
					wp_reset_postdata(); ?></ul>
			</div>

			<div class="testimonial-slide col-md-7 ">
				<div class="flexslider">
					<ul class="slides text-center">
						<?php foreach (get_posts(['post_type' => 'testimonial']) as $post) : setup_postdata($post); ?>
							<li>
								<?php if (get_field('user')) : ?>
									<?php $user = get_field('user'); ?>
									<div class="testimonial-img">
										<?php echo get_avatar($user['ID'], 50, '', $alt = $user['display_name'], ['class' => 'iter_gioga_testimonials_thumb']) ?>
									</div>
									<div class="testimonial-text col-md-12">
										<div class="post-excerpt">
											<?php the_content(); ?>
										</div>
										<h3><?php echo $user['display_name']; ?></h3>
										<span class="t-role">
											<?php if (get_field('role')) : ?>
												<?php the_field('role'); ?>
											<?php endif; ?>
										</span>
									</div>
								<?php else : ?>
									<div class="testimonial-img">
										<?php the_post_thumbnail('iter_gioga_testimonials_thumb'); ?>
									</div>
									<div class="testimonial-text col-md-12">
										<div class="post-excerpt">
											<?php the_content(); ?>
										</div>
										<h3><?php the_title(); ?></h3>
										<span class="t-role">
											<?php if (get_field('role')) : ?>
												<?php the_field('role'); ?>
											<?php endif; ?>
										</span>
									</div>
								<?php endif; ?>
							</li>
						<?php endforeach;
						wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>

		</div>
	</div>
</section>