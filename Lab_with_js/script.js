console.log("dupa")

const randomMonth = () => {
    const month = Math.floor(Math.random() * 12)
    console.log(month)
    let input
    let quess = 0
    do {
        input = window.prompt() 
        quess += 1
    }   while (Number(input) !== month && quess <= 2)
    alert("You suck")
}

const logo = document.getElementById("logoID")
const homeButton = document.getElementById("homeID")

logo.addEventListener("click", () => {
    document.writeln("bonjour")
})

homeButton.addEventListener("click", () => {
    console.log(Math.floor(0.5))
})

