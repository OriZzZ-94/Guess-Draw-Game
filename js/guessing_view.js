var dataURL = localStorage.getItem("DrawingCanvas");
var g_canvas = document.getElementById("guess_canvas");
var g_ctx = g_canvas.getContext("2d");
var img = document.getElementById("guess_pic");
var p1_choose;
var p1_type;
var p1_score;
var seconds = 0;
var el = document.getElementById('count_sec');
img.src = dataURL;
img.onload = function() {
    g_ctx.drawImage(img, 0, 0);
};


window.addEventListener('load', () => {
    $.ajax({
        url: "api.php",
        data: { action: "get_word" },
        type: 'post',
        success: function(data) {
            if (data.success == "true") {
                p1_choose = data.data;
                p1_type = data.type;
                p1_score = parseInt(data.score);
                p1_besttime = parseInt(data.time);

            }
        }
    });
});

$("#try_guess").click(function() {
    var input = document.getElementById("p2_guess").value;
    if (input.localeCompare(p1_choose) == 0) {
        console.log("Congrats you succesfully");
        if (p1_type.localeCompare("H") == 0)
            p1_score += 5;
        else if (p1_type.localeCompare("M") == 0)
            p1_score += 3;
        else if (p1_type.localeCompare("E") == 0)
            p1_score += 1;
        if (p1_besttime < seconds) {
            seconds = p1_besttime;
        }
        $.ajax({
            url: "api.php",
            data: { action: "update_score", score: String(p1_score), counter: String(seconds) },
            type: 'post',
            success: function(data) {
                if (data.success == "true") {
                    window.location.href = 'word_choosing_view.php';

                }
            }
        });
    } else {
        window.alert("Sry try Again please!");
    }
});

$("#end_game").click(function() {
    $.ajax({
        url: "api.php",
        data: { action: "logout" },
        type: 'post',
        success: function(data) {
            if (data.success == "true") {
                window.location.href = 'index.php';
            }
        }
    });

});

function incrementSeconds() {
    seconds += 1;
    el.innerText = "You have been here for " + seconds + " seconds.";
}
var cancel = setInterval(incrementSeconds, 1000);