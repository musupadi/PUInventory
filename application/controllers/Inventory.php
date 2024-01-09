<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }
    private function rulesType(){
        return [
            ['field' => 'label','label' => 'Label','rules' => 'required']
        ];
    }
    private function rulesUser(){
        return [
            ['field' => 'name','label' => 'Name','rules' => 'required'],
            ['field' => 'username','label' => 'Username ','rules' => 'required'],
            ['field' => 'id_role','label' => 'Id_role','rules' => 'required'],
            ['field' => 'email','label' => 'email','rules' => 'required']
        ];
    }
    private function rulesItem(){
        return [
            ['field' => 'name','label' => 'Name','rules' => 'required'],
            ['field' => 'id_type','label' => 'Id_Type','rules' => 'required'],
            ['field' => 'qty','label' => 'Qty','rules' => 'required'],
            ['field' => 'description','label' => 'Description','rules' => 'required'],
            ['field' => 'delivery_date','label' => 'Delivery_date','rules' => 'required'],
            ['field' => 'warranty','label' => 'Warranty','rules' => 'required'],
            ['field' => 'serial_number','label' => 'Serial_number','rules' => 'required']
        ];
    }
    private function rulesItemNonAsset(){
        return [
            ['field' => 'name','label' => 'Name','rules' => 'required'],
            ['field' => 'id_type','label' => 'Id_Type','rules' => 'required'],
            ['field' => 'qty','label' => 'Qty','rules' => 'required'],
            ['field' => 'description','label' => 'Description','rules' => 'required'],
            ['field' => 'delivery_date','label' => 'Delivery_date','rules' => 'required'],
            ['field' => 'warranty','label' => 'Warranty','rules' => 'required'],
            ['field' => 'serial_number','label' => 'Serial_number','rules' => 'required']
        ];
    }


    public function index()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['type'] = $this->Models->AllType();
        $this->load->view('dashboard/header',$data);
        $this->load->view('Inventory/Item/side',$data);
        $this->load->view('Inventory/Item/main',$data);
        $this->load->view('dashboard/footer');
    }

    // Type
    public function Type(){
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = 'Type';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Inventory/Type/side',$data);
        $this->load->view('Inventory/Type/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function TambahType(){
        $this->form_validation->set_rules($this->rulesType());
        $ID = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $this->load->view('dashboard/header',$data);
            $this->load->view('Inventory/type/side',$data);
            $this->load->view('Inventory/type/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['label'] = $this->input->post('label');
            $data['created_by'] = $id[0]->id;
            $data['updated_by'] = $id[0]->id;
            $this->Models->insert('m_type',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Inventory/Type'));
        }
    }
    public function Typeedit($id){
        $this->form_validation->set_rules($this->rulesType());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['role'] = $this->Models->getWhere2("m_type",$where);
            $data['title'] = 'Edit Type';
            $this->load->view('dashboard/header',$data);
            $this->load->view('User/Role/side',$data);
            $this->load->view('Inventory/Type/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('Pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));     
            $data['label'] = $this->input->post('label');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_type','id',$id,$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Inventory/Type'));
        }
    }
    public function Hapustype($id){
        $this->Models->delete('m_type','id',$id);
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('Inventory/Type'));
    }

    // Item
    public function Item(){
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['item'] = $this->Models->AllItem();
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = 'Item';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Inventory/Item/side',$data);
        $this->load->view('Inventory/Item/main',$data);
        $this->load->view('dashboard/footer');
    }
    
    public function TambahItem(){
        $this->form_validation->set_rules($this->rulesItem());
        $ID = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        if($this->form_validation->run() === FALSE){
            $data['user'] =$this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $this->load->view('dashboard/header',$data);
            $this->load->view('Inventory/Item/side',$data);
            $this->load->view('Inventory/Item/main',$data);
            $this->load->view('dashboard/footer');
        }else{
            $id = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));            
            $data['name'] = $this->input->post('name');
            $data['id_type'] = $this->input->post('id_type');
            $data['asset_no'] = $this->input->post('asset_no');
            $data['qty'] = $this->input->post('qty');
            $data['description'] = $this->input->post('description');
            $data['warranty'] = $this->input->post('warranty');
            $data['serial_number'] = $this->input->post('serial_number');
            $data['created_by'] = $id[0]->id;
            $data['updated_by'] = $id[0]->id;
            $this->Models->insert('m_item',$data);
            $this->session->set_flashdata('pesan','<script>alert("Data berhasil disimpan")</script>');
            redirect(base_url('Inventory/Item'));
        }
    }

    public function Itemedit($id){
        $this->form_validation->set_rules($this->rulesItem());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['item'] = $this->Models->getWhere2("m_item",$where);
            $data['type'] = $this->Models->getAll('m_type');
            $this->load->view('dashboard/header',$data);
            $this->load->view('User/Role/side',$data);
            $this->load->view('Inventory/Item/edit',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));     
            $data['name'] = $this->input->post('name');
            $data['id_type'] = $this->input->post('id_type');
            $data['asset_no'] = $this->input->post('asset_no');
            $data['qty'] = $this->input->post('qty');
            $data['description'] = $this->input->post('description');
            $data['delivery_date'] = $this->input->post('delivery_date');
            $data['warranty'] = $this->input->post('warranty');
            $data['serial_number'] = $this->input->post('serial_number');
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_item','id',$id,$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Inventory/Item'));
        }
    }

    public function HapusItem($id){
        $this->Models->delete('m_item','id',$id);
        $this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');
        redirect(base_url('Inventory/Item'));
    }
}

/* End of file Home.php */
