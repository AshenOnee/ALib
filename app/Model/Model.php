<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'power', 'brand_id', 'discription', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand() {
        return $this->belongsTo('App\Model\Brand', 'brand_id', 'id');
    }
}
