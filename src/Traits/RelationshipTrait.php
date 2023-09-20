<?php

namespace Traits;

trait RelationshipTrait
{
    /** @var $fields string, $entitys array, $joins array, $ons array */
    public function join(string $fields, array $entitys, array $joins, array $ons): RelationshipTrait
    {
        $this->sql = "SELECT {$fields} FROM {$entitys[0]}";
        for ($x = 0; $x < count($joins); $x++) {
            $this->sql .= " {$joins[$x]} {$entitys[$x+1]} ON {$ons[$x]}";
        }
        return $this;
    }

    public function where(array $where=null): array
    {
        $params = "WHERE 1=1";
        if (!empty($where)) {
            foreach ($where as $k => $v) {
                if ($v === null) {
                    $params .= " AND {$k} IS NULL";
                } else {
                    $params .= " AND {$k} = {$v}";
                }
            }
        }
        $this->sql .= " {$params}";
        return $this->read($this->sql)->fetchAll();
    }
}
