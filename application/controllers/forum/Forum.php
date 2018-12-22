<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Forum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Answer_model');
        $this->load->model('Forum_model');
        $this->load->library('form_validation');
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
    }

    public function index()
    {
        $forum = $this->Forum_model->get_all();

        $data = array(
            'forum_data' => $forum
        );

        $this->load->view('default/header');
        $this->load->view('frontuser/list_forum',$data);
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
        // $this->output->enable_profiler(TRUE);
        redirect('forum/Forum/list_answer/'.$id_forum);
    }

}