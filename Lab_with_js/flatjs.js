function Break(){
document.writeln("a")

}
var guessednum
function random(){
guessednum = Math.floor(Math.random() * 100)
console.log(guessednum)
triesleft= 3
document.getElementById("result").innerHTML = "Próby " + triesleft
}
var triesleft
function guess(){
    let input = document.getElementById("input").value
    if(triesleft > 0){  
    if (input == guessednum){
        alert("You guessed it!")
    }
    else if (input > guessednum){
        alert("Too high")
    }
    else if (input < guessednum){
        alert("Too low")
    }}
    else
    {
        alert("You lose")
    }
    triesleft -= 1
    document.getElementById("result").innerHTML = "Próby " + triesleft


}
function Parse(){
    alert(parseInt(prompt("Dej inta"),10)*2)
    alert(parseFloat(prompt("Dej floata"),10)/2.5)


}
function Re(){
    window.addEventListener("resize", ()=>{
        prompt("Radnom promtp")
    })

}