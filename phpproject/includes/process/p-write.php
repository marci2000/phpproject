<?php

    $h = new Helper();
    $title = '';
    $post = '';
    $submit = '';
    $msg = '';
    $audience = '';

    if (!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])) {
        $msg = 'You have no permission to write.';
    } else {

        if (isset($_POST['submit']))
        {        
            $title = $_POST['title'];
            $post = $_POST['post'];
            $audience = $_POST['audience'];               

            if ($h->isEmpty(array($title, $post, $audience))){
                $msg = 'All fields are required';     
            } else {
                $msg = $_SESSION['username'];
                $member = new Admin($_SESSION['username']);
                $member->insertIntoPostDB($title, $post, $audience);
                $msg = 'Message saved successfully.';
            }
                
        }


    }

