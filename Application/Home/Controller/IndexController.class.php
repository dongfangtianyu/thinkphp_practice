<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($id = null){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

//        $data = array();
//        $data['UserName']='admin';
//        $data['Title'] = 'Title';
//        $data['Contents'] = 'Content';
//        $data['Time'] = time();
//        $data['Top'] = 0;
//        $data['Down'] = 2;
//        $list [] = $data;
//        $data['UserName']='test';
//        $data['Title'] = '青玉案（贺铸）';
//        $data['Contents'] = '凌波不过横塘路，但目送，芳尘去。锦瑟华年谁与度？月台花榭，琐窗朱户，只有春知处。 　　飞云冉冉蘅皋暮，彩笔新题断肠句。试问闲愁都几许？一川烟草，满城风絮，梅子黄时雨。';
//        $data['Time'] = time();
//        $data['Top'] = 1;
//        $data['Down'] = 0;
//        $list [] = $data;
//        $user =M('guestbook');
//        $user->add($data);
        $list=array();
        $guestbook = M('guestbook');
        if(is_null($id)) {

            $list = $guestbook->select();
        }elseif(is_numeric($id)){
            $list = $guestbook->where("ID = $id ")->select();
        }

        $this->assign('list',$list);
        $this->display();

    }

    public  function add(){
        //todo 判断$_POST[]
        //if POST 请求 写入数据库，输出提示语，调整会首页
        if ($_POST['type']=='new'){
            dump($_POST);exit;
        }
        //else 输出留言表单

        $this->display();
}
}