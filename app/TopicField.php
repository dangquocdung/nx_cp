<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicField extends Model
{

    //Relation to Users
    public function title_vi()
    {
        return $this->belongsTo('App\WebmasterSectionField', 'field_id');
    }
}
