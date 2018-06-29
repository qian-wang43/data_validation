window.onload = function() {
    
    //delete all the space in the string
    function trimAll(str){ 
    return str.replace(/\s+/g, "");
  }

    //delete all the space at start and end of the string
    function trim(str) {
        return str.replace(/(^\s+)|(\s+$)/g, "");
    }

    var firstName=document.forms["form"]["firstName"];
    firstName.onblur=function(event){
        checkFirstName();
    };

    function checkFirstName(){
        var str=trimAll(firstName.value);
        var patt=/[A-z]{2,}/;
        if(patt.test(str)){
            firstName.style.borderColor="white";
            document.querySelectorAll("span")[0].style["visibility"]="hidden";
        }
        else{
            firstName.style.borderColor="red";
            document.querySelectorAll("span")[0].style["visibility"]="visible";
        }
            
    }
    var lastName=document.forms["form"]["lastName"];
    lastName.onblur=function(event){
        checkLastName();
    };

    function checkLastName(){
        var str=trimAll(lastName.value);
        var patt=/[A-z]{2,}/;
        if(patt.test(str)){
            lastName.style.borderColor="white";
            document.querySelectorAll("span")[1].style["visibility"]="hidden";
        }
        else{
            lastName.style.borderColor="red";
            document.querySelectorAll("span")[1].style["visibility"]="visible";
        }
            
    }
    var age=document.forms["form"]["age"];
    age.onblur=function(event){
        checkAge();
    };

    function checkAge(){
        var str=trimAll(age.value);
        var number=parseInt(str);
        var patt=/[0-9]+/;
        if((patt.test(str))&&(number>0 && number<=120)){
            age.style.borderColor="white";
            document.querySelectorAll("span")[2].style["visibility"]="hidden";
        }
        else{
            age.style.borderColor="red";
            document.querySelectorAll("span")[2].style["visibility"]="visible";
        }
            
    }
    var add=document.forms["form"]["address"];
    add.onblur=function(event){
        checkAdd();
    };

    function checkAdd(){
        var str=trimAll(add.value);
        var patt=/[0-9]+[A-z]+/;
        if(patt.test(str)){
            add.style.borderColor="white";
            document.querySelectorAll("span")[3].style["visibility"]="hidden";
        }
        else{
            add.style.borderColor="red";
            document.querySelectorAll("span")[3].style["visibility"]="visible";
        }
            
    }
    
    var code=document.forms["form"]["code"];
    code.onblur=function(event){
        checkCode();
    };
    function checkCode(){
        var str=trim(code.value);
        var patt=/[A-z][0-9][A-z][\s][0-9][A-z][0-9]/;
        if(patt.test(str)){
            code.style.borderColor="white";
            document.querySelectorAll("span")[4].style["visibility"]="hidden";
        }
        else{
            code.style.borderColor="red";
            document.querySelectorAll("span")[4].style["visibility"]="visible";
        }
            
    }
    var pro=document.forms["form"]["province"];
    pro.onblur=function(event){
        checkPro();
    };
    function checkPro(){
        if(pro.value=="select"){
            pro.style.borderColor="red";
            document.querySelectorAll("span")[5].style["visibility"]="visible";
        }
        else{
            pro.style.borderColor="white";
            document.querySelectorAll("span")[5].style["visibility"]="hidden";
        }
            
    }
    document.getElementById("reset").onclick=function(event){
        for(i=0;i<5;i++){
            document.forms["form"][i].value="";
        }
            document.forms["form"][5].value="select";
        };
}


