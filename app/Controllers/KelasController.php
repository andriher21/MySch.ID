<?php

namespace App\Controllers;
use App\Models\UserModel;
class KelasController extends BaseController
{
    
    public function index()
    {
        
                        $data['title'] = 'Kelas';
                        $data['nav_url'] = 'Kelas';

                    $data['content_scripts'][] = '/js/kelas/index.js';
                    $data['kelas'] = $this->kelas->selectall();
                    
                return view('templates/header')
                        . view('templates/topbar', $data)
                        . view('Kelas/index', $data)
                        . view('templates/footer');
    }

    public function createsave()
    {       
        if(!$this->validate([
            'kelas' => [
                'rules'=>'required|is_unique[tbl_kelas.nama_kelas]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
            'status' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ])){
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorkelas' => $validation->getError('kelas'),
                    'errorstatus' => $validation->getError('status'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'nama_kelas' => $this->request->getVar('kelas'),
            'status_kelas' => $this->request->getVar('status'),
        );

        $insert = $this->kelas->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/kelas'
            ]
            ];
        return json_encode($msg);}
    }
    public function editdata(){
        $kode=$this->request->getVar('id');
        $data = $this->kelas->selectwhere($kode);
         return json_encode($data);
    }
    public function editsave()
    {
        if(!$this->validate([
            'kelas' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'status' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ])){
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorkelas' => $validation->getError('kelas'),
                    'errorstatus' => $validation->getError('status'),
                ]
                ];
            return json_encode($msg);
        }
        else{
            $id = $this->request->getVar('id');
        $data = array(
            'nama_kelas' => $this->request->getVar('kelas'),
            'status_kelas' => $this->request->getVar('status'),
        );
       
       $update = $this->kelas->updateData($id, $data);
       $msg =['sukses' =>[
            'url' => '/kelas'
        ]];
    return json_encode($msg);}
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $delete = $this->kelas->deleteData($id);
        return json_encode($delete);
    }
 


}