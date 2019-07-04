<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Language" content="zh-cn" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0,initial-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>系统主页</title>
	<link href="/src/css/layui.css" rel="stylesheet" />
	<link id="layuicss-layer" rel="stylesheet" href="/src/css/layer.css" media="all">
	<link id="layuicss-layuiAdmin" rel="stylesheet" href="/src/css/admin.css" media="all">
</head>
<body>
	<div class="layui-fluid">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md8">
				<div class="layui-row layui-col-space15">
					<div class="layui-col-md6">
						<div class="layui-card">
							<div class="layui-card-header">快捷方式</div>
							<div class="layui-card-body">
								<div class="layui-carousel layadmin-carousel layadmin-shortcut" style="width: 100%; height: 280px;" lay-anim="" lay-indicator="inside" lay-arrow="none">
									<div carousel-item="">
										<ul class="layui-row layui-col-space10 layui-this">
											<li class="layui-col-xs3">
												<a lay-href="component/layer/list">
													<i class="layui-icon layui-icon-website"></i>
													<cite>弹层</cite>
												</a>
											</li>
											<li class="layui-col-xs3">
												<a lay-href="component/button/">
													<i class="layui-icon layui-icon-find-fill"></i>
													<cite>按钮</cite>
												</a>
											</li>
											<li class="layui-col-xs3">
												<a lay-href="component/progress/">
													<i class="layui-icon layui-icon-loading-2"></i>
													<cite>进度条</cite>
												</a>
											</li>
											<li class="layui-col-xs3">
												<a lay-href="component/grid/speed-dial">
													<i class="layui-icon layui-icon-home"></i>
													<cite>临时图标</cite>
												</a>
											</li>
											<li class="layui-col-xs3">
												<a lay-href="component/panel/">
													<i class="layui-icon layui-icon-read"></i>
													<cite>面板</cite>
												</a>
											</li>
											<li class="layui-col-xs3">
												<a lay-href="component/badge/">
													<i class="layui-icon layui-icon-tree"></i>
													<cite>徽章</cite>
												</a>
											</li>
											<li class="layui-col-xs3">
												<a lay-href="component/timeline/">
													<i class="layui-icon layui-icon-console"></i>
													<cite>时间线</cite>
												</a>
											</li>
											<li class="layui-col-xs3">
												<a lay-href="component/auxiliar/">
													<i class="layui-icon layui-icon-survey"></i>
													<cite>辅助</cite>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="layui-col-md6">
						<div class="layui-card">
							<div class="layui-card-header">待办事项</div>
							<div class="layui-card-body">
								<div class="layui-carousel layadmin-carousel layadmin-backlog" style="width: 100%; height: 280px;" lay-anim="" lay-indicator="inside" lay-arrow="none">
									<div carousel-item="">
										<ul class="layui-row layui-col-space10 layui-this">
											<li class="layui-col-xs6">
												<a lay-href="" class="layadmin-backlog-body">
													<h3>待审评论</h3>
													<p><cite>66</cite></p>
												</a>
											</li>
											<li class="layui-col-xs6">
												<a lay-href="" class="layadmin-backlog-body">
													<h3>待审帖子</h3>
													<p><cite>12</cite></p>
												</a>
											</li>
											<li class="layui-col-xs6">
												<a lay-href="" class="layadmin-backlog-body">
													<h3>待审商品</h3>
													<p><cite>99</cite></p>
												</a>
											</li>
											<li class="layui-col-xs6">
												<a lay-href="" class="layadmin-backlog-body">
													<h3>待发货</h3>
													<p><cite>20</cite></p>
												</a>
											</li>
										</ul>
										<ul class="layui-row layui-col-space10">
											<li class="layui-col-xs6">
												<a lay-href="" class="layadmin-backlog-body">
													<h3>待审友情链接</h3>
													<p><cite style="color: #FF5722;">5</cite></p>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="layui-col-md12">
						<div class="layui-card">
							<div class="layui-card-header">数据概览</div>
							<div class="layui-card-body">
								<div class="layui-carousel layadmin-carousel layadmin-dataview">
									<div id="dataview" style="width: 100%; height: 280px;"></div>
									<!--<div class="layui-carousel-ind"><ul><li class="layui-this"></li><li></li><li></li></ul></div>
									<button class="layui-icon layui-carousel-arrow" lay-type="sub"></button>
									<button class="layui-icon layui-carousel-arrow" lay-type="add"></button>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="layui-col-md4">
				<div class="layui-card">
					<div class="layui-card-header">版本信息</div>
					<div class="layui-card-body layui-text">
						<table class="layui-table">
							<colgroup>
								<col width="100">
								<col>
							</colgroup>
							<tbody>
								<tr>
									<td>当前版本</td>
									<td>
										v1.0 <a href="javascript:;" onclick="layer.msg('暂无');" style="padding-left: 15px;">更新日志</a> 
										</td>
									</tr>
									<tr>
										<td>基于框架</td>
										<td>
											layui
										</td>
									</tr>
									<tr>
										<td>主要特色</td>
										<td>单页面 / 响应式 / 清爽 / 极简</td>
									</tr>
									<tr>
										<td>获取渠道</td>
										<td style="padding-bottom: 0;">
											<div class="layui-btn-container">
												<a href="mailto:663642331@qq.com" target="_blank" class="layui-btn layui-btn-danger">立即下载</a>
												<a href="http://cms.yt8.top/adminr.html" target="_blank" class="layui-btn">立即下载</a>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="layui-card">
						<div class="layui-card-header">效果报告</div>
						<div class="layui-card-body layadmin-takerates">
							<div class="layui-progress" lay-showpercent="yes">
								<h3>转化率（日同比 28% <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
								<div class="layui-progress-bar" lay-percent="65%" style="width: 65%;"><span class="layui-progress-text">65%</span></div>
							</div>
							<div class="layui-progress" lay-showpercent="yes">
								<h3>签到率（日同比 11% <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
								<div class="layui-progress-bar" lay-percent="32%" style="width: 32%;"><span class="layui-progress-text">32%</span></div>
							</div>
						</div>
					</div>

					<div class="layui-card">
						<div class="layui-card-header">实时监控</div>
						<div class="layui-card-body layadmin-takerates">
							<div class="layui-progress" lay-showpercent="yes">
								<h3>物理内存使用率</h3>
								<div class="layui-progress-bar" lay-percent="<?php echo $memPercent?>%" style="width: <?php echo $memPercent?>%;"><span class="layui-progress-text"><?php echo $memPercent?>%</span></div>
							</div>
							<div class="layui-progress" lay-showpercent="yes">
								<h3>真实内存使用率</h3>
								<div class="layui-progress-bar layui-bg-red" lay-percent="<?php echo $memRealPercent?>%" style="width: <?php echo $memRealPercent?>%;"><span class="layui-progress-text"><?php echo $memRealPercent?>%</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="/src/layui.js"></script>
<script src="/src/echarts.js"></script>
<script>
	layui.use('layer', function(){
		var $ = layui.$, layer = layui.layer;
		$('body').on('mouseenter', '*[lay-tips]', function(){
			var othis = $(this)
			,tips = othis.attr('lay-tips')
			,offset = othis.attr('lay-offset') 
			,index = layer.tips(tips, this, {
				tips: 1
				,time: -1
				,success: function(layero, index){
					if(offset){
						layero.css('margin-left', offset + 'px');
					}
				}
			});
			othis.data('index', index);
		}).on('mouseleave', '*[lay-tips]', function(){
			layer.close($(this).data('index'));
		});
	});
	var myChart = echarts.init(document.getElementById('dataview'));
    var options={
        //定义一个标题
        title:{
            text: '新增用户量',
			x: 'center',
			textStyle: {
				fontSize: 14
			}
        },
		tooltip : {
          trigger: 'axis',
          formatter: "{b}<br>新增：{c}"+'人'
        },
        xAxis:{
			type : 'category',
            data:['1月','2月','3月','4月','5月','6月']
        },
        yAxis:{
			type : 'value'
        },
        series:[{
            type:'line',
			smooth: true,
            data:['120','320','450','210','100','800']
        }]

    };
    myChart.setOption(options);
	window.onresize = myChart.resize;
</script>
</html>
