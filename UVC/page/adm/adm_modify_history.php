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
	<link rel="stylesheet" type="text/css" href="<?php echo $this->project_name;?>/page/adm/css/history.css<?php echo $version;?>"/>

    <!-- SCRIPT -->
    <?php include_once $dir."page/adm/include/common_js.php"; ?>
	<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/adm_history_modify.js<?php echo $version;?>"></script>
	
</head>
<body>

	<!-- history upload default version -->
	<!-- 각 업체의 디자인에 맡게 커스텀해서 만드시면 됩니다. -->

	<div class="wrap">
		<?php include_once $dir."page/adm/include/sidebar.php";?>
		<section class="adm_container bg-pale">
			<div class="adm_body_wrap">
				<div class="adm_common_header mb-5">
					<h2 class="page-title pb-1">연혁 수정</h2>
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
					<form class="form_section his-def-form" onsubmit="return false;">
						<div class="post-section">
							<div class="post-box">
								<h5 class="post-title">연혁 수정</h5>
								
								<table data-wrap="wrap" id="wrap">
									<thead>
										<tr>
											<th>
												<label class="check-mark">
													<input type="checkbox" onclick="allCheck(this);" id="all_check">
													<em></em>
												</label>
											</th>
											<th colspan="2">
												전체 내용(년도/월/내용)
											</th>
										</tr>
									</thead>
									<!-- <tr>
										<th class="check">
											<label class="check-mark">
												<input type="checkbox">
												<em></em>
											</label>
										</th>
										<td class="top-depth">
											<strong class="top-detph-title">대분류 선택</strong>
											<select class="select" data-attr="category_select">
												<option value="0">선택</option>                                         
											</select>
										</td>
										<td>
											<dl class="depth01">								
												<dt class="depth01-dt">
													<strong>년도</strong>
													<div class="insert-wrap">
														<div class="insert mb-1">
															<input type="text" placeholder="년도 입력">
														</div>
													</div>
													
												</dt>
												<dd class="depth02">
													<dl>
														<dt class="depth02-dt">
															<strong>월</strong>
															<div class="insert-wrap">
																<div class="insert mb-1">
																	<input type="text" placeholder="월 입력">
																	<span class="del-btn"></span>
																</div>
															</div>
															
														</dt>
														<dd class="history-content">
															<strong>내용</strong>
															<div class="insert-wrap">


																<div class="insert mb-1">
																	<input type="text" placeholder="내용 입력">
																	<span class="add-btn"></span>
																	<span class="del-btn"></span>
																</div>																								
															</div>													
															
														</dd>
													</dl>

												</dd>
											</dl>
											<div class="button right_button  mt-3">											
												<button class="center_button btn-green">월 추가</button>
												<button class="center_button btn-green">내용 추가</button>
												<button class="center_button btn-secondary">초기화</button>
											</div>
										</td>
									</tr> -->
								
								</table>
								<!-- 대분류 시작 -->
								
								<!-- 대분류 끝 //-->

								<div class="button save-btn right_button mt-3">
									<!-- <div class="history-move-btn" id="move_category_div">
										<div class="select-wrap select-history text-left">
											<select class="select" id="main_category_select">
												<option value="">대분류로 이동하기</option>                                        
											</select>
										</div>
										<button class="center_button btn-primary">대분류로 이동하기</button>
									</div> -->
									
									
									<button type="button" class="center_button btn-green" onclick="add_year();">년도 추가</button>
									<button type="button" class="center_button btn-secondary" onclick="del_year_confirm();">선택 삭제하기</button>
								</div>
								
								
							</div>
						</div>
					</form>
				</article>
				

				<div class="button save-btn center_button mt-3">
					<button type="button" class="center_button btn-primary" onclick="register_board();">등록하기</button>
					<button type="button" class="center_button btn-secondary" id="cancel_btn">취소</button>
				</div>
			</div>

			<?php include_once $dir."page/adm/include/footer.php";?>
		</section>
		
	</div>

	<!-- 연혁 auto view -->
	<div style="display: none;">
		<table>
			<tr data-copy="copy" id="year_form_copy">
				<th class="check">
					<label class="check-mark">
						<input type="checkbox" data-attr="check" onclick="check(this);">
						<em></em>
					</label>
				</th>
				<td class="top-depth" data-attr="category_wrap">
					<strong class="top-detph-title">대분류 선택</strong>
					<select class="select" data-attr="category_select">
						<option value="0">선택</option>                                            
					</select>
				</td>
				<td>
					<dl class="depth01">								
						<dt class="depth01-dt">
							<strong>년도</strong>
							<div class="insert-wrap">
								<div class="insert mb-1">
									<input type="text" placeholder="년도 입력" data-attr="year">
								</div>
							</div>
							
						</dt>
						<dt class="depth01-dt">
							<strong>소제목</strong>
							<div class="insert-wrap">
								<div class="insert mb-1">
									<input type="text" placeholder="소제목 입력" data-attr="title">
								</div>
							</div>
							
						</dt>
						<dd class="depth02" data-attr="month_wrap">

							<!-- 중분류 또는 월 시작 /  dl부터 복사해주세요 -->
							<dl>
								<!-- <dt class="depth02-dt" style="display: none;" data-attr="month_dl">
									<strong>월</strong>
									<div class="insert-wrap">
										<div class="insert mb-1">
											<input type="text" placeholder="월 입력" data-attr="month" maxlength="2" onkeyup="number_check(this, 12);" month-data>
											<span class="del-btn" data-attr="del_month"></span>
										</div>
									</div>
									
								</dt> -->
								<dd class="history-content">
									<strong>내용</strong>
									<div class="insert-wrap">

										<!-- 내용은 insert 복사 -->
										<div class="insert mb-1">
											<input type="text" placeholder="내용 입력" data-attr="content" content-data>
											<span class="add-btn" data-attr="add_content"></span>
											<span class="del-btn" data-attr="del_content"></span>
										</div>																								
									</div>													
									
								</dd>
							</dl>
							<!-- 중분류 또는 년도 끝 /  dl까지 복사해주세요  //-->
							
							
						</dd>
					</dl>
					<div class="button right_button  mt-3">											
						<!-- <button type="button" class="center_button btn-green" data-attr="add_month">월 추가</button> -->
						<!-- <button class="center_button btn-green">내용 추가</button> -->
						<button type="button" class="center_button btn-secondary" data-attr="reset">초기화</button>
					</div>
				</td>
			</tr>
		</table>
		
		<!-- 연혁 내용 form copy -->
		<div class="insert mb-1" id="content_form_copy">
			<input type="text" placeholder="내용 입력" data-attr="content">
			<span class="add-btn" data-attr="add_content"></span>
			<span class="del-btn" data-attr="del_content"></span>
		</div>

		<!-- 연혁 월 form copy -->
		<dl id="month_form_copy">
			<!-- <dt class="depth02-dt" style="display: none;" data-attr="month_dl">
				<strong>월</strong>
				<div class="insert-wrap">
					<div class="insert mb-1">
						<input type="text" placeholder="월 입력" data-attr="month" maxlength="2" onkeyup="number_check(this, 12);">
						<span class="del-btn" data-attr="del_month"></span>
					</div>
				</div>
				
			</dt> -->
			<dd class="history-content">
				<strong>내용</strong>
				<div class="insert-wrap">

					<!-- 내용은 insert 복사 -->
					<div class="insert mb-1">
						<input type="text" placeholder="내용 입력" data-attr="content">
						<span class="add-btn" data-attr="add_content"></span>
						<span class="del-btn" data-attr="del_content"></span>
					</div>																								
				</div>													
				
			</dd>
		</dl>
		<li data-copy="lang_copy"><span data-attr="name"></span></li>
	</div>
</body>
</html>
