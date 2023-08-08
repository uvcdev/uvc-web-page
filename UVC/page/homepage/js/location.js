let offsetArray = [];
let categoryType = 1;
let category_li = null;
let section = null;
let topArray = [];
let panels = null;
let phref = null;
// let top = null;
$(document).ready(function() {
    scrollEvent();
});

function change_tab(elem, type) {
    if(type == 1) {
        categoryType = 1;
    }
    else if(type == 2) {
        categoryType = 2;
    }
    
    for(let i = 0; i < category_li.length; i++){
        category_li[i].querySelector("a").classList.remove("on");
    }
    // panels[type - 1].style.display = "block";
    elem.querySelector("a").classList.add("on");
    // category_li = document.querySelector('#sidebar').querySelectorAll('li');
    section = document.querySelector('.right').querySelectorAll('li');

    topArray = [];
    let top = $(section[type - 1]).offset().top;
    $(window).scrollTop(top-100);
    // for(let i = 0; i < section.length; i++){
    //     let top = $(section[i]).offset().top;
    //     topArray.push(top);
    // }
}

function scrollEvent(){
    
    category_li = document.querySelector('#sidebar').querySelectorAll('li');
    section = document.querySelector('.right').querySelectorAll('li');
   
    for(let i = 0; i < section.length; i++){
        let top = $(section[i]).offset().top;
        topArray.push(top-100);
    }

    $(window).scroll(function(){
        let currentScrollTop = $(window).scrollTop() + 100;
        for(let i = 0; i < topArray.length; i++){
            //마지막 for문
            if(i == topArray.length - 1){
                if(topArray[i] <= currentScrollTop){
                    categoryOnSetting(i);
                    return;
                }
            }

            if(topArray[i] <= currentScrollTop && topArray[i + 1] > currentScrollTop){
                categoryOnSetting(i);
            }
        }
    });
}

function categoryOnSetting(index){
    category_li = document.querySelector('#sidebar').querySelectorAll('li');

    for(let i = 0; i < category_li.length; i++){
        category_li[i].querySelector("a").classList.remove("on");
    }
    category_li[index].querySelector("a").classList.add("on");
}