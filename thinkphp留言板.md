thinkphp��ϰʵ���������԰�
===

һ�� ˼·
--
1. ȷ�����ݿ�ṹ
2. �༭��ҳģ��
3. ��д����������


��. ��ʵ��
--
1. ��ѡһ�����԰�ĵ�ģ����ʽ

    ������http://www.mycodes.net/code_previewmap.php?id=5270Ϊ��������ϰ
    

    �������ֶ��У����⡢���ݡ�����ʱ�䡢�ʻ�������������������ID��
    ������ݿ��ṹ���£�
    

    ```
    CREATE TABLE think_GuestBook  
    (
    id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    username varchar(15),
    title varchar(15),
    contents text,
    time int,
    top int,
    down int,
    );
    ```
2. �༭��ҳģ��  
    ͨ��chrome��ģ�屣�浽/Application/Home/View/Index/index.html  
    
    �����б���volist��ǩ��� ������Ƭ�Σ�
     ```
<volist name="list" id="data">
<div class="message">
    <div class="user_con">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody><tr><td valign="middle" height="200">
                <table><tbody><tr style="height:25px;"><td>���ѣ�</td><td>{$data.username}</td></tr></tbody>
                </table></td></tr>
            </tbody>
        </table>
    </div>

    <div class="message_con"><table cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="title">{$data.title}</td></tr><tr><td>
        <table cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="content">{$data.contents}</td></tr><tr>
            <td class="time"><span class="date">{$data.time}</span>
                <span class="good_comment"><a href="javascript:setAjaxFunc('good','7') ">���ʻ�(+{$data.top})</a></span>
                <span class="good_comment"><a href="javascript:setAjaxFunc('bad','7') ">�Ӽ���(+{$data.down})</a></span>
            </td></tr>
        </tbody>
        </table></td></tr>
    </tbody>
    </table>
    </div>
</div>
</volist>
```

    
    
3. ��д����������
 
    1.����  
    new ���� ���ύ������  
        &#8195;get������������������  
        &#8195;post�����������������ݣ���ת�����԰��б�
        ����Ƭ��:
```
   public  function add(){
        $js_code ='';
        if ($_POST['type']==='new'){
            $data = array();
            $filter_list = 'strip_tags,htmlspecialchars';
            $data['username'] = I('param.username','��������',$filter_list);
            $data['username'] = $data['username']==''?'��������':$data['username'];
            $data['title'] = I('param.title','������',$filter_list);
            $data['title'] = $data['title']==''?'������':$data['title'];
            $data['contents'] = I('param.contents',' ',$filter_list);
            $data['time'] = time();
            $data['top'] = 0;
            $data['down'] = 0;

            $guestbook = M('guestbook');
            $guestbook->add($data);
            $js_code = 'alert("���Գɹ������ڷ����б�");self.location="/";'; //��������ת
        }
        //else ������Ա�
        $this->assign('add_js',$js_code);
        $this->display();
    }
```   
    index ��������ȡ���԰��б���ȡ������������  
        &#8195;get�޲�������ȡ���԰��б�  
        &#8195;get����id����ȡ������������   
        ����Ƭ��:
```
    public function index($id = null){


        $list=array();
        $guestbook = M('guestbook');
        if(!is_null($id)) {
            $id = (int)$id;
            $list = $guestbook->where("ID = $id ")->select();
        }else{
            $list = $guestbook->select();
        }

        $this->assign('list',$list);
        $this->display();
   }
```
   
    
��.�Ľ��İ汾 
---
1. ��ҳ  
    index������page������ʹ��ģ�͵�limit������ѯ������ʾ��  
    ```
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
```    
    
2. time�ֶε���ʾ��ʽ  
```
����ʱ�� {$data.time|date='Y-m-d H:i:s',###}
```  
3. top��down��Ĭ��ֵĬ��ֵ   
```
�Ӽ���(+{$data.down|default='0'})
```
4. ��֤��
5. ע��͵�¼
4. �쳣����  
    �޸ĳ���ҳ��
5. URL����
    
    
