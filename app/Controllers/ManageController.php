<?php

namespace App\Controllers;
use App\Models\UserModel;
class ManageController extends BaseController
{
    
    public function index()
    {
                        $data['title'] = 'Manage';
                        $data['nav_url'] = 'Manage';

                    $data['content_scripts'][] = '/js/manage_kelas/index.js';
                    $data['manage'] = $this->manage->selectall();
                    $data['kelas'] = $this->kelas->selectkelasactive();
                    $data['siswa'] = $this->siswa->selectall();
                    
                return view('templates/header')
                        . view('templates/topbar', $data)
                        . view('Manage_Kelas/index', $data)
                        . view('templates/footer');
    }


    public function createsave()
    {       
        if(!$this->validate([
            'idsiswa' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'idkelas' => [
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
                    'erroridsiswa' => $validation->getError('idkelas'),
                    'erroridkelas' => $validation->getError('idkelas'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'id_siswa' => $this->request->getVar('idsiswa'),
            'id_kelas' => $this->request->getVar('idkelas'),
        );

        $insert = $this->manage->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/manage'
            ]
            ];
        return json_encode($msg);}
    }
    public function editdata(){
        $kode=$this->request->getVar('id');
        $data = $this->manage->selectwhere($kode);
         return json_encode($data);
    }
    public function editsave()
    {
        if(!$this->validate([
            'idsiswa' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'idkelas' => [
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
                    'erroridsiswa' => $validation->getError('idsiswa'),
                    'erroridkelas' => $validation->getError('idkelas'),
                ]
                ];
            return json_encode($msg);
        }
        else{
            $id = $this->request->getVar('id');
        $data = array(
            'id_siswa' => $this->request->getVar('idsiswa'),
            'id_kelas' => $this->request->getVar('idkelas'),
        );
       
       $update = $this->manage->updateData($id, $data);
       $msg =['sukses' =>[
            'url' => '/siswa'
        ]];
    return json_encode($msg);}
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $delete = $this->manage->deleteData($id);
        return json_encode($delete);
    }
    

}