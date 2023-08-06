<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    use HasFactory;

    protected $table = "role_menus";
    protected $primaryKey = 'role_menu_id';
    protected $fillable = [
        'role_id',
        'menu_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id_menu');
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class RoleMenu extends Model
// {
//     use HasFactory;

//     protected $table = "role_menus";
//     protected $primaryKey = 'role_menu_id';
//     protected $fillable = [
//         'role_id',
//         'menu_id',
//         'id_menu',
//     ];


//     public function role()
//     {
//         return $this->belongsTo(Role::class, 'role_id', 'role_id');
//     }

//     public function menu()
//     {
//         return $this->belongsTo(Menu::class, 'menu_id', 'id_menu');
//     }

    // public function role()
    // {
    //     return $this->belongsTo(Role::class, 'role_id', 'role_id');
    // }

    // public function menu()
    // {
    //     return $this->belongsTo(Menu::class, 'menu_id', 'menu_id');
    // }



// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class RoleMenu extends Model
// {
//     use HasFactory;
//     public $table = "role_menu";
//     protected $fillable = [
//         'role_menu_id',
//         'role_id',
//         'menu_id',
//     ];

//     public function role()
//     {
//         return $this->belongsTo(Role::class, 'role_id', 'role_id');
//     }

//     public function menu()
//     {
//         return $this->belongsTo(Menu::class, 'menu_id', 'menu_id');

//     }
    


