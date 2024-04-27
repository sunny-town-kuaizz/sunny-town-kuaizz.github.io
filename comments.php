<?php
// 评论部分模板
if(!defined('THEME_NAME')) die('非法访问 - Insufficient Permissions');

if(post_password_required()) return;                 // 需要密码访问的文章
if(!have_comments() && !comments_open()) return;     // 无评论且关闭了评论

?>
<div id="comments" class="width-short">
    <?php if(comments_open()) : ?>	
	<div id="respond" class="comment-respond clear-fix">
        <div class="comment-reply-title">
            <span>发表评论</span>
            <a rel="nofollow" id="cancel-comment-reply-link" href="javascript:;">
                <i class="fa fa-times" aria-hidden="true"></i> 
                取消回复
            </a>
        </div>     <!-- comment-reply-title -->
        
        <?php if(get_option('comment_registration') && !is_user_logged_in()): ?>
        <div class="mk-alert info">
            <i class="fa fa-info-circle" aria-hidden="true"></i> 
            您必须 [<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录</a>] 才能发表评论！
        </div>
        <?php else : ?>
        
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <div class="comment-author-welcome">
                <?php if(is_user_logged_in()) : $current_user = wp_get_current_user(); ?>
                
                <?php echo get_avatar($current_user->user_email, 30, '', $current_user->display_name); ?>
                <a href="<?php echo get_edit_user_link(); ?>" class="links" data-no-instant><?php echo $user_identity; ?></a> 
                <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="links">退出</a>
                
                <?php elseif ($comment_author): ?>
                
                <?php echo get_avatar($comment_author_email, 30, '', $comment_author); ?>
                欢迎 <?php echo $comment_author; ?> 再次光临！ 
                <span title="点击编辑用户信息" onclick="jQuery('#comment-author-info').slideToggle()" class="links">编辑信息</span>
                <?php
                $gravatar_guide = mk_theme_option('gravatar_guide');
                if($gravatar_guide) {
                    echo '<a href="' . $gravatar_guide . '" target="_blank" class="links">修改头像</a>';
                }
                ?>
                
                <?php endif;  // 是否是登录及记住密码用户 ?>
            </div>  <!-- comment-author-welcome -->
			
			<?php if(!is_user_logged_in()): ?>
            <div id="comment-author-info"<?php if ($comment_author) echo ' hidden'; ?>>
                <div class="comment-form-author">
                    <label for="author">昵称<?php if ($req) echo "（必填）"; ?></label>
                    <input type="text" name="author" id="author" class="commenttext" value="<?php echo $comment_author; ?>" tabindex="1" <?php if ($req) echo "required"; ?>/>
                </div>
                <div class="comment-form-email">
                    <label for="email">邮箱<?php if ($req) echo "（必填）"; ?></label>
                    <input type="email" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "required"; ?>/>
                </div>
                <div class="comment-form-url">
                    <label for="url">网址</label>
                    <input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" tabindex="3" />
                </div>
            </div>
			<?php endif; ?>
            
            <div class="comment-form-comment">
                <textarea id="comment" name="comment" rows="3" tabindex="4" placeholder="<?php echo stripslashes(mk_theme_option('comment_tips')); ?>" required></textarea>
                <div class="comment-form-tools">
                    <span data-action="emoji" title="插入表情"><i class="fa fa-smile-o" aria-hidden="true"></i> 表情</span>
                    <span data-action="pic" title="插入图片"><i class="fa fa-picture-o" aria-hidden="true"></i> 图片</span>
                    <span data-action="url" title="插入超链接"><i class="fa fa-link" aria-hidden="true"></i> 链接</span>
                    <span data-action="code" title="插入代码段"><i class="fa fa-code" aria-hidden="true"></i> 代码</span>
                    <span data-action="close" style="float: right;" title="关闭工具条"><i class="fa fa-times" aria-hidden="true"></i></span>
                </div>
            </div>
            
            <p id="comment-tips"></p>
            
            <div class="comment-form-submit">
                <?php comment_id_fields(); do_action('comment_form', $post->ID); ?>
                <button id="submit" type="submit" tabindex="5">提交评论</button>
            </div>
		</form>
        
        <?php endif; // 非必须登录 ?>
    
    </div>     <!-- respond -->
    <?php else: ?>
        
        <!-- 禁止评论 -->
        <div class="mk-alert warning">
            <i class="fa fa-ban" aria-hidden="true"></i> 
            博主关闭了这篇内容的评论功能
        </div>
        
    <?php endif; ?>
	
	<!-- 评论列表 -->
	<?php if(have_comments()) : ?>
	<ol class="comment-list">
		<?php wp_list_comments(array('callback' => 'mytheme_comment')); ?>
	</ol><!-- .comment-list -->
	
	<!-- 评论翻页 -->
    <?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav class="comment-navi">
        <?php paginate_comments_links('prev_text=←&next_text=→'); ?>
    </nav>
    <?php endif; ?>
    
	<?php endif; ?>

</div>  <!-- .comments-area -->
