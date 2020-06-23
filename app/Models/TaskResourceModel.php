<?php
namespace AHT\Models;

use AHT\Core\ResourceModel as CoreResourceModel;

class TaskResourceModel extends CoreResourceModel
{
    protected $tableName;
    public function __construct()
    {
        $this->__init("tasks");
    }
}
