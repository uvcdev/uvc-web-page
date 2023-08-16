<div class="loading"><img class="loading_img" src ="<?php echo $this->project_name;?>/page/adm/img/Spinner.gif"></div>
<!-- SELECTIC -->
<?php include_once $this->dir."page/adm/include/common_select.php"; ?>
	
<aside class="adm_aside">
	<div class="adm_aside_title adm_lang_en">
		<h1 class="logo">
			<a href="?"><img src="UVC/page/homepage/img/logo-w.png"></a>
		</h1>
		<!-- 로고영역// -->
		<div class="adm_log"><span class="adm_logout" onclick="logout()">로그아웃</span></div>
	</div>
	<div id="cssmenu" class="side_main_menu">
		<ul class="adm_side_depth01" id="side_menu">
			<li data-menu>
				<a>게시판관리<span class="arrow"></span></a>
				<ul class="adm_side_depth02">
					<li><a href="?param=adm&param1=view_history&side=1">연혁</a></li>
					<li><a href="?param=adm&param1=view_certify&side=1">인증서</a></li>
					<li><a href="?param=adm&param1=view_partner&side=1">파트너</a></li>
					<li><a href="?param=adm&param1=view_board&side=1">레퍼런스</a></li>
					<li><a href="?param=adm&param1=view_notice&side=1">스토리</a></li>
					<li><a href="?param=adm&param1=view_news&side=1">뉴스</a></li>
				</ul>
			</li>
			<li data-menu>
				<a>개인정보처리방침<span class="arrow"></span></a>
				<ul class="adm_side_depth02">
					<li><a href="?param=adm&param1=upload_policy01&side=2">개인정보처리방침</a></li>
					<li><a href="?param=adm&param1=upload_policy02&side=2">이메일무단수집거부</a></li>
				</ul>
			</li>
		</ul>
	</div>
</aside>
<!-- adm_aside끝 --> 

<script> 
	$(document).ready(function(){

		var mo_menu=$(".adm_side_depth01>li");
        for(var i = 0; i<mo_menu.length; i++){
			
            $(mo_menu[i]).stop().click(function(){	

                for(var j = 0; j<mo_menu.length; j++){
					if(this != mo_menu[j]){
						var span = mo_menu[j].querySelector(".arrow");
						if(span.classList.contains("rotate")){
							span.classList.remove("rotate");
						}
					}
                    var temp_mo_sub = mo_menu[j].children[1];
					$(temp_mo_sub).stop().slideUp();	
                }

                var mo_sub = this.children[1];

                $(mo_sub).stop().slideToggle();
				if(this.querySelector(".adm_side_depth02").style.display == "block"){
					if(!this.querySelector(".arrow").classList.contains("rotate")){
						this.querySelector(".arrow").classList.add('rotate');
					}else{
						this.querySelector(".arrow").classList.remove('rotate');
					}
				}else{
					if(!this.querySelector(".arrow").classList.contains("rotate")){
						this.querySelector(".arrow").classList.add('rotate');
					}
				}				
            });
            
        }


});//end

</script>
