<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    public function Menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}