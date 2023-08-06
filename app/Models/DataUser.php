<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    protected $table = "data_user";

    protected $fillable = [
        'user_name',
        'user_email',
        'user_gender',
        'user_photo',
        'role_id',
        'user_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function getMenuListAttribute()
    {
        return $this->role->menus ?? collect();
    }
}
