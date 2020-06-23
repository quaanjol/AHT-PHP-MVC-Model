<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\TaskRepository;

class tasksController extends Controller
{
    function index()
    {
        $tr = new TaskRepository();

        $d['tasks'] = $tr->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (isset($_POST["title"]))
        {
            $tr = new TaskRepository();
            $data = array(
                "title" => $_POST["title"],
                "description" => $_POST["description"],
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            );
            // if ($task->create($_POST["title"], $_POST["description"]))
            // {
            //     header("Location: " . WEBROOT . "tasks/index");
            // }
            if ($tr->add($data)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $tr = new TaskRepository();

        $d["task"] = $tr->get(['id' => $id]);
        // print_r($d["task"]);
        if (isset($_POST["title"]))
        {
            // if ($task->edit($id, $_POST["title"], $_POST["description"]))
            // {
            //     header("Location: " . WEBROOT . "tasks/index");
            // }
            $data = array(
                "title" => $_POST["title"],
                "description" => $_POST["description"],
                "updated_at" => date('Y-m-d H:i:s')
            );

            if ($tr->edit($id, $data)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $tr = new TaskRepository();
        if ($tr->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>