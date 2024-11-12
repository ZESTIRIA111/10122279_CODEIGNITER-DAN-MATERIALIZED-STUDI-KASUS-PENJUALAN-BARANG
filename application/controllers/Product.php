// Product.php (controller)
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');  
        }
    }

    $this->form_validation->set_rules('product_name', 'Nama Produk', 'required');
    $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
    $this->form_validation->set_rules('description', 'Deskripsi', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('product/create');
    } else {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('product_image')) {
            $image_data = $this->upload->data();
            $image_path = $image_data['file_name'];
        } else {
            $image_path = 'default.jpg'; 
        }

        $data = array(
            'product_name' => $this->input->post('product_name'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description'),
            'image' => $image_path
        );
        $this->Product_model->insert_product($data);
        redirect('product');
    }
}

    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('product/index', $data);
    }

    public function create() {
        $this->load->view('product/create');
    }

    public function store() {
        $data = array(
            'product_name' => $this->input->post('product_name'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description')
        );
        $this->Product_model->insert_product($data);
        redirect('product');
    }

    public function edit($id) {
        $data['product'] = $this->Product_model->get_product_by_id($id);
        $this->load->view('product/edit', $data);
    }

    public function update($id) {
        $data = array(
            'product_name' => $this->input->post('product_name'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description')
        );
        $this->Product_model->update_product($id, $data);
        redirect('product');
    }

    public function delete($id) {
        $this->Product_model->delete_product($id);
        redirect('product');
    }
    
    { if ($this->form_validation->run() == FALSE) {
            $this->load->view('product/create');
        } else {
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description')
            );
            $this->Product_model->insert_product($data);
            redirect('product');
        }
    }
    
        if ($this->form_validation->run() == FALSE) {
            $data['product'] = $this->Product_model->get_product_by_id($id);
            $this->load->view('product/edit', $data);
        } else {
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description')
            );
            $this->Product_model->update_product($id, $data);
            redirect('product');
        }

    {    public function index() {
            $this->load->library('pagination');
        
            $config['total_rows'] = $this->Product_model->count_all_products();
            $config['per_page'] = 10; 
        
            $config['base_url'] = site_url('product/index');
            $config['uri_segment'] = 3; 
            $this->pagination->initialize($config);
        
            $data['products'] = $this->Product_model->get_products($config['per_page'], $this->uri->segment(3));
            
            $this->load->view('product/index', $data);
        }
        
    {    public function search() {
            $keyword = $this->input->post('keyword');
            $data['products'] = $this->Product_model->search_products($keyword);
            $this->load->view('product/index', $data);
            public function export_excel() {
                $this->load->library('excel');
            
                $products = $this->Product_model->get_all_products();
            
                $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
            
                $sheet->setCellValue('A1', 'ID');
                $sheet->setCellValue('B1', 'Nama Produk');
                $sheet->setCellValue('C1', 'Harga');
                $sheet->setCellValue('D1', 'Deskripsi');
            
                $row = 2;
                foreach ($products as $product) {
                    $sheet->setCellValue('A'.$row, $product->id);
                    $sheet->setCellValue('B'.$row, $product->product_name);
                    $sheet->setCellValue('C'.$row, $product->price);
                    $sheet->setCellValue('D'.$row, $product->description);
                    $row++;
                }
            
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                $writer->save('php://output');

                $this->Sales_model->insert_sale($data); 
                redirect('sales'); 
            }            
        }        
    }    

}