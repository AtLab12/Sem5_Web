function images(){

    for (let i = 0; i < document.images.length; i++){
        document.images[i].style.border = "5px solid red"
    }

}
function links(){
    alert(document.links)

}
function forms(){
    alert(document.forms)

}
function scripts(){
    alert(document.scripts)

}
function anchors(){
    alert(document.anchors)

}
function item(){
    alert(document.images.item(1))
}
function namedItem(name){
    alert(document.images.namedItem(name))
}