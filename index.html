<?php 
/**
 * 注意：
 * 
 * 如需修改主题配置，请前往 WordPress后台 > 外观 > 主题选项
 */
if(!defined('THEME_NAME')) die('非法访问 - Insufficient Permissions');

get_header();

if (is_home()) {
    // 首页公告
    $home_notice_types = mk_theme_option('home_notice_types');
    if($home_notice_types == 'shuoshuo') {
        query_posts('post_type=shuoshuo&post_status=publish&paged=1'); 
        if(have_posts()) {
            echo '<section class="home-notice"><div><ul>';
            while(have_posts()) { 
                the_post();  
                if(post_password_required()) continue; 
                echo '<li><a href="' . get_the_permalink() . '">' . mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150, '...') . '</a></li>';
            }
            echo '</ul></div></section>';
        }
    	wp_reset_query();
    } else if($home_notice_types == 'diy') {
        $home_notice_diy = mk_theme_option('home_notice_diy');
        $home_notice_diy = array_filter(explode(PHP_EOL, $home_notice_diy));
        if(count($home_notice_diy)) {
            echo '<section class="home-notice"><div><ul>';
            foreach($home_notice_diy as $item) {
                $item = explode('|', $item);
                echo '<li><a href="' . (isset($item[1])? trim($item[1]): 'javascript:;') . '">' . trim($item[0]) . '</a></li>';
            }
            echo '</ul></div></section>';
        }
    }
} else {
    // 非首页，展示页面 banner
    if (is_category()) {
        $banner_title = '分类';
		$banner_sub_title = '与『'.single_cat_title('', false).'』相关的内容';
	} elseif (is_tag()) {
        $banner_title = '标签';
        $banner_sub_title = '与『'.single_tag_title('', false).'』相关的内容';
    } elseif (is_day()) {
        $banner_title = '归档';
        $banner_sub_title = get_the_time('Y年m月d日的文章');
    } elseif (is_month()) {
        $banner_title = '归档';
        $banner_sub_title = get_the_time('Y年m月的文章');
    } elseif (is_year()) {
        $banner_title = '归档';
        $banner_sub_title = get_the_time('Y年的文章');
    } elseif (is_author()) {
        $banner_title = '作者';
        $banner_sub_title = wp_title('', false) . ' 的所有文章';
    } elseif (is_search()) {
        $banner_title = '搜索';
        $counts = $wp_query->found_posts;
        if($counts) {
            $banner_sub_title = '找到 ' . $counts . '+ 与『'.get_search_query().'』相关的内容';
        } else {
            $banner_sub_title = '没找到与『'.get_search_query().'』相关的内容';
        }
    } else {
        $banner_title = get_bloginfo();
        $banner_sub_title = get_bloginfo('description');
    }
    mk_header_banner($banner_title, $banner_sub_title);
}
?>

<main id="main" class="site-main" role="main">
    
    <?php if ( have_posts() ) : ?>
    
    <!-- 列表头广告 -->
    <?php echo stripslashes(mk_theme_option('list_head_ad')); ?>
    
    <!-- 博文列表区 -->
    <section id="post-lists" class="clear-fix">
        <?php if(mk_theme_option('list_style') == 'list'): ?>
        
        <?php while ( have_posts() ) : the_post(); ?>
        <section id="post-<?php the_ID(); ?>" class="post-item-list">
            <a href="<?php the_permalink(); ?>" class="post-item-img">
                <img class="anim-trans" src="<?php echo mk_auto_post_thumbnail(360, 240);?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
            </a>
            
            <header class="entry-header">
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" class="anim-trans">
                        <?php if ( is_sticky() ) { echo '<span title="首页置顶" class="article-ontop">置顶</span> · ';}?>
                        <?php the_title(); ?>
                    </a>
                </h2>
                
                <div class="archive-content">			 				
                    <?php echo mk_post_excerpt(210); ?>
                </div>
                
                <span class="entry-meta">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?>
                    
                    <?php if( function_exists( 'the_views' ) ) { ?>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <?php if( !post_password_required() ) {the_views();} else { echo '-'; } ;?>
                    <?php } ?>
                    
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <?php if( !post_password_required() && comments_open() ) { comments_popup_link( '0', '1', '%', '', '-' ); } else { echo '-'; } ?>
                </span>
            </header><!-- .entry-header -->
        </section><!-- #post -->
        <?php endwhile; ?>
        
        <?php else: ?>
        
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>">
            <div class="post-item-card">
            
            <div class="post-item-card-body">
            <a href="<?php the_permalink(); ?>" class="item-thumb">
                <figure class="thumbnail" style="background-image:url(<?php echo mk_auto_post_thumbnail(360, 240);?>);"></figure>
                
                <div class="archive-content">			 				
                    <?php echo mk_post_excerpt(100); ?>
                </div>
            </a>
            
            <header class="entry-header">
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( is_sticky() ) { echo '<span title="首页置顶" class="article-ontop">置顶</span> · ';}?>
                        <?php the_title(); ?>
                    </a>
                </h2>
                
                <span class="entry-meta">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?>
                    
                    <?php if( function_exists( 'the_views' ) ) { ?>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <?php if( !post_password_required() ) {the_views();} else { echo '-'; } ;?>
                    <?php } ?>
                    
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <?php if( !post_password_required() && comments_open() ) { comments_popup_link( '0', '1', '%', '', '-' ); } else { echo '-'; } ?>
                </span>
                
            </header><!-- .entry-header -->
            
            </div>  <!-- #post-item-card-body -->
            </div>  <!-- #post-item-card -->
        </article><!-- #post -->
        <?php endwhile; ?>
        
        <?php endif; ?>
        
    </section>  <!-- .post-lists -->	
    
    <!-- 列表尾广告 -->
    <?php echo stripslashes(mk_theme_option('list_foot_ad')); ?>
    
    <!-- 页码 -->
    <?php mk_pagenavi(); ?>
    
    <?php else : ?>
    
        <style>
        .notfound {
            margin: 50px auto 100px;
            padding: 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.56);
            max-width: 500px;
            border-radius: 10px;
        }
        .notfound-ooops {
            color: #666;
            font-size: 24px;
            margin-bottom: 25px;
        }
        .notfound-face {
            font-size: 40px;
        }
        </style>
        
        <?php if(is_search()) { ?>
        <section class="notfound">
            <p class="notfound-ooops">Ooops...没找到你想要的 <span class="notfound-face">：(</span></p>
            <p>
                您可以尝试<a href="<?php echo mk_search_page_url(); ?>" class="links">搜点别的</a>
                或<a href="<?php bloginfo('home'); ?>" class="links">返回首页</a>
            </p>
        </section>
        <?php } else { ?>
        <section class="notfound">
            <p class="notfound-ooops">这里目前还没有文章 <span class="notfound-face">：(</span></p>
            <p>
                <a href="<?php echo get_option('siteurl'); ?>/wp-admin/post-new.php" class="links">点击这里发布您的第一篇文章</a>
            </p>
        </section>
        <?php } ?>
    
    <?php endif; ?>	
    
    <?php if(is_home() && ($home_links = mk_theme_option('home_links'))) : ?>
    
    <div class="home-links">
        <h3>友情链接</h3>
        <?php 
        $bookmarks = get_bookmarks(array(
            'category' => $home_links,
            'orderby'  => 'rand'
        ));
        
        foreach($bookmarks as $bookmark) {
            echo '<a class="friend-link anim-trans" href="'.$bookmark->link_url.'" title="'.$bookmark->link_notes.'" target="_blank">'.$bookmark->link_name.'</a>';
        }
        ?>
    </div>
    
    <?php endif; ?>
</main><!-- .site-main -->	

<?php get_footer(); ?>