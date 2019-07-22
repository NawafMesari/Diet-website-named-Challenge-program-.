function start(){
    if(!window.sessionStorage.getItem("VisitedBefor")){
      swal("", "", "success");
      sessionStorage.setItem("VisitedBefor",true);
    }
        
  }

  
  addEventListener("load", start, false);