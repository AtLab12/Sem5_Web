var canvas
function mousedown(event)
{

    var x = event.clientX;
    var y = event.clientY;
    var canvas = document.getElementById("a");
    var context = canvas.getContext("2d");
    context.beginPath();
    context.moveTo(x, y);
    context.lineTo(x, y);
    context.stroke();
    canvas.addEventListener("mousemove", mousemove);
    canvas.addEventListener("mouseup", mouseup);
}
function mousemove(event)
{
    var x = event.clientX;
    var y = event.clientY;
    var canvas = document.getElementById("a");
    var context = canvas.getContext("2d");
    context.lineTo(x, y);
    if(event.altKey) context.strokeStyle = "red";
    else if(event.shiftKey) context.strokeStyle = "blue";
    else context.strokeStyle = "black";

    context.stroke();  
}
function mouseup(event)
{
    var canvas = document.getElementById("a");
    canvas.removeEventListener("mousemove", mousemove);
    canvas.removeEventListener("mouseup", mouseup);
}
function mouseout(event){
    var canvas = document.getElementById("a");
    canvas.removeEventListener("mousemove", mousemove);
    canvas.removeEventListener("mouseup", mouseup);
}
function mouseover(event){

    var canvas = document.getElementById("a");
    canvas.addEventListener("mousedown", mousedown);
}