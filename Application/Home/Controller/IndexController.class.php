<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index( $id = null, $page = null){
        $list=array();
        $limit = 2 ;
        $guestbook = M('guestbook');
        if(!is_null($id)) {
            $id = (int)$id;
            $list = $guestbook->where("ID = $id ")->select();
        }else{
            $page = is_null($page)?1:(int)$page ;
            $list = $guestbook->limit($limit * ($page-1),$limit)->select();
        }
        $this->assign('list',$list);
        $this->display();
    }

    public  function add(){
        $js_code ='';
        if ($_POST['type']==='new'){
            $data = array();
            $filter_list = 'strip_tags,htmlspecialchars';
            $data['username'] = I('param.username','匿名网友',$filter_list);
            $data['username'] = $data['username']==''?'匿名网友':$data['username'];
            $data['title'] = I('param.title','无主题',$filter_list);
            $data['title'] = $data['title']==''?'无主题':$data['title'];
            $data['contents'] = I('param.contents',' ',$filter_list);
            $data['time'] = time();
            $data['top'] = 0;
            $data['down'] = 0;

            $guestbook = M('guestbook');
            $guestbook->add($data);
            $js_code = 'alert("留言成功！现在返回列表");self.location="/";'; //弹窗、跳转
        }
        //else 输出留言表单
        $this->assign('add_js',$js_code);
        $this->display();
    }


}