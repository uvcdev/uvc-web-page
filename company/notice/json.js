var startIndex = 0;
var newsLength = 0;
var searchKeyword = '';
const pageSize = 4;

var count = 0;
function render(){
    $.getJSON('notices.json', (data)=> {
        if(searchKeyword){
            data.arr = data.arr.filter(each => each.HeadLine.search(searchKeyword) >= 0)
        }
        $("#noticeBoard ul").empty()
        for(jsonArrName of data.arr.slice(startIndex, startIndex + pageSize)) {
            var row = "<li>" 
                        + "<article>" 
                        + "<a href='" + jsonArrName.url + "'" + "target='_blank'>"
                        + "<section>"
                        + "<p style='background: url(" + ".\/JSON\/" + jsonArrName.image + ")'>" + "</p>"
                        + "</section>"
                        + "<div>"
                        + "<span>" + jsonArrName.News + "&nbsp;" + "|" + "&nbsp;" + jsonArrName.Date + "</span>" 
                        + "<h1>" + jsonArrName.HeadLine + "</h1>" 
                        + "<p>" + jsonArrName.contents + "</p>"
                        + "<span class='moreview'> 기사 원문 바로가기 </span>"
                        + "</div>"
                        + "</a>" 
                        + "</aritlce>"
                        + "</li>"
            $(row).appendTo("#noticeBoard ul")
        }
        newsLength = data.arr.length
        
        if( $('#noticeBoard ul').children().length === 0 ){
            $('#noticeBoard ul').append('<li><strong>해당 자료가 존재하지 않습니다</h1></strong>');
        }
    })
}


$(document).ready(()=> {
    //리스트 불러와서 4개 자르기
    render()

    $('#newsSearch').on('keyup', $.throttle(200, ()=>{
        //검색기능
        searchKeyword = $('#newsSearch').val()
        searchKeyword = searchKeyword.slice(0, searchKeyword.length - 1)
        render()
        // searchKeyword = $('#newsSearch').val()
        // searchKeyword = searchKeyword.slice(0, searchKeyword.length - 1)
        // render()
    }))

    $('#newsSearch').focusout(()=>{
        searchKeyword = $('#newsSearch').val()
        render()
    })

    $('#newsSearch').on('keyup keydown keypress', (e)=>{
        //엔터키 막기
        var keyCode = e.keyCode || e.which;
        if ( keyCode === 13 ) {
            e.preventDefault();
            return false;
        }
    })

    $('#nextValue').click(()=>{
        //넥스트 버튼
        startIndex += pageSize
        if(startIndex >= newsLength){
            startIndex -= pageSize
            alert('마지막 페이지입니다')
        }
        render()
    })

    $('#prevValue').click(()=>{
        // 이전 버튼
        startIndex -= pageSize
        if(startIndex < 0){
            startIndex = 0
            alert('첫 번째 페이지입니다')
        }
        render()
    })

    //TODO 숫자 페이징 기능 만들 때 이거 어떻게 처리하면 좋을지
    // $('#1').click(()=>{
    //     // 이전 버튼
    //     startIndex = 4 * 0
    //     render()
    // });
    // $('#2').click(()=>{
    //     // 이전 버튼
    //     startIndex = 4 * 1
    //     render()
    // });

    // $.getJSON('notices.json', function(data) {
    //     $.each(data.arr, function inx(i, f) {
    //         // 인자를 index와 item받아야함 i = index, f = 해당인덱스 키값
    //         var row = "<li>" 
    //                     + "<article>" 
    //                     + "<a href='" + f.url + "'" + "target='_blank'>"
    //                     + "<h6>" + f.index + "</h6>"
    //                     + "<section>"
    //                     + "<p style='background: url(" + ".\/JSON\/" + f.image + ")'>" + "</p>"
    //                     + "</section>"
    //                     + "<div>"
    //                     + "<span>" + f.News + "&nbsp;" + "|" + "&nbsp;" + f.Date + "</span>" 
    //                     + "<h1>" + f.HeadLine + "</h1>" 
    //                     + "<p>" + f.contents + "</p>"
    //                     + "<span class='moreview'> 기사 원문 바로가기 </span>"
    //                     + "</div>"
    //                     + "</a>" 
    //                     + "</aritlce>"
    //                 + "</li>"
    //         count++
    //         if(count<=4)
    //         $(row).appendTo("#noticeBoard ul");
    //     });
    //     $('#nextValue').click(()=>{
    //         //넥스트 버튼
    //     });
    //     $('#prevValue').click(()=>{
    //         // 이전 버튼
    //     });
    // });


    //key up search
})


//backup용
// $(()=> {
//     var notices = [];
//     $.getJSON('notices.json', function(data) {
//         $.each(data.notice, function(i, f) {
//             var row = "<li>" + f.HeadLine + f.Date + f.image + "</li>"
//             $(row).appendTo("#noticeBoard ul");
//         });
//     });
// });