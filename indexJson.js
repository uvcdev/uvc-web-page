var count = 0;

$(function() {
    
    $.getJSON('./company/notice/notices.json', function(data) {
        $.each(data.arr, function(i, f) {
            var indexRow = "<div class='noticebox'>"
                         + "<div class='notice'>"
                         + "<a class='noticeurl' href='" + f.url + "' target='_blank'>"
                         + "<div class='noticephoto' style='background: url(" + ".\/company\/notice\/JSON\/" + f.image + ")'>" + "</div>"
                         + "<div class='noticetext'>"
                         + "<span>" + f.News + "</span>"
                         + "<h4>" + f.HeadLine + "</h4>"
                         + "<p>" + f.contents + "</p>"
                         + "</div>"
                         + "</a>"
                         + "</div>"
                         + "</div>"
            count++
            if (count<=3)
            $(indexRow).appendTo(".notice-content");
        });

    });

});;



//backup용
// $(function() {

//     var notices = [];

//     $.getJSON('notices.json', function(data) {
//         $.each(data.notice, function(i, f) {
//             var row = "<li>" + f.HeadLine + f.Date + f.image + "</li>"
//             $(row).appendTo("#noticeBoard ul");
//         });

//     });

// });;