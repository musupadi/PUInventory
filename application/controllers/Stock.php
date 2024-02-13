<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Models");
        $this->load->library('form_validation');
    }
    private function rulesTransaction(){
        return [
            ['field' => 'handover_date','label' => 'Handover Date','rules' => 'required'],
            ['field' => 'id','label' => 'Id','rules' => 'required'],
        ];
    }
    public function index()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['warehouse'] = $this->Models->AllWarehouse();
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = 'Warehouse';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Stock/side',$data);
        $this->load->view('Stock/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function StockData($id){
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['warehouse'] = $this->Models->AllWarehouse();
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = 'Warehouse';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Stock/side',$data);
        $this->load->view('Stock/main',$data);
        $this->load->view('dashboard/footer');
    }
    public function EditStatusAccept(){
        $this->form_validation->set_rules($this->rulesTransaction());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $data['transaction'] = $this->Models->AllTransaction();
            $data['title'] = 'Transaction';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Transaction/side',$data);
            $this->load->view('Transaction/main',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $data['handover_date'] = $this->input->post('handover_date');   
            $data['status'] = 1;
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('tr_item','id',$this->input->post('id'),$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Transaction'));
        }
    }
    public function EditStatusRejected($id){
        $this->form_validation->set_rules($this->rulesTransaction());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $where = array(
                'id' => $id
            );
            $data['transaction'] = $this->Models->AllTransaction();
            $data['title'] = 'Transaction';
            $this->load->view('dashboard/header',$data);
            $this->load->view('Transaction/side',$data);
            $this->load->view('Transaction/main',$data);
            $this->load->view('dashboard/footer');  
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $data['handover_date'] = $this->input->post('handover_date');   
            $data['status'] = 2;
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('tr_item','id',$this->input->post('id'),$data);
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
            redirect(base_url('Transaction'));
        }
    }

    public function StockItem() 
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['transaction'] = $this->Models->AllTransaction();
        $data['title'] = "Stock Item";
        $this->load->view('dashboard/header',$data);
        $this->load->view('Stock/side',$data);
        $this->load->view('Stock/Stock-Item',$data);
        $this->load->view('dashboard/footer');
    }

}