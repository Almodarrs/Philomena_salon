<?php echo "<section id='navigation-bar'>   
            <div class='appointment-container'>
            <a href='javascript:void(0);' class='icon' onclick='myFunction()'>
            <i class='fa fa-bars'></i></a>
                <nav id='navigation-bar'>
                    <ul>" 
?>
<?php 
    // Check whether the sign in user are staff
    if (isset($_SESSION["id"]) ) {
        if ($_SESSION["role"] == "staff" || $_SESSION["role"] == "manager" ) {
            echo "<div id='myLinks'><li><p><a href='dashboard.php'>DASHBOARD</a></p></li>
            <li><p><a href='appointment.php'>APPOINTMENT LIST</a></p></li>
            <li><p><a href='inventory.php'>INVENTORY LIST</a></p></li>
            <li><p><a href='user.php'>USER LIST</a></p></li></div>";
        } else {
            echo "<div id='myLinks'>
            <li><p><a href='./index.php'>HOME</a></p></li>
            <li><p><a href='appointment.php'>APPOINTMENT</a></p></li>
            <li><p><a href='inventory.php'>PRODUCT</a></p></li></div>";
        }
    } else {
        echo "<div id='myLinks'> <li><p><a href='index.php'>HOME</a></p></li>
        <li><p><a href='appointment.php'>APPOINTMENT</a></p></li>
        <li><p><a href='inventory.php'>PRODUCT</a></p></li></div>";
    }
?>

<?php
    if (isset($_SESSION["id"]) && !empty($_SESSION["id"]) || isset($_SESSION["access_token"])) {
        $query = "SELECT * FROM `users` WHERE `userId`=:id";

        $data = $conn->prepare($query);
        $data->bindValue(":id", $_SESSION["id"]);
        $data->execute();

        $currentUser = $data->fetch(PDO::FETCH_ASSOC);
        $id = $_SESSION["id"];
        if ($currentUser["image_path"] != NULL) {
            $image_path = $currentUser['image_path'];
            if ($currentUser["role"] == "staff"||$currentUser["role"] == "manager") {
                echo "<a style='color:black;text-decoration:none;' href='../profile.php?id=$id'><span id='profile_image'><img style='height:auto; max-height:40px; margin-right:-90%;' src='../$image_path'/></span>";
            } else {
                echo "<a style='color:black;text-decoration:none;' href='profile.php?id=$id'><span id='profile_image'><img style='height:auto; max-height:40px; margin-right:-90%; width:40px; height:40px; border-radius:100%;' src='$image_path'/></span>";
            }
        } else {
            if ($currentUser["role"] == "staff"||$currentUser["role"] == "manager") {
                echo "<a style='color:black;text-decoration:none;' href='../profile.php?id=$id'><span id='profile_image'><img id='profile_image_placeholder' style='height:auto; max-height:40px; margin-right:-90%;' src='../images/profile-placeholder.png'/></span>";
            } else {
                echo "<a style='color:black;text-decoration:none;' href='profile.php?id=$id'><span id='profile_image'><img id='profile_image_placeholder' style='height:auto; max-height:40px; margin-right:-90%;' src='images/profile-placeholder.png'/></span>";
            }
        }
        echo '<br><span style="margin-right:-90%;">'.$_SESSION["name"].'</span></a>';
    }
?>
                        
<?php 
    if (isset($_SESSION["access_token"])) {
        if ($_SESSION["role"] == "staff"||$_SESSION["role"] == "manager") {
            echo '<div id="myLink"><li id="logout-button"><p><a id="logout-nav-btn" href="../logout.php">LOG OUT</a></p></li></div>';
        } else {
            echo '<div id="myLink"><li id="logout-button"><p><a id="logout-nav-btn" href="../logout.php">LOG OUT</a></p></li> </div>';
        }
    } else {
        if (!isset($_SESSION["id"])) {
            echo '<div id="myLink"><li id="login-button" ><p><a id="login-nav-btn" href="login.php">LOG IN</a></p></li></div>';
        } else {
            if ($_SESSION["role"] == "staff" || $_SESSION["role"] == "manager") {
                echo '<div id="myLink"><li id="logout-button"><p><a id="logout-nav-btn" href="../logout.php">LOG OUT</a></p></li></div>';
            } else {
                echo '<div id="myLink"><li id="logout-button"><p><a id="logout-nav-btn" href="./logout.php">LOG OUT</a></p></li></div>';
            }
        }
    }
?>

<?php 
    echo "</ul>
            </nav>
        </div>
    </section>"
?>
