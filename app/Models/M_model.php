<?php
namespace App\Models;
use CodeIgniter\Model;
class M_model extends model
{

	public function tampil ($table)
	{
		return $this->db->table($table)->get()->getResult();
	}
	
	// public function tampil($table)
	// {
	// 	return $this->db->table($table)
	// 					->orderBy('created_at', 'desc')
	// 					->get()
	// 					->getResult();
	// }

	public function tampilOrderBy ($table, $column)
	{
		return $this->db->table($table)->orderBy($column, 'DESC')->get()->getResult();
	}

	// public function filter4 ($table,$awal,$akhir)
	// {
	// 	return $this->db->query(
	// 		"SELECT *
	// 		FROM ".$table."
	// 		join dta_departement
	// 		on ".$table.".id_departement=dta_departement.id_departement
	// 		WHERE ".$table.".tanggal_jabatan
	// 		BETWEEN '".$awal."'
	// 		and '".$akhir."'"

	// 	)->getResult();
	// }

public function filter4($table, $awal, $akhir) {
    return $this->db->query(
        "SELECT *
        FROM ".$table."
        JOIN barang ON ".$table.".id_barang=barang.id_barang
        JOIN user ON ".$table.".maker_masuk=user.id_user
        WHERE ".$table.".tanggal_masuk
        BETWEEN '".$awal."'
        AND '".$akhir."'"
    )->getResult();
}

public function filter_bk($table, $awal, $akhir) {
    return $this->db->query(
        "SELECT *
        FROM ".$table."
        JOIN barang ON ".$table.".id_barang=barang.id_barang
        JOIN user ON ".$table.".maker_keluar=user.id_user
        WHERE ".$table.".tanggal_keluar
        BETWEEN '".$awal."'
        AND '".$akhir."'"
    )->getResult();
}

	// public function filter3 ($table,$table2,$awal,$akhir)
	// {
	// 	return $this->db->query(
	// 		"SELECT *
	// 		FROM ".$table."
	// 		join dta_jabatan
	// 		on ".$table.".id_jabatan=dta_jabatan.id_jabatan
	// 		WHERE ".$table.".tanggal_karyawan
	// 		BETWEEN '".$awal."'
	// 		and '".$akhir."'"

	// 	)->getResult();
	// }

public function filter5($table, $awal, $akhir) {
    return $this->db->query(
        "SELECT *
        FROM ".$table."
        JOIN barang ON ".$table.".id_barang=barang.id_barang
        JOIN user ON ".$table.".maker_keluar=user.id_user
        WHERE ".$table.".tanggal_keluar
        BETWEEN '".$awal."'
        AND '".$akhir."'"
    )->getResult();
}

public function filter3($table, $awal, $akhir) {
    return $this->db->query(
        "SELECT *
        FROM ".$table."
        JOIN dta_jabatan ON ".$table.".id_jabatan=dta_jabatan.id_jabatan
        JOIN dta_departement ON ".$table.".id_departement=dta_departement.id_departement
        JOIN user ON ".$table.".maker=user.id_user
        WHERE ".$table.".tanggal_karyawan
        BETWEEN '".$awal."'
        AND '".$akhir."'"
    )->getResult();
}


	public function tes ($table)
	{
		return $this->db->query("
			SELECT *
			FROM ".$table."
			ORDER BY kode DESC
		    ")->getRow();
	}

	public function kodeJabatan ()
	{
		return $this->db->query("
			SELECT *
			FROM dta_jabatan
			ORDER BY kode_jabatan DESC
		    ")->getRow();
	}

	// public function filter ($table, $awal,$akhir)
	// {
	// 	return $this->db->table($table)->getWhere($where)->getResult();

	// 	return $this->db->query("
	// 	    SELECT *
	// 	    FROM ".$table."
	// 	    WHERE ".$table.".tanggal
	// 	    BETWEEN '".$awal."'
	// 	    AND '".$akhir."'
	// 	")->getResult();
	// }

// public function filter ($table, $awal,$akhir)
// 	{
// 		$sql = "SELECT *
//         FROM $table
//         WHERE tanggal BETWEEN ? AND ?";
// 		$query = $this->db->query($sql, array($awal, $akhir));
// 		$result = $query->getResult();
// 		return $result;
// 	}

	// public function filter ($table,$awal,$akhir)
	// {

	// 	return $this->db->query(
	// 		"SELECT *
	// 		FROM ".$table."
	// 		join user
	// 		on ".$table.".maker_barang=user.id_user
	// 		WHERE ".$table.".tanggal_barang
	// 		BETWEEN '".$awal."'
	// 		and '".$akhir."'"

	// 	)->getResult();
	// }

	public function filter_b ($table,$awal,$akhir)
	{
		return $this->db->query("
			SELECT *
			FROM ".$table."
			join user
			on ".$table.".maker_barang=user.id_user
			WHERE ".$table.".tanggal_benda
			BETWEEN '".$awal."'
			and '".$akhir."'"

		    )->getResult();
	}

	public function filter_f ($table,$awal,$akhir)
	{
		return $this->db->query("
			SELECT *
			FROM ".$table."
			join karyawan
			on ".$table.".id_user=karyawan.id_user
			join barang
			on ".$table.".id_brg=barang.id_brg
			WHERE ".$table.".tanggal
			BETWEEN '".$awal."'
			and '".$akhir."'"

		    )->getResult();
	}

	public function hapus($table, $where)
	{
		return $this->db->table($table)->delete($where);
	}

	public function simpan($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}

	public function getWhere($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getResult();
	}

	public function getRow($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}

	public function edit_pp($table, $where2)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}

	public function edit_resep($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
	}

	public function edit_penjualan($table1, $table2, $on,$where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function edit_pendaftaran($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->getWhere($where)->getRow();
	}

	public function getarray($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}

	public function edit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}

	public function fusion($table1, $table2, $on)
	{
		return $this->db->table($table1)->join($table2, $on)->get()->getResult();
	}

	public function fusionOderBy($table1, $table2, $on, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function fusion_Row($table1, $table2, $on,$where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function fusionleft($table1, $table2, $on)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->get()->getResult();
	}

	public function super($table1, $table2, $table3, $on, $on2)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->get()->getResult();
	}

	public function superOderBy($table1, $table2, $table3, $on, $on2, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function ultra($table1, $table2, $table3, $table4, $on, $on2, $on3)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->get()->getResult();
	}

	public function ultraRow($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->getWhere($where)->getRow();
	}

	public function ultraRows($table1, $table2, $table3,  $on, $on2,  $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
	}

	public function ultraOrderBy($table1, $table2, $table3, $table4, $on, $on2, $on3, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->orderBy($column, 'DESC')->get()->getResult();
	}
	
	public function ultra_bayar($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->getwhere($where)->getResult();
	}

	public function details()
	{
    return $this->db->table('dta_departement')->orderBy('tanggal', 'DESC')->get()->getResult();
	}

	 public function deleteData($data_id)
    {
        return $this->db->table($this->table)->where('id', $data_id)->delete();
    }

 //   public function filter ($table, $awal,$akhir)
	// {
	// 	return $this->db->table($table)->getWhere($where)->getResult();

	// 	return $this->db->query("
	// 	    SELECT *
	// 	    FROM ".$table."
	// 	    WHERE ".$table.".tanggal_perjalanan
	// 	    BETWEEN '".$awal."'
	// 	    AND '".$akhir."'
	// 	")->getResult();
	// }

	// public function filter($table1, $table2, $on, $awal, $akhir)
	// {
	//  return $this->db->table($table1)
 //        ->join($table2, $on, 'left')
 //        ->where('tgl_byr >=', $awal)
 //        ->where('tgl_byr <=', $akhir)
 //        ->get()
 //        ->getResult();
	// }

	public function filter($table, $awal, $akhir)
	{
    return $this->db->table($table)
        ->where('tanggal_penjualan >=', $awal)
        ->where('tanggal_penjualan <=', $akhir)
        ->get()
        ->getResult();
	}
	
	public function detail_penjualan($id)
	{
    return $this->db->table('detail_penjualan')
        ->join('penjualan', 'penjualan.id_penjualan=detail_penjualan.id_penjualan')
        ->join('produk', 'produk.id_produk=detail_penjualan.id_produk')
		->where('detail_penjualan.id_penjualan =', $id)
        ->get()
        ->getResult();
	}


}