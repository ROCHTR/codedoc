<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Soal extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_model');
        $this->load->library('form_validation');
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
    }

    public function index()
    {
        $soal = $this->Soal_model->get_all();

        $data = array(
            'soal_data' => $soal
        );

        $this->load->view('inti/header');
        $this->load->view('kelola_soal/soal_list',$data);
        $this->load->view('inti/footer');
    }

    public function tambahsoal(){
        $data = array(
            'kodesoal' => $this->input->post('kodesoal'),
            'judul' => $this->input->post('judul'),
            'jmlsoal' => $this->input->post('jmlsoal'),
            'level' => $this->input->post('level'),
            );
        $jmlsoal = $this->input->post('jmlsoal');
       $this->Soal_model->insert2($data); 
       //$this->load->view('kelola_soal/soal_form',$data);
       redirect(base_url().'soal/Soal/create/'.$jmlsoal);
    }

    public function read($id) 
    {
        $row = $this->Soal_model->get_by_id($id);
        if ($row) {
            $data = array(
    		    'kodesoal' => $row->kodesoal,
            'nomor' => $row->nomor,
        		'soal' => $row->soal,
        		'gambar' => $row->gambar,
        		'jwb_benar' => $row->jwb_benar,
        		'jwbA' => $row->jwbA,
            'jwbB' => $row->jwbB,
    		    'jwbC' => $row->jwbC,
            'jwbD' => $row->jwbD,
            //'level' => $row->level,
    	    );
            $this->load->view('inti/header');
            $this->load->view('kelola_soal/soal_read',$data);
            $this->load->view('inti/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('soal/Soal'));
        }
    }

   

    public function create($jmlsoal) 
    {
        
         $data = array(
            'button' => 'Create',
            'action' => site_url('soal/Soal/insert'),
            'jmlsoal' => $jmlsoal,
            // 'dd_tempat' => $this->soal_kodesoal->dd_tempat(),
            // 'tempat_selected' => $this->input->post('tempat') ? $this->input->post('tempat') : '',
            //'kodesoal' => set_value('kodesoal'),
            'nomor' => set_value('nomor'),
            'soal' => set_value('soal'),
            'gambar' => set_value('gambar'),
            'jwb_benar' => set_value('jwb_benar'),
            'jwbA' => set_value('jwbA'),
            'jwbB' => set_value('jwbB'),
            'jwbC' => set_value('jwbC'),
            'jwbD' => set_value('jwbD'),
           
        );
         $this->load->view('inti/header');
            $this->load->view('kelola_soal/soal_form',$data);
            $this->load->view('inti/footer');
            
    }
   

        /**
     * Cek apakah $nip valid, agar tidak ganda
     */
        function valid_id($kodesoal)
        {
            if ($this->Soal_model->valid_id($kodesoal) == TRUE)
            {
                
                // echo 'valid_id', "kode guruadm dengan Kode $kodeguru sudah terdaftar";
                $this->form_validation->set_message('valid_id', "kodesoal dengan $kodesoal sudah terdaftar");
                return FALSE;
            }
            else
            {
                return TRUE;

            }
        }
    
   
    
    public function update($id,$jmlsoal) 
    {
        $row = $this->Soal_model->get_by_id($id);

        if ($row) {
            $i=1;
            while ($i <= $jmlsoal) {
                # code...
                 $data = array(
                'button' => 'Update',
                'action' => site_url('soal/Soal/updateaksi'),
                'jmlsoal' => $jmlsoal,
                'kodesoal' => set_value('kodesoal', $row->kodesoal),
                'nomor' => set_value('nomor', $row->nomor),
                'soal' => set_value('soal', $row->soal),
                'gambar' => set_value('gambar', $row->gambar),
                'jwb_benar' => set_value('jwb_benar', $row->jwb_benar),
                'jwbA' => set_value('jwbA', $row->jwbA),
                'jwbB' => set_value('jwbB', $row->jwbB),
                'jwbC' => set_value('jwbC', $row->jwbC),
                'jwbD' => set_value('jwbD', $row->jwbD),
                );
                 $i++;
           
            }
             $this->load->view('inti/header');
            $this->load->view('kelola_soal/soal_form',$data);
            $this->load->view('inti/footer');
           
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('soal/Soal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Soal_model->get_by_id($id);

        if ($row) {
            $this->Soal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('soal/Soal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('soal/Soal'));
        }
    }  

     public function insert(){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './gambar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = 2048; //maksimum besar file 2M
        $config['max_width']  = 1288; //lebar maksimum 1288 px
        $config['max_height']  = 768; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
         if($_FILES['filefoto']['name'])
        {
             
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $inputFileName = 'gambar/'.$gbr['file_name'];
                // $this->form_validation->set_error_delimiters('<div id="error">', '</div>');
                // $this->_rules();
                //  if ($this->form_validation->run() == TRUE){
                $i=1;
              while ( $i<= $jmlsoal) {
                  # code...
                $data = array(
                  // 'nm_gbr' =>$gbr['file_name'],
                  // 'tipe_gbr' =>$gbr['file_type'],
                  // 'ket_gbr' =>$this->input->post('textket')
                //'kodesoal' => 'kodesoal',
                'nomor'.$i=> $this->input->post('nomor'.$i),
                'soal'.$i=> $this->input->post('soal'.$i),
                'gambar' => $gbr['file_name'],
                'jwb_benar'.$i => $this->input->post('jwb_benar'.$i),
                'jwbA'.$i => $this->input->post('jwbA'.$i),
                'jwbB'.$i => $this->input->post('jwbB'.$i),
                'jwbC'.$i => $this->input->post('jwbC'.$i),
                'jwbD'.$i => $this->input->post('jwbD'.$i),                
                );
                $this->Soal_model->create_data($data);
                $i++;
              }
                    
               
                
              

 
                //$this->Soal_model->create_data($data); //akses kodesoal untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('soal/Soal'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $er_upload=$this->upload->display_errors();
               echo '<script type="text/javascript"> alert("Tipe File Tidak Sama/Ukuran File Terlalu Besar") 
                window.location = "'.base_url().'soal/Soal'.'" </script>';
                //redirect('soal'); //jika gagal maka akan ditampilkan form upload
            }
        }
        else{
             $i=1;
              while ( $i<= $jmlsoal) {
                  # code...
                $data = array(
                  // 'nm_gbr' =>$gbr['file_name'],
                  // 'tipe_gbr' =>$gbr['file_type'],
                  // 'ket_gbr' =>$this->input->post('textket')
                //'kodesoal' => 'kodesoal',
                'nomor'.$i=> $this->input->post('nomor'.$i),
                'soal'.$i=> $this->input->post('soal'.$i),
                //'gambar' => $gbr['file_name'],
                'jwb_benar'.$i => $this->input->post('jwb_benar'.$i),
                'jwbA'.$i => $this->input->post('jwbA'.$i),
                'jwbB'.$i => $this->input->post('jwbB'.$i),
                'jwbC'.$i => $this->input->post('jwbC'.$i),
                'jwbD'.$i => $this->input->post('jwbD'.$i),                
                );
                $this->Soal_model->create_data($data);
                $i++;
              }
                    
               
                
              

 
                //$this->Soal_model->create_data($data); //akses kodesoal untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('soal/Soal');

        }
    }

     public function updateaksi(){
 
       $this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
       $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
       $path   = './gambar/'; //path folder
       $config['upload_path'] = $path; //variabel path untuk config upload
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
       $config['max_size'] = 2048; //maksimum besar file 2M
       $config['max_width']  = 1288; //lebar maksimum 1288 px
       $config['max_height']  = 768; //tinggi maksimu 768 px
       $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
       $this->upload->initialize($config);
 
       $md      = $this->input->post('kodesoal'); /* variabel id gambar */
       $filelama   = $this->input->post('filelama'); /* variabel file gambar lama */
 
       if($_FILES['filefoto']['name'])
       {
           if ($this->upload->do_upload('filefoto'))
           {
               $gbr = $this->upload->data();
                   $i=1;
              while ( $i<= $jmlsoal) {
                  # code...
                $data = array(
                  // 'nm_gbr' =>$gbr['file_name'],
                  // 'tipe_gbr' =>$gbr['file_type'],
                  // 'ket_gbr' =>$this->input->post('textket')
                'kodesoal' => $this->input->post('kodesoal'),
                'nomor' => $i,
                'soal' => $this->input->post('soal'.$i),
                'gambar' => $gbr['file_name'],
                'jwb_benar' => $this->input->post('jwb_benar'.$i),
                'jwbA' => $this->input->post('jwbA'.$i),
                'jwbB' => $this->input->post('jwbB'.$i),
                'jwbC' => $this->input->post('jwbC'.$i),
                'jwbD' => $this->input->post('jwbD'.$i),                
                );
                @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form
 
               $where =array('kodesoal'=>$md); //array where query sebagai identitas pada saat query dijalankan
               $this->Soal_model->get_update($data,$where); //akses kodesoal untuk menyimpan ke database
                $i++;
              }
 
               // @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form
 
               // $where =array('kodesoal'=>$md); //array where query sebagai identitas pada saat query dijalankan
               // $this->Soal_model->get_update($data,$where); //akses kodesoal untuk menyimpan ke database
 
              
               redirect('soal/Soal'); //jika berhasil maka akan ditampilkan view vupload
 
           }else{  /* jika upload gambar gagal maka akan menjalankan skrip ini */
               $er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
               //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
               echo '<script type="text/javascript"> alert("Tipe File Tidak Sama/Ukuran File Terlalu Besar") 
                window.location = "'.base_url().'soal/Soal'.'" </script>';
               //redirect('upload/edit'); //jika gagal maka akan ditampilkan form upload
           }
       }else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */
            
                 $i=1;
              while ( $i<= $jmlsoal) {
                  # code...
                $data = array(
                  // 'nm_gbr' =>$gbr['file_name'],
                  // 'tipe_gbr' =>$gbr['file_type'],
                  // 'ket_gbr' =>$this->input->post('textket')
                'kodesoal' => $this->input->post('kodesoal'),
                'nomor' => $i,
                'soal' => $this->input->post('soal'.$i),
                //'gambar' => $gbr['file_name'],
                'jwb_benar' => $this->input->post('jwb_benar'.$i),
                'jwbA' => $this->input->post('jwbA'.$i),
                'jwbB' => $this->input->post('jwbB'.$i),
                'jwbC' => $this->input->post('jwbC'.$i),
                'jwbD' => $this->input->post('jwbD'.$i),                
                );
                @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form
 
               $where =array('kodesoal'=>$md); //array where query sebagai identitas pada saat query dijalankan
               $this->Soal_model->get_update($data,$where); //akses kodesoal untuk menyimpan ke database
                $i++;
              }
           // $data = array(
           //      'kodesoal' => $this->input->post('kodesoal'),
           //      //'gambar' => $this->input->post('gambar'),
           //      'nomor' => $this->input->post('nomor'),
           //      'soal' => $this->input->post('soal'),
           //      'jwb_benar' => $this->input->post('jwb_benar'),
           //      'jwbA' => $this->input->post('jwbA'),
           //      'jwbB' => $this->input->post('jwbB'),
           //      'jwbC' => $this->input->post('jwbC'),
           //      'jwbD' => $this->input->post('jwbD'),
           //      'level' => $this->input->post('level'),
                
           // );
 
           // $where =array('kodesoal'=>$md); //array where query sebagai identitas pada saat query dijalankan
           // $this->Soal_model->get_update($data,$where); //akses kodesoal untuk menyimpan ke database
 
          
           redirect('soal/Soal'); /* jika berhasil maka akan kembali ke home upload */
       }
   }

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */