<?php get_header(); ?>
		<!-- main start -->
		<div class="main">
			<div class="content">
				<!--左侧新闻-->
				<div class="left box">
					<ul class="news">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php setPostViews(get_the_ID()); ?>
						<?php
							$fmimg = get_post_meta($post->ID, "fmimg_value", true);
							$cti = catch_that_image();
							if($fmimg) {
								$showimg = $fmimg;
							} else {
								$showimg = $cti;
							};
						?>
						<li style="background:none">
							<h2 style="color:#333">
								<?php the_title(); ?>
							</h2>
							<?php the_content(); ?>
						</li>
						<?php endwhile; endif; ?>
					</ul>
					<div id="comment">
						<?php comments_template(); ?>
					</div>
				</div>
				<div class="right">
					<?php get_search_form(); ?>
					<?php get_sidebar(); ?>
				</div>
				<!--[if lte IE 7]>
					<div style="clear: both">
					</div>
				<![endif]-->
			</div>
		</div>
		<!-- main end -->
		<?php get_footer(); ?>