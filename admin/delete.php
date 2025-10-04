<?php

$conn = mysqli_connect('localhost', 'root', '', 'fitzone');

if (isset($_GET['title'])) {
    $title = mysqli_real_escape_string($conn, $_GET['title']);

    $sql = "DELETE FROM `blogs` WHERE title='$title'";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        header(   "Location: admin.php");
        exit(); 
    }
}else {
    echo "No ID provided for deletion.";
}

$conn->close();
?>

<!-- *************************************blogdelete************ -->


<?php

$conn = mysqli_connect('localhost', 'root', '', 'fitzone');

if (isset($_GET['Productname'])) {
    $pname = mysqli_real_escape_string($conn, $_GET['Productname']);

    $sql = "DELETE FROM `product` WHERE Productname='$pname'";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        header(   "Location:admin.php");
        exit(); 
    }
}else {
    echo "No ID provided for deletion.";
}

$conn->close();
?>


<!-- *************************************productdelete************ -->

<?php

$conn = mysqli_connect('localhost', 'root', '', 'fitzone');

if (isset($_GET['name'])) {
    $name = mysqli_real_escape_string($conn, $_GET['name']);

    $sql = "DELETE FROM `signup` WHERE name='$name'";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        header("Location:admin.php");
        exit(); 
    }
} else {
    echo "No ID provided for deletion.";
}

$conn->close();
?>

<!-- *************************************userdelete************ -->

<?php

$conn = mysqli_connect('localhost', 'root', '', 'fitzone');

if (isset($_GET['Email'])) {
    $Email = mysqli_real_escape_string($conn, $_GET['Email']);

    $sql = "DELETE FROM `membership` WHERE Email='$Email'";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        header("Location:admin.php");
        exit(); 
    }
} else {
    echo "No membership provided for deletion.";
}

$conn->close();
?>

<!-- *************************************memeberdelete************ -->