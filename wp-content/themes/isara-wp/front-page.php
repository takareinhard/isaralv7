<?php get_header(); ?>

<!-- mv -->
<div id="mv">
<div class="inner">

</div><!-- /inner -->
</div><!-- /mv -->


<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<!-- about -->
<section class="about">
	<h2 class="section-title">ABOUT</h2>
	<div class="about-items">
		<div class="about-item">
			<div class="about-item-img"><img src="<?php echo get_template_directory_uri(); ?>/img/top/about1.jpg" alt=""></div><!-- /about-item-img -->
			<div class="about-item-content">テストテストテストテストテストテストテストテストテストテストテストテストテスト</div><!-- /about-item-content -->
		</div><!-- /about-item -->
		<div class="about-item">
			<div class="about-item-img"><img src="<?php echo get_template_directory_uri(); ?>/img/top/about2.jpg" alt=""></div><!-- /about-item-img -->
			<div class="about-item-content">テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト</div><!-- /about-item-content -->
		</div><!-- /about-item -->
	</div><!-- /about-items -->
</section><!-- /about -->

<!-- news -->
<section class="news">
<h2 class="section-title">NEWS</h2>
<div class="news-items">


<?php
$news_array =
array(
  'post_type'             => 'post',
  'posts_per_page'  => 3,
);

$news_query = new WP_Query( $news_array );

while ( $news_query->have_posts() ) :
$news_query->the_post();
?>

<div class="news-item">
		<time class="news-item-time" datetime="2025-03-20"><?php the_time( "Y年n月j日" ); ?></time>
		<div class="news-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!-- /news-item-title -->
	</div><!-- /news-item -->

<?php
endwhile;
wp_reset_postdata();
?>





</div><!-- /news-items -->
<div class="news-items-link"><a href="">一覧を見る</a></div>
</section><!-- /news -->

</main><!-- /primary -->
<?php get_sidebar(); ?>
</div><!-- /inner -->
</div><!-- /content -->
<?php get_footer(); ?>