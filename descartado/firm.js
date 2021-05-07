(function() {

    // Get a regular interval for drawing to the screen
    window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimaitonFrame ||
            function(callback) {
                window.setTimeout(callback, 1000 / 60);
            };
    })();
    // Set up the canvas
    var canvas = document.getElementById("canvas");
    var dv = document.getElementById("dv");
    var ancho = dv.clientWidth;
    console.log("este es el ancho" + ancho)
    canvas.setAttribute("width", ancho);
    canvas.setAttribute("height", "400");
    var ctx = canvas.getContext("2d");
    // Set up the UI
    var sigText = document.getElementById("data-url");
    var sigImage = document.getElementById("img-firm");
    var clearBtn = document.getElementById("clear-firm");
    var submitBtn = document.getElementById("send-firm");

    clearBtn.addEventListener("click", function(e) {
        clearCanvas();
        sigText.innerHTML = "";
        sigImage.setAttribute("src", "");
    }, false);

    submitBtn.addEventListener("click", function(e) {
        submitData();
    }, false);

    // Set up mouse events for drawing
    var drawing = false;
    var mousePos = { x: 0, y: 0 };
    var lastPos = mousePos;
    canvas.addEventListener("mousedown", function(e) {
        drawing = true;
        lastPos = getMousePos(canvas, e);
    }, false);
    canvas.addEventListener("mouseup", function(e) {
        drawing = false;
        submitData();
    }, false);
    canvas.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas, e);
    }, false);


    // Set up touch events for mobile, etc
    canvas.addEventListener("touchstart", function(e) {
        //document.body.style.overflow = 'hidden';
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);

    canvas.addEventListener("touchend", function(e) {
        document.body.style.overflow = 'auto';
        submitData();
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);

    canvas.addEventListener("touchmove", function(e) {
        document.body.style.overflow = 'hidden';
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);

    // Prevent scrolling when touching the canvas

    /*
      document.body.addEventListener("touchstart", function (e) {
        if (e.target == canvas) {
          document.body.style.overflow = 'hidden';
        }
      });

      document.body.addEventListener("touchend", function (e) {
        if (e.target == canvas) {
          document.documentElement.style.overflow = 'auto';
        }
      });

      document.body.addEventListener("touchmove", function (e) {
        if (e.target == canvas) {
          document.body.style.overflow = 'hidden';
        }
      });*/


    // Get the position of the mouse relative to the canvas
    function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        return {
            x: mouseEvent.clientX - rect.left,
            y: mouseEvent.clientY - rect.top
        };
    }
    // Get the position of a touch relative to the canvas
    function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }
    // Draw to the canvas
    function renderCanvas() {
        if (drawing) {
            ctx.strokeStyle = "#222222";
            ctx.lineWidth = 3;
            ctx.moveTo(lastPos.x, lastPos.y);
            ctx.lineTo(mousePos.x, mousePos.y);
            ctx.stroke();
            lastPos = mousePos;
        }
    }
    // Clear the canvas
    function clearCanvas() {
        canvas.width = canvas.width;
    }

    function showConsoleData() {
        var x = document.forms[0];
        var i;
        for (i = 0; i < x.length; i++) {
            console.log(x.elements[i].value);
        }
    }

    function submitData() {
        var dataUrl = canvas.toDataURL();
        sigText.innerHTML = dataUrl;
        sigImage.setAttribute("src", dataUrl);
    }
    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();
})();