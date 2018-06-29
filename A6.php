<?php
 session_start();  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Assignment 5</title>
	<link rel="stylesheet" href="A6.css"/>
        <script type="text/javascript" src="A6.js"></script>
    </head>
    <body>
 
        <h1>Please fill the form</h1>
        <form name="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <p>First Name: <input type="text" name="firstName" value="<?php echo $_POST["firstName"]; ?>"/><span>First Name must be at least two characters</span></p>
            <p>Last Name: <input type="text" name="lastName" value="<?php echo $_POST["lastName"]; ?>"/><span>Last Name must be at least two characters</span></p>
            <p>Age: <input type="text" name="age" value="<?php echo $_POST["age"]; ?>"><span>Age must be a positive number less than 120</span></p>
            <p>Street Address: <input type="text" name="address" value="<?php echo $_POST["address"]; ?>"/><span>Street address must have a number plus a street name</span></p>
            <p>Postal Code: <input type="text" name="code" value="<?php echo $_POST["code"]; ?>"/><span>Postal codes are in the format 'A1A 1A1',where A is a letter and 1 is a digit,with a space separating the third and fourth characters</span></p>
            <p>Province: 
		<select name='province'>
                    <option value='select'<?php if($_POST["province"]=='select') echo 'selected'; ?>>Please select</option>
                    <option value='Alberta' <?php if($_POST["province"]=='Alberta') echo 'selected'; ?>>Alberta</option>
                    <option value='British Columbia' <?php if($_POST["province"]=='British Columbia') echo 'selected'; ?>>British Columbia</option>
                    <option value='Manitoba' <?php if($_POST["province"]=='Manitoba') echo 'selected'; ?>>Manitoba</option>
                    <option value='New Brunswick' <?php if($_POST["province"]=='New Brunswick') echo 'selected'; ?>>New Brunswick</option>
                    <option value='Newfoundland and Labrador' <?php if($_POST["province"]=='Newfoundland and Labrador') echo 'selected'; ?>>Newfoundland and Labrador</option>
                    <option value='Northwest Territories ' <?php if($_POST["province"]=='Northwest Territories') echo 'selected'; ?>>Northwest Territories </option>
                    <option value='Nova Scotia' <?php if($_POST["province"]=='Nova Scotia') echo 'selected'; ?>>Nova Scotia </option>
                    <option value='Nunavut' <?php if($_POST["province"]=='Nunavut') echo 'selected'; ?>>Nunavut</option>
                    <option value='Ontario' <?php if($_POST["province"]=='Ontario') echo 'selected'; ?>>Ontario</option>
                    <option value='Prince Edward Island' <?php if($_POST["province"]=='Prince Edward Island') echo 'selected'; ?>>Prince Edward Island</option>
                    <option value='Quebec' <?php if($_POST["province"]=='Quebec') echo 'selected'; ?>>Quebec</option>
                    <option value='Saskatchewan' <?php if($_POST["province"]=='Saskatchewan') echo 'selected'; ?>>Saskatchewan</option>
                    <option value='Yukon' <?php if($_POST["province"]=='Yukon') echo 'selected'; ?>>Yukon</option>						
		</select>
                <span>Please select your province</span>
            </p>
            <input type='submit' value='Submit'/>
            <input type="button" value="Reset" id="reset"/>
	</form>
        <?php
            $firstName;
            $lastName;
            $age;
            $add;
            $code;
            $pro;
            $err=1;
            if($_SERVER["REQUEST_METHOD"] == "POST"){
		$firstName=str_replace(" ","",$_POST["firstName"]);
		$lastName=str_replace(" ","",$_POST["lastName"]);
                $age=str_replace(" ","",$_POST["age"]);
                $add=str_replace(" ","",$_POST["address"]);
                $code=trim($_POST["code"]);
                $pro=$_POST["province"];

            if(!preg_match("/^[A-Za-z]{2,}$/",$firstName)){
                echo "<script>document.querySelectorAll('span')[0].style['visibility']='visible';</script>";
                $firstName="";
                $err++;
            }
            else{
                $firstName=trim($_POST["firstName"]);
            }
            if(!preg_match("/^[A-Za-z]{2,}$/",$lastName)){
                echo "<script>document.querySelectorAll('span')[1].style['visibility']='visible';</script>";
                $lastName="";
                $err++;
            }
            else{
                $lastName=trim($_POST["lastName"]);
            }
            if(!preg_match("/^[0-9]+$/",$age)){
                echo "<script>document.querySelectorAll('span')[2].style['visibility']='visible';</script>";
                $age="";
                $err++;
            }
            else if(intval($age)<0 ||intval($age)>120){
                echo "<script>document.querySelectorAll('span')[2].style['visibility']='visible';</script>";
                $age=""; 
                $err++;
            }
            if(!preg_match("/[0-9]+[a-zA-Z]+/",$add)){
                echo "<script>document.querySelectorAll('span')[3].style['visibility']='visible';</script>";
                $add="";
                $err++;
            }
            else{
                $add=trim($_POST["address"]);
            }
            if(!preg_match("/[a-zA-Z][0-9][a-zA-Z][\s][0-9][a-zA-Z][0-9]/",$code)){
                echo "<script>document.querySelectorAll('span')[4].style['visibility']='visible';</script>";
                $code="";
                $err++;
            }     
            if($pro=="select"){
                echo "<script>document.querySelectorAll('span')[5].style['visibility']='visible';</script>";
                $pro="";
                $err++;
            }
		else
		   $err--;
            if($err==0){
                $_SESSION['firstName']=$firstName;
                $_SESSION['lastName']=$lastName;
                $_SESSION['age']=$age;
                $_SESSION['add']=$add;
                $_SESSION['code']=$code;
                $_SESSION['pro']=$pro;
                echo "<script>window.location.href='saveData.php'; </script>";
                
            }    
                
            }
            ?>


    </body>
</html>