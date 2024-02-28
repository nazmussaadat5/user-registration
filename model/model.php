<?php
    class register
    {
        function OpenCon()
        {
            $conn = new mysqli("localhost", "root", "", "user1");
            return $conn;
        }
        function InsertUser($conn,$table,$name,$email,$password,$phone,$gender)
        {
            $sql = "INSERT INTO $table (name, email, password,phone,gender) VALUES('$name','$email','$password','$phone','$gender')";
            $result = $conn->query($sql);
            return $result;
        }
    }
?>