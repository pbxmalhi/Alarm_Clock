<?php

use LDAP\Result;

class alarm
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "alarm";
    private $connect;


    // Creating a connection to the database
    public function __construct()
    {
        $this->connect = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            echo "Connection Failed";
        } else {
            return $this->connect;
        }
    }


    // Adding Alarm Data to the database.
    public function getAlarmData($post)
    {
        $time = $this->connect->real_escape_string($_POST['time']);
        $label = $this->connect->real_escape_string($_POST['label']);
        $repType = $this->connect->real_escape_string($_POST['repType']);
        $query = "insert into alarms(time, label, reptype) values('$time', '$label', '$repType')";
        $result = $this->connect->query($query);
        if ($result) {
?>
            <script>
                alert("Alarm Added Successfully");
            </script>
<?php
        }
    }


    // Showing Alarms in the viewAlarm page in a table.
    public function showAlarms()
    {
        $results_per_page = 6;
        $query = "select * from alarms";
        $result = $this->connect->query($query);
        if ($result) {
            $data = array();
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $page_first_result = ($page - 1) * $results_per_page;

            //retrieve the selected results from database   
            $query = "select * FROM alarms limit " . $page_first_result . ',' . $results_per_page;
            $result = $this->connect->query($query);
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    // Getting the number of total pages
    public function getPages()
    {
        $results_per_page = 6;
        $query = "select * from alarms";
        $result = $this->connect->query($query);
        if ($result) {
            $number_of_result = mysqli_num_rows($result);
            $number_of_page = ceil($number_of_result / $results_per_page);
            return $number_of_page;
        }
    }


    // Deleting Alarm's data form the database.
    public function deleteAlarm($id)
    {
        $query = "delete from alarms where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
            header("location:viewAlarms.php");
        }
    }


    // Showing the data in the feild that we want to edit
    public function getEditableAlarm($id)
    {
        $query = "select * from alarms where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    //  Editing Alarm's Data and updating in the database
    public function updateAlarm($id)
    {
        $time = $this->connect->real_escape_string($_POST['time']);
        $label = $this->connect->real_escape_string($_POST['label']);
        $repType = $this->connect->real_escape_string($_POST['repType']);
        $query = "update alarms set time = '$time', label='$label', reptype='$repType' where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
            header("location:viewAlarms.php");
        }
    }


    // Adding Time continent and city details entered by user in database
    public function addTime($post)
    {
        $continent = $this->connect->real_escape_string($_POST['continent']);
        $city = $this->connect->real_escape_string($_POST['city']);
        $query = "insert into time(continent, city) values('$continent', '$city')";
        $result = $this->connect->query($query);
        if ($result) {
            header("location:clock.php");
        }
    }


    // Displaying Time data in table
    public function displayTime()
    {
        $results_per_page = 6;
        $query = "select * from time";
        $result = $this->connect->query($query);
        if ($result) {
            $data = array();
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $page_first_result = ($page - 1) * $results_per_page;

            //retrieve the selected results from database   
            $query = "select * FROM time limit " . $page_first_result . ',' . $results_per_page;
            $result = $this->connect->query($query);
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    // Getting the number of total pages in Time table
    public function gettimePages()
    {
        $results_per_page = 6;
        $query = "select * from time";
        $result = $this->connect->query($query);
        if ($result) {
            $number_of_result = mysqli_num_rows($result);
            $number_of_page = ceil($number_of_result / $results_per_page);
            return $number_of_page;
        }
    }


    // Deleting time data from the database
    public function deleteTime($id)
    {
        $query = "delete from time where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
            header("Location:clock.php");
        }
    }


    // Displaying time data from the database
    public function displayEditTime($id)
    {
        $query = "select * from time where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }


    // Updating time data in the database
    public function updateTime($id)
    {
        $continent = $this->connect->real_escape_string($_POST['continent']);
        $city = $this->connect->real_escape_string($_POST['city']);
        $query = "update time set continent = '$continent', city = '$city' where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
            header("location:clock.php");
        }
    }
}
