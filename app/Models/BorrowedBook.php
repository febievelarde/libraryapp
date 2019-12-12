<?php namespace App\Models;
use CodeIgniter\Model;

class BorrowedBook extends Model
{
    protected $table = 'borrowed_books';
    protected $allowedFields = ['student_id','book_id', 'date_borrowed', 'quantity','date_returned','status','fines'];
}