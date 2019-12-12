<?php namespace App\Models;
use CodeIgniter\Model;

class Fine extends Model
{
    protected $table = 'fines';
    protected $allowedFields = ['quantity','fines'];
}