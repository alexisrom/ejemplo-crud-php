<?php

switch ($GET["action"]) {
    case "add":
        $controller = new EmployeeController();
        $controller->add();
        break;
    case label:
        break;
    case label:
        break;
    default:
}

class EmployeeController {
    
    public function add(){
        
        $name = ($_POST["name"]);
        $email = ($_POST["email"]);
        $address = ($_POST["address"]);
        $phone = ($_POST["phone"]);

        require_once 'entity/Employee.php';
        require_once 'model/EmployeeModel.php';

        $emp = new Employee($name, $email, $address, $phone);
        $model = new EmployeeModel();
        $model->add($emp);
    }
    
    public function delete(){}

    public function edit(){}
    


} 


    


?>



