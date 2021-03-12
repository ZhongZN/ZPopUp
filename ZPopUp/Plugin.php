<?php
/**
 * <strong style="color:red;">Typecho弹出窗口插件 更新时间: </strong><code style="padding: 2px 4px; font-size: 90%; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;">2021-3-12</code>
 * @package ZPopUp
 * @author ZhongZN
 * @version 1.0.0
 * @link https://zn.ax/
 */
class ZPopUp_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
	Typecho_Plugin::factory('Widget_Archive')->header = array('ZPopUp_Plugin', 'frot');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('ZPopUp_Plugin', 'froe');
        return _t('插件已经激活');
    }
    public static function deactivate(){}
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $options = [
            'm' => _t('移动端窗口'),
            'p' => _t('PC端窗口'),
        ];
        $tc = new Typecho_Widget_Helper_Form_Element_Radio('tc', $options, 'm', _t('弹窗类型'));
        $form->addInput($tc);
        $bt = new Typecho_Widget_Helper_Form_Element_Text('bt', NULL, '弹窗', _t('弹窗按钮名称'), _t('输入弹窗按钮名称'));
        $form->addInput($bt);
        $title = new Typecho_Widget_Helper_Form_Element_Text('title',NULL, '这是一个弹窗', _t('弹窗标题'), _t('输入弹窗标题'));
        $form->addInput($title);
        $dz = new Typecho_Widget_Helper_Form_Element_Text('dz', NULL, 'https://m.baidu.com/', _t('弹窗指向地址'), _t('输入弹窗指向地址'));
        $form->addInput($dz);
        $czdm = new Typecho_Widget_Helper_Form_Element_Text('czdm', NULL, NULL, _t('操作代码'), _t('插件操作代码 <a href="https://zn.ax/zpopup.html">配置文档</a>'));
        $form->addInput($czdm);
    }
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
	public static function frot()
	{
	    echo '<script src="/usr/plugins/ZPopUp/libs/fo.min.js"></script>';
		$layuicss = Helper::options()->pluginUrl . '/ZPopUp/libs/layui/css/layui.css';
		echo '<link rel="stylesheet" href="'.$layuicss.'" media="all">';
	}
	public static function froe()
	{
	    $tit=Typecho_Widget::widget('Widget_Options')->plugin('ZPopUp')->title;
	    $dzz=Typecho_Widget::widget('Widget_Options')->plugin('ZPopUp')->dz;
	    $tcc=Typecho_Widget::widget('Widget_Options')->plugin('ZPopUp')->tc;
	    $btt=Typecho_Widget::widget('Widget_Options')->plugin('ZPopUp')->bt;
	    $czz=Typecho_Widget::widget('Widget_Options')->plugin('ZPopUp')->czdm;
	    $layuijs = Helper::options()->pluginUrl.'/ZPopUp/libs/layui/layui.js';
	    if(!$czz)
	    {
	        if($tcc=='m')
    		echo '
    		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
    			<button id="PopUp" class="layui-btn layui-btn-xs">'.$btt.'</button>
    		</div>
    		<script src="'.$layuijs.'"></script>
    		<script>
    		layui.use("layer", function(){
    			var $ = layui.jquery, layer = layui.layer;
    			$("#PopUp").click(function(){
    				layer.open({
                        type: 2,
                        title: "'.$tit.'",
                        shadeClose: false,
                        shade: false,
                        area: ["308px", "90%"],
                        content: "'.$dzz.'"
                    }); 
    			});
    		});
    		</script>
    	';
    	if($tcc=='p')
    	echo '
    		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
    			<button id="PopUp" class="layui-btn layui-btn-xs">'.$btt.'</button>
    		</div>
    		<script src="'.$layuijs.'"></script>
    		<script>
    		layui.use("layer", function(){
    			var $ = layui.jquery, layer = layui.layer;
    			$("#PopUp").click(function(){
                    layer.open({
                      type: 2,
                      title: "'.$tit.'",
                      shadeClose: false,
                      shade: false,
                      maxmin: true,
                      area: ["85%", "85%"],
                      content: "'.$dzz.'"
                    });
    			});
    		});
    		</script>
    	';
    	}
    	if($czz)
    	{
    	    if($czz=='icon:games')
    	    {
    	        if($tcc=='m')
        		echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" style="background-image:url(https://s3.ax1x.com/2021/03/12/6aGeu6.png);width:50px;height:50px;border-radius:50%;border:none;float:right;"></button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
        				layer.open({
                            type: 2,
                            title: "'.$tit.'",
                            shadeClose: false,
                            shade: false,
                            area: ["308px", "90%"],
                            content: "'.$dzz.'"
                        }); 
        			});
        		});
        		</script>
        	';
        	if($tcc=='p')
        	echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" style="background-image:url(https://s3.ax1x.com/2021/03/12/6aGeu6.png);width:50px;height:50px;border-radius:50%;border:none;float:right;"></button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
                        layer.open({
                          type: 2,
                          title: "'.$tit.'",
                          shadeClose: false,
                          shade: false,
                          maxmin: true,
                          area: ["85%", "85%"],
                          content: "'.$dzz.'"
                        });
        			});
        		});
        		</script>
        	';
    	    }
    	    elseif($czz=='icon:search')
    	    {
    	        if($tcc=='m')
        		echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" style="background-image:url(https://s3.ax1x.com/2021/03/12/6aJ6Wd.png);width:50px;height:50px;border-radius:50%;border:none;float:right;"></button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
        				layer.open({
                            type: 2,
                            title: "'.$tit.'",
                            shadeClose: false,
                            shade: false,
                            area: ["308px", "90%"],
                            content: "'.$dzz.'"
                        }); 
        			});
        		});
        		</script>
        	';
        	if($tcc=='p')
        	echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" style="background-image:url(https://s3.ax1x.com/2021/03/12/6aJ6Wd.png);width:50px;height:50px;border-radius:50%;border:none;float:right;"></button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
                        layer.open({
                          type: 2,
                          title: "'.$tit.'",
                          shadeClose: false,
                          shade: false,
                          maxmin: true,
                          area: ["85%", "85%"],
                          content: "'.$dzz.'"
                        });
        			});
        		});
        		</script>
        	';
    	    }
    	    elseif($czz=='game-npy;webs:4399;icon:games;user=npyg;passwd:jcny')
    	    {
    	        echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" style="background-image:url(https://s3.ax1x.com/2021/03/12/6aGeu6.png);width:50px;height:50px;border-radius:50%;border:none;float:right;"></button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
        				layer.open({
                            type: 2,
                            title: "救出女友",
                            shadeClose: false,
                            shade: false,
                            area: ["308px", "90%"],
                            content: "//sda.4399.com/4399swf/upload_swf/ftp33/gamehwq/20200818/13/index.html"
                        }); 
        			});
        		});
        		</script>';
    	    }
    	    elseif($czz=='game-tlyy;webs:4399;icon:games;user=tlyy;passwd:dtpk')
    	    {
    	        echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" style="background-image:url(https://s3.ax1x.com/2021/03/12/6aGeu6.png);width:50px;height:50px;border-radius:50%;border:none;float:right;"></button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
        				layer.open({
                            type: 2,
                            title: "逃离医院不容易",
                            shadeClose: false,
                            shade: false,
                            area: ["308px", "90%"],
                            content: "//sda.4399.com/4399swf/upload_swf/ftp31/liuxinyu/20200409/4/index.html"
                        }); 
        			});
        		});
        		</script>';
    	    }
    	    else 
    	    {
    	        if($tcc=='m')
        		echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" class="layui-btn layui-btn-xs">'.$btt.'</button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
        				layer.open({
                            type: 2,
                            title: "'.$tit.'",
                            shadeClose: false,
                            shade: false,
                            area: ["308px", "90%"],
                            content: "'.$dzz.'"
                        }); 
        			});
        		});
        		</script>
        	';
        	if($tcc=='p')
        	echo '
        		<div style="position:fixed;bottom:40px;right:2%;z-index:999999;">
        			<button id="PopUp" class="layui-btn layui-btn-xs">'.$btt.'</button>
        		</div>
        		<script src="'.$layuijs.'"></script>
        		<script>
        		layui.use("layer", function(){
        			var $ = layui.jquery, layer = layui.layer;
        			$("#PopUp").click(function(){
                        layer.open({
                          type: 2,
                          title: "'.$tit.'",
                          shadeClose: false,
                          shade: false,
                          maxmin: true,
                          area: ["85%", "85%"],
                          content: "'.$dzz.'"
                        });
        			});
        		});
        		</script>
        	';
    	    }
    	}
    }
}
