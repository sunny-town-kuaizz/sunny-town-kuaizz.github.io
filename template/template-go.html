<?php
/**
 * Template Name: [主题已自动创建]跳转页面
 */

// 参数配置
$jumpPage = array(
    'myDomain' => get_bloginfo('url'),
    'blogName' => get_bloginfo(),
    'showTips' => false
);

// 获取根域名
$jumpPage['rootDomain'] = getRootDomain($jumpPage['myDomain']);

// 这里用正则提取 $_SERVER["QUERY_STRING"] 而不是直接 get url
// 是因为如果链接中带参数则会获取不完整
preg_match('/url=(.*)/i', $_SERVER["QUERY_STRING"], $matches); 

// 如果没获取到跳转链接，直接跳回首页
if(!isset($matches[1])) {
    header("location:/");
    exit();
}

$jumpPage['targetUrl'] = urldecode($matches[1]);

// 判断是否包含 http:// 头，如果没有则加上
if(!preg_match('/(http|https):\/\//', $jumpPage['targetUrl'], $matches)) {
    $jumpPage['targetUrl'] = 'http://'. $jumpPage['targetUrl'];
}  

// 判断网址是否完整
if(preg_match('/[\w-]*\.[\w-]*/i', $jumpPage['targetUrl'], $matche)) {
    // 如果是本站的链接，不展示动画直接跳转
    if(getRootDomain($jumpPage['targetUrl']) == $jumpPage['rootDomain']) {
        header("location:{$jumpPage['targetUrl']}");
        exit();
    }
    
    $jumpPage['title'] = '页面加载中,请稍候...';
    $jumpPage['fromUrl'] = isset($_SERVER["HTTP_REFERER"])? $_SERVER["HTTP_REFERER"]: ''; // 获取来源url
    
    // 如果来源和跳转后的地址都不是本站，那么就要给出提示
    if(getRootDomain($jumpPage['fromUrl']) != $jumpPage['rootDomain']) {
        $jumpPage['title'] = '页面跳转提示';
        $jumpPage['showTips'] = true;
    }
} else {
    $jumpPage['targetUrl'] = '/';
    $jumpPage['title'] = '参数错误，正在返回首页...';
}

// 转义 html 字符，防止 XSS
$jumpPage['targetUrl'] = htmlspecialchars($jumpPage['targetUrl']);

/**
 * 判断是不是自己的域名
 * @param $domain 要进行判断的域名
 * @param $my 自己的域名
 * @return 对比结果
 */
function isMyDomain($domain, $my) {
    preg_match('/([^\?]*)/i', $domain, $match);
    if(isset($match[1])) $domain = $match[1];
    preg_match('/([\w-]*\.[\w-]*)\/.*/i', $domain.'/', $match);
    if(isset($match[1]) && $match[1] == $my) return true;
    return false;
}

/**
 * 获取一个长域名的根域名
 * @param $domain 长域名
 * @return 根域名
 */
function getRootDomain($domain) {
    preg_match('/([^\?]*)/i', $domain, $match);
    if(isset($match[1])) $domain = $match[1];
    preg_match('/([\w-]*\.[\w-]*)\/.*/i', $domain.'/', $match);
    if(isset($match[1])) return $match[1];
    return $domain;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="UTF-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="renderer" content="webkit"> 
<meta name="author" content="mengkun">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php if(!$jumpPage['showTips']): ?>
<meta http-equiv="refresh" content="0;url=<?php echo $jumpPage['targetUrl']; ?>">
<?php endif; ?>
<title><?php echo $jumpPage['title']; ?></title>
</head>
<body>

<?php if($jumpPage['showTips']): ?>
<div class='center-box jump-tips'>
    <h3>
        <span class="alert-icon"><i></i><em></em></span>
        页面跳转提示
    </h3>
    <dl>
      <dt>您将要访问的网站不属于<?php echo $jumpPage['blogName'];?>，
        我们无法确认该网页是否安全，它可能包含未知的安全隐患。</dt>
      <dd>您访问的网址是：<span id="url"><?php echo $jumpPage['targetUrl'];?></span></dd>
    </dl>
    <div class="button">
        <div class="button-left">
            <label>
                <input type="checkbox" id="trust_url"> 不再提示此消息
            </label>
        </div>
        <div class="button-right">
            <a id="go_on" href="<?php echo $jumpPage['targetUrl'];?>" rel="nofollow">忽略警告，继续访问</a>
            <a id="close" onclick="closePage()">关闭页面</a>
        </div>
    </div>
</div>
<?php else: ?>

<div class='center-box'>
    <div class='loader_overlay'></div>
    <div class='loader_cogs'>
        <div class='loader_cogs__top'>
            <div class='top_part'></div>
            <div class='top_part'></div>
            <div class='top_part'></div>
            <div class='top_hole'></div>
        </div>
        <div class='loader_cogs__left'>
            <div class='left_part'></div>
            <div class='left_part'></div>
            <div class='left_part'></div>
            <div class='left_hole'></div>
        </div>
        <div class='loader_cogs__bottom'>
            <div class='bottom_part'></div>
            <div class='bottom_part'></div>
            <div class='bottom_part'></div>
            <div class='bottom_hole'></div>
        </div>
    </div>
    <p class="loading-text">页面加载中<dot>...</dot></p>
</div>
<?php endif; ?>
<script>
function closePage() {
    /* 设个定时器，如果页面未关闭，则跳转至首页 */
    setTimeout(function() { 
        window.location.href = '<?php echo $jumpPage['myDomain']; ?>';
    }, 200);
    
    /* 通用窗口关闭 */ 
    window.opener=null;
    window.open('','_self');
    window.close();
    /* 微信浏览器关闭 */ 
    WeixinJSBridge.call('closeWindow');
}
</script>
<style>
html,body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,select,p,blockquote,th,td{margin:0;padding:0}
ol,ul{list-style:none}
h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal}
input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit}
input,textarea,select{*font-size:100%}
body{font-family:"Microsoft YaHei",Arial,sans-serif;font-size:12px;color:#333}
a{color:#747474;text-decoration:none;cursor:pointer}
input,button{outline:none}
html,body{height:100%}
body{background-color:#fcfcfc}
body{height:100vh;font-family:"微软雅黑";overflow:hidden}
html,body{width:100%;height:100%}
body .center-box{left:0;right:0;top:0;bottom:150px;height:250px;width:100%;max-width:600px;position:absolute;margin:auto;z-index:10;text-align:left;box-sizing:border-box;padding:10px}
.jump-tips h3{width:100%;height:48px;font-size:28px;line-height:44px;padding-left:57px;box-sizing:border-box;position:relative}
.jump-tips h3 span{width:46px;height:46px;background-color:#f34c3c;border-radius:50%;display:inline-block;position:absolute;left:0;top:0}
.jump-tips h3 span i{width:4px;height:20px;background-color:#fff;border-radius:2px;display:block;margin:10px auto 4px}
.jump-tips h3 span em{width:4px;height:4px;background-color:#fff;border-radius:2px;display:block;margin:0 auto}
.jump-tips dl{width:100%;height:auto;overflow:hidden;box-sizing:border-box;padding-left:57px;margin-top:22px;color:#404040;font:14px/24px "微软雅黑"}
.jump-tips dl dt a{color:#2b92f2}
.jump-tips dl dt a:hover{text-decoration:underline}
.jump-tips dl dd{width:100%;height:auto;overflow:hidden;box-sizing:border-box;margin-top:10px;color:#858585;font-size:12px}
.jump-tips .button{width:100%;height:33px;position:absolute;bottom:0;left:0}
.jump-tips .button .button-left{float:left;margin-left:58px}
.jump-tips .button .button-left label{width:110px;height:34px;color:#858585;font-size:12px;line-height:34px;box-sizing:border-box;padding-left:20px;position:relative;cursor:default;user-select:none}
.jump-tips .button .button-left label input{position:absolute;left:0;top:0px;background-color:#fff}
input[type='checkbox']{-webkit-appearance:none;border-radius:2px;height:16px;width:16px;background-color:#fff;border:1px solid #A6A6A6}
input[type='checkbox']:hover{border-color:#8C8C8C}
input[type='checkbox']:checked:hover{border-color:#0DC561}
input[type='checkbox']:checked::before{color:#808080;content:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAKCAYAAACE2W/HAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNAay06AAAACBSURBVCiRlc2xCcJQFEDRE7VI2oCV4A6CvaiIvQs4kLOIDmAvZAALxVZwAbGwsHoQUvwktz/cbFzt9SjDEL9BD1SiwhN5V1jigjk+XY+BZrhjHXCEK47IW9ASLwg4xQ5nFG0o4BcbvLHFCZMUCgg3rGr4kUJ12MRFCjVh4AUOKQR/PfIlGJGAEgYAAAAASUVORK5CYII=);font-size:13px;height:16px;left:0px;top:-3px;position:absolute}
.jump-tips .button .button-right{padding-right:10px;width:235px;height:33px;float:right;position:relative}
.jump-tips .button .button-right a:last-child{display:inline-block;width:107px;height:31px;border:1px solid #0DC561;background-image:linear-gradient(150deg,#15ca5f,#10ce67);color:#fff;border-radius:3px;text-align:center;font-size:14px;line-height:31px;cursor:pointer;user-select:none}
.jump-tips .button .button-right a:last-child:hover{border-color:#0BD166;background-image:linear-gradient(150deg,#10d560,#12dd6f)}
.jump-tips .button .button-right a:last-child:active{border-color:#0EC361;background-image:linear-gradient(150deg,#12c35a,#10cc65)}
.jump-tips .button .button-right a:first-child{width:108px;height:33px;color:#1c8af1;margin-right:12px;font:12px/33px "微软雅黑";cursor:pointer}
.jump-tips .button .button-right a:first-child:hover{text-decoration:underline}
body .loader_overlay{width:150px;height:150px;background:transparent;box-shadow:0px 0px 0px 1000px rgba(255,255,255,0.67),0px 0px 19px 0px rgba(0,0,0,0.16) inset;border-radius:100%;z-index:-1;position:absolute;left:0;right:0;top:0;bottom:0;margin:auto}
body .loader_cogs{z-index:-2;width:100px;height:100px;top:-120px !important;position:absolute;left:0;right:0;top:0;bottom:0;margin:auto}
body .loader_cogs__top{position:relative;width:100px;height:100px;-webkit-transform-origin:50px 50px;transform-origin:50px 50px;-webkit-animation:rotate 6s infinite linear;animation:rotate 6s infinite linear}
body .loader_cogs__top div:nth-of-type(1){-webkit-transform:rotate(30deg);transform:rotate(30deg)}
body .loader_cogs__top div:nth-of-type(2){-webkit-transform:rotate(60deg);transform:rotate(60deg)}
body .loader_cogs__top div:nth-of-type(3){-webkit-transform:rotate(90deg);transform:rotate(90deg)}
body .loader_cogs__top div.top_part{width:100px;border-radius:10px;position:absolute;height:100px;background:#f98db9}
body .loader_cogs__top div.top_hole{width:50px;height:50px;border-radius:100%;background:white;position:absolute;position:absolute;left:0;right:0;top:0;bottom:0;margin:auto}
body .loader_cogs__left{position:relative;width:80px;-webkit-transform:rotate(16deg);transform:rotate(16deg);top:28px;-webkit-transform-origin:40px 40px;transform-origin:40px 40px;-webkit-animation:rotate_left 3s .1s infinite reverse linear;animation:rotate_left 3s .1s infinite reverse linear;left:-24px;height:80px}
body .loader_cogs__left div:nth-of-type(1){-webkit-transform:rotate(30deg);transform:rotate(30deg)}
body .loader_cogs__left div:nth-of-type(2){-webkit-transform:rotate(60deg);transform:rotate(60deg)}
body .loader_cogs__left div:nth-of-type(3){-webkit-transform:rotate(90deg);transform:rotate(90deg)}
body .loader_cogs__left div.left_part{width:80px;border-radius:6px;position:absolute;height:80px;background:#97ddff}
body .loader_cogs__left div.left_hole{width:40px;height:40px;border-radius:100%;background:white;position:absolute;position:absolute;left:0;right:0;top:0;bottom:0;margin:auto}
body .loader_cogs__bottom{position:relative;width:60px;top:-65px;-webkit-transform-origin:30px 30px;transform-origin:30px 30px;-webkit-animation:rotate_left 2s infinite linear;animation:rotate_left 2s infinite linear;-webkit-transform:rotate(4deg);transform:rotate(4deg);left:79px;height:60px}
body .loader_cogs__bottom div:nth-of-type(1){-webkit-transform:rotate(30deg);transform:rotate(30deg)}
body .loader_cogs__bottom div:nth-of-type(2){-webkit-transform:rotate(60deg);transform:rotate(60deg)}
body .loader_cogs__bottom div:nth-of-type(3){-webkit-transform:rotate(90deg);transform:rotate(90deg)}
body .loader_cogs__bottom div.bottom_part{width:60px;border-radius:5px;position:absolute;height:60px;background:#ffcd66}
body .loader_cogs__bottom div.bottom_hole{width:30px;height:30px;border-radius:100%;background:white;position:absolute;position:absolute;left:0;right:0;top:0;bottom:0;margin:auto}
.loading-text{font-size:20px;position:absolute;bottom:-40px;text-align:center;left:0;right:0;color:#b9b9b9}
dot{display:inline-block;height:1em;line-height:1;text-align:left;vertical-align:-.25em;overflow:hidden}
dot::before{display:block;content:'...\A..\A.';white-space:pre-wrap;animation:dot 2s infinite step-start both}
@keyframes dot{33%{transform:translateY(-2em)}
66%{transform:translateY(-1em)}
}@-webkit-keyframes rotate{from{-webkit-transform:rotate(0deg);transform:rotate(0deg)}
to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}
}@keyframes rotate{from{-webkit-transform:rotate(0deg);transform:rotate(0deg)}
to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}
}@-webkit-keyframes rotate_left{from{-webkit-transform:rotate(16deg);transform:rotate(16deg)}
to{-webkit-transform:rotate(376deg);transform:rotate(376deg)}
}@keyframes rotate_left{from{-webkit-transform:rotate(16deg);transform:rotate(16deg)}
to{-webkit-transform:rotate(376deg);transform:rotate(376deg)}
}@-webkit-keyframes rotate_right{from{-webkit-transform:rotate(4deg);transform:rotate(4deg)}
to{-webkit-transform:rotate(364deg);transform:rotate(364deg)}
}@keyframes rotate_right{from{-webkit-transform:rotate(4deg);transform:rotate(4deg)}
to{-webkit-transform:rotate(364deg);transform:rotate(364deg)}
}
@media screen and (max-width: 500px) {body .center-box {padding: 15px;}.button-left {display: none;}.jump-tips dl {padding-left: 5px;}.jump-tips .button .button-right {padding-right: 15px;}}
</style>

</body>
</html>