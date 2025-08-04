<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Product extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\Product';
    protected $format    = 'json';
   
    public function index()
    {
         $data = [
            'products' => $this->model->findAll()
        ];
        return view('products/index', $data);
    }


    public function show($id = null)
    {
         $product = $this->model->find($id);
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan.');
        }
        return view('products/show', ['product' => $product]);
    }


    public function new()
    {
         return view('products/create');
    }


    public function create()
    {
         $rules = $this->model->validationRules;
        $messages = $this->model->validationMessages;

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
        ];

        $this->model->insert($data);
        return redirect()->to('/products')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function edit($id = null)
    {
        $product = $this->model->find($id);
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan.');
        }
        return view('products/edit', ['product' => $product]);
    }

 
    public function update($id = null)
    {
         $rules = $this->model->validationRules;
        $messages = $this->model->validationMessages;

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
        ];

        $this->model->update($id, $data);
        return redirect()->to('/products')->with('success', 'Produk berhasil diupdate!');
    }

 
    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('/products')->with('success', 'Produk berhasil dihapus!');
    }
}
