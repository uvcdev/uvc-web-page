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

    <!-- SCRIPT -->
    <?php include_once $dir."page/adm/include/common_js.php"; ?>	
	<?php include_once $dir."page/adm/include/summernote.php"; ?>

	<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/adm_notice_upload.js<?php echo $version;?>"></script>
	
</head>
<body>
	<!-- certification or blog default version -->
	<!-- 각 업체의 디자인에 맡게 커스텀해서 만드시면 됩니다. -->

	<div class="wrap">
		<?php include_once $dir."page/adm/include/sidebar.php";?>
		<section class="adm_container bg-pale">
			<div class="adm_body_wrap">
				<div class="adm_common_header mb-5">
					<h2 class="page-title pb-1">스토리 등록</h2>
					<!-- <div class="page-crumb ">
						<ul>
							<li>Product</li>
							<li>Product</li>
						</ul>
					</div> -->
				</div>

				
				<div class="adm_lang mb-1">
					<ul id="lang_list" data-wrap="lang_wrap" >
					
					</ul>
				</div>
				<!-- 언어 추가// -->
				<article class="adm_body_container">
					<form  class="form_section" id="form"  onsubmit="return false;">
						<div class="post-section">
						<!-- 파트를 나눌때 row col 사용 // -->
							<div class="row-short">
								
								<!-- 홍보영상 기본 -->
								<!-- 사용하지않으면 삭제 또는 주석 -->
								<div class="col-md-12">
									<div class="post-box">
										<!-- <h5 class="post-title">홍보영상 등록</h5> -->
										<div class="post-table-con" id="wrap" data-wrap="wrap">
											<dl class="post-table" id="sync_image_wrap">
												<dt>이미지 동기화</dt>
												<dd>
													<ul class="post-use-list">
														<li>
															<label class="check-mark">
																<input type="radio" id="sync_img" name="sync" checked onchange="image_radio_event(1);">
																<em class="radio">사용함</em>
															</label>
														</li>
														<li>
															<label class="check-mark">
																<input type="radio" id="unsync_img" name="sync" onchange="image_radio_event(2);">
																<em class="radio">사용안함</em>
															</label>
														</li>
													</ul>
													<p class="xsmall mt-1">이미지 동기화 선택시 모든 언어에서 동일한 이미지 사용</p>
												</dd>
											</dl>
											<dl class="post-table" id="sync_file_wrap">
											<dt>파일 동기화</dt>
											<dd>
												<ul class="post-use-list">
													<li>
														<label class="check-mark">
															<input type="radio" id="sync_file" name="sync_file" checked onchange="file_radio_event(1);">
															<em class="radio">사용함</em>
														</label>
													</li>
													<li>
														<label class="check-mark">
															<input type="radio" id="unsync_file" name="sync_file" onchange="file_radio_event(2);">
															<em class="radio">사용안함</em>
														</label>
													</li>
												</ul>
												<p class="xsmall mt-1">파일 동기화 선택시 모든 언어에서 동일한 첨부파일 사용</p>
											</dd>
										</dl>
										<dl class="post-table">
											<dt>날짜</dt>
											<dd>
												<div class="insert">
													<input type="date" id="date" name="date">
												</div>
											</dd>
										</dl>
										</div> 
									</div>
									<div class="button save-btn right_button mt-3">
										<button type="button" class="center_button btn-primary" onclick="register_notice();">저장하기</button>
										<button type="button" class="center_button btn-secondary" id="cancel_btn">취소</button>
									</div>
								</div>
								
								
							</div>		
						</div>				
					</form>
					
				</article>
				

				
			</div>

			<?php include_once $dir."page/adm/include/footer.php";?>
		</section>

		<div style="display: none;">
			<!-- 파일첨부 copy -->
			<div class="img-upload" style="overflow: hidden;" id="img_upload_copy">
				<img onerror="this.style.display='none'" alt="img_upload"/>
				<button class="delete-btn" type="button" onclick="delete_image(this);"></button>
			</div>

			<!-- 이미지 동기화 사용시 언어별 input tag 생성을 위한 copy -->
			<div data-copy="copy">
				<dl class="post-table">
					<dt>제목</dt>
					<dd>
						<div class="insert">
							<input type="text" data-attr="title">
						</div>
					</dd>
				</dl>
				
				<dl class="post-table" data-attr="image_dl">
					<dt>이미지</dt>
					<dd>
						<!-- 이미지 추가 버튼 //-->
						<div class="img-upload img-upload-main" style="overflow: hidden;">
							<span class="btn-wrap" data-attr="file_input_wrap">
								<button class="btn-img-upload"><strong></strong></button>
								<input type="file" data-attr="img_file" onchange="add_image_file(this);">
							</span> 				
							<label data-attr="img_label"></label>
						</div>

						<!-- 이미지 추가 버튼 // -->

						<!-- 이미지가 첨부될 시 옆에 나열됩니다 -->
						<div data-attr="image_wrap" style="display: inline-block;">
							
						</div>
						<!-- 이미지  // -->
						<p class="xsmall">jpg, png, gif 형식의 파일확장자<br>4MB 이하의 이미지 1장 첨부 가능</p>
					</dd>
				</dl>

				<dl class="post-table" data-attr="file_dl" id="insertFileInsert">
					<dt>첨부파일</dt>
					<dd>
						<div class="insert file-insert" data-attr="file_wrap">
							<div class="input-box">
								<input placeholder="파일첨부" class="file_name input-sm" disabled="" data-attr="file_name">
								<input type="file" class="blind" data-attr="file" onchange="add_file(this);">
								<label class="file_add_btn text-center theme-bor-primary" data-attr="file_label" for="file">파일추가</label>
								<span class="del-btn" data-attr="del_file_btn"></span>
							</div>
							<!-- 추가버튼 클릭시 추가 // -->
						</div>
						
						<div class="button left_button mt-1">
							<button class="theme-secondary" data-attr="add_file_btn" type="button" id="plus">추가</button>
						</div>
						<p class="xsmall mt-2">10MB 이하의 파일 3개까지 첨부 가능</p>
					</dd>
				</dl>	
				
				<dl class="post-table" style="display:none;">
					<dt>첨부파일명</dt>
					<dd>
						<div class="insert">
							<input type="text" data-attr="blog_name">
						</div>
					</dd>
				</dl>

				<dl class="post-table" style="display:none;">
					<dt>첨부파일 링크</dt>
					<dd>
						<div class="insert">
							<input type="text" data-attr="blog_link">
						</div>
					</dd>
				</dl>
				<div class="post-section mt-2" data-wrap="sumnote_wrap" id="sumnote_wrap">
					<div class="post-box" id="post_box" name="content" data-copy="sumnote_copy" style="overflow:auto;">
						<h5 class="post-title">글 내용</h5>
						<!-- <p><textarea id="story" row="2" cols="200" height="300"></textarea></p> -->
						<div class="post-summer-note-zone summernote" data-attr="sumnote" id = "sumnote"></div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<li data-copy="lang_copy"><span data-attr="name"></span></li>
	<div style="display: none;">
		<div class="input-box" id="file_copy" data-file-div>
			<input placeholder="파일첨부" class="file_name input-sm" disabled="" data-file-name>
			<input type="file" class="blind" onchange="add_file(this);" data-file-input name="file_0[]"  multiple/>
			<label class="file_add_btn text-center theme-bor-primary" data-file-label>파일추가</label>	
			<span class="del-btn" data-attr="del_file_btn" onclick="delete_file(this);" data-file-del></span>
		</div>
	</div>
</body>
</html>