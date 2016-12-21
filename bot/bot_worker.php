<script src="http://code.jquery.com/jquery-latest.js"></script> 



<script type="text/javascript">    
var refreshIntervalId = null;
var i = 0;
function updateLoop() {
    document.getElementById('text').innerHTML +=  ""+ i++ +" loading followers...\n";
    var textarea = document.getElementById('text');
    textarea.scrollTop = textarea.scrollHeight;
}
function startBot(){
    document.getElementById('status_banner').innerHTML = "running...";
    document.getElementById("status_banner").className = "ui top attached label green";
    document.getElementById("start_button").className = "ui button tall disabled green";
    document.getElementById("stop_button").className = "ui button tall red";
    refreshIntervalId = setInterval(updateLoop,1000);
}
function stopBot(){
    document.getElementById('status_banner').innerHTML = "stopped";
    document.getElementById("status_banner").className = "ui top attached label red";
    document.getElementById("stop_button").className = "ui button tall disabled red";
    document.getElementById("start_button").className = "ui button tall green";
    clearInterval(refreshIntervalId);
}


</script>