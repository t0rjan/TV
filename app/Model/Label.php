<?php

namespace App\Model;
class Label extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'label';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['*'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['password', 'remember_token'];


//    public function index($data = [])
//    {
//return $this;
//        return $this->orderby($data['sidx'], $data['sord']);
//                ->get(($page = $data['rows']) ? $page : self::PAGE_NUMS)
//                ->simplePaginate($data['page']);


//    }
}
