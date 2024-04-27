<?php
// 页头
if(!defined('THEME_NAME')) die('非法访问 - Insufficient Permissions');

$theme_color = get_theme_mod('mk_theme_color');

?><!DOCTYPE html>
<html lang="zh-CN" style="<?php if($theme_color && $theme_color != '#eb5055') echo '--theme-color: '.$theme_color.';' ; ?>font-size: <?php echo MK_FONT_SIZE; ?>%;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="author" content="mengkun">
<meta http-equiv="Cache-Control" content="no-transform">
<meta http-equiv="Cache-Control" content="no-siteapp">

<?php get_template_part('inc/seo'); ?>
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- RSS -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory'); ?>/js/html5-css3.js"></script>
<![endif]-->

<?php 
/**
 * 警告！请不要改动主题 <head></head> 部分的代码！
 * 如果需要在 head 区域添加自定义代码，请前往 后台 > 主题选项 > 杂项设置 > head 代码
 */
wp_head();
echo stripslashes(mk_theme_option('head_code')); 
?>
</head>
<body <?php body_class(MK_IS_DARK_MODE? 'mk-dark': ''); ?>>

<section id="mkblog-body">

<!-- 顶部导航栏 -->
<nav id="top-navi"<?php if(mk_theme_option('auto_hide_nav')) echo ' class="headroom"'; ?>>
    <div id="menu-btn">
        <div class="menu-btn-bar"></div>
        <div class="menu-btn-bar"></div>
        <div class="menu-btn-bar"></div>
    </div>
    
    <div class="top-navi-content">
        <a class="top-navi-logo" href="<?php bloginfo('url'); ?>">
            <?php if(get_theme_mod('mk_site_logo')): ?>
            <img src="<?php echo get_theme_mod('mk_site_logo'); ?>" alt="<?php bloginfo('name'); ?>">
            <?php else: ?>
            <h1><?php bloginfo('name'); ?></h1>
            <?php endif; ?>
        </a>
        
        <a class="top-navi-search-btn" href="<?php echo mk_search_page_url(); ?>" title="搜索博客内容">
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
        
        <div class="main-menu">
            <?php 
            wp_nav_menu( array( 
                'theme_location' => 'main-menu', 
                'container'      => false,                      // 不要外层包围 http://www.2zzt.com/jcandcj/6373.html
                'fallback_cb'    => 'not_set_menu_fallback'     // 用于没有在后台设置导航时调的回调函数。
                ) 
            ); 
            ?>
        </div>
    </div>
</nav><!-- #top-header -->
