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
	<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/adm_customer_view.js<?php echo $version;?>"></script>
	
</head>
<body>

	<!-- board default view version -->
	<!-- 각 업체의 디자인에 맡게 커스텀해서 만드시면 됩니다. -->

	<div class="wrap">
		<?php include_once $dir."page/adm/include/sidebar.php";?>
		<section class="adm_container bg-pale">
			<div class="adm_body_wrap">
				<div class="adm_common_header mb-5">
					<h2 class="page-title pb-1">고객문의 내역</h2>
					<!-- <div class="page-crumb ">
						<ul>
							<li>Product</li>
							<li>Product</li>
						</ul>
					</div> -->
				</div>

				<div class="adm_lang mb-1">
				</div>
				<!-- 언어 추가// -->
				<article class="adm_body_container">
					<form class="form_section" onsubmit="return false;">
						<div class="post-section">
							<div class="post-box">
								<h5 class="post-title">문의 내역</h5>
								<div class="board-table-con">
									<table class="board-table">
										<thead>
											<tr>
												<th class="check">
													<label class="check-mark">
														<input type="checkbox" id="all_check" onclick="checkAll(this);">
														<em></em>
													</label>
												</th>
												<th>#</th>
												<th>받은 날짜</th>
												<th>이름</th>
												<th>연락처</th>
												<th>이메일</th>
												<th>
													내용확인
												</th>
												<!-- <th>
													답변
												</th> -->
											</tr>
										</thead>
										<tbody data-wrap="wrap" id="wrap">
											<tr id="no_post" style="display: none;">
												<td colspan="7">등록된 문의가 없습니다.</td>
											</tr>
										</tbody>
										<!-- <tbody>
											<tr>
												<td class="check">
													<label class="check-mark">
														<input type="checkbox">
														<em></em>
													</label>
												</td>
												<td>01</td>
												<td>2020-12-04</td>
												<td>엘비콘텐츠</td>
												<td>이재영</td>
												<td>000-000-0000</td>
												<td>lbcontents@sample.com</td>											
												<td>
													<div class="button-sm">
														<button class="btn-green">내용확인</button>
													</div>
												</td>
											</tr>
											<tr>
												<td class="check">
													<label class="check-mark">
														<input type="checkbox">
														<em></em>
													</label>
												</td>
												<td>01</td>
												<td>2020-12-04</td>
												<td>엘비콘텐츠</td>
												<td>이재영</td>
												<td>000-000-0000</td>
												<td>lbcontents@sample.com</td>											
												<td>
													<div class="button-sm">
														<button class="btn-green">내용확인</button>
													</div>
												</td>
											</tr>
										</tbody> -->
									</table>
								</div> 
								<div class="pagination">
									<div class="page" id="paging">
										
									</div>
								</div>
							</div>
							<!--post-box: 소분류// -->
						</div>
					</form>	
				</article>
				

				<div class="button save-btn right_button mt-3">
					<!-- <button class="center_button btn-primary">등록하기</button> -->
					<button class="center_button btn-secondary" onclick="delete_confirm();">삭제하기</button>
				</div>
			</div>

			<?php include_once $dir."page/adm/include/footer.php";?>
		</section>
		

		<!-- 내용확인 -->
		<div class="modal" style="visibility: hidden; opacity:0; display:none;" id="modal">
			<div class="modal-bg"></div>
			<div class="modal-wrap modal-customer modal-sm">
				<div class="modal-con">
					<div class="modal-body">
						<p class="md-title">문의내용</p>
						<div class="md-customer-con">
							<div class="con_wrap con_wrap_long">
							<div class="con_wrap con_wrap_long">
								<div class="title"><label><p>이름</p></label></div>
								<div class="content"><input readonly style="width:100%; height:100%;" id="writer"></div>
							</div>
							<div class="con_wrap">
								<div class="title"><label><p>회사정보</p></label></div>
								<div class="content"><input readonly style="width:100%; height:100%;" id="company"></div>
							</div>
							<div class="con_wrap">
								<div class="title"><label><p>휴대전화</p></label></div>
								<div class="content"><input readonly style="width:100%; height:100%;" id="phone"></div>
							</div>
							
							<div class="con_wrap">
								<div class="title"><label><p>이메일</p></label></div>
								<div class="content"><input readonly style="width:100%; height:100%;" id="email"></div>
							</div>
							<div class="con_wrap con_wrap_long">
								<div class="title"><label><p>문의내용</p></label></div>
								<div class="content"><textarea readonly style="resize: none; width:100%; height:200px" id="content"></textarea></div>
							</div>
							<div class="con_wrap con_wrap_long" style="display:none;">
								<div class="title"><label><p>첨부파일</p></label></div>
								<div class="content">
									<div class="file_list">
										<ul id="file_1_list">
											
										</ul>
									</div>
								</div>
							</div>
							<div class="md-btn">
								<button class="enter btn-primary" id="alert_btn" onclick="close_detail_modal();">확인</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- 답변등록 -->
		<div class="modal" style="display:none;" id="answer_modal">
			<div class="modal-bg"></div>
			<div class="modal-wrap modal-customer modal-sm">
				<div class="modal-con">
					<div class="modal-body">
						<p class="md-title">답변 등록</p>
						<div class="md-con">
							<div class="md-customer-con">
								<textarea style="width:100%; height:100px;" id="answer_input"></textarea>
							</div>					
						</div>
						<div class="md-btn">
							<button class="enter btn-primary" id="reg_answer_btn">저장</button>
							<button class="enter btn-secondary memo_cancle" id="alert_btn" onclick="close_answer_modal();">취소</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="display: none;">
		<table>
			<tr data-copy="copy">
				<td class="check">
					<label class="check-mark">
						<input type="checkbox" data-attr="check" onclick="check(this);">
						<em></em>
					</label>
				</td>
				<td data-attr="no"></td>
				<td data-attr="reg_date"></td>
				<td data-attr="name"></td>
				<td data-attr="contact"></td>
				<td data-attr="email"></td>											
				<td>
					<div class="button-sm">
						<button class="btn-green" data-attr="detail">내용확인</button>
					</div>
				</td>
				<!-- <td>
					<div class="button-sm">
						<button class="btn-green" data-attr="answer">답변달기</button>
					</div>
				</td> -->
			</tr>
		</table>
	</div>
</body>
</html>