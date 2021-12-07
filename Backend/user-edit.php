<?php 
    session_start();
    if (isset($_SESSION["admin"])){
        if ($_SESSION["admin"] == 0) {
            header("location: ../index.php");
        }
    }
    else {
        header("location: ../index.php");
    }
?>
<?php
$file_open_users = '../data/users.xml';

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

error_reporting(E_ERROR | E_PARSE); 

if (file_exists($file_open_users)) {
    $users = simplexml_load_file($file_open_users);
    if (isset($_GET['ID'])) {
        $user_id = $_GET['ID'];
        $user_to_load = $users->xpath('/users/user/id_user[.= "'. $user_id. '"]/parent::*')[0];
        //print_r($user_to_load);
    }
    } else {
        exit('Failed to open ');
    }

if(isset($_POST['add'])) //Then we add the user
    {
        debug_to_console("bingbong");
            $choice = $_POST['adminChoice'];
            $isAdmin = ($choice == "Yes") ? 1 : 0;
            $userID = strtoupper(uniqid('GG'));
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname']; //how to get the value
            $password = $_POST['password'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $points = $_POST['points'];
            

            $xml = new DOMDocument("1.0","UTF-8");
            $xml->load("../data/users.xml");
            $rootTag = $xml->getElementsByTagName("users")->item(0);

                $userTag = $xml->createElement("user");
                    $IDTag = $xml->createElement("id_user",$userID);
                    $IDAddTag = $xml->createElement("id_add_user", $userID);
                    $firstNameTag = $xml -> createElement("firstname", $firstname);
                    $lastNameTag = $xml->createElement("lastname",$lastname);
                    $adminTag = $xml->createElement("admin", $isAdmin);
                    $emailTag = $xml->createElement("email",$email);
                    $passwordTag = $xml->createElement("password", $password);
                    $pointsTag = $xml->createElement("points",$points);
                    $addressTag = $xml->createElement("address",$address);
                   
                //format
                $userTag->appendChild($IDTag); 
                $userTag->appendChild($IDAddTag);
                $userTag->appendChild($firstNameTag);
                $userTag->appendChild($lastNameTag);
                $userTag->appendChild($adminTag);
                $userTag->appendChild($emailTag);
                $userTag->appendChild($passwordTag);
                $userTag->appendChild($pointsTag);
                $userTag->appendChild($addressTag);
            $rootTag->appendChild($userTag);
            $xml->save('../data/users.xml');
            header("Location: user-list.php");
        } 
        
else if(isset($_POST['edit']))
        {
            $file_open_users = '../data/users.xml';
            $users = simplexml_load_file($file_open_users);
            foreach($_POST as $key=>$value)
            {
                $user_to_edit_id = $value;
            }
            $user_to_load = $users->xpath('/users/user/id_user[.= "'. $user_to_edit_id. '"]/parent::*')[0];
            
            //EDIT THE VALUES
            $choice = $_POST['adminChoice'];
            $isAdmin = ($choice == "Yes") ? 1 : 0;
            $user_to_load->firstname = $_POST['firstname'];
            $user_to_load->lastname = $_POST['lastname'];
            $user_to_load->admin = $isAdmin;
            $user_to_load->email = $_POST['email'];
            $user_to_load->password = $_POST['password'];
            $user_to_load->points = $_POST['points'];
            $user_to_load->address =  $_POST['address'];
            //EDIT THE VALUES

            $users->saveXML('../data/users.xml');
            header("Location: user-list.php");
        }

function getName(){
    if(isset($_GET['ID']))
    {
        $product_id = $_GET['ID'];
        return "edit value = $product_id";
    }
    else
    {
        return "add";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>backend-concept</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="user-edit.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
    <form method = "POST">
        <div class = "sidebar">
            <img width="300" src="../assets/GGLogo.png" alt="">
           <p id="description-under-user-edit-logo">Add a User or Edit a User</p>
        </div>
        <div class = "right-side">
        
           
            <div class = "med-container" id = "name">
                <label for = "product-name">First Name:</label><br>
                <input type = text name = firstname value=<?php echo $user_to_load->firstname;?>>
            </div>
            <div class = "med-container" id = "name">
                <label for = "product-name">Last Name:</label><br>
                <input type="text" name="lastname" value=<?php echo $user_to_load->lastname;?>>
            </div>
            <div class = "xsml-container">
                <label for = "product-code">Password</label><br>
                <input type="text" name="password" value="<?php echo $user_to_load->password;?>">
            </div>
            <div class = "xsml-container">
                <label for = "product-price">Email</label><br>
                <input type="text" name="email" value=<?php echo $user_to_load->email;?>>
            </div>
            <div class = "sml-container">
                <label for = "product-qty">Address</label><br>
                <input type="text" name="address" value="<?php echo $user_to_load->address;?>">
            </div>
            <div class = "med-container">
                <label for="isDiscount">GG points</label><br>
                <input type="text" name="points" value=<?php echo $user_to_load->points;?>>
            </div>
            <div class = "choice-container">
                <label for="admin-choice">Is Admin?</label><br>
                <input type="radio" name="adminChoice" value="Yes" <?php if($user_to_load->admin == 1) echo 'checked="checked"'?>>
                <label for="yes">Yes</label><br>
                <input type="radio" name="adminChoice" value="No" <?php if($user_to_load->admin == 0) echo 'checked="checked"'?>>
                <label for="yes">No</label><br>
            </div>
            <div class = "button-container">
                <button type="button" id="cancel-button" onclick="location.href='user-list.php'">Cancel</button> 
                <button type="submit" id="save-button" name = <?php echo(getName()) ?>>Save</button> 
            </div>
        </div>
    </form>
    </body>
</html>