<?php
    
    $h = new Helper();
    $msg = '';
    $username = '';
    $password = '';

    if (isset($_POST['submit']))
    {        
        $username = $_POST['username'];
        $password = $_POST['password'];


        if ($h->isEmpty(array($username, $password)))
        {
            $msg = 'All fields are required';     
        }
        else
        {
            $admin = new Admin($username);

            if (!$admin->isValidLogin($password))
            {
                $msg = "Invalid Username or Password";
            }
            else
            {
                $_SESSION['username'] = $username;
                $_SESSION['is_admin'] = true;
                header("Location: write.php");                
            }
        }
            
    }
