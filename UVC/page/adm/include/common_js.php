<script>
    var browser = "<?php echo $browser; ?>";
    var data = <?php echo $this->data; ?>;
    var no_image = "<?php echo $this->no_image; ?>";
    var upload_path = "<?php echo $this->upload_path; ?>";
    var project_name = "<?php echo $this->project_name; ?>";

    var mode = 1; //0 : 디자인시 모드 , 1 : 개발시 모드 , 2 : 실제 적용 모드 
    //각 게시글 언어 등록 모드 ( 0 : 언어별 등록 , 1 : 모든 언어 동시 등록 )
    var certify_mode = 1; //인증서 모드
    var board_mode = 1; //게시글 모드
    var history_mode = 1; //게시글 모드
</script>

<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/jquery-3.3.1.min.js<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/lb.js<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/gu.js<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/common.js<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/index.js<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $this->project_name;?>/page/adm/js/side_menu.js<?php echo $version;?>"></script>
