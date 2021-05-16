<?php

namespace common\traits;

trait QueryTrait
{

    public $sort = null;

    public $where = [];

    public function execute(&$query)
    {
        $query->execute();
    }

    public function orderBy($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    public function onCondition($condition = [])
    {
        $this->where = $condition;
        return $this;
    }

}