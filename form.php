<!DOCTYPE html>
<html>
    <head><title>PHP Form Handling</title></head>
    <body>
    <?php
        if (isset($_POST['sm']))
        print_r($_POST);
    ?>
        <form action = "" method = "post"> 
            Enter Name <BR>
            <input type = "text" name = "studentname" value = "
            <?php
            if (isset($_POST['studentname']))
            echo htmlspecialchars($_POST['studentname']);
            ?>"><BR>
            Favorite Subject(s)<BR>
            <input type = "checkbox" name = "subj[]" value = "EL"
            <?php
            if (isset($_POST['subj']) && in_array('EL',$_POST['subj']))
            echo 'checked';
            ?>
            >English
            <input type = "checkbox" name = "subj[]" value = "MA">Math
            <input type = "checkbox" name = "subj[]" value ="PG">Programming <BR><BR>
            Gender <BR>
            <input type = "radio" name = "gender" value = "M">Male
            <input type = "radio" name = "gender" value = "F">Female
            <BR><BR>
            <input type = "submit" name="sm" value = "Submit Form">
        </form>
        <?php 
        if (isset($_POST['studentname']))
        echo 'You entered '.htmlspecialchars($_POST['studentname']).' into the text field';
        ?>
    </body>
</html>