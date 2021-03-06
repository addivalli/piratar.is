<?php get_header(); ?>


<body>
	<div id="imagebanner">
		<div id="videokilltheradiostar"></div>
		<article>
			<figure style="background-image:url(wp-content/themes/piratar/img/piratar-crop.jpg);">
				<img src="wp-content/themes/piratar/img/piratar-crop.jpg" alt="" title="Mynd" scale="0">
			</figure>
			<div class="intro"></div>
		</article>
	</div>
	
		<div id="boxin_kynning">
		<div class="wrapper">
			<div class="box">
				<a href="/kosningar/profkjor-althingiskosningar/profkjor-nordvestur/"><h2>Norðvesturkjördæmi</h2></a>
				<?php the_field('nordvesturbox', 42); ?>
			</div>
			<div class="box">
				<a href="/kosningar/profkjor-althingiskosningar/profkjor-sudur/"><h2>Suðurkjördæmi</h2></a>
				<?php the_field('sudurbox', 42); ?>
			</div>
			<div class="box">
				<a href="/kosningar/profkjor-althingiskosningar/profkjor-hofudborgarsvaedi/"><h2>Höfuðborgarsvæðið</h2></a>
				<?php the_field('capitalbox', 42); ?>            
			</div>
		</div>
	</div>

	<div id="boxin_kynning" class="">
		<div class="wrapper">
			<div class="alpha full">
				<?php the_content(); ?>
			</div>
			<div class="box nedrabox">
				<?php the_field('kosningarbox1', 42); ?>            
			</div>
		</div>
		
	</div>


	<div class="frettir">  
		<div class="wrapper">
		
			<?php 
				$i = 1;
				$custom_query = new WP_Query('frettaflokkur=frettir&posts_per_page=-1'); 
				while($custom_query->have_posts()) : $custom_query->the_post(); 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$class = "";
				
				if ($i == 1) { 
					$class = "fyrsta";
				} else if ($i > 3) {
					$class = "nedri";
				} 
			?>	
			<?php if ($i == 1) { ?>
				<div class="ord">
					<?php the_field('kosningarbox2', 42); ?>     
				</div>
			<?php } ?>
				<article class="blogarticle <?php echo $class; ?>">
				   <?php if ($i == 1) { ?><h2 class="section-title">Fréttir</h2><?php } ?>
					<div class="hr hr-short hr-center avia-builder-el-11 el_after_av_textblock el_before_av_textblock "><span class="hr-inner hr-inner-news"></span></div>
					<?php if(has_post_thumbnail( $post->ID ) ) { ?>
					<figure style="background-image: url(<?php echo $image[0]; ?>);background-size:contain;">
						<a href="<?php the_permalink(); ?>"><img width="270" border="0" height="131" alt="" src="<?php echo $image[0]; ?>"></a>
						<div class="date"><span><?php the_time('F'); ?></span><?php the_time('j'); ?></div>
					</figure>
					<?php } else {  ?>
				<?php $logo = 'http://piratar.is/wp-content/uploads/2016/07/logo.png'; ?>
					<figure class="" style="background-image: url(<?php echo $logo; ?>);background-size:contain;">
						<a href="<?php the_permalink(); ?>"><img width="270" border="0" height="131" alt="" src="<?php echo $image[0]; ?>"></a>
						<div class="date"><span><?php the_time('F'); ?></span><?php the_time('j'); ?></div>
					</figure>
				<?php } ?>
					
					<div class="smaforsidutexti">
						
						<h2><a class="title_uppercase" href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
						<p><?php the_excerpt(); ?> </p>
					</div>
				</article>
			<?php if ($i == 1) { ?>
			   
			<div class="splitter h20"></div>
			<?php } ?>
			<?php 
				$i++;
				endwhile; 
			?>
			<?php wp_reset_postdata(); // reset the query ?>

		</div>

	</div>
</body>


<?php get_footer(); ?>