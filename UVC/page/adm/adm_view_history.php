<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>관리자페이지</title>

	<link rel="icon" href="data:;base64,iVBORw0KGgo=">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->project_name;?>/page/adm/css/history.css<?php echo $version;?>"/>

	<!-- CSS -->
    <?php include_once $dir."page/adm/include/common_css.php"; ?>

    <!-- SCRIPT -->
    <?php include_once $dir."page/adm/include/common_js.php"; ?>
	<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/adm_history_view.js<?php echo $version;?>"></script>
	
</head>
<body>

	<!-- history default  view version -->
	<!-- 각 업체의 디자인에 맡게 커스텀해서 만드시면 됩니다. -->

	<div class="wrap">
		<?php include_once $dir."page/adm/include/sidebar.php";?>
		<section class="adm_container bg-pale">
			<div class="adm_body_wrap">
				<div class="adm_common_header mb-5">
					<h2 class="page-title pb-1">연혁 리스트</h2>
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
					<form class="form_section" onsubmit="return false;">
						<!-- 대분류 리스트가 있을 경우 display:block -->
						<div class="post-section" id="main_category_table">
							<div class="post-box">
								<h5 class="post-title">연혁 대분류 리스트</h5>
								<div class="board-table-con">
									<table class="board-table history-list-table">
										<thead>
											<tr>
												<th class="check">
													<label class="check-mark">
														<input type="checkbox" onclick="main_checkAll(this);" id="main_all_check">
														<em></em>
													</label>
												</th>
												<th>대분류 카테고리 명칭</th>
												<!-- <th>이미지</th> -->
												<!-- <th>내용</th> -->
												<th>수정</th>
											</tr>
										</thead>
										<tbody data-wrap="main_wrap" id="main_wrap">
											<tr id="main_no_post" style="display: none;">
												<td colspan="3">등록된 게시글이 없습니다.</td>
											</tr>						
										</tbody>
									</table>
								</div> 

								<div class="button save-btn right_button mt-3">
									<button type="button" class="center_button btn-primary" onclick="main_reg_modal();">대분류 등록하기</button>
									<button type="button" class="center_button btn-secondary" onclick="main_delete_confirm();">삭제하기</button>
								</div>
								
							</div>
							<!--post-box: 소분류// -->
							
						</div>
						
						<div class="post-section">
							<div class="post-box">
								<h5 class="post-title">연혁 기본 등록</h5>
								<div class="board-table-con">
									<table class="board-table history-list-table">
										<thead>
											<tr>
												<th class="check">
													<label class="check-mark">
														<input type="checkbox" onclick="checkAll(this);" id="all_check">
														<em></em>
													</label>
												</th>
												<th>대분류 카테고리</th>
												<th>년도</th>
												<th>내용</th>
												<th>수정</th>
											</tr>
										</thead>
										<tbody data-wrap="wrap" id="wrap">
											<!-- <tr>
												<td class="check">
													<label class="check-mark">
														<input type="checkbox">
														<em></em>
													</label>
												</td>
												<td>미분류</td>
												<td  class="history-content-list">
													<div class="histroy-table-view">
														<dl class="step01">
															<dt class="step-year">2020</dt>
															<dd>
																<dl class="step02">
																	<dt class="step-month">08</dt>
																	<dd>
																		<ul>
																			<li>기본등록 내용01</li>
																			<li>기본등록 내용02</li>
																		</ul>
																	</dd>
																</dl>
																<dl class="step02">
																	<dt class="step-month">08</dt>
																	<dd>
																		<ul>
																			<li>기본등록 내용01</li>
																			<li>기본등록 내용02</li>
																		</ul>
																	</dd>
																</dl>
															</dd>
														</dl>
													</div>
												</td>
												<td>
													<div class="button-sm">
														<button class="btn-green">수정</button>
													</div>	
												</td>
											</tr> -->

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

								<div class="button save-btn right_button mt-3">
									<div class="history-move-btn" id="move_category_div" style="display: none;">
										<div class="select-wrap select-history text-left">
											<select class="select" id="main_category_select">
												<option value="">대분류로 이동하기</option>                                        
											</select>
										</div>
										<button type="button" class="center_button btn-primary" onclick="insert_to_main_category();">대분류로 이동하기</button>
									</div>
									
									<button type="button" class="center_button btn-primary" id="move_upload_btn">연혁 등록하기</button>
									<button type="button" class="center_button btn-secondary" onclick="delete_confirm();">삭제하기</button>
								</div>
							</div>
						</div>
					</form>				
				</article>

				
			</div>

			<?php include_once $dir."page/adm/include/footer.php";?>
		</section>

		<!-- 대분류 모달창 -->
		<div class="modal" style="visibility: hidden; opacity:0; z-index: 99;" id="main_modal">
		<!-- <div class="modal" style=""> -->
			<div class="modal-bg"></div>
			<div class="modal-wrap modal-md">
				<div class="modal-con">
					<!-- <span class="modal-close">✕</span> -->
					<div class="modal-body">
						<p class="md-title font-bold" id="main_modal_title">대분류 등록</p>
						<div class="adm_lang mb-1">
							<ul id="modal_lang_list" style="display: none;">
								
							</ul>
						</div>
						<form class="mt-2" data-wrap="modal_wrap" id="modal_wrap">
							<dl class="post-table" id="sync_image_wrap" style="display: none;">
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
							<dl class="post-table">
								<dt>대분류 카테고리</dt>
								<dd>
									<div class="insert">
										<input type="text" id="category_name" data-attr="title">
									</div>
								</dd>
							</dl>
						</form>
						<div class="button save-btn right_button mt-3">
							<button class="center_button btn-primary" onclick="register_main_board();" id="main_reg_btn">저장하기</button>
							<button class="center_button btn-muted" onclick="close_reg_modal();">닫기</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	<div style="display: none">
		<!-- 이미지 파일 copy -->
		<div class="img-upload" style="overflow: hidden;" id="img_upload_copy">
			<img onerror="this.style.display='none'" alt="img_upload"/>
			<button class="delete-btn" type="button" onclick="delete_image(this);"></button>
		</div>

		<!-- 연혁 대분류 autu view -->
		<table>
			<tr data-copy="main_copy">
				<td class="check">
					<label class="check-mark">
					<input type="checkbox" data-attr="check" onclick="main_check(this);">
						<em></em>
					</label>
				</td>
				<td data-attr="name"></td>
				<!-- <td>
					<div class="thumb-nail-long">
						<img data-attr="img" alt="img_upload">
					</div>
				</td> -->
				<!-- <td data-attr="description"> -->
					
				</td>
				<td>
					<div class="button-sm">
						<button type="button" class="btn-green" data-attr="modify">수정</button>
					</div>	
				</td>
			</tr>
		</table>

		<!-- modla 등록 form copy -->
		<div data-copy="modal_copy" data-modal>
			<dl class="post-table">
				<dt>대분류 카테고리</dt>
				<dd>
					<div class="insert">
						<input type="text" data-attr="title">
					</div>
				</dd>
			</dl>
			<dl class="post-table" data-attr="content_dl">
				<dt>대분류 내용</dt>
				<dd>
					<div class="insert">
						<input type="text" data-attr="content">
					</div>
				</dd>
			</dl>
			<dl class="post-table" data-attr="image_dl">
				<dt>대분류 이미지</dt>
				<dd>
					<!-- 이미지 추가 버튼 //-->
					<div class="img-upload img-upload-main" style="overflow: hidden;">
						<span class="btn-wrap" data-attr="image_input_wrap">
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
		</div>

		<table>
			<tr data-copy="copy">
				<td class="check">
					<label class="check-mark">
						<input type="checkbox" data-attr="check" onclick="check(this)">
						<em></em>
					</label>
				</td>
				<td data-attr="category_name"></td>
				<td>
					<div class="histroy-table-view">
						<dl class="step01">
							<dt class="step-year" data-attr="year"></dt>
						</dl>
					</div>

				</td>
				<td  class="history-content-list">
					<div class="histroy-table-view">
						<dl class="step01">
							<dd data-attr="month_wrap">
							</dd>
						</dl>
					</div>
				</td>
				<td>
					<div class="button-sm">
						<button type="button" class="btn-green" data-attr="modify">수정</button>
					</div>	
				</td>
			</tr>
		</table>

		<!-- 연혁 테이블 월별 내용 copy -->
		<dl class="step02" id="month_wrap_copy">
			<dt class="step-month" data-attr="month"></dt>
			<dd>
				<ul data-attr="content_wrap">
				</ul>
			</dd>
		</dl>
	</div>
	<li data-copy="lang_copy"><span data-attr="name"></span></li>
</body>
</html>