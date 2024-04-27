<?php
/**
 * 警告：擅自修改以下内容会导致主题无法升级！
 */

/**
 * 主题名称
 *
 * @var string
 */
if ( !defined( 'THEME_NAME' ) )
	define( 'THEME_NAME', 'mkBlog' );

/**
 * 主题别名
 *
 * @var string
 */
if ( !defined( 'THEME_SLUG' ) )
	define( 'THEME_SLUG', trim( THEME_NAME ) );

/**
 * 主题版本
 *
 * @var string
 */
if ( !defined( 'THEME_VERSION' ) )
	define( 'THEME_VERSION', '2.11' );

/**
 * 主题是否已初始化
 *
 * @var string
 */
if ( !defined( 'THEME_READY' ) )
	define( 'THEME_READY', get_option(THEME_SLUG.'_options_setup') );

/**
 * 是否开启伪静态
 *
 * @var boolean
 */
if ( get_option( 'permalink_structure' ) ) {
	define( 'BLOG_REWRITE', true );
} else {
    define( 'BLOG_REWRITE', false );
}

/**
 * 其它主题全局定义
 */

// 主题静态资源链接
$cdn_url = get_option(THEME_SLUG.'_cdn_url');
if($cdn_url) {
    define('MK_THEME_STATIC_URL', $cdn_url);
} else {
    define('MK_THEME_STATIC_URL', get_template_directory_uri() . '/static');
}

// 是否是夜间模式
define('MK_IS_DARK_MODE', isset($_COOKIE['mk-dark-mode']) && (bool) $_COOKIE['mk-dark-mode']);

// 界面字体大小
$font_size = intval(isset($_COOKIE['mk-font-size'])? $_COOKIE['mk-font-size']: get_option(THEME_SLUG.'_font_size'));
if($font_size < 50) $font_size = 90;
define('MK_FONT_SIZE', $font_size);


