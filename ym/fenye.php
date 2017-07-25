<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>植物哥哥专网</title>
    <!-- Bootstrap -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="./lib/html5shiv/html5shiv.min.js"></script>
    <script src="./lib/respond/respond.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
   <!-- 网站顶部 -->
   <?php include 'header.php'; ?>
     
    <!-- 轮播底下文字 -->
    <div class="container fun">
    <div class="row">
    <table id="tb" style="width:100%;">
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a1.jpg" alt="...">
          <div class="caption">
            <h3>QJ生活</h3>
            <p>那就来干点不是上班人做的事情吧</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a2.jpg" alt="...">
          <div class="caption">
            <h3>找乐子</h3>
            <p>一脸懵逼的日子才刚刚开始</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a3.jpg" alt="...">
          <div class="caption">
            <h3>留言板</h3>
            <p>心情复杂那就来留言寻找安慰吧</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a3.jpg" alt="...">
          <div class="caption">
            <h3>wtf</h3>
            <p>心情复杂那就来留言寻找安慰吧</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a1.jpg" alt="...">
          <div class="caption">
            <h3>QJ生活</h3>
            <p>那就来干点不是上班人做的事情吧</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a2.jpg" alt="...">
          <div class="caption">
            <h3>找乐子</h3>
            <p>一脸懵逼的日子才刚刚开始</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a3.jpg" alt="...">
          <div class="caption">
            <h3>留言板</h3>
            <p>心情复杂那就来留言寻找安慰吧</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a3.jpg" alt="...">
          <div class="caption">
            <h3>wtf</h3>
            <p>心情复杂那就来留言寻找安慰吧</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="./img/a3.jpg" alt="...">
          <div class="caption">
            <h3>wtf</h3>
            <p>心情复杂那就来留言寻找安慰吧</p>
            <p><a href="#" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
      
</table>
    </div>
    </div>
    
<div id="changpage"></div>
   <!-- 网站底部 -->
   <?php include 'footer.php'; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./lib/jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.js"></script>
    <!--<script src="./js/index.js"></script>-->
  </body>
</html>
<script language="javascript">
var obj,j;
var page=0;
var nowPage=0;//当前页
var listNum=8;//每页显示<ul>数
var PagesLen;//总页数
var PageNum=3;//分页链接接数(5个)
onload=function(){
obj=document.getElementById("tb").getElementsByTagName("td");
j=obj.length
PagesLen=Math.ceil(j/listNum);
upPage(0)
}
function upPage(p){
nowPage=p
//内容变换
for (var i=0;i<j;i++){
obj[i].style.display="none"
}
for (var i=p*listNum;i<(p+1)*listNum;i++){
if(obj[i])obj[i].style.display="block"
}
//分页链接变换
strS='<a href="###" onclick="upPage(0)"><font size="8">首页</font></a>  '
var PageNum_2=PageNum%2==0?Math.ceil(PageNum/2)+1:Math.ceil(PageNum/2)
var PageNum_3=PageNum%2==0?Math.ceil(PageNum/2):Math.ceil(PageNum/2)+1
var strC="",startPage,endPage;
if (PageNum>=PagesLen) {startPage=0;endPage=PagesLen-1}
else if (nowPage<PageNum_2){startPage=0;endPage=PagesLen-1>PageNum?PageNum:PagesLen-1}//首页
else {startPage=nowPage+PageNum_3>=PagesLen?PagesLen-PageNum-1: nowPage-PageNum_2+1;var t=startPage+PageNum;endPage=t>PagesLen?PagesLen-1:t}
for (var i=startPage;i<=endPage;i++){
 if (i==nowPage)strC+='<a href="###" style="color:red;font-weight:700;" onclick="upPage('+i+')"><font size="8">'+(i+1)+'</font></a> '
 else strC+='<a href="###" onclick="upPage('+i+')"><font size="8">'+(i+1)+'</font></a> '
}
strE=' <a href="###" onclick="upPage('+(PagesLen-1)+')"><font size="8">尾页</font></a>  '
strE2=nowPage+1+"/"+PagesLen+"页"+"  共"+j+"条"
document.getElementById("changpage").innerHTML=strS+strC+strE+strE2
}
</script>