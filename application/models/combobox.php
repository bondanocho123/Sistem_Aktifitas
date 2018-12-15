<?php
class combobox extends CI_Model
{
    function getDapukan(){
		$sSQL = "SELECT id, ket FROM dapukan WHERE id= 'DP004'
					UNION DISTINCT
					SELECT id, ket FROM dapukan";
		$cbb = $this->db->query($sSQL);
		foreach ($cbb->result() as $row) {
			$dapukan[$row->id] = $row->ket;
		}
		return $dapukan;
	}

    public function getDesa()
    {
        $sSQL = "SELECT id, desa FROM desa";
		$cbb = $this->db->query($sSQL);
		foreach ($cbb->result() as $row) {
			$desa[$row->id] = $row->desa;
		}
		return $desa;

    }

    public function getKelompok()
    {
        $sSQL = "SELECT id, ket FROM kelompok";
		$cbb = $this->db->query($sSQL);
		foreach ($cbb->result() as $row) {
			$klp[$row->id] = $row->ket;
		}
		return $klp;

	}
	
	public function getKelompokWhereDesa($where)
	{

		$sSQL = "SELECT * FROM Kelompok WHERE id_desa='".$where."'";
		$cbb = $this->db->query($sSQL);
		foreach ($cbb->result() as $row) {
			$klp[$row->id] = $row->ket;
		}
		return $klp;
	}
}

?>