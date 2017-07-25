<?php
header("Content-Type:text/html;charset=utf-8");
	include '../db1.php';
    include 'function.php';
    $a = $_GET['a'];
    // h5分类内容 —— 增
    switch($a){
    case 'upload': 
    $txt1 = $_POST['title'];
    $txt2 = $_POST['title1'];
    $txt3 = $_POST['title2'];

    $type = $_POST['cid'];

    $filename = upload('myfile','./uploads');
    // $filename2 = upload('myfile2','./uploads');
    // $filename3 = upload('myfile3','./uploads');

    if(!$filename||!$txt1||!$txt2||!$txt3||!$type){
        echo "<script>";
        echo "alert('请完善上传信息！');";
        echo "window.location.href='./h5zen.php';";
        echo "</script>";
        exit; 
    }
    $time = date('Y-m-d H:i:s');
    $sql="insert into $tbname(img1,img2,img3,txt1,txt2,txt3,type,time) values('".$filename."','0','0','".$txt1."','".$txt2."','".$txt3."','".$type."','".$time."')";
        $query=mysql_query($sql);
        if ($query){
            echo "<script>";
            echo "alert('上传成功!');";
            echo "history.back(-2);";
            echo "</script>";  
        }else{
            echo "<script>";
            echo "alert('失败!');";
            echo "window.location.href='./h5list.php';";
            echo "</script>";
         }
         break;      
    mysql_close();}

    //h5封面图片 —— 删
    switch($a){
    case 'del':
    $id=$_GET['id'];
    // 获取要删除的文件名
    $sq="select * from $tbname where id='$id'";
    $quer=mysql_query($sq);
    $row=mysql_fetch_assoc($quer);
    // 处理路径
    $img_path1 = 'uploads/';
    $img_path1 .= substr($row['img1'], 0, 4).'/';
    $img_path1 .= substr($row['img1'], 4, 2).'/';
    $img_path1 .= substr($row['img1'], 6, 2).'/';
    $img_path1 .= $row['img1'];

    // $img_path2 = 'uploads/';
    // $img_path2 .= substr($row['img2'], 0, 4).'/';
    // $img_path2 .= substr($row['img2'], 4, 2).'/';
    // $img_path2 .= substr($row['img2'], 6, 2).'/';
    // $img_path2 .= $row['img2'];

    // $img_path3 = 'uploads/';
    // $img_path3 .= substr($row['img3'], 0, 4).'/';
    // $img_path3 .= substr($row['img3'], 4, 2).'/';
    // $img_path3 .= substr($row['img3'], 6, 2).'/';
    // $img_path3 .= $row['img3'];
    // 删除图片
    @unlink($img_path1);
    // @unlink($img_path2);
    // @unlink($img_path3);
    
    $sql="delete from $tbname where id='$id'";
    // echo $sql;exit;
        $query=mysql_query($sql);
        if ($query){
            echo "<script>";
            echo "alert('删除成功!');";
            echo "window.location.href='./h5list.php';";
            echo "</script>";  
        }else{
            echo "<script>";
            echo "alert('失败!');";
            echo "window.location.href='./h5list.php';";
            echo "</script>";
         }
         break;      
    mysql_close();
    }

    // h5文字修改 —— 改
    switch($a){
    case 'edit':
    $id=$_GET['id'];
    $txt1 = $_POST['title1'];
    $txt2 = $_POST['title2'];
    $txt3 = $_POST['title3'];
    $filename = upload('myfile','./uploads');
    // $filename2 = upload('myfile2','./uploads');
    // $filename3 = upload('myfile3','./uploads');
    if(!$filename){
       $files = $_POST['files'];
        $time = date('Y-m-d H:i:s');
        $sql="update $tbname set txt1='".$txt1."',txt2='".$txt2."',txt3='".$txt3."',time='".$time."' where id='$id'";
        $query=mysql_query($sql);
        if ($query){
            echo "<script>";
            echo "alert('修改成功!');";
            echo "window.location.href='./h5list.php';";
            echo "</script>"; 
        }else{
            echo "<script>";
            echo "alert('失败!');";
            echo "window.location.href='./h5list.php';";
            echo "</script>";
         }
         break;      
    mysql_close();
        exit; 
    }else{
        // 获取要删除的文件名
        $sq="select * from $tbname where id='$id'";
        $quer=mysql_query($sq);
        $row=mysql_fetch_assoc($quer);
        // 处理路径
        $img_path = 'uploads/';
        $img_path .= substr($row['img1'], 0, 4).'/';
        $img_path .= substr($row['img1'], 4, 2).'/';
        $img_path .= substr($row['img1'], 6, 2).'/';
        $img_path .= $row['img1'];
    //     $img_path2 = 'uploads/';
    //     $img_path2 .= substr($row['img2'], 0, 4).'/';
    //     $img_path2 .= substr($row['img2'], 4, 2).'/';
    //     $img_path2 .= substr($row['img2'], 6, 2).'/';
    //     $img_path2 .= $row['img2'];
    //     $img_path3 = 'uploads/';
    //     $img_path3 .= substr($row['img3'], 0, 4).'/';
    //     $img_path3 .= substr($row['img3'], 4, 2).'/';
    //     $img_path3 .= substr($row['img3'], 6, 2).'/';
    //     $img_path3 .= $row['img3'];
    //     // 删除图片
        @unlink($img_path); 
    //     // @unlink($img_path2); 
    //     // @unlink($img_path3); 
    $time = date('Y-m-d H:i:s');
    $sql="update $tbname set txt1='".$txt1."',txt2='".$txt2."',txt3='".$txt3."',img1='".$filename."',time='".$time."' where id='$id'";
        $query=mysql_query($sql);
        if ($query){
            echo "<script>";
            echo "alert('修改成功!');";
            echo "window.location.href='./h5list.php';";
            echo "</script>"; 
        }else{
            echo "<script>";
            echo "alert('失败!');";
            echo "window.location.href='./h5list.php';";
            echo "</script>";
         }
         break;      
    mysql_close();
}



    }
?>