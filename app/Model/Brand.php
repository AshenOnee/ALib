<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];
    protected $primarykey = 'id';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function models() {
        return $this->hasMany('\App\Model\Model', 'brand_id', 'id');
    }
}
