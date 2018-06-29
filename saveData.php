<?php
session_start();
$_SESSION['items']=array($_SESSION['firstName'],$_SESSION['lastName'],$_SESSION['age'],$_SESSION['add'],$_SESSION['code'],$_SESSION['pro']);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Save Data</title>
</head>
<body>
    <h2>Your informations:</h2>
        <table>
            <tr>
                <td>First Name: </td>
                <td><?php echo $_SESSION['firstName']; ?></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><?php echo $_SESSION['lastName']; ?></td>
            </tr>
            <tr>
                <td>Age: </td>
                <td><?php echo $_SESSION['age']; ?></td>
            </tr>
            <tr>
                <td>Street Address: </td>
                <td><?php echo $_SESSION['add']; ?></td>
            </tr>
            <tr>
                <td>Postal Code: </td>
                <td><?php echo $_SESSION['code']; ?></td>
            </tr>
            <tr>
                <td>Province: </td>
                <td><?php echo $_SESSION['pro']; ?></td>
            </tr>
        </table>
        <p>If you want to save your information in a txt file,plesase click the "save" button.
            <a href='success.php'><button type='button'>Save</button></a>
        </p>
               
</body>
</html>


