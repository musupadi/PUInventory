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
    private function rulesEditStock(){
        return [
            ['field' => 'qty','label' => 'qty','rules' => 'required'],
            ['field' => 'id_add','label' => 'id_add','rules' => 'required']
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

    public function StockItem($id_warehouse) 
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['item'] = $this->Models->ItemWarehouse($id_warehouse);
        $data['id_warehouse'] = $id_warehouse;
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = "Stock Item";
        $this->load->view('dashboard/header',$data);
        $this->load->view('Stock/side',$data);
        $this->load->view('Stock/Stock-Item',$data);
        $this->load->view('dashboard/footer');
    }

    public function stockAdminWarehouse()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['warehouse'] = $this->Models->AllWarehouse();
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = 'Stock';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Stock_Admin_Warehouse/side',$data);
        $this->load->view('Stock_Admin_Warehouse/main',$data);
        $this->load->view('dashboard/footer');
    }

    public function AddItemStock($id_warehouse){
        $data['id_warehouse'] = $id_warehouse;
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['item'] = $this->Models->AllItem();
        $data['warehouse'] = $this->Models->AllWarehouse();
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = 'Item';
        $this->load->view('dashboard/header',$data);
        $this->load->view('Stock/side',$data);
        $this->load->view('Stock/AddItem',$data);
        $this->load->view('dashboard/footer');
    }
    public function AddStockItem($id_warehouse){
        $this->form_validation->set_rules($this->rulesEditStock());
        if($this->form_validation->run() === false){
            $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $data['item'] = $this->Models->ItemWarehouse($id_warehouse);
            $data['id_warehouse'] = $id_warehouse;
            $data['type'] = $this->Models->getAll('m_type');
            $data['title'] = "Stock Item";
            $this->load->view('dashboard/header',$data);
            $this->load->view('Stock/side',$data);
            $this->load->view('Stock/Stock-Item',$data);
            $this->load->view('dashboard/footer');
            $this->session->set_flashdata('pesan', '<script>alert("Data gagal diubah")</script>');
        }else{
            $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
            $data['qty'] = $this->input->post('qty');   
            $data['updated_by'] = $ID[0]->id;
            $data['updated_at'] = $this->Models->GetTimestamp();
            $this->Models->edit('m_stock','id',$this->input->post('id_add'),$data);


            $data2['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
            $data2['item'] = $this->Models->ItemWarehouse($id_warehouse);
            $data2['id_warehouse'] = $id_warehouse;
            $data2['type'] = $this->Models->getAll('m_type');
            $data2['title'] = "Stock Item";
            $this->load->view('dashboard/header',$data2);
            $this->load->view('Stock/side',$data2);
            $this->load->view('Stock/Stock-Item',$data2);
            $this->load->view('dashboard/footer');
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
        }
    }
}