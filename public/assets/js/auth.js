///tutaj ze jak sie kliknie submit 
//to sprawdzam czy wszystkie pola sa wypelnione na jakis sposob
document.addEventListener('DOMContentLoaded',function(){
    const inputs = [...document.querySelectorAll("form input")];
    const submit = inputs.filter(el =>{
        return el.type=="submit"
    })
    console.log(inputs,submit);
})