<?php
/**
 * Template Name: 标签大全
 */
get_header();

while (have_posts()) : 
    the_post(); 
?>

<!--
本页面使用了 wordcloud2.js 插件
https://github.com/timdream/wordcloud2.js

创意来自 @dron(http://ucren.com/blog/archives/741)

向以上两位大神致敬！
-->

<style>
.tags-content {
    margin: 0.8em auto 1.6em;
    display: block;
    vertical-align: baseline;
    width: 100%; 
    max-width: 85em;
    position: relative;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    padding: 0.8em;
}

/* 标签 */
#tag-cloud-ball a {
    line-height: 1.4em;
    background: #999;
    position: relative;
    color: #fff;
    text-align: center;
    text-overflow: ellipsis;
    whitewhite-space: nowrap;
    top:0; left: 0;
    padding: 0.4em 0.6em;
    box-shadow: 0 0.08em 0.08em rgba(0,0,0,.08);
    background: #ffc107;
    border-radius: 0.3em;
    display: inline-block;
    line-height: 1.50em;
    margin: 0 0.83em 1.25em 0;
    -webkit-transition: .2s;
       -moz-transition: .2s;
        -ms-transition: .2s;
         -o-transition: .2s;
}

#tag-cloud-ball a:nth-child(2n){background: #fd6a7f}
#tag-cloud-ball a:nth-child(3n){background: #89d04f}
#tag-cloud-ball a:nth-child(4n){background: #7f8ea0}
#tag-cloud-ball a:nth-child(5n){background: #70c3ff}
#tag-cloud-ball a:hover{
    transform: scale(1.5, 1.5);
    z-index: 20;
    box-shadow: 0 0.1em 0.8em rgba(0, 0, 0, 0.15);
}

/* 视图切换 */
.tag-view-switch {
    text-align: center;
    margin: 3em auto 1.6em;
}
.tag-view-switch button {
    background-color: #fff;
    border: 0.2em solid #eb5055;
    border-color: var(--theme-color);
    padding: 0.5em 1.6em;
    color: #000;
}
.tag-view-switch button:first-child {
    border-radius: 3.33em 0 0 3.33em;
    border-right-width: 0.1em;
}
.tag-view-switch button:last-child {
    border-radius: 0 3.33em 3.33em 0;
    border-left-width: 0.1em;
}
.tag-view-switch button:hover, .tag-view-switch button.active {
    background-color: #eb5055;
    background-color: var(--theme-color);
    color: #fff;
}

/* 鼠标移上去后的提示框 */
#tag-cloud-tooltip {
    border: 0.08em solid #ccc;
    background-color: #fff;
    border-radius: 0.42em;
    padding: 0.83em 1.42em 1.25em 1.42em;
    position: fixed;
    box-shadow: 0 0.50em 1.00em rgba(0,0,0,.175);
    display: none;
    z-index: 999;
}
#tag-cloud-tooltip .tag-tooltip-title {
    font-size: 1.50em;
    font-weight: 700;
    color: #000;
}
#tag-cloud-tooltip .tag-tooltip-counts {
    color: #333;
    font-size: 1.00em;
    margin: 0.25em 0 0.42em;
}
#tag-cloud-tooltip .tag-tooltip-counts>span {
    color: #eb5055;
    color: var(--theme-color);
    font-size: 1.67em;
    font-weight: 700;
    font-style: italic;
}
#tag-cloud-tooltip .tag-tooltip-tips {
    color: #999;
    font-size: 1em;
}
#tag-cloud-tooltip .tag-tooltip-tips>span {
    color: #333;
}

.mk-dark #tag-cloud-ball a {
    opacity: 0.5;
}
</style>

<header class="banner-bg-header">
    <h1 class="banner-title"><?php the_title(); ?></h1>
    <h4 class="banner-sub-title">看点不一样的</h4>
</header>

<div class="tag-view-switch">
    <button data-togget="tag-cloud-canvas" class="active">词云</button><button data-togget="tag-cloud-ball">全部</button>
</div>

<div id="tag-cloud-ball" class="tags-content" style="display: none"></div>
<canvas id="tag-cloud-canvas" class="tags-content" width="1000" height="550">您的浏览器版本过低，无法查看词云</canvas>
<div id="tag-cloud-tooltip"></div>

<section class="width-short">
    <?php the_content(); ?>
    <?php get_template_part('inc/social'); ?>
</section>  <!-- .width-short -->

<?php 
comments_template('', true); 
wp_reset_query(); 
endwhile; 
?>

<script>
var lists = [<?php 
            $tags_list = get_tags();
            if ($tags_list) { 
                foreach($tags_list as $tag) {
                    echo '["'. $tag->name .'",'. $tag->count .'],'; 
                } 
            } 
            // get_tag_link($tag)
            ?>];
</script>

<!-- 标签云插件 -->
<script src="<?php echo MK_THEME_STATIC_URL; ?>/js/wordcloud2.min.js?ver=2"></script>

<?php get_footer();?>