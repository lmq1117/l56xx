<?php

namespace App\Model\BaseEloquentORM;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * 关联到模型的表名
     * @var string
     */
    protected $table = 'base_eloquent_orm_flights';

    /**
     * 主键
     * @var string
     */
    public $primaryKey = 'flight_id';

    /**
     * 模型是否应该被打上时间戳 默认true 打
     * @var bool
     */
    public $timestamps = true;

    /**
     * 模型日期列的存储格式 U 时间戳  不写默认是datetime类型 YYYY-mm-dd H:i:s
     * @var string
     */
    protected $dateFormat = 'U';

    //创建时间和更新时间
    public const CREATED_AT = 'create_timestamp';
    public const UPDATED_AT = 'update_timestamp';

    //连接名
//    protected $connection = 'default';
}
