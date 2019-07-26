<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("HomeLogic","homeLogic");
    }
    public function index()
    {
        $salida['titulo'] = "ToDoList";
        $salida['centro'] = "Home/centro";
        $this->load->view("Home/index",$salida);
    }
    public function addListToDo(){
        $insert = $this->homeLogic->insertToDo($_POST);
        echo json_encode($insert);
    }
    public function getListTodo(){
        $get = $this->homeLogic->getToDo($_POST);
        echo json_encode($get);
    }
    public function finishToDo(){
        $finish = $this->homeLogic->finishToDo($_POST);
        echo json_encode($finish);
    }
    public function deleteToDo(){
        $delete = $this->homeLogic->deleteToDo($_POST);
        echo json_encode($delete);
    }
    public function updateToDo(){
        $update = $this->homeLogic->updateToDo($_POST);
        echo json_encode($update);
    }
}
