function textcolor(color )
{
    document.getElementsByClassName("text")[0].style.color = color;
}
function bgcolor(color )
{
    document.getElementsByClassName("text")[0].style.backgroundColor = color;
}
function font(type)
{
    document.getElementsByClassName("text")[0].style.fontFamily = type;
}

function changeColor(){
    textcolor(document.getElementById("color").value)
}
function changeBgColor(){
    bgcolor(document.getElementById("background").value)
}
function changeFont(){
    font(document.getElementById("font").value)
}
