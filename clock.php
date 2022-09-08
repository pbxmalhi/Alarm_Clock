<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

include("mainClass.php");
$ob = new alarm();
if (isset($_REQUEST['did'])) {
    $id = $_REQUEST['did'];
    $ob->deleteTime($id);
}

?>
<script>
    setTimeout(function() {
        window.location.reload();
    }, 1000);
</script>

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
                <p class="heading"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;Clocks</p>
                <div class="tablecontainer">
                    <table border="1" width="100%" class="clockTable">
                        <tr>
                            <th>Locality</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        <?php
                        $times = $ob->displayTime();
                        foreach ($times as $time) {

                        ?>
                            <tr>
                                <td><?php echo $time['city'] ?></td>
                                <td>

                                    <?php
                                    $dt = Carbon::now($time['city'])->format('g:i:s A');
                                    echo $dt;
                                    // echo $dt->format('Y-m-d');
                                    ?>
                                </td>
                                <td><?php
                                    $dt = Carbon::now($time['city']);
                                    // echo $dt;
                                    echo $dt->format('d-m-Y');
                                    ?>
                                </td>
                                <td><button class="delete"><a href="./clock.php?did=<?php echo $time['id'] ?>"><i class="fa-regular fa-square-minus"></i>Delete</a></button></td>
                                <td><button class="edit"><a href="./addtime.php?eid=<?php echo $time['id'] ?>"><i class="fa-regular fa-pen-to-square"></i>Edit</a></button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <?php
                    $number_of_page = $ob->gettimePages();
                    echo "<p class='pagename'>Page: </p>";
                    for ($page = 1; $page <= $number_of_page; $page++) {
                        echo '<a class="pageNo" href = "clock.php?page=' . $page . '">' . $page . ' </a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>