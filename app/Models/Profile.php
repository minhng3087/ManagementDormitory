<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'mssv', 'sdt','vien_id', 'gt_id','email', 'khoa_id', 'qq', 'image' 
    ];
    public function vien()
    {
        return $this->hasOne('App\Models\Vien');
    }

    public function gt()
    {
        return $this->hasOne('App\Models\Gt');
    }

    public function khoa()
    {
        return $this->hasOne('App\Models\Khoa');
    }
}
