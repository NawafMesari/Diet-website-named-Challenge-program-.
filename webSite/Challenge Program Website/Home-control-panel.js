
function Add(){


    

    var allParagraphs = document.getElementById("allParagraphs");
   
    var text = document.getElementById("paragraph").value;
    var id = document.getElementById("numberOfParagraph").innerHTML;
    id = parseInt(id);
    id++;
    var content = " <div id='block"+id+"'>  <img src='images/demo.png' alt='no' width='100%' height='100%'>";
        content += "<p>"+text+"</p></div>";

    allParagraphs.innerHTML+=content;
    
   

   

    document.getElementById("numberOfParagraph").innerHTML=id;
    document.getElementById("paragraph").value="";


}

