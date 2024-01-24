<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Model {
    public function GetTimestamp(){
        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        $timestamp = $dt->format('Y-m-d G:i:s');

        return $timestamp;
    }
    public function getAll($table){
        return $this->db->get($table)->result();
    }
    public function getID($table,$key,$id){
        return $this->db->get_where($table,array($key => $id))->result();
    }

    public function insert($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$key,$id,$data){
        return $this->db->update($table,$data,array($key => $id));
    }

    public function delete($table,$key,$id){
        return $this->db->delete($table,array($key => $id));
    }

    function getWhere($table,$where){
        return $this->db->get_where($table,$where)->result_array();
    }

    public function Count($table,$key,$id){
        $query = "SELECT Count(*) AS count FROM $table WHERE $key = '$id'";
        return $this->db->query($query)->result();
    }
    public function AllCount($table){
        $query = "SELECT COUNT (*) AS c FROM $table";
        return $this->db->query($query)->result();
    }
    public function AllUser(){
        $this->db->select('a.id,a.name,a.username,a.email,b.label,a.photo,');
        $this->db->from('m_user as a');
        $this->db->join('m_role as b','a.id_role = b.id','left');
        $data = $this->db->get()->result();
        return $data;
    }
    public function AllBrand(){
        $this->db->select('a.id, a.label as brand, b.label as origin, a.created_at, a.created_by, a.updated_at, a.updated_by');
        $this->db->from('m_brand as a');
        $this->db->join('m_origin as b','a.id_origin = b.id','left');
        $data = $this->db->get()->result();
        return $data;
    }

    public function AllItem(){
        $this->db->select('a.id, a.name, b.label as type, a.asset_no, a.description, a.id_status, c.label as brand, d.label as vendor, a.warranty, a.serial_number, a.photo');
        $this->db->from('m_item as a');
        $this->db->join('m_type as b', 'a.id_type = b.id', 'left');
        $this->db->join('m_brand as c', 'a.id_brand = c.id', 'left'); // Corrected join condition
        $this->db->join('m_vendor as d', 'a.id_vendor = d.id', 'left');
        $this->db->where('id_status = 1');
        $data = $this->db->get()->result();
        return $data;
    }
    public function ItemWarehouse($id_warehouse){
        $this->db->select('a.id, a.name, b.label as type, a.asset_no, a.description, a.id_status, c.label as brand, d.label as vendor, a.warranty, a.serial_number, a.photo,e.qty,f.name as warehouse');
        $this->db->from('m_item as a');
        $this->db->join('m_type as b', 'a.id_type = b.id', 'left');
        $this->db->join('m_brand as c', 'a.id_brand = c.id', 'left'); // Corrected join condition
        $this->db->join('m_vendor as d', 'a.id_vendor = d.id', 'left');
        $this->db->join('m_stock as e', 'a.id = e.id_item', 'left');
        $this->db->join('m_warehouse as f', 'e.id_warehouse = f.id', 'left');
        $this->db->where('a.id_status = 1');
        $this->db->where('e.id_warehouse = '.$id_warehouse);
        $data = $this->db->get()->result();
        return $data;
    }
    public function AllVendor(){
        $this->db->select('id, label, created_at, created_by, updated_at, updated_by');
        $this->db->from('m_vendor');
        $data = $this->db->get()->result();
        return $data;
    }

    public function AllWarehouse(){
        $this->db->select('id, name, description, created_at, created_by, updated_at, updated_by');
        $this->db->from('m_warehouse');
        $data = $this->db->get()->result();
        return $data;
    }

    public function AllType(){
        $this->db->select('id, label, created_at, created_by, updated_at, updated_by');
        $this->db->from('m_type');
        $data = $this->db->get()->result();
        return $data;
    }

    public function AllOrigin(){
        $this->db->select('id, label, created_at, created_by, updated_at, updated_by');
        $this->db->from('m_origin');
        $data = $this->db->get()->result();
        return $data;
    }

    public function AllTRItem(){
        $this->db->select('b.name as names, c.name, a.category, a.status_handover, a.handover_date, d.label, d.floor, a.image, a.created_at, a.created_by, a.updated_at, a.updated_by');
        $this->db->from('tr_item as a');
        $this->db->join('m_user as b', 'a.id_user = b.id', 'left');
        $this->db->join('m_item as c', 'a.id_item = c.id', 'left');
        $this->db->join('m_location as d', 'a.id_location = d.id', 'left');
        $data = $this->db->get()->result();
        return $data;
    }

    public function AllRole(){
        $this->db->select('id, label, level, created_at, created_by, updated_at, updated_by');
        $this->db->from('m_role');
        $data = $this->db->get()->result();
        return $data;
    }

    public function AllLocation(){
        $this->db->select('id, label, floor, created_at, created_by, updated_at, updated_by');
        $this->db->from('m_location');
        $data = $this->db->get()->result();
        return $data;
    }
    public function LoginData($username,$password){
        $this->db->select('a.id as id_user,a.name,a.email,a.photo,b.label as role,b.level');
        $this->db->from('m_user as a');
        $this->db->join('m_role as b', 'a.id_role = b.id', 'left');
        $this->db->where('a.username',$username);
        $this->db->where('a.password',$password);
        $data = $this->db->get()->result();
        return $data;
    }
    function data_login($table,$where){
        
        return $this->db->get_where($table,$where);
    }
    
    // Model Lama
    public function BeritaLimit($limit){
        $query = "SELECT a.id_berita,a.judul_berita,a.berita,b.kategori,a.gambar FROM berita a JOIN kategori_berita b ON a.id_kategori=b.id_kategori ORDER BY a.id_berita DESC LIMIT $limit";
        return $this->db->query($query)->result();
    }
    public function PengumumanLimit($limit){
        $query = "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC LIMIT $limit";
        return $this->db->query($query)->result();
    }
    public function Pengumuman(){
        $query = "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC";
        return $this->db->query($query)->result();
    }
    public function getAllBerita(){
        $query = "SELECT a.id_berita,a.judul_berita,a.berita,b.kategori,a.gambar FROM berita a JOIN kategori_berita b ON a.id_kategori=b.id_kategori ORDER BY a.id_berita DESC";
        return $this->db->query($query)->result();
    }
    public function getAllKelas(){
        $query = "SELECT a.id_kelas,a.nama_kelas,a.class,a.program,b.nama_jurusan FROM kelas a JOIN jurusan b ON a.id_jurusan=b.id_jurusan";
        return $this->db->query($query)->result();
    }
    public function getAllUjian(){
        $query = "SELECT a.sks,a.id_ujian,a.tanggal,a.mulai,a.selesai,a.jenis_ujian,a.status,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_ruang,e.nama_ruang,f.id_dosen,f.nama_dosen FROM jadwal_ujian a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN ruang e ON a.id_ruang = e.id_ruang JOIN dosen f ON a.id_dosen=f.id_dosen";
        return $this->db->query($query)->result();
    }
    public function getUjianTanggal($id_jurusan,$id_kelas,$tanggal){
        $query = "SELECT a.sks,a.id_ujian,a.tanggal,a.mulai,a.selesai,a.jenis_ujian,a.status,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_ruang,e.nama_ruang,f.id_dosen,f.nama_dosen FROM jadwal_ujian a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN ruang e ON a.id_ruang = e.id_ruang JOIN dosen f ON a.id_dosen=f.id_dosen WHERE a.id_jurusan = '$id_jurusan' AND a.id_kelas = '$id_kelas' AND a.tanggal = '$tanggal'";
        return $this->db->query($query)->result();
    }
    public function getKelasUjian($kelas,$jurusan){
        $query = "SELECT a.sks,a.id_ujian,a.tanggal,a.mulai,a.selesai,a.jenis_ujian,a.status,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_ruang,e.nama_ruang,f.id_dosen,f.nama_dosen FROM jadwal_ujian a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN ruang e ON a.id_ruang = e.id_ruang JOIN dosen f ON a.id_dosen=f.id_dosen WHERE a.id_jurusan = '$jurusan' AND a.id_kelas = '$kelas'";
        return $this->db->query($query)->result();
    }
    public function getUjian($id_jurusan,$id_kelas,$jenis_ujian){
        $query = "SELECT a.sks,a.id_ujian,a.tanggal,a.mulai,a.selesai,a.jenis_ujian,a.status,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_ruang,e.nama_ruang,f.id_dosen,f.nama_dosen FROM jadwal_ujian a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN ruang e ON a.id_ruang = e.id_ruang JOIN dosen f ON a.id_dosen=f.id_dosen WHERE a.id_jurusan = '$id_jurusan' AND a.id_kelas = '$id_kelas' AND a.jenis_ujian = '$jenis_ujian'";
        return $this->db->query($query)->result();
    }
    public function getUjian2($id_jurusan,$id_kelas,$tanggal){
        $query = "SELECT a.sks,a.id_ujian,a.tanggal,a.mulai,a.selesai,a.jenis_ujian,a.status,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_ruang,e.nama_ruang,f.id_dosen,f.nama_dosen FROM jadwal_ujian a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN ruang e ON a.id_ruang = e.id_ruang JOIN dosen f ON a.id_dosen=f.id_dosen WHERE a.id_jurusan = '$id_jurusan' AND a.id_kelas = '$id_kelas' AND a.tanggal = '$tanggal'";
        return $this->db->query($query)->result();
    }
    public function Jadwal($Jurusan,$Kelas,$hari){
        $query = "SELECT a.id_jadwal,a.hari,a.mulai,a.akhir,a.sks,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_dosen,e.nama_dosen,f.nama_ruang FROM jadwal_pelajaran a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN dosen e ON a.id_dosen=e.id_dosen JOIN ruang f ON a.id_ruang = f.id_ruang WHERE a.id_jurusan = '$Jurusan' AND a.id_kelas = '$Kelas' AND a.hari = '$hari'";
        return $this->db->query($query)->result();
    }
    public function JadwalKelas($Jurusan,$Kelas){
        $query = "SELECT a.id_jadwal,a.hari,a.mulai,a.akhir,a.sks,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_dosen,e.nama_dosen,f.nama_ruang FROM jadwal_pelajaran a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN dosen e ON a.id_dosen=e.id_dosen JOIN ruang f ON a.id_ruang = f.id_ruang WHERE a.id_jurusan = '$Jurusan' AND a.id_kelas = '$Kelas'";
        return $this->db->query($query)->result();
    }
    public function getAllJadwal(){
        $query = "SELECT a.id_jadwal,a.hari,a.mulai,a.akhir,a.sks,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_dosen,e.nama_dosen,f.nama_ruang FROM jadwal_pelajaran a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN dosen e ON a.id_dosen=e.id_dosen JOIN ruang f ON a.id_ruang = f.id_ruang";
        return $this->db->query($query)->result();
    }
    public function getKelasJadwal($kelas,$jurusan){
        $query = "SELECT a.id_jadwal,a.hari,a.mulai,a.akhir,a.sks,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_dosen,e.nama_dosen,f.nama_ruang FROM jadwal_pelajaran a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN dosen e ON a.id_dosen=e.id_dosen JOIN ruang f ON a.id_ruang = f.id_ruang WHERE a.id_jurusan = '$jurusan' AND a.id_kelas = '$kelas' ";
        return $this->db->query($query)->result();
    }
    public function getJadwalPelajaran($kelas,$jurusan,$hari){
        $query = "SELECT a.id_jadwal,a.hari,a.mulai,a.akhir,a.sks,b.id_matkul,b.nama_matkul,c.id_jurusan,c.nama_jurusan,d.id_kelas,d.nama_kelas,d.program,d.class,e.id_dosen,e.nama_dosen,f.nama_ruang FROM jadwal_pelajaran a JOIN mata_kuliah b ON a.id_matkul=b.id_matkul JOIN jurusan c ON a.id_jurusan=c.id_jurusan JOIN kelas d ON a.id_kelas=d.id_kelas JOIN dosen e ON a.id_dosen=e.id_dosen JOIN ruang f ON a.id_ruang = f.id_ruang WHERE a.id_jurusan = '$jurusan' AND a.id_kelas = '$kelas' AND a.hari = '$hari'";
        return $this->db->query($query)->result();
    }
    function getWhere2($table,$where){
        return $this->db->get_where($table,$where)->result();
    }
    public function getAllProduct($id){
        $query = "SELECT a.username,a.nama,a.email,b.nama_barang,b.harga,b.quantity,b.gambar,b.deskripsi,b.id FROM user a JOIN barang b ON a.username=b.id_penjual EXCEPT SELECT a.username,a.nama,a.email,b.nama_barang,b.harga,b.quantity,b.gambar,b.deskripsi,b.id FROM user a JOIN barang b ON a.username=b.id_penjual WHERE a.username='$id'";
        return $this->db->query($query)->result();
    }
    public function getMyProduct($id){
        $query = "SELECT a.username,a.nama,a.email,b.nama_barang,b.harga,b.quantity,b.gambar,b.deskripsi,b.id FROM user a JOIN barang b ON a.username=b.id_penjual WHERE a.username='$id'";
        return $this->db->query($query)->result();
    }

    public function getProduct($id){
        $query = "SELECT a.username,a.nama,a.email,b.nama_barang,b.harga,b.quantity,b.gambar,b.deskripsi,b.id FROM user a JOIN barang b ON a.username=b.id_penjual WHERE b.id = $id";
        return $this->db->query($query)->result();
    }

    public function getAllRequest(){
        $query = "SELECT a.nama,a.email,a.wallet,a.profile,a.level,b.id_transaksi,b.jumlah,b.bukti,b.peminta,b.pemberi,b.status FROM user a JOIN wallet b ON a.username = b.peminta";
        return $this->db->query($query)->result();
    }
    public function getRequest($id){
        $query = "SELECT a.nama,a.email,a.wallet,a.profile,a.level,b.id_transaksi,b.jumlah,b.bukti,b.peminta,b.pemberi,b.status FROM user a JOIN wallet b ON a.username = b.peminta WHERE b.id_transaksi = '$id'";
        return $this->db->query($query)->result();
    }
    public function getAllTransaction($user){
        $query = "SELECT a.id,a.id_barang,a.id_penjual,a.id_pembeli,a.quantity,a.total,b.nama_barang,b.harga,b.gambar,b.deskripsi,c.username,c.nama,c.email,c.wallet,c.profile,c.level FROM history a JOIN barang b ON a.id_barang=b.id JOIN user c ON a.id_penjual=c.username WHERE a.id_penjual = '$user' OR a.id_pembeli = '$user'";
        if($this->db->query($query)->num_rows() >0){
            return $this->db->query($query)->result();
        }else{
            return "Nothing";
        }
    }
    public function getJualTransaction($user){
        $query = "SELECT a.id,a.id_barang,a.id_penjual,a.id_pembeli,a.quantity,a.total,b.nama_barang,b.harga,b.gambar,b.deskripsi,c.username,c.nama,c.email,c.wallet,c.profile,c.level FROM history a JOIN barang b ON a.id_barang=b.id JOIN user c ON a.id_penjual=c.username WHERE a.id_penjual = '$user'";
        if($this->db->query($query)->num_rows() >0){
            return $this->db->query($query)->result();
        }else{
            return "Nothing";
        }
    }
    public function getBeliTransaction($user){
        $query = "SELECT a.id,a.id_barang,a.id_penjual,a.id_pembeli,a.quantity,a.total,b.nama_barang,b.harga,b.gambar,b.deskripsi,c.username,c.nama,c.email,c.wallet,c.profile,c.level FROM history a JOIN barang b ON a.id_barang=b.id JOIN user c ON a.id_penjual=c.username WHERE a.id_pembeli = '$user'";
        if($this->db->query($query)->num_rows() >0){
            return $this->db->query($query)->result();
        }else{
            return "Nothing";
        }
    }
 
    public function countAllTransaction($user){
        $query = "SELECT a.id,a.id_barang,a.id_penjual,a.id_pembeli,a.quantity,a.total,b.nama_barang,b.harga,b.gambar,b.deskripsi,c.username,c.nama,c.email,c.wallet,c.profile,c.level FROM history a JOIN barang b ON a.id_barang=b.id JOIN user c ON a.id_penjual=c.username WHERE a.id_penjual = '$user' OR a.id_pembeli = '$user'";
        return $this->db->query($query)->result();
    }
    public function countBeliTransaction($user){
        $query = "SELECT COUNT (*) AS c FROM history a JOIN barang b ON a.id_barang=b.id JOIN user c ON a.id_penjual=c.username WHERE a.id_penjual = '$user' OR a.id_pembeli = '$user'";
        return $this->db->query($query)->result();
    }
    public function countJualTransaction($user){
        $query = "SELECT a.id,a.id_barang,a.id_penjual,a.id_pembeli,a.quantity,a.total,b.nama_barang,b.harga,b.gambar,b.deskripsi,c.username,c.nama,c.email,c.wallet,c.profile,c.level FROM history a JOIN barang b ON a.id_barang=b.id JOIN user c ON a.id_penjual=c.username WHERE a.id_penjual = '$user' OR a.id_pembeli = '$user'";
        return $this->db->query($query)->result();
    }

    public function ChangeProfile($id,$profile){
        $query = "UPDATE user SET profile = '$profile' WHERE username = '$id'";
        return $this->db->query($query)->result();
    }
    public function ChangeDataProfile($id,$nama,$email,$alamat){
        $query = "UPDATE user SET nama = '$nama',email = '$email',alamat='$alamat' WHERE username = '$id'";
        return $this->db->query($query)->result();
    }
    public function uploadImage(){
    $config['upload_path']          = './img/product/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['file_name']            = $this->id;
    $config['overwrite']			= true;
    $config['max_size']             = 4096; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
    }else{
        return "default.jpg";
    }   
}
}

/* End of file Models.php */
