<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function subMenus()
    {
        return $this->hasMany(SubMenu::class, 'menu_id');
    }
}