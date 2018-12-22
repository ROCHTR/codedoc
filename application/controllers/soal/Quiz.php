<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Quiz extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_model');
        $this->load->model('Forum_model');
        $this->load->library('form_validation');
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
    }

    public function index()
    {
        $level = $this->Soal_model->get_all_tambahsoal();
        $nilai = $this->Soal_model->get_nilai_by_user($this->session->userdata('user_id'));
        $data = array(
            'level_data' => $level,
            'nilai_data' => $nilai
        );   
        $this->load->view('default/header');
        $this->load->view('frontuser/list_level',$data);
        $this->load->view('default/footer');
    }
    public function soal_quiz($id)
    {
        $quiz = $this->Soal_model->get_by_kodesoal($id);
        $data = array(
            'quiz_data' => $quiz,
            'soal_kode' => $id
        );
        $this->load->view('default/header');
        $this->load->view('frontuser/v_quiz',$data);
        $this->load->view('default/footer');
    }
    public function insert(){
        $data = array(
          'judul' => $this->input->post('title_forum'),
          'content' => $this->input->post('question_forum')
          );
        $this->Forum_model->insertnew($data);
        redirect('forum/Forum/index/');
    }
    public function list_answer($id_forum)
    {
        $answer = $this->Answer_model->get_by_id_forum($id_forum);
        $forum = $this->Forum_model->get_by_id($id_forum);

        $data = array(
            'forum_data' => $forum,
            'answer_data' => $answer,
            'id_forum' => $id_forum
        );

        $this->load->view('default/header');
        $this->load->view('frontuser/answer',$data);
        $this->load->view('default/footer');
    }
    public function insert_answer($id_forum){
        $data = array(
          'id_forum' => $id_forum,
          'content' => $this->input->post('reply_answer')
          );
        $forum = $this->Forum_model->get_jml_by_id($id_forum);
        $jumlah = array(
          'answer' => $forum+1
          );
        $this->Answer_model->insertnew($data);
        $this->Forum_model->update_jml($jumlah,$id_forum);
        // $this->output->enable_profiler(TRUE);
        redirect('forum/Forum/list_answer/'.$id_forum);
    }
    public function like_question($id_forum){
        $forum = $this->Forum_model->get_likes_by_id($id_forum);
        $jumlah = array('likes' => $forum+1);
        $this->Forum_model->update_jml($jumlah,$id_forum);
        $this->output->enable_profiler(TRUE);
        // redirect('forum/Forum/list_answer/'.$id_forum);
    }
    public function penilaian($id){
        $quiz = $this->Soal_model->get_by_kodesoal($id);
        $score = 0;
        $jumlah = 0;
        foreach ($quiz as $q) {
            if($this->input->post('q_'.$q->id_soal) == $q->jwb_benar) {
                $score = $score + 1;
            } else{
                $score = $score + 0;
            }
            $jumlah++;
        }
        $akhir =  $score/$jumlah*100;
        $data = array(
            'kodesoal' => $id, 
            'id_user' => $this->session->userdata('user_id'),
            'nilai' => $akhir
            );
        $this->Soal_model->insert_nilai($data);
        // $this->output->enable_profiler(TRUE);
        redirect('soal/Quiz/index');
    }
}