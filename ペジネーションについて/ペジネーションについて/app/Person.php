<?php

namespace App;

use App\Scopes\ScopePerson;//追加した
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Person extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
	    'name' =>'required',
	    'mail' =>'email',
	    'age' =>'integer|min:0|max:150'
    );

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query,$str)
    {
	    return $query->where('name',$str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
	    return $query->where('age','>=',$n);
    }

    public function scopeAgeLessThan($query, $n)
    {
	    return $query->where('age','<=', $n);
    }
    
    public function board()
    {
	    return $this->hasOne('App\Board');
    }

    public function boards()
    {
	    return $this->hasMany('App\Board');
    }
    /*２０歳以上の年齢だけの結果を絞り込むグローバルスコープ*/
    /*
    protected static function boot()
    {
	    parent::boot();

            static::addGlobalScope('age',function (Builder $builder){
		    $builder->where('age','>',20);
	    });
    }*/
    
    //２０歳以上の年齢だけの結果を絞り込むグローバルスコープ(簡易版)
    /*
    protected static function boot()
    {
	    parent::boot();
	    static::addGlobalScope(new ScopePerson);
    }
     */

}
