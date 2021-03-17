<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{


	protected $fillable = [ 'ip', 'visitdate','visittime' ];
	protected $table = 'table_visitor';
}
