<?php
include("../controller/process.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User 1</title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
    <legend><h4>User-1 Login page</h4></legend>
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" placeholder="Enter Username" name="name"></td>
                <td><span class="error">* <?php echo $nameErr; ?></span></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" placeholder="Enter Email" name="email"></td>
                <td><span class="error">* <?php echo $emailErr; ?></span></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" placeholder="Enter Password" name="password"></td>
                <td><span class="error">* <?php echo $passwordErr; ?></span></td>
            </tr>
            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td><input type="tel" placeholder="Enter Phone Number" name="phone"></td>
                <td><span class="error">* <?php echo $phoneErr; ?></span></td>
            </tr>
            <tr>
                <td>
                    <label for="gender">Gender:</label>
                </td>
                <td>
                    <input type="radio" name="gender" value="Male"<?php echo isset($gender) && $gender=="Male" ?  : ""; ?>>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="Female"<?php echo isset($gender) && $gender=="Female" ?  : ""; ?>>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="Other"<?php echo isset($gender) && $gender=="Other" ?  : ""; ?>>
                    <label for="other">Other</label>
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </fieldset>
</body>
</html>
