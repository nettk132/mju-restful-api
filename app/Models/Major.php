<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $primaryKey = 'major_id'; // ตั้งค่า Primary Key
    protected $fillable = [
        'name',
        'name_en',

    ];

    // Relation กับ Model "MjuStudent"
    public function students()  
    {

        return $this->hasMany(MjuStudent::class, 'major_id');
    }
}
