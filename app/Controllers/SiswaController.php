<?php

namespace App\Controllers;
use App\Models\UserModel;
class SiswaController extends BaseController
{
    
    public function index()
    {
         $data['title'] = 'Siswa';
          $data['nav_url'] = 'Siswa';

        $data['content_scripts'][] = '/js/siswa/index.js';
        $data['siswa'] = $this->siswa->selectall();
                    
        return view('templates/header')
                . view('templates/topbar', $data)
                . view('Siswa/index', $data)
                 . view('templates/footer');
              
    }


    public function createsave()
    {       
        if(!$this->validate([
            'name' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'nisn' => [
                'rules'=>'required|is_unique[tbl_siswa.nisn]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
            'email' => [
                'rules'=>'required|valid_email',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} tidak valid',
                ]
            ],
            'telephone' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tempatlahir' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tgllahir' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'jeniskelamin' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'agama' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'alamat' => [
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
                    'errorname' => $validation->getError('name'),
                    'errornisn' => $validation->getError('nisn'),
                    'erroremail' => $validation->getError('email'),
                    'errortelephone' => $validation->getError('telephone'),
                    'errortempatlahir' => $validation->getError('tempatlahir'),
                    'errortgllahir' => $validation->getError('tgllahir'),
                    'errorjeniskelamin' => $validation->getError('jeniskelamin'),
                    'erroragama' => $validation->getError('agama'),
                    'erroralamat' => $validation->getError('alamat'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'nisn' => $this->request->getVar('nisn'),
            'nama_siswa' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'tempat_lahir' => $this->request->getVar('tempatlahir'),
            'tanggal_lahir' => $this->request->getVar('tgllahir'),
            'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
        );

        $insert = $this->siswa->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/siswa'
            ]
            ];
        return json_encode($msg);}
    }
    public function editdata(){
        $kode=$this->request->getVar('id');
        $data = $this->siswa->selectwhere($kode);
         return json_encode($data);
    }
    public function editsave()
    {
        if(!$this->validate([
            'name' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'nisn' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'email' => [
                'rules'=>'required|valid_email',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} tidak valid',
                ]
            ],
            'telephone' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tempatlahir' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tgllahir' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'jeniskelamin' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'agama' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'alamat' => [
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
                    'errorname' => $validation->getError('name'),
                    'errornisn' => $validation->getError('nisn'),
                    'erroremail' => $validation->getError('email'),
                    'errortelephone' => $validation->getError('telephone'),
                    'errortempatlahir' => $validation->getError('tempatlahir'),
                    'errortgllahir' => $validation->getError('tgllahir'),
                    'errorjeniskelamin' => $validation->getError('jeniskelamin'),
                    'erroragama' => $validation->getError('agama'),
                    'erroralamat' => $validation->getError('alamat'),
                ]
                ];
            return json_encode($msg);
        }
        else{
            $id = $this->request->getVar('id');
        $data = array(
            'nisn' => $this->request->getVar('nisn'),
            'nama_siswa' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'tempat_lahir' => $this->request->getVar('tempatlahir'),
            'tanggal_lahir' => $this->request->getVar('tgllahir'),
            'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
        );
       
       $update = $this->siswa->updateData($id, $data);
       $msg =['sukses' =>[
            'url' => '/siswa'
        ]];
    return json_encode($msg);}
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $delete = $this->siswa->deleteData($id);
        return json_encode($delete);
    }
  


}