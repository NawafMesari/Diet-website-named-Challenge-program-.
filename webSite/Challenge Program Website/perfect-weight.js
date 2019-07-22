
function calc(){

    var weight = document.getElementById("weight").value;
    var height = document.getElementById("height").value;

   var bmi = 0;

   bmi = weight / ((height/100)*(height/100));
   
  bmi= bmi.toFixed(2);
  var Case;
  if(bmi < 15){
      Case= " نقص حاد جدا في الوزن "
      
  }else if(bmi < 16)
  {
    Case= " نقص حاد  في الوزن "
}else if(bmi < 18.5){
    Case= " نقص  في الوزن "

}else if(bmi <25){
    Case= "   وزن طبيعي "

}else if(bmi < 30){
    Case= "زياد في الوزن "

}
else if(bmi < 35){
    Case= "سمنة درجة أولي"

}else if(bmi < 40){
    Case= " سمنة درجة ثانية "

}else if(bmi > 40){
    Case= "سمن مفرطة جدا"

}
 
// var small = true;
// var big = true;
// var count=0;
// var min=0;
// var max=0;

// // while(small==true || big==true){
// //     var bmi = count / (height*height);
// //     if(bmi==24){
// //         max=count;
// //         big=false;
// //     }
// //     // if((bmi / (height*height))==18.5){
// //     //     min=count;
// //     //     small=false;
// //     // }
// //     count=count+1;
// // }
// for(var i=0;i<500;i++){
//     var perfectBmi = i / (height*height);
//     perfectBmi=perfectBmi.toFixed(0);
   
//         if(perfectBmi==24){
//             max=i;
//             break;
           
//         }
        
// }
// for(var i=0;i<500;i++){
//     var perfectBmi = i / (height*height);
//     perfectBmi=perfectBmi.toFixed(0);
   
       
//         if((perfectBmi)==19){
//             min=i;
//             break;
            
//         }
// }
// var perfectweight= (max+min)/2;
var  perfectweight ;
var gender =document.getElementById("gender").value;

if(gender =="ذكر"){
perfectweight = 22.4*(((height/100)*(height/100)));
}else if(gender =="انثى"){
    perfectweight = 21.1*(((height/100)*(height/100)));
}else{
    perfectweight="اختار نوع الجنس"
}

var content="<p>"+weight+" <b>: الوزن</b> </p>";
content +="<p>"+height+": <b>الطول </b> </p>";
content +="<p>"+bmi+"<b> : هو BMI مؤشر كتلة الجسم </b>  </p>";
content +="<p>  <b>حالة الجسم </b> :"+Case+"</p>";
content +="<p>"+perfectweight+"<b>:الوزن المثالي</b>  </p>";
    
  document.getElementById("result").innerHTML=content;
}