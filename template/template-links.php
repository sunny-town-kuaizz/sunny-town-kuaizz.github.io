<?php
/**
 * Template Name: 友情链接
 */
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<style>
.entry-content {
    min-height: 200px;
}
</style>

<header class="banner-bg-header">
    <h1 class="banner-title"><?php the_title(); ?></h1>
    <h4 class="banner-sub-title">博主的网上邻居</h4>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class('width-short'); ?> itemscope itemtype="http://schema.org/Article">
	<!-- 正文 -->
	<div class="entry-content" itemprop="articleBody">
		<!-- 文章内容区 -->
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	
	<!-- 点赞、分享、打赏组件 -->
    <?php get_template_part( 'inc/social' ); ?>
	</div>  
</article><!-- #post -->

<?php comments_template( '', true ); ?>			

<?php wp_reset_query();endwhile; ?>

<?php get_footer();?>