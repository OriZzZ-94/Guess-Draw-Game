//Mvp Post Request 

var mvp_name;
var mvp_time;
var mvp_score;
var mvp_ntag = document.getElementById("mvp_name");
var mvp_ttag = document.getElementById("mvp_time");
var mvp_stag = document.getElementById("mvp_score");
$.ajax({
    url: "api.php",
    data: { action: "get_mvp" },
    type: 'post',
    success: function(data) {
        if (data.success == "true") {
            mvp_name = document.createTextNode(data.mvp_name);
            mvp_time = document.createTextNode(data.mvp_time);
            mvp_score = document.createTextNode(data.mvp_score);
            mvp_ntag.appendChild(mvp_name);
            mvp_ttag.appendChild(mvp_time);
            mvp_stag.appendChild(mvp_score);
        }
    }
});