<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Materi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Materi_model');
        $this->load->library('form_validation');
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
    }

    public function index()
    {
        $materi = $this->Materi_model->get_all();

        $data = array(
            'materi_data' => $materi
        );

        $this->load->view('inti/header');
        $this->load->view('kelola_materi/materi_list',$data);
        $this->load->view('inti/footer');
    }

    public function read($id) 
    {
        $row = $this->Materi_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'kodemateri' => $row->kodemateri,
            'judul' => $row->judul,
    		'gambar' => $row->gambar,
    		'isi' => $row->isi,
        'jenis' => $row->jenis,
    	    );
            $this->load->view('inti/header');
            $this->load->view('kelola_materi/materi_read',$data);
            $this->load->view('inti/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('materi/Materi'));
        }
    }

   

    public function create() 
    {
        
       
        $data = array(
            'button' => 'Create',
            'action' => site_url('materi/Materi/insert'),
            // 'dd_tempat' => $this->soal_kodesoal->dd_tempat(),
            // 'tempat_selected' => $this->input->post('tempat') ? $this->input->post('tempat') : '',
    	       'kodemateri' => set_value('kodemateri'),
    	      'judul' => set_value('judul'),
            'gambar' => set_value('gambar'),
    	       'isi' => set_value('isi'),
             'jenis' => set_value('jenis'),
    	);

            $this->load->view('inti/header');
            $this->load->view('kelola_materi/materi_form',$data);
            $this->load->view('inti/footer');
    }
    // public function daftarclient(){
    //    while($i = $i2 ){
    //     $data = array(
    //         // 'button' => 'Create',
    //         // 'action' => site_url('soal/Soal/insert'),
    //         // 'dd_tempat' => $this->soal_kodesoal->dd_tempat(),
    //         // 'tempat_selected' => $this->input->post('tempat') ? $this->input->post('tempat') : '',
    //         'kodesoal' => set_value('kodesoal'),
    //         'nomor' => $i,
    //         'soal' => set_value('soal',$i),
    //         'gambar' => set_value('gambar',$i),
    //         'jwb_benar' => set_value('jwb_benar',$i),
    //         'jwbA' => set_value('jwbA',$i),
    //         'jwbB' => set_value('jwbB',$i),
    //         'jwbC' => set_value('jwbC',$i),
    //         'jwbD' => set_value('jwbD',$i),
    //         'level' => set_value('level',$i),
    //     );
    //     $i++;
    // }
        
    //     $this->Soal_model->insert($data);
    //     //redirect(base_url('index.php/user/viewdaftarclient'));
    // }

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
    
   
    
    public function update($id) 
    {
        $row = $this->Materi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('materi/Materi/updateaksi'),
        		    'kodemateri' => set_value('kodemateri', $row->kodemateri),
        		    'judul' => set_value('judul', $row->judul),
                'gambar' => set_value('gambar', $row->gambar),
        		    'isi' => set_value('isi', $row->isi),
                'jenis' => set_value('jenis', $row->jenis),
        	    );
            $this->load->view('inti/header');
            $this->load->view('kelola_materi/materi_form',$data);
            $this->load->view('inti/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('materi/Materi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Materi_model->get_by_id($id);

        if ($row) {
            $this->Materi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('materi/Materi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('materi/Materi'));
        }
    }  

     public function insert(){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './gambar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4|flv|pdf|rar|xls|xlsx|ppt|pptx|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = 20480; //maksimum besar file 2M
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
               
                    $data = array(
                  // 'nm_gbr' =>$gbr['file_name'],
                  // 'tipe_gbr' =>$gbr['file_type'],
                  // 'ket_gbr' =>$this->input->post('textket')
                'kodemateri' => $this->input->post('kodemateri'),
                'judul' => $this->input->post('judul'),
                'gambar' => $gbr['file_name'],
                'isi' => $this->input->post('isi'), 
                'jenis' => $this->input->post('jenis'),                   
                );

 
                $this->Materi_model->create_data($data); //akses kodesoal untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('materi/Materi/index'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $er_upload=$this->upload->display_errors();
               echo '<script type="text/javascript"> alert("Tipe File Tidak Sama/Ukuran File Terlalu Besar") 
                window.location = "'.base_url().'materi/Materi/index'.'" </script>';
                //redirect('soal'); //jika gagal maka akan ditampilkan form upload
            }
          
        }
          else{

                    $data = array(
                  // 'nm_gbr' =>$gbr['file_name'],
                  // 'tipe_gbr' =>$gbr['file_type'],
                  // 'ket_gbr' =>$this->input->post('textket')
                'kodemateri' => $this->input->post('kodemateri'),
                'judul' => $this->input->post('judul'),
                // 'gambar' => $gbr['file_name'],
                'isi' => $this->input->post('isi'),
                'jenis' => $this->input->post('jenis'),                    
                );

 
                $this->Materi_model->create_data($data);
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('materi/Materi/index'); //jika berhasil maka akan ditampilkan view vupload
            }
    }

     public function updateaksi(){
 
       $this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
       $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
       $path   = './gambar/'; //path folder
       $config['upload_path'] = $path; //variabel path untuk config upload
       $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4|flv|pdf|rar|xls|xlsx|ppt|pptx|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
       $config['max_size'] = 20480; //maksimum besar file 2M
       $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
       $this->upload->initialize($config);
 
       $md      = $this->input->post('kodesoal'); /* variabel id gambar */
       $filelama   = $this->input->post('filelama'); /* variabel file gambar lama */
 
       if($_FILES['filefoto']['name'])
       {
           if ($this->upload->do_upload('filefoto'))
           {
               $gbr = $this->upload->data();
               $data = array(
                'kodemateri' => $this->input->post('kodemateri'),
                'judul' => $this->input->post('judul'),
                'gambar' => $gbr['file_name'],
                'isi' => $this->input->post('isi'),
                'jenis' => $this->input->post('jenis'), 
 
               );
 
               @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form
 
               $where =array('kodemateri'=>$md); //array where query sebagai identitas pada saat query dijalankan
               $this->Materi_model->get_update($data,$where); //akses kodesoal untuk menyimpan ke database
 
              
               redirect('materi/Materi'); //jika berhasil maka akan ditampilkan view vupload
 
           }else{  /* jika upload gambar gagal maka akan menjalankan skrip ini */
               $er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
               //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
               echo '<script type="text/javascript"> alert("Tipe File Tidak Sama/Ukuran File Terlalu Besar") 
                window.location = "'.base_url().'materi/Materi'.'" </script>';
               //redirect('upload/edit'); //jika gagal maka akan ditampilkan form upload
           }
       }else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */
 
           $data = array(
               'kodemateri' => $this->input->post('kodemateri'),
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'jenis' => $this->input->post('jenis'), 
                
           );
 
           $where =array('kodemateri'=>$md); //array where query sebagai identitas pada saat query dijalankan
           $this->Materi_model->get_update($data,$where); //akses kodesoal untuk menyimpan ke database
 
          
           redirect('materi/Materi'); /* jika berhasil maka akan kembali ke home upload */
       }
   }
   public function materi_user(){
    $materi = $this->Materi_model->get_all();

        $data = array(
            'materi_data' => $materi
        );
        $this->load->view('default/header');
        $this->load->view('frontuser/list_materi',$data);
        $this->load->view('default/footer');
   }
   public function materi_view($id){
        $materi = $this->Materi_model->get_by_id($id);

        $data = array(
            'materi_data' => $materi
        );
        $this->load->view('default/header');
        $this->load->view('frontuser/view_materi',$data);
        $this->load->view('default/footer');
   }

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */