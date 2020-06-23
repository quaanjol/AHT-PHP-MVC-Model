<?php
namespace AHT\Core;

interface IResourceModel
{
    public function __init($table);
    public function add($data);
    public function edit($id, $data);
    public function get($data);
    public function delete($id);
    public function getAll();
}