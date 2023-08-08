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
	<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/adm_notice_view.js<?php echo $version;?>"></script>
	
</head>
<body>
	<div class="wrap">
		<?php include_once $dir."page/adm/include/sidebar.php";?>
		<section class="adm_container bg-pale">
			<div class="adm_body_wrap">
				<div class="adm_common_header mb-5">
					<h2 class="page-title pb-1">스토리 목록</h2>
					<!-- <div class="page-crumb ">
						<ul>
							<li>Product</li>
							<li>Product</li>
						</ul>
					</div> -->
				</div>
							
				<div class="adm_lang mb-1">
					<ul id="lang_list" data-wrap="lang_wrap">
						
					</ul>
				</div>
				
				<!-- 언어 추가// -->
				<article class="adm_body_container">
					<form  class="form_section" onsubmit="return false;">
						<div class="post-section">
							<!-- 파트를 나눌때 row col 사용  -->
							<div class="row-short">
								
								<!-- 블로그 기본 -->
								<div class="col-md-12">
									<div class="button save-btn right_button mb-3">
										<button class="center_button btn-primary" id="move_upload_btn">등록하기</button>
										<button class="center_button btn-secondary" onclick="delete_confirm();">삭제하기</button>
									</div>
									<div class="post-box">
										<!-- <h5 class="post-title">홍보영상 리스트</h5> -->
										<div class="board-table-con">
											<table class="board-table">
												<thead>
													<tr>
														<th class="check">
															<label class="check-mark">
																<input type="checkbox" onclick="checkAll(this);" id="all_check">
																<em></em>
															</label>
														</th>
														<th>이미지</th>
														<th>제목</th>
														<th>등록일</th>
														<th>수정</th>
													</tr>
												</thead>
												<tbody data-wrap="wrap" id="wrap">
													<!-- 게시글이 없는 경우 -->
													<tr id="no_post" style="display: none;">
														<td colspan="4">등록된 게시글이 없습니다.</td>
													</tr>
												</tbody>
											</table>
										</div> 
										<div class="pagination">
											<div class="page" id="paging">
										
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>					
					</form>
					
				</article>
			</div>

			<?php include_once $dir."page/adm/include/footer.php";?>
		</section>
	</div>

	<!-- auto view -->
	<div style="display: none;">
		<table>
			<!-- 블로그 copy -->
			<tr data-copy="copy">
				<td class="check">
					<label class="check-mark">
						<input type="checkbox" data-attr="check" onclick="check(this);">
						<em></em>
					</label>
				</td>
				<td>
					<div class="thumb-nail">
						<img data-attr="img" alt="img_upload">
					</div>
				</td>
				<td><em data-attr="title"></em></td>
				<td><em data-attr="reg_date"></em></td>
				<td>
					<div class="button-sm">
						<button type="button" class="btn-green" data-attr="modify">수정</button>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<li data-copy="lang_copy"><span data-attr="name"></span></li>
</body>
</html>

