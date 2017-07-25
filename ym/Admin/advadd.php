<?php
header("Content-Type:text/html;charset=utf-8");
	include '../dblunbo.php';
    include 'function.php';
    $a = $_GET['a'];
    // 轮播图片 —— 增
    switch($a){
    case 'upload': 
    // $miaoshu = $_POST['miaoshu'];
    $filename = upload('myfile','./uploads');
    if(!$filename){
        echo "<script>";
        echo "alert('请上传轮播图！');";
        echo "window.location.href='./adv.php';";
        echo "</script>";
        exit; 
    }
    $time = date('Y-m-d H:i:s');
    $sql="insert into $tbname(filename,time) values('".$filename."','".$time."')";
        $query=mysql_query($sql);
        if ($query){
            echo "<script>";
            echo "alert('上传成功!');";
            echo "window.location.href='./adv.php';";
            echo "</script>";  
        }else{
            echo "<script>";
            echo "alert('失败!');";
            echo "window.location.href='./adv.php';";
            echo "</script>";
         }
         break;      
    mysql_close();}

    //轮播图片 —— 删
    switch($a){
    case 'del':
    $id=$_GET['id'];
    // 获取要删除的文件名
    $sq="select filename from $tbname where id='$id'";
    $quer=mysql_query($sq);
    $row=mysql_fetch_assoc($quer);
    // 处理路径
    $img_path = 'uploads/';
    $img_path .= substr($row['filename'], 0, 4).'/';
    $img_path .= substr($row['filename'], 4, 2).'/';
    $img_path .= substr($row['filename'], 6, 2).'/';
    $img_path .= $row['filename'];
    // 删除图片
    @unlink($img_path);
    
    $sql="delete from $tbname where id='$id'";
    // echo $sql;exit;
        $query=mysql_query($sql);
        if ($query){
            echo "<script>";
            echo "alert('删除成功!');";
            echo "window.location.href='./adv.php';";
            echo "</script>";  
        }else{
            echo "<script>";
            echo "alert('失败!');";
            echo "window.location.href='./adv.php';";
            echo "</script>";
         }
         break;      
    mysql_close();
    }

    // 轮播图片 —— 改
    switch($a){
    case 'edit':
    $id=$_GET['id'];
    $filename = upload('myfile','./uploads');
    if(!$filename){
        echo "<script>";
        echo "alert('未修改图片！');";
        echo "window.location.href='./adv.php';";
        echo "</script>";
        exit; 
    }else{
        // 获取要删除的文件名
        $sq="select filename from $tbname where id='$id'";
        $quer=mysql_query($sq);
        $row=mysql_fetch_assoc($quer);
        // 处理路径
        $img_path = 'uploads/';
        $img_path .= substr($row['filename'], 0, 4).'/';
        $img_path .= substr($row['filename'], 4, 2).'/';
        $img_path .= substr($row['filename'], 6, 2).'/';
        $img_path .= $row['filename'];
        // 删除图片
        @unlink($img_path); 
    }
    $time = date('Y-m-d H:i:s');
    $sql="update $tbname set filename='".$filename."' where id='$id'";
    // echo $sql;exit;
        $query=mysql_query($sql);
        if ($query){
            echo "<script>";
            echo "alert('修改成功!');";
            echo "window.location.href='./adv.php';";
            echo "</script>"; 
        }else{
            echo "<script>";
            echo "alert('失败!');";
            echo "window.location.href='./adv.php';";
            echo "</script>";
         }
         break;      
    mysql_close();
    }
?>