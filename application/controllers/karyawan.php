<?php
class Karyawan extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
	function index()
	{
        $data['tabel_12210750'] = $this->M_karyawan->tampil_data()->result();
        $data['title'] = 'Data Karyawan';
        $this->load->view('header',$data);
        $this->load->view('tampil_karyawan',$data);
        $this->load->view('footer');
	}
    function tambah(){
        $data['title'] = 'Tambah Data';
        $data['status'] = ["Menikah","Belum Menikah"];
        $this->load->view('header',$data); 
        $this->load->view('input_karyawan');
        $this->load->view('footer');
    }
    function tambah_aksi(){
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('status','Status','required');
        $this->form_validation->set_rules('jabatan','Jabatan','required');

        if($this->form_validation->run() == TRUE){
            $nama = $this->input->post('nama');
            $status = $this->input->post('status');
            $jabatan = $this->input->post('jabatan');

            if($status == 'Menikah' && $jabatan == 'Manager')
            {
                $gajipokok = 10000000;
            } 
            elseif($status == 'Belum Menikah' && $jabatan == 'Manager')
            {
                $gajipokok = 7500000;
            }
            elseif($status == 'Menikah' && $jabatan == 'Direktur')
            {
                $gajipokok = 12000000;
            } 
            elseif($status == 'Belum Menikah' && $jabatan == 'Direktur')
            {
                $gajipokok = 11000000;
            }
            elseif($status == 'Menikah' && $jabatan == 'Staff')
            {
                $gajipokok =5000000;
            } 
            elseif($status == 'Belum Menikah' && $jabatan == 'Staff')
            {
                $gajipokok = 4000000;
            }
            $tunjangan = 0.4 * $gajipokok;
            $total = $gajipokok + $tunjangan;
            
            $config['max_size'] = 2048;
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['remove_spaces'] = TRUE;
            $config['overwrite'] = TRUE;
            $config['upload_path'] = FCPATH.'assets/images';
            
            $this->load->library('upload');
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $data_image=$this->upload->data('file_name');
            $location = 'assets/images/';
            $foto =$location.$data_image;

            $data = array(
                'nama' => $nama,
                'status_karyawan' => $status,
                'jabatan' => $jabatan,
                'gaji' => $gajipokok,
                'tunjangan' => $tunjangan,
                'total_gaji' => $total,
                'foto' => $foto
                );
            $this->M_karyawan->input_data($data,'tabel_12210750');
            redirect('karyawan');
        }else{
            $data['title'] = 'Tambah Data';
            $this->load->view('header',$data); 
            $this->load->view('input_karyawan');
            $this->load->view('footer');     
        }
    }
    function edit($id){
        $where = array('id' => $id);
        $data['tabel_12210750'] = $this->M_karyawan->edit_data($where,'tabel_12210750')->result();
        $data['status'] = ["Menikah","Belum Menikah"];
        $data['title'] = 'Edit Data';
        $this->load->view('header',$data); 
        $this->load->view('edit_karyawan',$data);
        $this->load->view('footer');     
    }
    
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status_karyawan');   
        $jabatan = $this->input->post('jabatan');
        
        if($status == 'Menikah' && $jabatan == 'Manager')
        {
            $gajipokok = 10000000;
        } 
        elseif($status == 'Belum Menikah' && $jabatan == 'Manager')
        {
            $gajipokok = 7500000;
        }
        elseif($status == 'Menikah' && $jabatan == 'Direktur')
        {
            $gajipokok = 12000000;
        } 
        elseif($status == 'Belum Menikah' && $jabatan == 'Direktur')
        {
            $gajipokok = 11000000;
        }
        elseif($status == 'Menikah' && $jabatan == 'Staff')
        {
            $gajipokok =5000000;
        } 
        elseif($status == 'Belum Menikah' && $jabatan == 'Staff')
        {
            $gajipokok = 4000000;
        }
        $tunjangan = 0.4 * $gajipokok;
        $total = $gajipokok + $tunjangan;

        $config['max_size'] = 2048;
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = FCPATH.'assets/images';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $data_image=$this->upload->data('file_name');
        $location = 'assets/images/';
        $foto =$location.$data_image;

        $data = array(
            'nama' => $nama,
            'status_karyawan' => $status,
            'jabatan' => $jabatan,
            'gaji' =>$gajipokok,
            'tunjangan' =>$tunjangan,
            'total_gaji' =>$total,
            'foto' => $foto
            );
        $where = array(
            'id' => $id
        );
        $this->M_karyawan->update_data($where,$data,'tabel_12210750');
        redirect('karyawan');
    }
    function hapus($id){
        $where = array('id' => $id); 
        $this->M_karyawan->hapus_data($where,'tabel_12210750');
        redirect('karyawan');
    }
}
?>