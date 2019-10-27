<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlider extends Model
{
    use SoftDeletes;
       protected $table = 'home_slider';

   protected $dates = ['deleted_at'];

   protected $fillable = [
   'heading','sub_heading','description','attachment','created_by','updated_by'
   ];
}
