const canvas = document.querySelector("#canvas");
const ctx = canvas.getContext('2d');


window.addEventListener('load', () => {

    //variabels
    let painting = false;

    function startPostion() {
        painting = true;
        draw;
    }

    function finishedPostion() {
        painting = false;
        ctx.beginPath();

    }

    function draw(e) {
        if (!painting) return;
        var rect = canvas.getBoundingClientRect();
        ctx.lineWidth = 4;
        ctx.lineCap = "round";
        ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);

    }


    //Event listeners
    canvas.addEventListener("mousedown", startPostion);
    canvas.addEventListener("mouseup", finishedPostion);
    canvas.addEventListener("mousemove", draw);



});