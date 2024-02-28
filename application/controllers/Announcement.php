<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Models');
        $this->load->library('form_validation');
    }

    private function rulesAnnouncement(){
        return [
            ['field' => 'title','label' => 'Title','rules' => 'required'],
            ['field' => 'description','label' => 'Description','rules' => 'required']
        ];
    }

    private function rulesCategory(){
        return [
            ['field' => 'label','label' => 'Label','rules' => 'required']
        ];
    }

    public function index()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['title'] = 'Announcement';
        $data['announcement'] = $this->Models->allAnnouncement();
        $this->load->view('dashboard/header',$data);
        $this->load->view('Announcement/list/side',$data);
        $this->load->view('Announcement/list/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function addAnnouncement()
    {
        $this->form_validation->set_rules($this->rulesAnnouncement());

        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $data['category'] = $this->Models->allAnnouncementCategory();
            $data['title'] = 'Add Announcement';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Announcement/list/side',$data);
            $this->load->view('Announcement/list/input',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['title'] = $this->input->post('title');
            $data['id_category'] = $this->input->post('category');
            $data['description'] = $this->input->post('description');
            $data['id_status'] = 1;
            $data['created_by'] = $id[0]->id;
            $data['update_by'] = $id[0]->id;
            $this->Models->insert('m_announcement',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Announcement'));
        }    
    }

    public function updateAnnouncement($id){
        $this->form_validation->set_rules($this->rulesAnnouncement());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['announcement'] = $this->Models->getWhere2("m_announcement",$where);
            $data['announcementCategory'] = $this->Models->allAnnouncementCategory();
            $data['title'] = "Edit Announcement";
            $this->load->view('dashboard/header',$data);
            $this->load->view('announcement/list/side',$data);
            $this->load->view('announcement/list/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));
            $data['title'] = $this->input->post('title');
            $data['id_category'] = $this->input->post('category');
            $data['description'] = $this->input->post('description');
            $data['update_by'] = $ID[0]->id;
            $data['update_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_announcement','id',$id,$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Announcement'));
        }
    }
    
    public function deleteAnnouncement($id){
        $where = ['id' => $id];
        $data['id_status'] = 0;
        $this->Models->edit('m_announcement','id',$id, $data);
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('Announcement'));
    }

    public function category()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['title'] = 'Announcement';
        $data['category'] = $this->Models->allAnnouncementCategory();
        $this->load->view('dashboard/header',$data);
        $this->load->view('Announcement/category/side',$data);
        $this->load->view('Announcement/category/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function addAnnouncementCategory()
    {
        $this->form_validation->set_rules($this->rulesCategory());

        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $this->load->view('dashboard/header',$data);
            $this->load->view('Announcement/category/side',$data);
            $this->load->view('Announcement/category/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['label'] = $this->input->post('label');
            $data['created_by'] = $id[0]->id;
            $data['updated_by'] = $id[0]->id;
            $this->Models->insert('m_category_announcement',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Announcement/category'));
        }    
    }

    public function updateCategory($id){
        $this->form_validation->set_rules($this->rulesCategory());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['category'] = $this->Models->getWhere2("m_category_announcement",$where);
            $data['title'] = "Edit Category";
            $this->load->view('dashboard/header',$data);
            $this->load->view('announcement/category/side',$data);
            $this->load->view('announcement/category/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));
            $data['label'] = $this->input->post('label');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_category_announcement','id',$id,$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Announcement/category'));
        }
    }

    public function deleteCategory($id){
        $this->Models->delete('m_category_announcement','id',$id);
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('Announcement/category'));
    }

}

/* End of file Controllername.php */
