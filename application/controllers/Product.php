<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {
        $data['products'] = $this->Product_model->getAll();
        $this->load->view('product_list', $data);
    }

    public function create() {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );

        // Realize a validação dos dados recebidos antes de salvar no banco de dados

        $product_id = $this->Product_model->create($data);

        // Redirecione para a página de listagem ou exiba uma mensagem de sucesso
    }

    public function edit($id) {
        $data['product'] = $this->Product_model->getById($id);
        $this->load->view('product_edit', $data);
    }

    public function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );

        // Realize a validação dos dados recebidos antes de atualizar no banco de dados

        $this->Product_model->update($id, $data);

        // Redirecione para a página de listagem ou exiba uma mensagem de sucesso
    }

    public function delete($id) {
        $this->Product_model->delete($id);

        // Redirecione para a página de listagem ou exiba uma mensagem de sucesso
    }
}
?>
