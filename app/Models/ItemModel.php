<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table         = 'items';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true; // auto-manage created_at & updated_at

    protected $allowedFields = ['category', 'stock'];
}
