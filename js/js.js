
window.onclick = (e)=> {
    console.log(e.target)
    if (e.target == document.getElementById('nv-btn') ||
         e.target == document.querySelector('path') ||
         e.target == document.getElementById('nav-btn-icon')||
         e.target == document.getElementById('nav-btn')){
            console.log("HI");
            openNav();
        }
        if(e.target==document.getElementById("mySidebar")){
            closeNav();
        }        
    
    }

function openNav(){
    if(document.getElementById("side")!=null){
        document.getElementById("side").className = "c-side rounded";
        document.getElementById("side").style = " width: 100%";
        document.getElementById("side").style += " min-height: calc(100vh);";
        document.getElementById("side").style = " display :block";
    }
    if(document.getElementById("search")!=null){
        document.getElementById("search").className = "d-none";
    }
    if(document.getElementById("searchs")!=null){
        document.getElementById("searchs").className = "d-flex justify-content-end";
    }
    
    if(document.getElementById("content")!=null){
        document.getElementById("content").className = "d-none";
    }else{
        console.log("e");
    }
    
    
    document.getElementById("nav-btn").className = "d-none";
    if(document.getElementById("sside")!=null){
        document.getElementById("sside").className = "d-block";
        console.log('sside');
    }
    
    
  
}

function closeNav() {
    
    // // -----
    if(document.getElementById("side")!=null){
        document.getElementById("side").className = "d-none d-md-block col-3 c-side rounded";
        document.getElementById("side").style = "";    
    }
    if(document.getElementById("search")!=null){
        document.getElementById("search").className = "d-md-none d-flex justify-content-end";
    }
    
    if(document.getElementById("row")!=null){
        document.getElementById("row").className = "c-side-h row";    }
    
    document.getElementById("content").className = "c-side-h col-lg-9 col-md-9 col-sm-12";
    document.getElementById("nav-btn").className = "main-btn rounded";
    if(document.getElementById("sside")!=null){
        document.getElementById("sside").className = "d-none";
        console.log('sside');
    }

}
// closeNav()

function updateScroll(){
    var scroll = document.getElementById("scroll");
    scroll.scrollTop = scroll.scrollHeight;
}
if(document.getElementById("scroll")!=null){
updateScroll();
}
