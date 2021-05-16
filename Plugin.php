<?php
/**
 * <strong style="color:red;">Typecho弹窗客服插件 更新时间: </strong><code style="padding: 2px 4px; font-size: 90%; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;">2021-5-16</code>
 * @package ZnHelper
 * @author ZhongZN
 * @version 1.2.0
 * @link https://zn.ax/
 */
class ZnHelper_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
		Typecho_Plugin::factory('Widget_Archive')->footer = array('ZnHelper_Plugin','footer');
    }
    public static function deactivate(){}
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ZhongZN/Static-Files@1.2/Settings.css"/><h2>ZnHelper插件设置</h2>';
        $options = [
            'm' => _t('移动式窗口'),
            'p' => _t('普通式窗口'),
            't' => _t('提醒式窗口'),
            'y' => _t('腾讯云智服'),
            'q' => _t('跳转QQ客服'),
        ];
        $tc=new Typecho_Widget_Helper_Form_Element_Radio('tc', $options, 'm', _t('弹窗类型'));
        $form->addInput($tc);
        $title=new Typecho_Widget_Helper_Form_Element_Text('title',NULL, '诺の部落阁', _t('弹窗标题'), _t('输入弹窗标题'));
        $form->addInput($title);
        $bt=new Typecho_Widget_Helper_Form_Element_Text('bt', NULL, 'https://q1.qlogo.cn/g?b=qq&nk=2137929135&s=640', _t('弹窗按钮图片'), _t('输入弹窗按钮图片链接'));
        $form->addInput($bt);
        $dz=new Typecho_Widget_Helper_Form_Element_Text('dz', NULL, 'https://zn.ax/', _t('窗口指向地址'), _t('输入弹窗指向地址'));
        $form->addInput($dz);
        $yzf=new Typecho_Widget_Helper_Form_Element_Text('yzf',NULL, 'https://yzf.qq.com/xv/web/static/chat/index.html?sign=', _t('腾讯云智服链接'), _t('腾讯云智服链接，例如https://yzf.qq.com/xv/web/static/chat/index.html?sign=zhongzn'));
        $form->addInput($yzf);
        $yind=new Typecho_Widget_Helper_Form_Element_Text('yind',NULL, '嘿，我来帮您！', _t('弹窗指引文字'), _t('输入弹窗指引文字'));
        $form->addInput($yind);
        $qq=new Typecho_Widget_Helper_Form_Element_Text('qq',NULL, '2137929135', _t('客服QQ号'), _t('输入客服QQ号'));
        $form->addInput($qq);
        $tx=new Typecho_Widget_Helper_Form_Element_Text('tx',NULL, '欢迎来到诺の部落阁', _t('提醒式窗口内容'), _t('输入提醒式窗口内容'));
        $form->addInput($tx);
        $blik=new Typecho_Widget_Helper_Form_Element_Text('blik',NULL, '380px', _t('移动端窗口宽'), _t('输入移动端窗口宽，例如380px或90%'));
        $form->addInput($blik);
        $bilc=new Typecho_Widget_Helper_Form_Element_Text('bilc',NULL, '580px', _t('移动端窗口高'), _t('输入移动端窗口高，例如580px或90%'));
        $form->addInput($bilc);
    }
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
	public static function footer()
	{
        return<<<EOF
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="usr/plugins/ZnHelper/libs/layui/layui.js"></script>
        <script>console.log("%cZnHelper v1.2.0 | Powered by ZhongZN  https://zn.ax/","color:#fff;background:linear-gradient(270deg,#986fee,#8695e6,#68b7dd,#18d7d3);padding:8px 15px;border-radius:0 15px 0 15px");</script>
        <style>
        @keyframes scaleToggleOne {
        	0{transform:scale(1);
        	-webkit-transform:scale(1)
        }
        50% {
        	transform:scale(2);
        	-webkit-transform:scale(2)
        }
        100% {
        	transform:scale(1);
        	-webkit-transform:scale(1)
        }
        }@keyframes scaleToggleTwo {
        	0{transform:scale(1);
        	-webkit-transform:scale(1)
        }
        20% {
        	transform:scale(1);
        	-webkit-transform:scale(1)
        }
        60% {
        	transform:scale(2);
        	-webkit-transform:scale(2)
        }
        100% {
        	transform:scale(1);
        	-webkit-transform:scale(1)
        }
        }@keyframes scaleToggleThree {
        	0{transform:scale(1);
        	-webkit-transform:scale(1)
        }
        33% {
        	transform:scale(1);
        	-webkit-transform:scale(1)
        }
        66% {
        	transform:scale(2);
        	-webkit-transform:scale(2)
        }
        100% {
        	transform:scale(1);
        	-webkit-transform:scale(1)
        }
        }.animated {
        	-webkit-animation-duration:.5s;
        	animation-duration:.5s;
        	-webkit-animation-fill-mode:both;
        	animation-fill-mode:both
        }
        .livechat-girl {
        	width:60px;
        	height:60px;
        	border-radius:50%;
        	position:fixed;
        	bottom:5px;
        	right:40px;
        	opacity:0;
        	-webkit-box-shadow:0 5px 10px 0 rgba(35,50,56,.3);
        	box-shadow:0 5px 10px 0 rgba(35,50,56,.3);
        	z-index:700;
        	transform:translateY(0);
        	-webkit-transform:translateY(0);
        	-ms-transform:translateY(0);
        	cursor:pointer;
        	-webkit-transition:all 1s cubic-bezier(.86,0,.07,1);
        	transition:all 1s cubic-bezier(.86,0,.07,1)
        }
        .livechat-girl:focus {
        	outline:0
        }
        .livechat-girl.animated {
        	opacity:1;
        	transform:translateY(-40px);
        	-webkit-transform:translateY(-40px);
        	-ms-transform:translateY(-40px)
        }
        .livechat-girl:after {
        	content:\'\';
        	width:12px;
        	height:12px;
        	border-radius:50%;
        	background-image:linear-gradient(to bottom,#26c7fc,#26c7fc);
        	position:absolute;
        	right:1px;
        	top:1px;
        	z-index:50
        }
        .livechat-girl .girl {
        	position:absolute;
        	top:0;
        	left:0;
        	width:100%;
        	height:auto;
        	z-index:50;
        	border-radius:50%;
        }
        .livechat-girl .animated-circles .circle {
        	background:rgba(38,199,252,.25);
        	width:60px;
        	height:60px;
        	border-radius:50%;
        	position:absolute;
        	z-index:49;
        	transform:scale(1);
        	-webkit-transform:scale(1)
        }
        .livechat-girl .animated-circles.animated .c-1 {
        	animation:2s scaleToggleOne cubic-bezier(.25,.46,.45,.94) forwards
        }
        .livechat-girl .animated-circles.animated .c-2 {
        	animation:2.5s scaleToggleTwo cubic-bezier(.25,.46,.45,.94) forwards
        }
        .livechat-girl .animated-circles.animated .c-3 {
        	animation:3s scaleToggleThree cubic-bezier(.25,.46,.45,.94) forwards
        }
        .livechat-girl.animation-stopped .circle {
        	opacity:0!important
        }
        .livechat-girl.animation-stopped .circle {
        	opacity:0!important
        }
        .livechat-girl .livechat-hint {
        	position:absolute;
        	right:40px;
        	top:50%;
        	margin-top:-20px;
        	opacity:0;
        	z-index:0;
        	-webkit-transition:all .3s cubic-bezier(.86,0,.07,1);
        	transition:all .3s cubic-bezier(.86,0,.07,1)
        }
        .livechat-girl .livechat-hint.show_hint {
        	-webkit-transform:translateX(-40px);
        	transform:translateX(-40px);
        	opacity:1
        }
        .livechat-girl .livechat-hint.hide_hint {
        	opacity:0;
        	-webkit-transform:translateX(0);
        	transform:translateX(0)
        }
        .livechat-girl .livechat-hint.rd-notice-tooltip {
        	max-width:1296px!important
        }
        .livechat-girl .livechat-hint.rd-notice-tooltip .rd-notice-content {
        	width:auto;
        	overflow:hidden;
        	text-overflow:ellipsis
        }
        @media only screen and (max-width:1599px) {
        	.livechat-girl .livechat-hint.rd-notice-tooltip {
        	max-width:1060px!important
        }
        }@media only screen and (max-width:1309px) {
        	.livechat-girl .livechat-hint.rd-notice-tooltip {
        	max-width:984px!important
        }
        }@media only screen and (max-width:1124px) {
        	.livechat-girl .livechat-hint.rd-notice-tooltip {
        	max-width:600px!important
        }
        }.rd-notice-tooltip {
        	-webkit-box-shadow:0 2px 2px rgba(0,0,0,.2);
        	box-shadow:0 2px 2px rgba(0,0,0,.2);
        	font-size:14px;
        	border-radius:3px;
        	line-height:1.25;
        	position:absolute;
        	z-index:65;
        	max-width:350px;
        	opacity:1
        }
        .rd-notice-tooltip:after {
        	position:absolute;
        	display:block;
        	content:\'\';
        	height:20px;
        	width:20px;
        	-webkit-box-shadow:none;
        	box-shadow:none;
        	-webkit-transform:rotate(-45deg);
        	-moz-transform:rotate(-45deg);
        	-ms-transform:rotate(-45deg);
        	-o-transform:rotate(-45deg);
        	transform:rotate(-45deg);
        	-webkit-border-radius:3px;
        	-moz-border-radius:3px;
        	border-radius:3px;
        	z-index:50
        }
        .rd-notice-tooltip .rd-notice-content {
        	background:0;
        	border-radius:3px;
        	width:100%;
        	color:#fff;
        	position:relative;
        	z-index:60;
        	padding:20px;
        	font-weight:400;
        	line-height:1.45
        }
        .rd-notice-type-success {
        	background-color:#26c7fc;
        	-webkit-box-shadow:0 5px 10px 0 rgba(38,199,252,.2);
        	box-shadow:0 5px 10px 0 rgba(38,199,252,.2)
        }
        .rd-notice-type-success .rd-notice-content {
        	background-color:#26c7fc
        }
        .rd-notice-type-success:after {
        	background-color:#26c7fc;
        	-webkit-box-shadow:0 5px 10px 0 rgba(38,199,252,.2);
        	box-shadow:0 5px 10px 0 rgba(38,199,252,.2)
        }
        .rd-notice-position-left {
        	margin-left:-20px
        }
        .rd-notice-position-left:after {
        	right:-6px;
        	top:50%;
        	margin-top:-10px
        }
        .rd-notice-tooltip.single-line .rd-notice-content {
        	height:40px;
        	padding:0 20px;
        	line-height:40px;
        	white-space:nowrap
        }
        </style>
EOF;
        $tit=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->title;
	    $dzz=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->dz;
	    $tcc=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->tc;
	    $btt=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->bt;
	    $yin=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->yind;
	    $bk=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->bilk;
	    $bc=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->bilc;
	    $ten=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->tx;
	    $oicq=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->qq;
	    $yun=Typecho_Widget::widget('Widget_Options')->plugin('ZnHelper')->yzf;
        if($tcc=='m')
        echo '<script>jQuery(function($){setInterval(function(){if($(".animated-circles").hasClass("animated")){$(".animated-circles").removeClass("animated");}else{$(".animated-circles").addClass(\'animated\');}},3000);var wait = setInterval(function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");clearInterval(wait);},4500);$(".livechat-girl").hover(function(){clearInterval(wait);$(".livechat-hint").removeClass("hide_hint").addClass("show_hint");},function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");}).click(function(){layui.use("layer", function(){var $ = layui.jquery, layer = layui.layer;layer.open({type: 2,title: "'.$tit.'",shadeClose: false,shade: false,area: ["'.$bk.'", "'.$bc.'"],content: "'.$dzz.'"}); });});});</script><div style="position:fixed;bottom:40px;right:2%;z-index:999999;"><div class="livechat-girl animated"> <img class="girl" src="'.$btt.'"><div class="livechat-hint rd-notice-tooltip rd-notice-type-success rd-notice-position-left single-line show_hint"><div class="rd-notice-content">'.$yin.'</div></div><div class="animated-circles"><div class="circle c-1"></div><div class="circle c-2"></div><div class="circle c-3"></div></div></div></div>';
        elseif($tcc=='p')
        echo '<script>jQuery(function($){setInterval(function(){if($(".animated-circles").hasClass("animated")){$(".animated-circles").removeClass("animated");}else{$(".animated-circles").addClass(\'animated\');}},3000);var wait = setInterval(function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");clearInterval(wait);},4500);$(".livechat-girl").hover(function(){clearInterval(wait);$(".livechat-hint").removeClass("hide_hint").addClass("show_hint");},function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");}).click(function(){layui.use("layer", function(){var $ = layui.jquery, layer = layui.layer;layer.open({type: 2,title: "'.$tit.'",shadeClose: false,shade: false,maxmin: true,area: ["85%", "85%"],content: "'.$dzz.'"});});});});</script><div style="position:fixed;bottom:40px;right:2%;z-index:999999;"><div class="livechat-girl animated"> <img class="girl" src="'.$btt.'"><div class="livechat-hint rd-notice-tooltip rd-notice-type-success rd-notice-position-left single-line show_hint"><div class="rd-notice-content">'.$yin.'</div></div><div class="animated-circles"><div class="circle c-1"></div><div class="circle c-2"></div><div class="circle c-3"></div></div></div></div>';
        elseif($tcc=='t')
        echo '<script>jQuery(function($){setInterval(function(){if($(".animated-circles").hasClass("animated")){$(".animated-circles").removeClass("animated");}else{$(".animated-circles").addClass(\'animated\');}},3000);var wait = setInterval(function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");clearInterval(wait);},4500);$(".livechat-girl").hover(function(){clearInterval(wait);$(".livechat-hint").removeClass("hide_hint").addClass("show_hint");},function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");}).click(function(){layui.use("layer", function(){var $ = layui.jquery, layer = layui.layer;layer.alert("'.$ten.'",{title: "'.$tit.'",})});});});</script><div style="position:fixed;bottom:40px;right:2%;z-index:999999;"><div class="livechat-girl animated"> <img class="girl" src="'.$btt.'"><div class="livechat-hint rd-notice-tooltip rd-notice-type-success rd-notice-position-left single-line show_hint"><div class="rd-notice-content">'.$yin.'</div></div><div class="animated-circles"><div class="circle c-1"></div><div class="circle c-2"></div><div class="circle c-3"></div></div></div></div>';
        elseif($tcc=='q')
        echo '<script>jQuery(function ($){var isMobile = {Android : function() {return navigator.userAgent.match(/Android/i) ? true : false;},BlackBerry : function() {return navigator.userAgent.match(/BlackBerry/i) ? true : false;},iOS : function() {return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;},Windows : function() {return navigator.userAgent.match(/IEMobile/i) ? true : false;},any : function() {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());}};setInterval(function(){if($(".animated-circles").hasClass("animated")){$(".animated-circles").removeClass("animated");}else{$(".animated-circles").addClass(\'animated\');}},3000);var wait = setInterval(function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");clearInterval(wait);},4500);$(".livechat-girl").hover(function(){clearInterval(wait);$(".livechat-hint").removeClass("hide_hint").addClass("show_hint");},function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");}).click(function(){if(isMobile.any()){window.location.href = \'mqqwpa://im/chat?chat_type=wpa&uin='.$oicq.'&version=1&src_type=web&web_src=baidu.com\';}else{window.location.href = \'http://wpa.qq.com/msgrd?v=3&uin='.$oicq.'&site=qq&menu=yes\';    }}); });</script><div style="position:fixed;bottom:40px;right:2%;z-index:999999;"><div class="livechat-girl animated"> <img class="girl" src="'.$btt.'"><div class="livechat-hint rd-notice-tooltip rd-notice-type-success rd-notice-position-left single-line show_hint"><div class="rd-notice-content">'.$yin.'</div></div><div class="animated-circles"><div class="circle c-1"></div><div class="circle c-2"></div><div class="circle c-3"></div></div></div></div>';
        elseif($tcc='y')
        echo '<script>jQuery(function($){setInterval(function(){if($(".animated-circles").hasClass("animated")){$(".animated-circles").removeClass("animated");}else{$(".animated-circles").addClass(\'animated\');}},3000);var wait = setInterval(function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");clearInterval(wait);},4500);$(".livechat-girl").hover(function(){clearInterval(wait);$(".livechat-hint").removeClass("hide_hint").addClass("show_hint");},function(){$(".livechat-hint").removeClass("show_hint").addClass("hide_hint");}).click(function(){layui.use("layer", function(){var $ = layui.jquery, layer = layui.layer;layer.open({type: 2,title: "在线咨询",shadeClose: false,shade: false,maxmin: true,area: ["80%", "80%"],content: "'.$yun.'"});});});});</script><div style="position:fixed;bottom:40px;right:2%;z-index:999999;"><div class="livechat-girl animated"> <img class="girl" src="'.$btt.'"><div class="livechat-hint rd-notice-tooltip rd-notice-type-success rd-notice-position-left single-line show_hint"><div class="rd-notice-content">'.$yin.'</div></div><div class="animated-circles"><div class="circle c-1"></div><div class="circle c-2"></div><div class="circle c-3"></div></div></div></div>';
    }
}
    
