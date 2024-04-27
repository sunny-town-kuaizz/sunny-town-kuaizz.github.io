<?php 
// 说说内容页
get_header(); 
?>

<?php while ( have_posts() ) : the_post(); ?>

<style>
.shuoshuo-header {
    margin: 0 0 0.8em;
    height: 4.2em;
}
.shuoshuo-header > .avatar {
    width:  3.4em;
    height: 3.4em;
    display: block;
    border-radius: 100%;
    position: absolute;
}
.shuoshuo-info {
    margin-left: 4.6em;
    float: left;
}
.shuoshuo-auth {
    font-size: 1.2em;
    line-height: 1.6em;
}
.shuoshuo-info span, .shuoshuo-info a {
    color: #cecece;
    font-size: .95em;
}
.shuoshuo-info span {
    margin-right: 0.8em;
}
.type-shuoshuo .entry-content {
    min-height: 8.4em;
}
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class('width-short'); ?> itemscope itemtype="http://schema.org/Article">
	<header class="shuoshuo-header">
		<?php echo get_avatar(get_the_author_meta('email'), 45); ?>
        
        <div class="shuoshuo-info">
            <p class="shuoshuo-auth"><?php echo get_the_author(); ?></p>
            
            <!-- 日期、阅读量、评论、编辑 -->
            <span class="article-date">
                <time datetime="<?php the_time('Y-m-d G:i:s') ?>" itemprop="datePublished"><?php echo timeago(get_the_time('Y-m-d G:i:s')) ?></time>
            </span>
            <?php if( function_exists( 'the_views' ) ) { ?>
            <span class="article-views">
                <i class="fa fa-eye" aria-hidden="true"></i>
                <?php the_views(true); ?>
            </span>
            <?php } ?>
            <?php if ( comments_open() ) { ?>
            <span class="article-comment">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <?php if( !post_password_required() ) { comments_popup_link( '0', '1', '%', '-' ); } else { echo '-'; } ?>
            </span>
            <?php } ?>
            <span class="article-edit">
                <?php edit_post_link('编辑', '  ', '  '); ?>
            </span>
        </div>
	</header><!-- .entry-header -->

	<!-- 正文 -->
	<div class="entry-content" itemprop="articleBody">
		<!-- 文章内容区 -->
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	
	<!-- 点赞、分享、打赏组件 -->
    <?php get_template_part( 'inc/social' ); ?>
</article><!-- #post -->

<?php comments_template( '', true ); ?>			

<?php wp_reset_query();endwhile; ?>

<?php get_footer();?>