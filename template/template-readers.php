<?php
/**
 * Template Name: 读者百强榜
 */

get_header();

while(have_posts()) : 
    the_post(); 
?>

<style>
.banner-bg-header {
    margin-bottom: 0;
}
.readers {
    min-height: 100px;
    margin-bottom: 1.5rem;
}
a.readers-avatar {
    display: block;
    float: left;
    width: 5%;
    margin: 0;
    padding: 0;
    height: auto;
    position: relative;
    border: none;
}
@media screen and (max-width: 1000px) {
    a.readers-avatar {
        width: 10%;
    }
}
@media screen and (max-width: 600px) {
    a.readers-avatar {
        width: 20%;
    }
}


a.readers-avatar {
    background-color: #fff;
}

a.readers-avatar, .readers-mask {
    -webkit-transition: all 150ms ease;
       -moz-transition: all 150ms ease;
        -ms-transition: all 150ms ease;
         -o-transition: all 150ms ease;
            transition: all 150ms ease;
}

a.readers-avatar:hover {
    transform: scale(1.3, 1.3);
    z-index: 20;
    box-shadow: 0 1px 8px rgba(0, 0, 0, 0.15);
}

.readers-avatar-outer {
    width: 100%; position: relative; padding-bottom: 100%;
}
.readers-avatar-inner {
    position: absolute; left: 0; top: 0; right: 0; bottom: 0;
}
.readers-avatar img.avatar {
    box-shadow: none;
    border-radius: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    display: block;
}

.readers-mask {
    position: absolute;
    z-index: 2;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    color: #fff;
    padding: 0;
    background-color: #000;
    background-color: rgba(0, 0, 0, 0.52);
    cursor: pointer;
    opacity: 0;
}
a.readers-avatar:hover>.readers-mask {
    opacity: 1;
}
.readers-mask>span {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
       -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
         -o-transform: translateY(-50%);
            transform: translateY(-50%);
    text-align: center;
}
.readers-mask > span > p {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin: 0;
    padding: 0;
    text-indent: 0;
    text-align: center;
    line-height: 1.6em;
    font-size: 0.8em;
}
.mk-dark a.readers-avatar {
    background: #767676;
}
</style>

<header class="banner-bg-header">
    <h1 class="banner-title"><?php the_title(); ?></h1>
    <h4 class="banner-sub-title">个个都是人才，说话又好听...</h4>
</header>

<section class="readers clear-fix">
    <?php readers_wall(100); ?>
</section>

<article id="post-<?php the_ID(); ?>" <?php post_class('width-short'); ?> itemscope itemtype="http://schema.org/Article">
	<!-- 正文 -->
	<div class="entry-content" itemprop="articleBody">
        <?php the_content(); ?>
	</div><!-- .entry-content -->
	
	<!-- 点赞、分享、打赏组件 -->
    <?php get_template_part( 'inc/social' ); ?>
	
	</div>  
	
</article><!-- #post -->

<?php 
    comments_template('', true); 
    wp_reset_query();
endwhile; 

get_footer();

// 获取读者墙
function readers_wall($limit = '100')
{
	global $wpdb;
	
	$query = "
        SELECT COUNT(comment_ID) AS comment_count, 
            comment_author, 
            comment_author_url, 
            comment_author_email
        FROM (
            SELECT *
            FROM {$wpdb->comments} 
            WHERE user_id = '0'
                AND comment_approved = '1'
                AND comment_author_email != ''
            ORDER BY comment_date DESC
        ) temp_comment
        GROUP BY comment_author_email
        ORDER BY comment_count DESC
        LIMIT {$limit}
    ";
    
	$readers = $wpdb->get_results($query);
	
	$i = 0;
	foreach ($readers as $reader) {
		$i++;
		$name   = $reader->comment_author;
		$email  = $reader->comment_author_email;
		$avatar = get_avatar($email, 200, 'mm', $name);
		$url    = $reader->comment_author_url;
		if(!$url) $url = 'javascript:;';
		$count  = $reader->comment_count;
		
        echo '<a target="_blank" href="'.$url.'" rel="external nofollow" class="readers-avatar">
            <div class="readers-avatar-outer">
                <div class="readers-avatar-inner">
                    '.$avatar.'
                </div>
            </div>
            <div class="readers-mask">
                <span>
                    <p>第'.$i.'名</p>
                    <p>'.$name.'</p>
                    <p>'.$count.'</p>
                </span>
            </div>
        </a>';
	}
}

?>