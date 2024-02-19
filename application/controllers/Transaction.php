<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
    private function rulesTransaction2(){
        return [
            ['field' => 'id','label' => 'Id','rules' => 'required'],
        ];
    }
    public function index()
    {
        // $data['barang'] = $this->Models->getMyProduct($this->session->userdata('nama'));
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['transaction'] = $this->Models->AllTransaction();
        $data['title'] = 'Transaction';
        $this->load->view('Transaction/header',$data);
        $this->load->view('Transaction/side',$data);
        $this->load->view('Transaction/main',$data);
        $this->load->view('Transaction/footer');
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
            $qty = $this->Models->GetQuantity($this->input->post('id_item'),$this->input->post('id_warehouse'));
            if($qty){
                if($qty[0]->qty < $this->input->post('qty')){
                    $this->session->set_flashdata('pesan', '<script>alert("Stock barang Tidak Cukup")</script>');
                    redirect(base_url('Transaction'));
                }else{
                    $data['handover_date'] = $this->input->post('handover_date');   
                    $data['status'] = 1;
                    $data['updated_by'] = $ID[0]->id;
                    $data['updated_at'] = $this->Models->GetTimestamp();
                    $this->Models->edit('tr_item','id',$this->input->post('id'),$data);
    
                    $data2['qty'] = $qty[0]->qty-$this->input->post('qty');   
                    $data2['updated_by'] = $ID[0]->id;
                    $data2['updated_at'] = $this->Models->GetTimestamp();
                    $this->Models->edit('m_stock','id',$qty[0]->id,$data2);
                    
    
                    $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
                    redirect(base_url('Transaction'));
                }
            }else{
                $this->session->set_flashdata('pesan', '<script>alert("Barang Tersebut Belum ada Mohon Tambahkan di Menu Stock")</script>');
                redirect(base_url('Transaction'));
            }
            
          
        }
    }
    public function EditStatusRejected($id){
        $ID = $this->Models->getID('m_user', 'username', $this->session->userdata('nama'));   
        $data['status'] = 2;
        $data['updated_by'] = $ID[0]->id;
        $data['updated_at'] = $this->Models->GetTimestamp();
        $result = $this->Models->edit('tr_item','id',$id,$data);
        if($result){
            $this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');
        }else{
            $this->session->set_flashdata('pesan', '<script>alert("Data Gagal diubah")</script>');
        }
        
        redirect(base_url('Transaction'));
    }

    public function userTransaction()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['transaction'] = $this->Models->AllItem();
        $data['warehouse'] = $this->Models->AllWarehouse();
        $data['type'] = $this->Models->getAll('m_type');
        $data['title'] = 'Transaction';
        $this->load->view('User_Transaction/header',$data);
        $this->load->view('User_Transaction/side',$data);
        $this->load->view('User_Transaction/main',$data);
        $this->load->view('User_Transaction/footer');
    }

    public function trAdminWarehouse()
    {
        $data['user'] = $this->Models->getID('m_user','username',$this->session->userdata('nama'));
        $data['transaction'] = $this->Models->AllTransaction();
        $data['title'] = 'Transaction';
        $this->load->view('Tr_Admin_Warehouse/header',$data);
        $this->load->view('Tr_Admin_Warehouse/side',$data);
        $this->load->view('Tr_Admin_Warehouse/main',$data);
        $this->load->view('Tr_Admin_Warehouse/footer');
    }



}