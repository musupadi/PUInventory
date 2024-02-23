<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Models');
        $this->load->library('form_validation');
    }

    private function rulesNews(){
        return [
            ['field' => 'title','label' => 'Title','rules' => 'required'],
            ['field' => 'description','label' => 'Description','rules' => 'required']
        ];
    }

    public function index()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['title'] = 'News';
        $data['news'] = $this->Models->allNews();
        $this->load->view('dashboard/header',$data);
        $this->load->view('News/list/side',$data);
        $this->load->view('News/list/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function addNews()
    {
        $this->form_validation->set_rules($this->rulesNews());

        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $data['news'] = $this->Models->allNewsCategory();
            $data['title'] = 'Add News';
            $this->load->view('dashboard/header',$data);
            $this->load->view('News/list/side',$data);
            $this->load->view('News/list/input',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['title'] = $this->input->post('title');
            $data['id_category'] = $this->input->post('category');
            $data['description'] = $this->input->post('description');
            $data['id_status'] = 1;
            $data['created_by'] = $id[0]->id;
            $data['update_by'] = $id[0]->id;
            $this->Models->insert('m_news',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('News'));
        }    
    }

    public function updateNews($id){
        $this->form_validation->set_rules($this->rulesNews());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['news'] = $this->Models->getWhere2("m_news",$where);
            $data['newsCategory'] = $this->Models->allNewsCategory();
            $data['title'] = "Edit News";
            $this->load->view('dashboard/header',$data);
            $this->load->view('news/list/side',$data);
            $this->load->view('news/list/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));
            $data['title'] = $this->input->post('title');
            $data['id_category'] = $this->input->post('category');
            $data['description'] = $this->input->post('description');
            $data['update_by'] = $ID[0]->id;
            $data['update_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_news','id',$id,$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('News'));
        }
    }
    
    public function deleteNews($id){
        $where = ['id' => $id];
        $data['id_status'] = 0;
        $this->Models->edit('m_news','id',$id, $data);
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('News'));
    }
}

/* End of file Controllername.php */
