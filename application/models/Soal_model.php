<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Soal_model extends CI_Model
{

    public $table = 'soal';
    public $id = 'kodesoal';
    public $order = 'DESC';
    public $table2 = 'tambahsoal';
    public $id2 = 'kodesoal';
    public $order2 = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function get_by_kodesoal($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kodesoal', $q);
    	$this->db->or_like('nomor', $q);
    	$this->db->or_like('soal', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->or_like('jwb_benar', $q);
        $this->db->or_like('jwbA', $q);
    	$this->db->or_like('jwbB', $q);
        $this->db->or_like('jwbC', $q);
        $this->db->or_like('jwbD', $q);
        $this->db->or_like('level', $q);
       	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
         $this->db->like('kodesoal', $q);
        $this->db->or_like('nomor', $q);
        $this->db->or_like('soal', $q);
        $this->db->or_like('gambar', $q);
        $this->db->or_like('jwb_benar', $q);
        $this->db->or_like('jwbA', $q);
        $this->db->or_like('jwbB', $q);
        $this->db->or_like('jwbC', $q);
        $this->db->or_like('jwbD', $q);
        $this->db->or_like('level', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

     function insert2($data)
    {
        $this->db->insert($this->table2, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

     function get_update($data,$where){
       $this->db->where($where);
       $this->db->update($this->table, $data);
       return TRUE;
    }

  
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function create_data($data)
    {
        $this->db->insert($this->table, $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else{
            return false;
        }
    }
        function valid_id($id)
    {
        $query = $this->db->get_where($this->table, array('model' => $id));
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function getsoalbyjumlah($jml){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('jmlsoal', $jml);
        $query = $this->db->get();
        return $query->result();
    }
    //NILAI
    function get_nilai_by_user($id_user){
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->order_by('id_nilai', 'DESC');
        $this->db->where(array('id_user' => $id_user));
        return $this->db->get();
    }
    function insert_nilai($data){
        $this->db->insert('nilai', $data);
    }
    function get_all_tambahsoal()
    {
        $this->db->order_by($this->id, 'ASC');
        return $this->db->get($this->table2)->result();
    }
}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */