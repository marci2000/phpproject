<?php

    $h = new Helper();
    $msg = '';
    $username = '';
    $password = '';
    $confirm_password = '';


    if (isset($_POST['submit']))
    {        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];               

        if ($h->isEmpty(array($username, $password, $confirm_password))){
            $msg = 'All fields are required';     
        } else if (strlen($password) < 6 || strlen($password) > 100){
            $msg = 'The password should have a length between 8 and 20 characters.';
        } else if (!preg_match("~[a-z]+~", $password) || !preg_match("~[A-Z]+~", $password) || !preg_match("~[0-9]+~", $password)) {
            $msg = 'The password should contain at least one lowercase characte, one uppercase and one digit.';
        } else if ($password != $confirm_password) {
            $msg = 'The password and the confirmation don\'t match!';
        } else {
            $member = new BlogMember($username);
            if ($member->isDuplicateID()) {
                $msg = 'The username should be unique. This username is already in use.';
            } else {
                $member->insertIntoMemberDB($password);
                header("Location: index.php/new=1"); 
            }
        }
            
    }
