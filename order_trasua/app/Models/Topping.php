<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{

    protected $fillable = [
      'name','image','price'
    ];
    protected $primaryKey = 'id';
    protected $table = 'toppings';

}
