'use strict';

function createParagraph() {
    const para = document.createElement("p");
    para.innerText = "Newly created paragraph";
    document.body.appendChild(para);
}

function createNewText() {
    const h1 = document.createElement("h1");
    const textNode = document.createTextNode("Newly created text node");
    h1.appendChild(textNode);   
    document.body.appendChild(h1);
}

function invertDivs(parentDiv) {
    var first = document.getElementById(parentDiv).firstElementChild;
    var second = document.getElementById(parentDiv).lastElementChild;
    document.getElementById(parentDiv).insertBefore(second, first);
}

function replacePlaneWithBike() {
    const listElement = document.getElementById('exampleList');
    const bikeElement = document.createElement("li");
    bikeElement.textContent = "bike";
    listElement.replaceChild(bikeElement, listElement.firstElementChild);
}

function removeLastElement() {
    const listElement = document.getElementById('exampleList');
    listElement.removeChild(listElement.lastElementChild);
}

function presentParentNodeCapability() {
    let firstNote = document.querySelector('.firstNote');
    let parent = firstNote.parentNode;
    let newNote = document.createElement('div');
    newNote.textContent ='Note ' + (parent.childElementCount + 1);
    parent.appendChild(newNote);
}


// use strict examples

//variable = 5;
//foo();

function showNameHelp() {
    let form = document.querySelector('.nameSection');
    let helpMessage = document.createElement("label")
    helpMessage.textContent = "Input your name";
    helpMessage.setAttribute("class", "helpMessage");
    form.appendChild(helpMessage);
}

function hideHelp() {
    const parent = document.querySelector('.helpMessage').parentNode;
    const helpSection = document.querySelector('.helpMessage');
    parent.removeChild(helpSection);
}

function sendConfirmation() {
    const form = document.querySelector('.form');
    if(confirm("Are you sure you want to proceed?")){
        form.submit();
    }
}

function resetConfirmation() {
    const form = document.querySelector('.form');
    if(confirm("Are you sure you want to proceed?")){
        form.reset();
    }
}