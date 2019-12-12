<?php namespace App\Models;
use CodeIgniter\Model;

class CourseYear extends Model
{
    protected $table = 'course_years';
    protected $allowedFields = ['name','slug'];
}