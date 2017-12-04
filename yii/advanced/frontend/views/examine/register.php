<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; text-align: center;}
.top h2{ margin-top: 50px;}

form{ width: 450px; margin: 0 auto; margin-top: 50px;}
form input{
    width: 300px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding-left: 5px;
    font-size: 14px;
}

form p{
    margin-top: 20px;
    width: 100%;
}

form span{
    width: 100px;
    text-align: right;
    display: inline-block;
}

.a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}
</style>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<div class="main">
    <form action="index.php?r=examine/register_2" method="post">
        <p>
            <span>手机号：</span>
            <input type="text" name="cellphone" value="<?=$list['cellphone']?>" placeholder="请输入手机号">
        </p>
        <p>
            <span>密码：</span>
            <input type="password" name="pas" value="<?=$list['pas']?>" placeholder="请输入密码">
        </p>
        <p>
            <span>确认密码：</span>
            <input type="password" name="" value="<?=$list['pas']?>" placeholder="请输入确认密码">
        </p>
        <p>
            <input type="hidden" name="xia" value="register_2">
            <input class="a_button" type="submit" value="下一步">

            <!-- <a  href="index.php?r=examine/register_2">下一步</a> -->
        </p>
    </form>
</div>
