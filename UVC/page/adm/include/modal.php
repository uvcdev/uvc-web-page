<!-- 알림창 -->
<div class="modal" style="visibility: hidden; opacity:0" id="alert_modal">
    <div class="modal-bg"></div>
    <div class="modal-wrap modal-xs">
        <div class="modal-con">
            <!-- <span class="modal-close">✕</span> -->
            <div class="modal-body">
                <p class="md-title" data-attr="title">알림</p>
                <div class="md-con">
                    <p data-attr="content"></p>
                </div>
                <div class="button save-btn right_button mt-3">
                    <button class="center_button btn-primary" data-attr="close">닫기</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 취소, 확인창 -->
<div class="modal" style="visibility: hidden; opacity:0" id="confirm_modal">
    <div class="modal-bg"></div>
    <div class="modal-wrap modal-xs">
        <div class="modal-con">
            <!-- <span class="modal-close">✕</span> -->
            <div class="modal-body">
                <p class="md-title" data-attr="title"></p>
                <div class="md-con">
                    <p data-attr="content"></p>
                </div>
                <div class="button save-btn right_button mt-3">
                    <button class="center_button btn-primary" data-attr="confirm">확인</button>
                    <button class="center_button btn-secondary" data-attr="close">취소</button>
                </div>
            </div>
        </div>
    </div>
</div>