window.onload=function(){

    let name = document.querySelector('#name_contact');
    let subject = document.querySelector('#subject_contact');
    let message = document.querySelector('#message_contact');
    let submit = document.querySelector('#submit_contact');

    submit.addEventListener('click' , ()=>{
        let x = true ;
        if(name.value.trim() == false)
        {
            name.style.border = '1px red solid';
            x = false;
        }
        else{
            name.style.border = '1px green solid';
        }
        if(subject.value.trim() == false)
        {
            subject.style.border = '1px red solid';
            x = false;

        }
        else{
            subject.style.border = '1px green solid';
        }
        if(message.value.trim() == false)
        {
            message.style.border = '1px red solid';
            x = false;

        }
        else{
            message.style.border = '1px green solid';
        }

        if(x == true )
        {
            window.alert('your message has been sent succsefflly , thank you ')
        }
    });







};

