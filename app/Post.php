<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function getDateFormat()
    {
        return 'U';
    }

    protected $dates = ['published_at'];

    //当设置title值时，自动给slug字段赋值
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if(! $this->exists)
        {
            $this->attributes['slug'] = str_slug($value);
        }
    }

    public function getPublishedAtAttribute()
    {
        return date('Y-m-d H:i:s',$this->attributes['published_at']);
    }
}
