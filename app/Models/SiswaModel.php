<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
	protected $table = 'tbl_siswa';
	protected $primaryKey = 'id_siswa';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['nisn','nama_siswa','email','telephone','tempat_lahir','tanggal_lahir',
	'jenis_kelamin','agama','alamat'];
	
	protected $useTimestamps = false;
	
    protected $skipValidation  = false;
	
	public function selectall()
	{	$siswa = new SiswaModel();
		$data = $siswa->findAll();
		return $data;
	}
	public function selectwhere($id)
	{	$siswa = new SiswaModel();
		$data = $siswa->find($id);
		return $data;
	}
	public function insertData($data)
	{
		$siswa = new SiswaModel();
		
		if ($siswa->insert($data)) {
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
		$siswa = new SiswaModel();
		$update = $siswa->update($id,$data);
		
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
		$siswa = new SiswaModel();
		$delete= $siswa->delete($id);
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