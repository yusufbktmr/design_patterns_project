<?php


class Db_Model extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('rate_table', $data);
    }

    public function getLastRate()
    {

        $query = $this->db
            ->select('Dolar, Euro, Sterlin')
            ->from('rate_table')
            ->order_by('Id', 'DESC')
            ->limit(1)
            ->get();

        $result = $query->result();
        return $result;
    }
}