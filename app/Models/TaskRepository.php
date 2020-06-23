<?php
namespace AHT\Models;

class TaskRepository
{

    public function getAll()
    {
        $trm = new TaskResourceModel();
        return $trm->getAll();
    }

    public function edit($id, $data)
    {
        $trm = new TaskResourceModel();
        return $trm->edit($id, $data);
    }

    public function get($data)
    {
        $trm = new TaskResourceModel();
        return $trm->get($data);
    }

    public function delete($id)
    {
        $trm = new TaskResourceModel();
        return $trm->delete($id);
    }

    public function add($data)
    {
        $trm = new TaskResourceModel();
        return $trm->add($data);
    }
}