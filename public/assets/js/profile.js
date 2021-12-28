document.addEventListener("DOMContentLoaded", function(){
    const userTextArea = document.querySelector(".user-description__text");
    userTextArea.addEventListener('blur',function(e){
        let dataToSend = new FormData();
        dataToSend.append('description',this.value);
        fetch("/profileEdit",{
            method:"POST",
            body:dataToSend,
        })
        .then(res => res.json())
        .then(res => console.log(res))
    })

})