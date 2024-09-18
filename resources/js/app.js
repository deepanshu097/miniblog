import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

function post_setting() {
    alert();
    var post_setting= document.getElementById('list-group');
    if( post_setting.style.display =='block'){
        post_setting.style.display='none'; 
    }else{
        post_setting.style.display ='block'
    }

}

function open_side(){
var element= document.getElementById('side-nav');
if(element.style.display=='block'){
    element.style.display='none'
}else{
    element.style.display='block'
}
alert()

}