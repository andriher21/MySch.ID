<?php

namespace App\Models;

use CodeIgniter\Model;

class ManagemenSiswaModel extends Model
{
	protected $table = 'tbl_anggota_kelas';
	protected $primaryKey = 'id_anggota';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['id_kelas','id_siswa'];
	
	protected $useTimestamps = false;
	
    protected $skipValidation  = false;
	
	public function selectall()
	{	$managemen = new ManagemenSiswaModel();
		$data = $managemen->select('tbl_anggota_kelas.id_anggota,tbl_siswa.nama_siswa, tbl_siswa.email,
		tbl_kelas.nama_kelas')
		->join('tbl_siswa', 'tbl_anggota_kelas.id_siswa = tbl_siswa.id_siswa ', 'left')
		->join('tbl_kelas', 'tbl_anggota_kelas.id_kelas = tbl_kelas.id_kelas ', 'left')
		->get()->getResultArray();
		return $data;
	}
	public function selectwhere($id)
	{	$managemen = new ManagemenSiswaModel();
		$data = $managemen->find($id);
		return $data;
	}
	public function insertData($data)
	{
		$managemen = new ManagemenSiswaModel();
		
		if ($managemen->insert($data)) {
			return ([
			    'status'=> 0,
                'message'=>'new  data created',
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to create new data']);
		}
	}
	
	public function updateData($id,$data)
	{
		$managemen = new ManagemenSiswaModel();
		$update = $managemen->update($id,$data);
		
		if ($update) {
			return ([
			    'status'=> 0,
                'message'=>'update  done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to update data']);
		}
	}
	
	public function deleteData($id)
	{
		$managemen = new ManagemenSiswaModel();
		$delete= $managemen->delete($id);
			if ($delete) {
			return ([
			    'status'=> 0,
                'message'=>'delete data done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to delete data']);
		}
	}
	
	
}