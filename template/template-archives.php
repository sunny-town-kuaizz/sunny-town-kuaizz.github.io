<?php
/**
 * Template Name: 文章归档
 */

get_header(); 

while ( have_posts() ) : the_post(); 
?>
<style type="text/css">
/* 博客统计信息 */
.archives-count {
    width: 100%;
    text-align: center;
    color: #666;
}
.archives-count .archives-count-item {
    padding: 0.4em 0 0.6em;
    cursor: pointer;
    width: 20%;
    float: left;
    border-radius: 0.3em;
}
.archives-count .archives-count-item:hover {
    background: #f8f8f8;
}
@media screen and (max-width: 650px) {
    .archives-count .archives-count-item {
        width: 33.33%;
    }
    .archives-count .archives-count-item:nth-last-child(1),
    .archives-count .archives-count-item:nth-last-child(2) {
        width: 50%;
        margin-top: 1em;
    }
}
.archives-count code {
    margin: 0 auto 0.2em;
    display: block;
    font-size: 2em;
    color: #adabab;
    background: transparent!important;
    overflow: hidden;
    text-overflow:ellipsis;
    white-space: nowrap;
}

/* 归档列表 */
#all-post-archives {
    margin-bottom: 2em;
}
#all-post-archives ul {
    list-style: none;
    overflow: hidden;
    padding-left: 1.5em;
}
#all-post-archives .year,
#all-post-archives .mon {
    user-select: none;
    cursor: pointer;
}

/* 年份标题 */
#all-post-archives .year {
    margin-top: 0;
}
#all-post-archives .mon-list {
    margin-top: -0.8em;
    margin-bottom: 0;
}

/* 每个月的文章内容 */
#all-post-archives .mon-list>li {
    margin-bottom: 1em;
}

/* 每个单独的一条 */
#all-post-archives .post-list>li {
    color: #c1c1c1;
    word-break: keep-all;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
#all-post-archives .post-list>li>a {
    margin-left: 0.4em;
    border: none!important;
}
</style>

<header class="banner-bg-header">
    <h1 class="banner-title"><?php the_title(); ?></h1>
    <h4 class="banner-sub-title">最后更新于 <?php echo last_update_data(); ?></h4>
</header>

<section class="entry-content width-short" itemprop="articleBody">
    <?php the_content(); ?>
    <fieldset>
        <legend>统计信息</legend>
        
        <div class="archives-count">
            <div class="archives-count-item">
                <code id="category-count" data-num="<?php echo intval(wp_count_terms('category')); ?>">
                    NaN
                </code>分类
            </div>
            <div class="archives-count-item">
                <code id="post-count" data-num="<?php echo intval(wp_count_posts()->publish); ?>">
                    NaN
                </code>文章
            </div>
            <div class="archives-count-item">
                <code id="tag-count" data-num="<?php echo intval(wp_count_terms('post_tag')); ?>">
                    NaN
                </code>标签
            </div>
            <div class="archives-count-item">
                <code id="comment-count" data-num="<?php echo intval($wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments"));?>">
                    NaN
                </code>留言
            </div>
            <div class="archives-count-item">
                <code id="view-count" data-num="<?php echo intval(all_view()); ?>">
                    NaN
                </code>阅读
            </div>
        </div>
    </fieldset>
    
    <?php mk_archives_list(); ?>
</section>     <!-- .entry-content -->


<script>
jQuery(document).ready(function($) {
    numRoll("#category-count");
    numRoll("#tag-count");
    numRoll("#post-count");
    numRoll("#view-count");
    numRoll("#comment-count");
    
    if($("#all-post-archives").hasClass("done")) return;
    
    $('#all-post-archives span.mon').each(function() {
        var num = $(this).next().children('li').size();
        var text = $(this).text();
        $(this).html(text + ' ( ' + num + ' 篇文章 )');
    });
    
    $("#all-post-archives .mon-list").hide();
    $("#all-post-archives .mon-list:first").show();
    $("#all-post-archives").addClass("done");
    
    function numRoll(targetDom) {
        var targetNum = $(targetDom).data("num");
        
        $(targetDom).attr("title", targetNum);
        $(targetDom).animate({
            num: "targetNum",
        }, {
            duration: 1000,
            easing: "swing",
            step: function(a, b) {
                var curNum = parseInt(b.pos * targetNum);
                
                if(curNum > 10000) {
                    curNum = curNum / 10000;
                    curNum = curNum.toFixed(0);
                    curNum = curNum + "w";
                }
                
                $(targetDom).html(curNum + '+');
            }
        });
    }
});
</script>

<?php 

wp_reset_query(); endwhile; 

get_footer();


// 文章归档
function mk_archives_list() {
	$output = '<div id="all-post-archives">';
    $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' );
	$year=0; $mon=0; $i=0; $j=0;
	while ( $the_query->have_posts() ) {
	    $the_query->the_post();
		$year_tmp = get_the_time('Y');
		$mon_tmp = get_the_time('m');
		$y=$year; $m=$mon;
		if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
		if ($year != $year_tmp && $year > 0) $output .= '</ul>';
		if ($year != $year_tmp) {
			$year = $year_tmp;
			$output .= '<h2 class="year" onclick="$(this).next().slideToggle(400)">'. $year .' 年</h2><ul class="mon-list" >';
		}
		if ($mon != $mon_tmp) {
			$mon = $mon_tmp;
			$output .= '<li><span class="mon" onclick="$(this).next().slideToggle(400)">'. $mon .'月</span><ul class="post-list">';
		}
		$output .= '<li>'. get_the_time('d日: ') .'<a class="links" href="'. get_permalink() .'">'. get_the_title() .'</a>';
	}
	wp_reset_postdata();
	$output .= '</ul></li></ul></div>';
	echo $output;
}


// 浏览总数
function all_view() {
    global $wpdb;
    $count = 0;
    $views = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='views'");
    foreach($views as $key=>$value)
    {
        $meta_value=$value->meta_value;
        if($meta_value != ' ') {
            $count += (int)$meta_value;
        }
    }
    return $count;
}

// 最后更新时间
function last_update_data() {
    global $wpdb;
    $last = $wpdb->get_results("
        SELECT MAX(post_modified) AS MAX_m 
        FROM $wpdb->posts 
        WHERE (
            post_type = 'post' OR post_type = 'page'
        ) AND (
            post_status = 'publish' OR post_status = 'private'
        )");
    $last = date('Y年m月d日', strtotime($last[0]->MAX_m));
    return $last; 
}