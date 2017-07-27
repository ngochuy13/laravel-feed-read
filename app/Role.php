<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public $fillable = ['name','display_name','description'];

    public function setNameAttribute( $value ){
        $formatted_name = $value;

        if($formatted_name === ''){
            $formatted_name = $this->attributes['display_name'];
        }
        $formatted_name = str_replace(' ', '_', strtolower($formatted_name));
        $formatted_name = preg_replace('/[^A-Za-z0-9\_]/', '', $formatted_name);
        $this->attributes['name'] = $formatted_name;
    }
}
