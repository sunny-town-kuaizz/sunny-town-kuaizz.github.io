<?php 
/**
 * 404 页面
 */
if(!defined('THEME_NAME')) die('非法访问 - Insufficient Permissions');

get_header();
?>
<style>
#svgContainer {
    max-width: 50rem;
    min-height: 6.25rem;
    margin: 0.63rem auto 1.88rem;
}
#svgContainer > svg {
    border-radius: 0.31rem;
}

#btn-back-home {
    background-image: -webkit-gradient(linear,left top,right top,from(#fda233),to(#fd8320));
    background-image: -webkit-linear-gradient(left,#fda233,#fd8320);
    background-image: linear-gradient(to right,#fda233,#fd8320);
    filter: progid:DXImageTransform.Microsoft.Gradient(gradientType=1, startColorStr=#fda233, endColorStr=#fd8320);
    width: 10rem;
    height: 2.88rem;
    line-height: 2.88rem;
    border: 0;
    border-radius: 2.88rem;
    cursor: pointer;
    display: block;
    vertical-align: middle;
    text-align: center;
    color: #fff;
    margin: 0.31rem auto 1.88rem;
    font-size: 0.88rem;
}
#btn-back-home:hover {
    -webkit-box-shadow: 0 0.13rem 0.5rem 0 rgba(0,0,0,.15);
            box-shadow: 0 0.13rem 0.5rem 0 rgba(0,0,0,.15);
    -webkit-transition: all .2s;
            transition: all .2s;
    opacity: .9;
}
#btn-back-home .fa {
    font-size: 1.25rem;
}
</style>

<div id="svgContainer"></div>

<a id="btn-back-home" href="<?php bloginfo('home'); ?>">
    <i class="fa fa-home" aria-hidden="true"></i> 
    返回首页
</a>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/static/js/404.data.min.js"></script>

<script>
(function ($, window, document) {
    var svgContainer = document.getElementById('svgContainer');
    
    if($(svgContainer).hasClass("done")) return;
    
    var animItem = bodymovin.loadAnimation({
        wrapper: svgContainer,
        animType: 'svg',
        loop: true,
        animationData: JSON.parse(animationData)
    });
    
    $(svgContainer).addClass("done");
}(jQuery, window, document));
</script>

<?php get_footer();?>