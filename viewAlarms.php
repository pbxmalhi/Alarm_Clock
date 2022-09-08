<?php

include("mainClass.php");
$ob = new alarm();
if (isset($_REQUEST['did'])) {
    $id = $_REQUEST['did'];
    $ob->deleteAlarm($id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("./commons/cdnLinks.php")
    ?>
    <title>View Alarms</title>
</head>

<body>
    <div class="mainContainer">
        <?php
        include("./commons/header.php");
        ?>
        <div class="midContainer">

            <div class="sidebarContainer">
                <?php
                include("./commons/sidebar.php");
                ?>
            </div>
            <div class="viewAlarmTable">
                <p class="heading">All Alarm</p>
                <div class="tablecontainer">
                    <table border="1" width="100%" class="alarmsTable">
                        <tr>
                            <th>No.</th>
                            <th>Time</th>
                            <th>Label</th>
                            <th>Repeat Type</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        <?php
                        $alarms = $ob->showAlarms();
                        $index = 1;
                        foreach ($alarms as $alarm) {

                        ?>
                            <tr>
                                <!-- <td><?php echo $index ?></td> -->
                                <td><?php echo $alarm['id'] ?></td>
                                <td><?php echo $alarm['time'] ?></td>
                                <td><?php echo $alarm['label'] ?></td>
                                <td><?php echo $alarm['reptype'] ?></td>
                                <td><button class="delete"><a href="./viewAlarms.php?did=<?php echo $alarm['id'] ?>"><i class="fa-regular fa-square-minus"></i>Delete</a></button></td>
                                <td><button class="edit"><a href="./index.php?eid=<?php echo $alarm['id'] ?>"><i class="fa-regular fa-pen-to-square"></i>Edit</a></button></td>
                            </tr>
                        <?php
                            $index++;
                        }
                        ?>
                    </table>
                    <?php
                    $number_of_page = $ob->getPages();
                    echo "<p class='pagename'>Page: </p>";
                    for ($page = 1; $page <= $number_of_page; $page++) {
                        echo '<a class="pageNo" href = "viewAlarms.php?page=' . $page . '">' . $page . ' </a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>