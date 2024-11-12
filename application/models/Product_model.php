<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    
    public function get_all_products() {
        return $this->db->get('products')->result();
    }
    
    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    public function get_product_by_id($id) {
        return $this->db->get_where('products', array('id' => $id))->row();
    }

    public function update_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function count_all_products() {
        return $this->db->count_all('products');
    }
    
    public function get_products($limit, $start) {
        return $this->db->get('products', $limit, $start)->result();
    }
    
    public function search_products($keyword) {
        $this->db->like('product_name', $keyword);
        $this->db->or_like('description', $keyword);
        return $this->db->get('products')->result();
    }    
}