const hide=(id)=>{
    let hidebtn=document.getElementById('hide');
    let passtype=document.getElementById(id).getAttribute('type');
    if(passtype == 'password'){
        hidebtn.style.color='grey';
        document.getElementById(id).setAttribute("type","text");
    }
    else{
        hidebtn.style.color='black';
        document.getElementById(id).setAttribute("type","password");
    }
}