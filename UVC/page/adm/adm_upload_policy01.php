<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>관리자페이지</title>

	<link rel="icon" href="data:;base64,iVBORw0KGgo=">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- CSS -->
    <?php include_once $dir."page/adm/include/common_css.php"; ?>

	<script>
		var category_idx = 1;
		var policy_mode  = 1;
	</script>

    <!-- SCRIPT -->
    <?php include_once $dir."page/adm/include/common_js.php"; ?>
	<?php include_once $dir."page/adm/include/summernote.php"; ?>
	<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/adm_terms_modify.js<?php echo $version;?>"></script>	
	
</head>
<body>
	<!-- certification or catalog default version -->
	<!-- 각 업체의 디자인에 맡게 커스텀해서 만드시면 됩니다. -->

	<div class="wrap">
		<?php include_once $dir."page/adm/include/sidebar.php";?>
		<section class="adm_container bg-pale">
			<div class="adm_body_wrap">
				<div class="adm_common_header mb-5">
					<h2 class="page-title pb-1">개인정보처리방침 관리</h2>
				</div>

				<div class="adm_lang mb-1">
					<ul id="lang_list">
						
					</ul>
				</div>

				
				<article class="adm_body_container">
					
					<form  class="form_section" id="form" onsubmit="return false;">
						<!-- <div class="row-short">
						
							<div class="col-md-6">
								<div class="post-box">
									<h5 class="post-title">국문</h5>
									<div class="post-table-con" data-wrap="sumnote_wrap" id="sumnote_wrap">
										썸머노트 넣어주세요																	
									</div> 
								</div>
							</div>
						</div>	 -->
						<div class="post-section" data-wrap="sumnote_wrap" id="sumnote_wrap">
							
						</div>	
						<!-- 썸머노트 사용 //	 -->	
					</form>
					
				</article>
			

				<div class="button save-btn center_button mt-3">
					<button class="center_button btn-primary" onclick="modify_board();">저장하기</button>
				</div>
			</div>

			<?php include_once $dir."page/adm/include/footer.php";?>
		</section>
	</div>

	<div style="display: none;">
		<!-- description copy -->
		<div class="post-box" data-copy="sumnote_copy">
			<div class="post-summer-note-zone summernote" data-attr="sumnote_wrap"></div>
		</div>
	</div>
</body>
</html>
