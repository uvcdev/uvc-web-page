$(document).ready(function(){
    
    var li = document.querySelectorAll('[data-page]');
    for(var i = 0; i < li.length; i++) {
       
        if(data.param.indexOf(li[i].getAttribute('data-page')) != -1) {
            li[i].className = 'page_on'; 
        }
    }
});