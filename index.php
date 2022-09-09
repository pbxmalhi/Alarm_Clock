<?php
include("mainClass.php");
$ob = new alarm();
if (isset($_REQUEST['save'])) {
    $ob->getAlarmData($_POST);
}
if (isset($_REQUEST['eid'])) {
    $id = $_REQUEST['eid'];
    $data = $ob->getEditableAlarm($id);
}
if (isset($_REQUEST['update']) && isset($_REQUEST['eid'])) {
    $id = $_REQUEST['eid'];
    $data = $ob->updateAlarm($id);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("./commons/cdnLinks.php")
    ?>
    <title>Alarms</title>
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
            <div class="addAlarm">
                <p class="heading">Set Alarm</p>
                <div class="formcontainer">
                    <!-- Form to get the details of the alarm that user wants to setup -->
                    <form method="POST">
                        <table width="100%" class="alarmTable">
                            <tr>
                                <td class="tdHeading">Select Time : </td>
                                <td><input type="time" name="time" value="<?php if (isset($data['time'])) echo $data['time'] ?>" required></td>
                            </tr>
                            <tr>
                                <td class="tdHeading">Set Label : </td>
                                <td><input type="text" name="label" value="<?php if (isset($data['label'])) echo $data['label'] ?>" placeholder="Wake Up" required></td>
                            </tr>
                            <tr>
                                <td class="tdHeading">Repeat Type : </td>
                                <td><select name="repType">
                                        <option value=<?php if (isset($data['reptype'])) {
                                                            echo $data['reptype'];
                                                        } else {
                                                            echo "Default";
                                                        } ?>>
                                            <?php if (isset($data['reptype'])) {
                                                echo $data['reptype'];
                                            } else {
                                                echo "Select Repeat Type";
                                            } ?>
                                        </option>
                                        <option value="Once">Once</option>
                                        <option value="Weekdays">Weekdays</option>
                                        <option value="Everyday">Everyday</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td class="tdHeading"><input type="submit" value="Save" name="save"></td>
                                <td>
                                    <input class="updateBtn" type="submit" value="Update" name="update">
                                    <input type="reset" value="Reset">
                                </td>
                            </tr>
                        </table>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>