<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\IdentitasModel;
use App\Models\PendataanModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\PendaftarModel;

class Identitas extends BaseController
{


    protected $identitasModel;
    protected $pendataanModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->pendaftarModel = new PendaftarModel();
        $this->identitasModel = new IdentitasModel();
        $this->pendataanModel = new PendataanModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
    }
    public function identitas()
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [

            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'logo' => $logo,


        ];
        return view('admin/identitas/identitas', $data);
    }
    public function edit($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $identitas = $this->identitasModel->find($id);
        $data = [
            'title' => 'Edit Identitas',
            'identitas' => $identitas,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/identitas/editidentitas', $data);
    }
    public function update($id)
    {
        
        if (!$this->validate([
// 		uploaded[gambar]|
			'gambar' => [
				'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			],
			'gambar2' => [
				'rules' => 'mime_in[gambar2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar2,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 

        $nama_desa = $this->request->getPost('nama_desa');
        $kode_desa = $this->request->getPost('kode_desa');
        $kode_pos = $this->request->getPost('kode_pos');
        $nama_kepala_desa = $this->request->getPost('nama_kepala_desa');
        $nip_kepala_desa = $this->request->getPost('nip_kepala_desa');
        $alamat_kantor = $this->request->getPost('alamat_kantor');
        $email_desa = $this->request->getPost('email_desa');
        $telepon = $this->request->getPost('telepon');
        $website = $this->request->getPost('website');
        $nama_kecamatan = $this->request->getPost('nama_kecamatan');
        $kode_kecamatan = $this->request->getPost('kode_kecamatan');
        $nama_kepala_camat = $this->request->getPost('nama_kepala_camat');
        $nip_kepala_camat = $this->request->getPost('nip_kepala_camat');
        $nama_kabupaten = $this->request->getPost('nama_kabupaten');
        $kode_kabupaten = $this->request->getPost('kode_kabupaten');
        $nama_propinsi = $this->request->getPost('nama_propinsi');
        $kode_propinsi = $this->request->getPost('kode_propinsi');
        $kddesa = $this->request->getPost('kddesa');
        
        

        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {

            $namagambar = $this->request->getPost('namalama');
        } else {
            if ($this->request->getPost('namalama') == "") {
                $namagambar_temp = $gambar->getName();
                $gambar->move('public/admin/images/identitas/', $namagambar_temp);
            } else {
                $namagambar_temp = $gambar->getRandomName();
                // dd($namagambar_temp);
                $gambar->move('public/admin/images/identitas/', $namagambar_temp);
                unlink('public/admin/images/identitas/' . $this->request->getPost('namalama'));
            }
        }

        $gambar2 = $this->request->getFile('gambar2');
       
       
        if ($gambar2->getError() == 4) {

            $namagambar2 = $this->request->getPost('namalama2');
        } else {
            if ($this->request->getPost('namalama2') == "") {
                $namagambar2_temp = $gambar2->getName();
                $gambar2->move('public/admin/images/identitas' . $kddesa . '/', $namagambar2_temp);
            } else {
                
                $namagambar2_temp = $gambar2->getRandomName();
                $destinationDirectory = 'public/admin/images/identitas' . $kddesa;
                $gambar2->move($destinationDirectory, $namagambar2_temp);
                unlink('public/admin/images/identitas' . $kddesa . '/' . $this->request->getPost('namalama2'));
            }
        }
        $data = [

            'nama_desa' => $nama_desa,
            'kode_desa' => $kode_desa,
            'kode_pos' => $kode_pos,
            'nama_kepala_desa' => $nama_kepala_desa,
            'nip_kepala_desa' => $nip_kepala_desa,
            'alamat_kantor' => $alamat_kantor,
            'email_desa' => $email_desa,
            'telepon' => $telepon,
            'website' => $website,
            'nama_kecamatan' => $nama_kecamatan,
            'kode_kecamatan' => $kode_kecamatan,
            'nama_kepala_camat' => $nama_kepala_camat,
            'nip_kepala_camat' => $nip_kepala_camat,
            'nama_kabupaten' => $nama_kabupaten,
            'kode_kabupaten' => $kode_kabupaten,
            'nama_propinsi' => $nama_propinsi,
            'kode_propinsi' => $kode_propinsi,
            'logo' => isset($namagambar) ? $namagambar : $namagambar_temp,
            'kantor_desa' => isset($namagambar2) ? $namagambar2 : $namagambar2_temp,

        ];
        
       
        
        $simpan = $this->identitasModel->updatedata($data, $id);
        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to(base_url('/manageidentitas'));
    }
}
