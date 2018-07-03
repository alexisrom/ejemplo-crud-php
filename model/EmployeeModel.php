<?php

require_once 'entity/Employee.php';

class EmployeeModel {

    private $employeeList = array();
    private $db, $conn;

    public function __construct(){
        require_once 'ConnectionFactory.php';
        $this->conn = new ConnectionFactory();
        $this->db = $this->conn->getConnection();
    }

    public function add($emp){
        // prepare and bind
        $stmt = $db->prepare("INSERT INTO empkloyee (name, email, address, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $address, $phone);

        // set parameters and execute
        $name = $emp->getName();
        $email = $emp->getEmail();
        $address = $emp->getAddress();
        $phone = $emp->getPhone();
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function getAll() {
        return $this->employeeList;
    }

    public function list() {
        $sql = "SELECT * FROM employee";
        
        try {
            $result = $this->db->query($sql);
            if (!$result) {
                throw new Exception(trigger_error('Invalid query: ' . $this->db->error));
            }
            else if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $this->employeeList[] = new Employee ($row["name"], $row["email"], $row["address"], $row["phone"]);
                }
            } else {
                echo "0 RESULTS";
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        } finally {
            $this->db->close();
        }

        return $this->employeeList;
    }

}