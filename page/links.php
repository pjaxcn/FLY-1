<?php 
/**
 * 友情链接
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<section class="container">
  <div class="content-wrap">
    <div class="content container-tw">
        <header class="article-header">
            <h1 class="title-tw"><i class="fa fa-link"></i> <?php echo $log_title; ?></h1>
        </header>
		<section class="context">
			<?php echo unCompress(ishascomment($log_content,$logid)); ?>
			<div class="row blogroll">
				<?php 
			global $CACHE;
			$link_cache = $CACHE->readCache('link');
			foreach($link_cache as $value): ?>
				<div class="col-md-2 col-sm-4 col-xs-6 linkli"><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><img alt="link" src="https://pjax.cn/api/ico/?url=<?php echo $value['url']; ?>" onerror="javascript:this.src='../favicon.ico';"><?php echo $value['link']; ?></a></div>
				<?php endforeach; ?>
			</div>
		</section>
	<!-- 评论开始 -->
	<?php if($allow_remark == 'y'): ?>
	<article class="span12" id="comments">
	<div id="comments2" class="panel-comments">
			<div id="respond" class="comment-respond">
			<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
			</div>
			<?php blog_comments($comments); ?>	
			<!-- #respond -->
		</div>
	</article>
	<?php endif;?>
	<!-- 评论结束 -->
    </div>
  </div>
<?php include View::getView('side2');?>
</section>
<?php include View::getView('footer');?>