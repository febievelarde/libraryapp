<?php namespace App\Models;
use CodeIgniter\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $allowedFields = ['name','description','isbn','date_published','copies'];
}