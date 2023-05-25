<?php
class Product_model extends CI_Model {
    public function create($data) {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    public function getAll() {
        return $this->db->get('products')->result();
    }

    public function getById($id) {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }
}
?>
