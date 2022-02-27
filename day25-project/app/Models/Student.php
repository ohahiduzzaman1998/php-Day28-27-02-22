<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $student;

    public function newStudent()
    {
        $this->student = new Student();
        $this->student->name = 'nahid';
        $this->student->email = 'nahid@gmail.com';
        $this->student->mobile = '01761455885';
        $this->student->save();
    }

    public static function getAllStudent()
    {
        return [
          0=>[
              'id'      =>1,
              'name'    => 'shehon',
              'email'   => 'shehon@gmail.com',
              'mobile'  => '01970481744',
              'image'   => '',
          ],
            1=>[
                'id'      =>2,
                'name'    => 'nahid',
                'email'   => 'nahid@gmail.com',
                'mobile'  => '01631481744',
                'image'   => '',
            ],
        ];
    }
}
