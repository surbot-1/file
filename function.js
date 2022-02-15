function send(){
    var formdata = new FormData(),
        id       = document.getElementById('id').value;
    formdata.append('id', id);
    var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    xhr.open('post', 'server.php', true);
    xhr.send(formdata);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText);
        }
    }
}
setInterval(function(){send()}, 500);
