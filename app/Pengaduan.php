<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
     protected $fillable = [
		'subject',
		'lokasi',
		'isi',
		'skpd_id',
	];

	public function skpd()
    {
    	return $this->belongsTo(Skpd::class);
    }
}
