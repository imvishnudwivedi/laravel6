<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seed extends Model
{
    use SoftDeletes;
	protected $table = 'seeds';

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'name','description'];
}
