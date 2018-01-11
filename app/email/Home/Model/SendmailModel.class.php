<?php
/**
 * Created by PhpStorm.
 * User: Annie
 * Date: 2017/12/12
 * Time: 13:44
 */



namespace Home\Model;
use Think\Model;

class SendmailModel extends Model {

    protected $_validate  = array(
        array('appid','require','请填写APPID',3),
        array('mename','require','请填写发件人',3),
        array('content','require','请填写内容',3),
        array('subject','require','请填写主题',3),
        array('to','require','请填写主题',3),
        array('to','email','收件人邮箱格式错误',3),
    );

    /**
     * 查询用户存不存在
     * @access public
     * @param varchat $appid
     * @param varchat $key
     * @return bool || false
     */
    public function a($appid,$key){
        //return 113;
    }


}

?>