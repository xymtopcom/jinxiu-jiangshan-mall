<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class Collect extends Model
{
    public function collect()
     {
          return $this->hasMany('Collect','userid');
        
    }
}
