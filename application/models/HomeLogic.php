<?php
defined('BASEPATH') or exit('No direct script access allowed');
class HomeLogic extends CI_Model
{
    function __construct()
    {
        $this->load->model("HomeDataBase", "homeDB");
    }
    public function insertToDo($data)
    {
        $data_insert = [];
        $salida = [];
        $data_insert["title"] = $data["title"];
        $data_insert["description"] = $data["description"];
        $save = $this->homeDB->insertToDo($data_insert);
        if ($save > 0) {
            $salida["continuar"] = 1;
            $salida["mensaje"] = "Se guardo la nueva tarea";
            $salida["data"] = [];
        } else {
            $salida["continuar"] = 0;
            $salida["mensaje"] = "No se logro guardar la tarea";
            $salida["data"] = [];
        }
        return $salida;
    }
    public function getToDo($data)
    {
        $data = $this->homeDB->getToDo($data);
        if (count($data) > 0) {
            $salida["continuar"] = 1;
            $salida["mensaje"] = "Se encontro informacíon";
            $salida["data"] = $data;
        } else {
            $salida["continuar"] = 0;
            $salida["mensaje"] = "No se encontro información";
            $salida["data"] = [];
        }
        return $salida;
    }
    public function finishToDo($where){
        $set = ["end"=>1];
        $finish = $this->homeDB->updateToDo($set, $where);
        if ($finish > 0) {
            $salida["continuar"] = 1;
            $salida["mensaje"] = "Se finalizo la tarea";
            $salida["data"] = [];
        } else {
            $salida["continuar"] = 0;
            $salida["mensaje"] = "No se finalizo la tarea";
            $salida["data"] = [];
        }
        return $salida;
    }
    public function deleteToDo($where){
        $set = ["removed"=>1];
        $finish = $this->homeDB->updateToDo($set, $where);
        if ($finish > 0) {
            $salida["continuar"] = 1;
            $salida["mensaje"] = "Se elimino la tarea";
            $salida["data"] = [];
        } else {
            $salida["continuar"] = 0;
            $salida["mensaje"] = "No se elimino la tarea";
            $salida["data"] = [];
        }
        return $salida;
    }
    public function updateToDo ($data){
        $where['id'] = $data['id'];
        $set['title'] = $data['title'];
        $set['description'] = $data['description'];
        $finish = $this->homeDB->updateToDo($set, $where);
        if ($finish > 0) {
            $salida["continuar"] = 1;
            $salida["mensaje"] = "Se actualizo la tarea";
            $salida["data"] = [];
        } else {
            $salida["continuar"] = 0;
            $salida["mensaje"] = "No se actualizo la tarea";
            $salida["data"] = [];
        }
        return $salida;
    }
}
