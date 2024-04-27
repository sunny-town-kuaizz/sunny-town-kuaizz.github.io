<?php
// 页脚
if(!defined('THEME_NAME')) die('非法访问 - Insufficient Permissions');
?>
<footer id="site-footer">
    <?php echo stripslashes(mk_theme_option('footer_code')); ?>
</footer>

</section> <!-- #mkblog-body -->

<!--[if IE]>
<div class="no-ie">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
    本博客已不支持 IE <a href="http://lab.mkblog.cn/music/plugns/killie/" target="_blank">点击升级浏览器</a>
</div>
<![endif]-->

<!-- 侧边的按钮组 -->
<div class="corner-btn-group">
    <?php if(is_user_logged_in()) : ?>
    <a href="<?php echo admin_url(); ?>" target="_blank" title="进入后台" class="corner-btn">
        <i class="fa fa-tachometer" aria-hidden="true"></i>
    </a>
    <?php endif; ?>
    <div id="theme-control" title="设置" class="corner-btn">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </div>
    <div id="scroll-to-top" title="返回顶部" class="headroom headroom--top corner-btn">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </div>
</div>


<!-- 主题前端控制面板 -->
<div class="theme-control-panel" hidden>
    <div class="theme-control-dark clear-fix">
        <label class="mk-checkbox">
            <span class="moon-icon"></span>
            夜间模式
            <input type="checkbox" id="dark-mode-switch"<?php if(MK_IS_DARK_MODE) echo ' checked';?>>
            <div><div></div></div>
        </label>
    </div>
    <hr>
    <div class="theme-control-font">
        <button id="font-size-smaller"><i class="fa fa-minus"></i></button> 
        <span id="font-size-text" class="btn">100</span> 
        <button id="font-size-larger"><i class="fa fa-plus"></i></button>
    </div>
</div>

<!-- 初始化小表情、灯箱、代码高亮 -->
<script>initTheme();</script>

<?php wp_footer(); ?>

<?php if(mk_theme_option('fake_pjax')): ?>
<!-- pjax 动画 -->
<div class="mk-pjax mk-pjax-mask"></div>
<div class="mk-pjax mk-pjax-anim">
    <div>
        <span class="mk-pjax-1"></span>
        <span class="mk-pjax-2"></span>
        <span class="mk-pjax-3"></span>
        <span class="mk-pjax-4"></span>
        <span class="mk-pjax-5"></span>
        <span class="mk-pjax-6"></span>
        <span class="mk-pjax-7"></span>
    </div>
</div>
<script>
(function() {
    $(document).on('pjax:send', function() {
        $('body').removeClass("main-menu-on");
        $('.mk-pjax').show();
    });
    $(document).on('pjax:complete', function(e) {
        $('.mk-pjax').fadeOut();
        initTheme();
        if(typeof ga !== 'undefined') {
            ga('send', 'pageview', location.pathname + location.search);
        }
        if(typeof MathJax !== 'undefined') {
            MathJax.Hub.Queue(["Typeset",MathJax.Hub])
        }
        if (typeof _hmt !== 'undefined'){
            _hmt.push(['_trackPageview', location.pathname + location.search]);
        }
    });
    $(document).pjax('a[target!=_blank]', '#mkblog-body', { fragment: '#mkblog-body', timeout: 5000 });
    $(document).on('submit', '#search', function (event) {$.pjax.submit(event, '#mkblog-body', { fragment: '#mkblog-body', timeout: 5000 });});
})();
</script>
<?php endif; ?>

</body>
</html>