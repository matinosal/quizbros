document.addEventListener("DOMContentLoaded",function(){

    const container = document.querySelector(".main-quiz");
    
    const nextButton = document.querySelector(".next-question");
    const prevButton = document.querySelector(".previous-question");

    prevButton.addEventListener("click",()=>{
        getQuestion(false,container,prevButton,nextButton)
    });
    
    nextButton.addEventListener("click", ()=>{
        getQuestion(true,container,nextButton,prevButton)
    });
})

function getQuestion(getNextQuestion,container,clickedButton,secondButton){
    const shift = ((getNextQuestion)?  1 : -1);
    console.log(shift);
    const id = parseInt(container.getAttribute("data-id"));
    const order = parseInt(container.getAttribute("data-order")) + shift ;
    let reqData = new FormData();
    reqData.append('id',id);
    reqData.append('order',order);
    fetch("/getQuestion",{
        method: "POST",
        body:reqData,
    })
    .then(req => req.json())
    .then(req =>{
        document.querySelector('.question__content').innerHTML = req.question;
        [...document.querySelectorAll('.answer__content')].forEach((element, i) => {
            element.innerHTML = req.answers[i];
        });
        buttonBlock = req.buttonLock;
        clickedButton.style.visibility = (buttonBlock)? 'hidden': 'visible';
        secondButton.style.visibility = 'visible';
        container.setAttribute("data-order",order);
    })
}