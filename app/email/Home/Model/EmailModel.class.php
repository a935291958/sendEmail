<?php
/**
 * Created by PhpStorm.
 * User: Annie
 * Date: 2017/12/12
 * Time: 13:44
 */



namespace Home\Model;
use Think\Model;

class EmailModel extends Model {

    protected $_validate  = array(
        array('appid','require','请填写APPID',3),
        array('key','require','请填写KEY',3),
    );

    /**
     * 查询用户存不存在
     * @access public
     * @param varchat $appid
     * @param varchat $key
     * @return bool || false
     */
    public function isUser($appid,$key){
        $where['appid'] = $appid;
        $where['key'] = $key;
        $res = $this->where($where)->count();
        if($res>=1){
            return true;
        }else{
            return false;
        }
    }


}

?>