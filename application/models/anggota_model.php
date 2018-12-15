<?php

class anggota_model extends CI_Model
{
    public function getAutoIdAnggota()
    {
        
        $sSQL = "select * from mudamudi order by id_anggota desc limit 1";
        $dsAnggotaId = $this->db->query($sSQL)->row();
        return $dsAnggotaId;
    }    

    public function SaveAnggota($table, $paramInput)
    {
        $act = $this->db->insert($table,$paramInput);
        return $act;
    }

}

?>