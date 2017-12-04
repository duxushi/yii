<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}
ul{ list-style: none}

.top{ width: 100%; background: rgba(14, 196, 210, 0.99); color: #fff; height: 100px; line-height: 150px; text-align: right;}
.top span{ margin-right: 20px}


.left{ width: 260px; float: left; height: 100%; background: rgba(121, 217, 221, 0.4)}
.left ul{ list-style: none; width: 100%;}
.left ul li{ height: 40px; width: 100%; border: 1px solid #ddd; line-height: 40px; text-align: center;}
.left .selected{ background: rgba(14, 196, 210, 0.99);}
.left .selected a{ color: #fff;}


.right{ float: left; width: 1000px;}
.search-box{ width: 900px; margin: 0 auto; margin-top: 100px; }
.right li{
    margin-top: 20px;
}
.right span{
    display: inline-block;
    width: 200px;
    line-height: 40px;
    height: 40px;
    text-align: right;
    margin-right: 20px;
}

.right .filed-name{
    width: 300px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}

.right .length{
    width: 140px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}

.submit{
    width: 150px;
    height: 40px;
    line-height: 40px;
    border-radius: 3px;
    border: 1px solid #ddd;
    display: inline-block;
    background: rgba(14, 196, 210, 0.99);
    color: #fff;
    text-align: center;
    margin-left: 200px;
    margin-top: 20px;
}
</style>

<div class="top">
    <span>欢迎管理员：admin</span>
</div>

<div class="left">
    <ul>
        <li><a href="index.php?r=test/user_show">查看注册字段</a></li>
        <li class="selected"><a href="#">添加注册字段</a></li>
    </ul>
</div>

<div class="right">
    <div class="search-box">
        <form action="index.php?r=test/user_add_do" method="post">
            <ul>
                <li>
                    <span>请输入字段名称：</span>
                    <input class="filed-name" name="t_name" type="text" value="<?=$list['t_name']?>">
                </li>
                <li>
                    <span>请输入字段默认值：</span>
                    <input class="filed-name" name="t_value" type="text" value="<?=$list['t_value']?>">
                </li>
                <li>
                    <span>请选择字段类型：</span>
                    <select name="t_type" id="">
                    	<?php 
                    		switch ($list['t_type']) {
                    			case 'input-text':
                    				echo "<option value='input-text' selected>文本框</option>
										<option value='input-radio'>单选框</option>
				                        <option value='input-password'>密码框</option>
				                        <option value='textarea'>文本域</option>";
                    				break;
                    			case 'input-radio':
                    				echo "<option value='input-text'>文本框</option>
										<option value='input-radio' selected>单选框</option>
				                        <option value='input-password'>密码框</option>
				                        <option value='textarea'>文本域</option>";
                    				break;
                    			case 'input-password':
                    				echo "<option value='input-text'>文本框</option>
										<option value='input-radio'>单选框</option>
				                        <option value='input-password' selected>密码框</option>
				                        <option value='textarea'>文本域</option>";
                    				break;
                    			default:
                    				echo "<option value='input-text'>文本框</option>
										<option value='input-radio'>单选框</option>
				                        <option value='input-password'>密码框</option>
				                        <option value='textarea' selected>文本域</option>";
                    				break;
                    		}
                    	?>
                        
                    </select>
                </li>
                <!-- <li>
                    <span>请填写字段选项：</span>
                    <input name="t_show" type="text" class="filed-name" placeholder="选项1">
                    <input name="t_show" type="text" class="filed-name" placeholder="选项2">
                </li> -->
                <li>
                    <span>是否必填：</span>
                    <input name="t_show" type="checkbox" value="是" <?php if ($list['t_show']=='是') echo "checked"; ?>>必填
                </li>
                <li>
                    <span>请选择验证规则：</span>
                    <select name="t_rule" id="">
                    	<?php 
                    		switch ($list['t_rule']) {
                    			case '手机号码':
                    				echo "<option value='>无</option>
				                        <option value='手机号码' selected>手机号码</option>
				                        <option value='长度'>长度</option>";
                    				break;
                    			case '长度':
                    				echo "<option value='>无</option>
				                        <option value='手机号码'>手机号码</option>
				                        <option value='长度' selected>长度</option>";
                    				break;
                    			default:
                    				echo "<option value=' selected>无</option>
				                        <option value='手机号码'>手机号码</option>
				                        <option value='长度'>长度</option>";
                    				break;
                    		}
                    	?>
                        
                    </select>
                </li>
                <li>
                    <span>请选择填写长度范围：</span>
                    <input class="length" name="t_astrict1" type="text" value="<?=$list['t_astrict1']?>" placeholder="请输入最小长度">
                    ~
                    <input class="length" name="t_astrict2" type="text" value="<?=$list['t_astrict2']?>" placeholder="请输入最大长度">
                </li>
                <li>
                	<input type="hidden" name="t_id" value="<?=$list['t_id']?>">
                	<input type="submit" class="submit" value="提交">
                </li>
            </ul>
        </form>
    </div>
</div>