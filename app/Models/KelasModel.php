<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
	protected $table = 'tbl_kelas';
	protected $primaryKey = 'id_kelas';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['nama_kelas','status_kelas'];
	
	protected $useTimestamps = false;
	
    protected $skipValidation  = false;
	
	public function selectall()
	{	$kelas = new KelasModel();
		$data = $kelas->findAll();
		return $data;
	}
	public function selectwhere($id)
	{	$kelas = new KelasModel();
		$data = $kelas->find($id);
		return $data;
	}
	public function insertData($data)
	{
		$kelas = new KelasModel();
		
		if ($kelas->insert($data)) {
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
		$kelas = new KelasModel();
		$update = $kelas->update($id,$data);
		
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
		$kelas = new KelasModel();
		$delete= $kelas->delete($id);
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
	public function selectkelasactive(){
		$db = db_connect();
		$sql = "SELECT * FROM tbl_kelas where status_kelas = ?";
		$data = $db->query($sql,'1')->getResultArray();;
		return $data;
	}
	
}