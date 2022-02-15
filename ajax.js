var size = 0; //declares global variable size and set it's initial value to 0

function send(s){
    var formdata = new FormData(),
        id       = document.getElementById('id').value;
    formdata.append('id', id);
    formdata.append('size', s);
    var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    xhr.open('post', 'server.php', true);
    xhr.timeout = 25000; //set timeout on xmlhttprequest to 25 sec, some servers has short execution tiemout, in my case it's 27 sec so i set the value to 25 sec.
    xhr.send(formdata);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var data = JSON.parse(xhr.responseText);
            size = data.size;
            console.log(data.rows);
            setTimeout(function(){send(size)}, 100); //re-initiate the request after receiving data 
        }
    }
    xhr.ontimeout = function(){
        xhr.abort(); //abort the timed out xmlhttp request
        setTimeout(function(){send(size)}, 100);
}
send(size); 
