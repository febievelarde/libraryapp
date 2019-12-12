<?php namespace App\Models;
use CodeIgniter\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $allowedFields = ['student_id', 'name', 'course_id', 'course_year_id'];
}