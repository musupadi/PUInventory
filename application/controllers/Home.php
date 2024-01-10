<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }

    private function rulesOrigin(){
        return [
            ['field' => 'label','label' => 'Label','rules' => 'required']
        ];
    }

    public function index()
    {
        // $data['barang'] = $this->Models->getMyProduct($this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        // $data['count_wallet'] = $this->Models->Count('wallet','status','Belum Diverifikasi');
        $data['title'] = 'Dashboard';
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('dashboard/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function profile(){
        $data['barang'] = $this->Models->getMyProduct($this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('user','username',$this->session->userdata('nama'));
        $data['count_wallet'] = $this->Models->Count('wallet','status','Belum Diverifikasi');
        $this->load->view('dashboard/header',$data);
        $this->load->view('dashboard/side',$data);
        $this->load->view('dashboard/profile',$data);
        $this->load->view('dashboard/footer');
    }
    public function changeimage(){
        $userData = $this->Models->getID('user','username',$this->session->userdata('nama'));
        foreach($userData as $datas){
            if($datas->profile != "default.jpg"){
                $config['upload_path']          = './img/profile/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['file_name']            = $data->profile;
                // $config['overwrite']			= true;
                $config['max_size']             = 4096; // 1MB
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = $this->upload->data("file_name");
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }else{
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = "default.jpg";
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }
            }else{
                $config['upload_path']          = './img/profile/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['file_name']            = $this->id;
                // $config['overwrite']			= true;
                $config['max_size']             = 4096; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = $this->upload->data("file_name");
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }else{
                    $data['password'] = $datas->password;
                    $data['nama'] = $datas->nama;
                    $data['email'] = $datas->email;
                    $data['wallet'] = $datas->wallet;
                    $data['profile'] = "default.jpg";
                    $data['alamat'] = $datas->alamat;
                    $data['level'] = $datas->level;
                }
            }
            $this->Models->edit('user','username',$this->session->userdata('nama'),$data);
            $this->session->set_flashdata('Pesan', '<script>alert("Gambar Berhasil diubah")</script>');
            redirect(base_url('Home/profile'));
        }
    }
    public function changeProfileData(){
        $userData = $this->Models->getID('user','username',$this->session->userdata('nama'));
        foreach($userData as $user){
            $data['password'] = $user->password;
            $data['nama'] = $this->input->post('nama');
            $data['email'] = $this->input->post('email');
            $data['wallet'] = $user->wallet;
            $data['profile'] = $user->profile;
            $data['alamat'] = $this->input->post('alamat');
            $data['level'] = $user->level;

            $this->Models->edit('user','username',$this->session->userdata('nama'),$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('home/profile'));
        }
    }

    public function Location(){
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['location'] = $this->Models->getAll('m_location');
        $data['title'] = 'Loction';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Location/side',$data);
        $this->load->view('Location/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function TambahLocation(){
        $this->form_validation->set_rules($this->rulesOrigin());
        $ID = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $this->load->view('dashboard/header',$data);
            $this->load->view('Location/side',$data);
            $this->load->view('Location/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['label'] = $this->input->post('label');
            $data['floor'] = $this->input->post('floor');
            $data['created_by'] = $id[0]->id;;
            $data['updated_by'] = $id[0]->id;;
            $this->Models->insert('m_location',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Home/Location'));
        }
    }

}

/* End of file Home.php */
