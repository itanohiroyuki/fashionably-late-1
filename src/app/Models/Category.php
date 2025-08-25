<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'contact_id' => 'required',
        'content' => 'required'
    );

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
