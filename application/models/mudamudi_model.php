<?php

class mudamudi_model extends CI_Model
{
    public function getDataModalMudamudi($where)
    {
        $sSQL = "select * from qry_datamodalanggota where id = '".$where."'";
        $result =  $this->db->query($sSQL)->row();
        return $result;
    }

    public function saveMudamudi($table, $paramInput)
    {
        $act = $this->db->insert($table,$paramInput);
        return $act;
    }
    
    public function updateMudamudi($table, $data, $where)
    {
        $act = $this->db->update($table, $data, $where);
		return $act;
    }

    public function deleteMudamudi($table, $where)
    {
        $act = $this->db->delete($table,$where);
        return $act;
    }

    public function getMudamudiNotApproved()
    {
        $sSQL = "SELECT mm.id, mm.nama, mm.no_telp, mm.alamat, 
                        mm.usia, d.desa, k.ket 
                FROM mudamudi mm INNER JOIN dapukan dpk ON mm.id_dapukan=dpk.id
                INNER JOIN desa d on mm.id_desa=d.id INNER JOIN kelompok k ON mm.id_kelompok=k.id 
                WHERE mm.bit_approve = '1' ORDER BY mm.nama ASC";
        return $this->db->query($sSQL)->result();
    }

    
    public function getMudamudiNotApprove()
    {
        $sSQL = "SELECT mm.id, mm.nama, mm.no_telp, mm.alamat, 
                        mm.usia, d.desa, k.ket 
                FROM mudamudi mm INNER JOIN dapukan dpk ON mm.id_dapukan=dpk.id
                INNER JOIN desa d on mm.id_desa=d.id INNER JOIN kelompok k ON mm.id_kelompok=k.id 
                WHERE mm.bit_approve = '0'  ORDER BY mm.nama ASC";
        return $this->db->query($sSQL)->result();
    }

}

?>