<?php

namespace Home\Controller;

use Think\Controller;
use Think\Exception;

class IndexController extends Controller
{
    public function index()
    {
//        $t = time();
//        echo"$t<br/>";
//        echo 'email_'.md5($t.'935291958');
        $this->display();

    }

    public function t(){
        phpinfo();
    }

    //ajax返回
    protected function aR($msg, $type = 1)
    {
        $aRT['res'] = true;
        $aRF['res'] = false;
        switch ($type) {
            case 1:
                $aRT['msg'] = $msg;
                $this->ajaxReturn($aRT);
                break;
            case 0:
                $aRF['msg'] = $msg;
                $this->ajaxReturn($aRF);
                break;
        }
        die;
    }

    public function sendMails()
    {
        if (!IS_POST) {
            $this->aR('请求错误', 0);
        }

        $email = D('email');

        $sendmail = M('sendmail');

        $ip = $_SERVER['HTTP_CLIENT_IP'] == '' ? ($_SERVER['REMOTE_ADDR'] == '' ? $_SERVER["HTTP_X_FORWARDED_FOR"] :$_SERVER['REMOTE_ADDR']) :'' ;

        $userData = $sendmail->where(array('ip'=>$ip))->order('id desc')->field('addtime')->find();

       //dump($ip);
       // dump($_SERVER);
        //dump($userData);die;
        //dump(  $userData['addtime']);
        //dump(  time() );
        //echo time() - (int)$userData['addtime'];
        if($userData  &&  time() - $userData['addtime'] < 5 ){
            //$this->aR('提交间隔为5秒',0);
        }



        //接收表单内容
        $data['appid'] = I('post.appid');
        $data['key'] = I('post.key');
        $data['to'] = I('post.to');
        $data['mename'] = I('post.mename');
        $data['subject'] = I('post.subject');
        $data['ip'] = $ip ;
        $data['content'] = I('post.content','',false);//发送邮件前不过滤，存入数据库的时候再过滤
        $data['addtime'] = time();
        //dump($_POST);
        //die;





        //自动验证APPID和KEY是不是空值
        if (!$email->create()) {
            $this->aR($email->getError(), 0);
        }

        //验证用户存不存在
        $isUser = $email->isUser($data['appid'],$data['key']);
        if ($isUser !== true) {
            $this->aR('用户不存在', 0);
        }

        //echo 1;die;
        $s = D('sendmail');



        //判断主题、发件人等等是否空值
        if (!$s->create()) {
            $this->aR($s->getError(), 0);
        }

        //function sendMail(收件人,发件人昵称 ,主题, 内容)


        try{
            //发送邮件
            $sendRes = sendMail($data['to'],$data['mename'],$data['subject'],$data['content']);
        }catch (Exception $e){
            $sendRes = false;
        }

        //过滤content的HTML标签
        $data['content'] = htmlspecialchars($data['content']);


        //判断有没有发送成功
        if(!$sendRes){
            //将失败记录存入数据库
            $data['result'] = 'fail';
            $s->data($data)->add();
            $this->aR('发送失败',0);
        }

        //发送成功后存入数据库


        $data['result'] = 'success';
        $addRes = $s->data($data)->add();





        $this->aR('发送成功');






    }
}