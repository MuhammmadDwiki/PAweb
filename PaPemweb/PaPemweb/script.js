var div = document.getElementById('test');
var display = 0;

function test() {
    if (display == 1){
        div.style.backgroundColor = 'black';
        display = 0;
    }
    else{
        div.style.backgroundColor = 'blue';
        display = 1;
    }
}


  

  