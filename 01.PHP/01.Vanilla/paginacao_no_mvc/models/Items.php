<?php

class Items extends Model
{
    public function getTotal()
    {
        $sql = "SELECT COUNT(*) as c FROM items";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql["c"];
    }

    public function getList($offset, $limit)
    {
        $array = array();
        $sql = "SELECT * FROM items LIMIT $offset, $limit";
        $sql = $this->db->query($sql);
        $array = $sql->fetchAll();
        return $array;
    }
}
