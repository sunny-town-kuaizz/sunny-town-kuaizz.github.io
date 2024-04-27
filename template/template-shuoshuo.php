<?php 
/**
 * Template Name: 说说列表
 */

get_header(); 
?>

<style>
.shuoshuo-list {
    list-style: none;
    background: transparent!important;
}
.shuoshuo-list>li {
    position: relative;
    min-height: 4.2em;
    margin: 0 0 3em;
    perspective: 420em;
}
.shuoshuo-list>li:last-child {
    margin-bottom: 0;
}
.shuoshuo-list>li>.avatar {
    width:  3.6em;
    height: 3.6em;
    display: block;
    border-radius: 100%;
    position: absolute;
}

.shuoshuo-content {
    float: left;
    padding-left: 5.2em;
    color: #fff;
    max-width: 100%;
}

.shuoshuo-content-inner {
    position: relative;
    padding: 0.8em;
    background: #fd6a7f;
    border-radius: 0.4em;
}
.shuoshuo-content-inner:before {
    content: "";
    border-top: 2em solid transparent;
    border-right: 4em solid #fd6a7f;
    border-bottom: 2em solid transparent;
    position: absolute;
    left: -0.8em;
    top: 0;
    z-index: -1;
}

.shuoshuo-list li:nth-child(4n) .shuoshuo-content-inner:before {
    border-right-color: #70c3ff;
}
.shuoshuo-list li:nth-child(4n) .shuoshuo-content-inner {
    background: #70c3ff;
}

.shuoshuo-list li:nth-child(4n-1) .shuoshuo-content-inner:before {
    border-right-color: #7f8ea0;
}
.shuoshuo-list li:nth-child(4n-1) .shuoshuo-content-inner {
    background: #7f8ea0;
}

.shuoshuo-list li:nth-child(4n-2) .shuoshuo-content-inner:before {
    border-right-color: #89d04f;
}
.shuoshuo-list li:nth-child(4n-2) .shuoshuo-content-inner {
    background: #89d04f;
}

.shuoshuo-list li, .shuoshuo-content-inner {
    -webkit-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s;
       -moz-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s;
         -o-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s;
        -ms-transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s;
            transition: all .8s cubic-bezier(.59,1.45,.69,.98) .2s;
    -webkit-transform-origin: 0 0;
       -moz-transform-origin: 0 0;
         -o-transform-origin: 0 0;
        -ms-transform-origin: 0 0;
            transform-origin: 0 0;
}
.shuoshuo-list li:hover .shuoshuo-content-inner {
    -webkit-transform: rotateY(-5deg);
       -moz-transform: rotateY(-5deg);
         -o-transform: rotateY(-5deg);
        -ms-transform: rotateY(-5deg);
            transform: rotateY(-5deg);
    
    -webkit-transform-style: preserve-3d;
       -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
         -o-transform-style: preserve-3d;
            transform-style: preserve-3d;
}

.shuoshuo-list li:hover .shuoshuo-content-inner {
    box-shadow: 0.8em 0 0.8em -0.5em rgba(0,0,0,.3);
}

.shuoshuo-content p {
    line-height: 1.8;
}
.shuoshuo-content p a {
    color: #fff;
    border-bottom: 0.08em dashed #dedddd;
    margin: 0 0.25em;
}
.shuoshuo-content img {
    max-width: 100%;
    *:width: auto;      /*低版本的IE*/
    *:max-width: 100%;
    height: auto;
}

.shuoshuo-content .mk-pretty-container {
    margin: .6em 0;
}
.shuoshuo-content .mk-pretty-toolbar {
    display: none;
}

.shuoshuo-info {
    border-top: 0.18em dashed rgba(82, 82, 82, 0.38);
    margin-top: 0.6em;
    padding-top: 0.6em;
}
.shuoshuo-info, .shuoshuo-info a {
    font-size: .9em;
    color: #f7f7f7;
}
.shuoshuo-info span {
    margin-right: 0.4em;
}

.shuoshuo-link {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 10;
    cursor: pointer;
    border: none;
}

.shuoshuo-content-inner .prettyprint {
    margin: .5em 0;
}
.shuoshuo-content-inner .code-pretty-toolbar {
    display: none;
}
</style>

<ul class="shuoshuo-list width-short clear-fix">
    <?php 
    $paged = isset($_GET['pn'])? intval($_GET['pn']): 1;    // 获取页码
    query_posts('post_type=shuoshuo&post_status=publish&paged=' . $paged);
    
    $simple_mood_list = mk_theme_option('simple_mood_list');    // 说说仅显示摘要
    if (have_posts()) : 
        while (have_posts()) : 
            the_post(); 
    ?>
    <li class="clear-fix">
        <?php echo get_avatar(get_the_author_meta('email'), 50); ?>
        <div class="shuoshuo-content">
            <div class="shuoshuo-content-inner">
                <?php 
                if (post_password_required()) {   // 密码保护
                    echo '[这是一篇加密说说]'; 
                } else {
                    if($simple_mood_list) {
                        echo '<p>' . mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 230, '...') . '</p>';
                    } else {
                        the_content();
                    }
                } 
                ?>
                
                <div class="shuoshuo-info">
                    <span name="发表时间">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <?php echo timeago(get_the_time('Y-m-d G:i:s')) ?>
                    </span>
                    <?php if ( comments_open() ) { ?>
                    <span name="评论数">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <?php if( !post_password_required() ) { comments_popup_link( '0', '1', '%', '-' ); } else { echo '-'; } ?>
                    </span>
                    <?php } ?>
                    <span name="点赞数">
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        <?php 
                        if(get_post_meta($post->ID, 'ality_like',true)) {
                            echo get_post_meta($post->ID, 'ality_like',true);
                        } else {
                            echo '0';
                        }
                        ?>
                    </span>
                </div>  <!-- .shuoshuo-info -->
                
                <a href="<?php the_permalink(); ?>" class="shuoshuo-link" title="点击查看详情"></a>
            </div>  <!-- .shuoshuo-content-inner -->
        </div>  <!-- .shuoshuo-content -->
    </li>
    <?php endwhile; endif; ?>
</ul>   <!-- .shuoshuo-list -->

<!-- 说说分页 -->
<div class="page-navi-bar"><div class="page-navi">
<?php
// 参考 https://www.wpdaxue.com/paginate_links.html
echo paginate_links(array(  
    // 'base'         => '%_%',
    'format'     => '?pn=%#%',
    'current'    => $paged,
    'total'      => $wp_query->max_num_pages, 
    'prev_next'  => true, 
    'prev_text'  =>'←',
	'next_text'  =>'→',
    'type'       => 'plain',  
    'before_page_number' => '',
	'after_page_number'  => ''
)); 
?>
</div></div>

<?php get_footer();?>