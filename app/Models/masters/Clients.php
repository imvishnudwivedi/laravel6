<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model {
	use SoftDeletes;
	protected $table = 'clients';

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'name','domain', 'description', 'image', 'created_by', 'updated_by'];
}
