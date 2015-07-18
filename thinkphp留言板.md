thinkphp练习实例——留言板
===

一、 思路
--
1. 确定数据库结构
2. 编辑网页模板
3. 编写控制器代码


二. 简单实例
--
1. 挑选一个留言板的的模板样式

    本例以http://www.mycodes.net/code_previewmap.php?id=5270为例进行练习
    

    在留言字段有：标题、内容、发布时间、鲜花数、鸡蛋数、留言者ID，
    设计数据库表结构如下：
    

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
2. 编辑网页模板  
    通过chrome将模板保存到/Application/Home/View/Index/index.html  
    
    留言列表由volist标签输出 ，代码片段：
     ```
<volist name="list" id="data">
<div class="message">
    <div class="user_con">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody><tr><td valign="middle" height="200">
                <table><tbody><tr style="height:25px;"><td>网友：</td><td>{$data.username}</td></tr></tbody>
                </table></td></tr>
            </tbody>
        </table>
    </div>

    <div class="message_con"><table cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="title">{$data.title}</td></tr><tr><td>
        <table cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="content">{$data.contents}</td></tr><tr>
            <td class="time"><span class="date">{$data.time}</span>
                <span class="good_comment"><a href="javascript:setAjaxFunc('good','7') ">送鲜花(+{$data.top})</a></span>
                <span class="good_comment"><a href="javascript:setAjaxFunc('bad','7') ">扔鸡蛋(+{$data.down})</a></span>
            </td></tr>
        </tbody>
        </table></td></tr>
    </tbody>
    </table>
    </div>
</div>
</volist>
```

    
    
3. 编写控制器代码
 
    1.方法  
    new 方法 ：提交新留言  
        &#8195;get方法：输出留言输入框  
        &#8195;post方法：保存留言数据，跳转到留言板列表    
    index 方法：获取留言板列表，获取单条留言内容  
        &#8195;get无参数：获取留言板列表  
        &#8195;get参数id：获取单条留言内容   
        代码片段:
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
   
    
三.改进的版本 
---
1. 分页
2. time字段的显示方式
3. top和down的默认值默认值
4. 验证码
5. 注册和登录
4. 异常处理
5. URL处理
    
    
