let friend = document.getElementsByClassName('friends')[0];
let buttonChat = document.getElementById('chat-btn');
var chat_btn_click =0;

function creatPersone(Pro_Name , icon_class){
    let baseDiv = document.createElement('div'),
    name = document.createElement('span'),
    avilable = document.createElement('i');

    baseDiv.classList.add('baseDiv');

    name.textContent = Pro_Name;
    avilable.className = icon_class;

    baseDiv.appendChild(name);
    baseDiv.appendChild(avilable);

    friend.appendChild(baseDiv);

    return true;
}


function openChat(){
    let chatBody = document.getElementById('friends');
    let container = document.getElementById('container');
    chatBody.style.display = "block";
    container.style.top = "53vh";
    

}
function closeChat(){
    let chatBody = document.getElementById('friends');
    let container = document.getElementById('container');
    chatBody.style.display = "none";
    container.style.top = "93vh";
    

}
function chat_btn(){

    if(chat_btn_click ==0){
        openChat();
        chat_btn_click=1;
        console.log(chat_btn_click);
    }else{
        closeChat();
        chat_btn_click=0;
        console.log(chat_btn_click);
    }
    
}
buttonChat.addEventListener("click", chat_btn);
openChat();


//transform: translate(0px , 93vh); 
// buttonChat.addEventListener("click", );
