<?php
include("mainClass.php");
$ob = new alarm();
if (isset($_REQUEST['save'])) {
    $ob->addTime($_POST);
}
if (isset($_REQUEST['eid'])) {
    $id = $_REQUEST['eid'];
    $edid = $_REQUEST['eid'];
    $time = $ob->displayEditTime($id);
}
if (isset($_REQUEST['edtid'])) {
    $edid = $_REQUEST['edtid'];
}
if (isset($_REQUEST['update']) && isset($_REQUEST['edtid'])) {
    $id = $_REQUEST['editid'];
    $ob->updateTime($id);
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
                <p class="heading">Add Time Zone</p>
                <div class="formcontainer">
                    <form method="POST">
                        <table width="100%" class="alarmTable">
                            <tr>
                                <td colspan="2">
                                    <input hidden type="text" name="editid" id="edit" value="<?php if (isset($edid)) echo $edid ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="tdHeading">Select Continent</td>
                                <td><select name="continent" id="cont" onchange="findmyvalue()">
                                        <?php
                                        $continents = [
                                            'AFRICA', 'AMERICA', 'ANTARCTICA', 'ARCTIC', 'ASIA', 'ATLANTIC', 'AUSTRALIA', 'EUROPE', 'INDIAN', 'PACIFIC'
                                        ];
                                        if (isset($_GET['cid'])) {
                                        ?>
                                            <option value="<?php echo ($_GET['cid']) ?>"><?php echo ($_GET['cid']) ?></option>
                                            <?php
                                            foreach ($continents as $continent) {
                                            ?>
                                                <option value="<?php print_r($continent) ?>"><?php print_r($continent) ?></option>
                                            <?php
                                            }
                                        } else {

                                            ?>

                                            <option value=<?php if (isset($time['continent'])) {
                                                                echo $time['continent'];
                                                            } else {
                                                                echo "";
                                                            } ?>>
                                                <?php if (isset($time['continent'])) {
                                                    echo $time['continent'];
                                                } else {
                                                    echo "Select Continent";
                                                } ?>
                                            </option>
                                            <?php
                                            foreach ($continents as $continent) {
                                            ?>
                                                <option value="<?php print_r($continent) ?>"><?php print_r($continent) ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    if (isset($_REQUEST['eid'])) {

                                    ?>
                                        <script type="text/javascript">
                                            function findmyvalue() {
                                                var myval = document.getElementById("cont").value;
                                                var edit = document.getElementById("edit").value;

                                                window.location.href = "addtime.php?cid=" + myval + "&edtid=" + edit;
                                            }
                                        </script>
                                    <?php
                                    } else {
                                    ?>
                                        <script type="text/javascript">
                                            function findmyvalue() {
                                                var myval = document.getElementById("cont").value;

                                                window.location.href = "addtime.php?cid=" + myval;
                                            }
                                        </script>
                                    <?php
                                    }
                                    ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tdHeading">Select City</td>
                                <td><select name="city" id="cont">
                                        <option value=<?php if (isset($time['city'])) {
                                                            echo $time['city'];
                                                        } else {
                                                            echo "";
                                                        } ?>>
                                            <?php if (isset($time['city'])) {
                                                echo $time['city'];
                                            } else {
                                                echo "Select City";
                                            } ?>
                                        </option>
                                        <?php
                                        if (isset($time['city'])) {
                                            $region = explode("/", $time['city']);
                                            $SelectedContinent = $region[0];
                                            $SelectedContinent = strtoupper($SelectedContinent);
                                        } else {
                                            $SelectedContinent = $_GET['cid'];
                                        }
                                        switch ($SelectedContinent) {
                                            case "AFRICA":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::AFRICA
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                        ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "AMERICA":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::AMERICA
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;

                                            case "ANTARCTICA":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::ANTARCTICA
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "ARCTIC":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::ARCTIC
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "ASIA":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::ASIA
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "ATLANTIC":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::ATLANTIC
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "AUSTRALIA":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::AUSTRALIA
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "EUROPE":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::EUROPE
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "INDIAN":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::INDIAN
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                                <?php
                                                }
                                                break;
                                            case "PACIFIC":
                                                $times =    DateTimeZone::listIdentifiers(
                                                    DateTimeZone::PACIFIC
                                                );
                                                foreach ($times as $time) {
                                                    print_r($time);
                                                ?>
                                                    <option value="<?php print_r($time) ?>"><?php print_r($time) ?></option>
                                        <?php
                                                }
                                                break;
                                        }
                                        ?>
                                    </select></td>

                            </tr>
                            <tr>
                                <td class="tdHeading"><input type="submit" value="Add" name="save"></td>
                                <td>
                                    <input class="updateBtn" type="submit" value="Update" name="update">
                                    <button class="reset"><a href="./addtime.php">Reset</a></button>
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