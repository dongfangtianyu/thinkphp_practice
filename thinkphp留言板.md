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
    index ��������ȡ���԰��б���ȡ������������  
        &#8195;get�޲�������ȡ���԰��б�  
        &#8195;get����id����ȡ������������   
        ����Ƭ��:
```
    public function index($id = null){


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
```
   
    
��.�Ľ��İ汾 
---
1. ��ҳ
2. time�ֶε���ʾ��ʽ
3. top��down��Ĭ��ֵĬ��ֵ
4. ��֤��
5. ע��͵�¼
4. �쳣����
5. URL����
    
    
