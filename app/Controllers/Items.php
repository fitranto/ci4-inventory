<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class Items extends BaseController
{
    protected $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    // List all items
    public function index()
    {
        $data['title'] = 'Inventory';
        $data['items'] = $this->itemModel->findAll();

        return view('items/index', $data);
    }

    // Show form to add item
    public function create()
    {
        $data['title'] = 'Add Item';
        return view('items/create', $data);
    }

    // Save new item
    public function store()
    {
        $rules = [
            'category' => 'required|min_length[3]|max_length[100]',
            'stock'    => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->itemModel->save([
            'category' => $this->request->getPost('category'),
            'stock'    => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/items')->with('success', 'Item added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $item = $this->itemModel->find($id);

        if (! $item) {
            return redirect()->to('/items')->with('error', 'Item not found');
        }

        $data['title'] = 'Edit Item';
        $data['item']  = $item;

        return view('items/edit', $data);
    }

    // Update item
    public function update($id)
    {
        $rules = [
            'category' => 'required|min_length[3]|max_length[100]',
            'stock'    => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->itemModel->update($id, [
            'category' => $this->request->getPost('category'),
            'stock'    => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/items')->with('success', 'Item updated successfully');
    }

    // Delete item
    public function delete($id)
    {
        $this->itemModel->delete($id);
        return redirect()->to('/items')->with('success', 'Item deleted successfully');
    }
}
