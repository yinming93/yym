var obj,j;
var page=0;
var nowPage=0;//当前页
var listNum=1//每页显示<ul>数
var PagesLen;//总页数
var PageNum=2;//分页链接接数(5个)
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
strS='<a href="###" onclick="upPage(0)"><font size="4">首页</font></a>  '
var PageNum_2=PageNum%2==0?Math.ceil(PageNum/2)+1:Math.ceil(PageNum/2)
var PageNum_3=PageNum%2==0?Math.ceil(PageNum/2):Math.ceil(PageNum/2)+1
var strC="",startPage,endPage;
if (PageNum>=PagesLen) {startPage=0;endPage=PagesLen-1}
else if (nowPage<PageNum_2){startPage=0;endPage=PagesLen-1>PageNum?PageNum:PagesLen-1}//首页
else {startPage=nowPage+PageNum_3>=PagesLen?PagesLen-PageNum-1: nowPage-PageNum_2+1;var t=startPage+PageNum;endPage=t>PagesLen?PagesLen-1:t}
for (var i=startPage;i<=endPage;i++){
 if (i==nowPage)strC+='<a href="###" style="color:red;font-weight:700;" onclick="upPage('+i+')"><font size="4">'+(i+1)+'</font></a> '
 else strC+='<a href="###" onclick="upPage('+i+')"><font size="4">'+(i+1)+'</font></a> '
}
strE=' <a href="###" onclick="upPage('+(PagesLen-1)+')"><font size="4">尾页</font></a>  '
strE2=nowPage+1+"/"+PagesLen+"页"+"  共"+j+"条"
if(nowPage==0){
	pre='<a href="###" onclick="upPage(0)"><font size="4">上一页</font></a>  '
	next=' <a href="###" onclick="upPage('+(nowPage+1)+')"><font size="4">下一页</font></a>  '
}else if(nowPage==PagesLen-1){
	pre=' <a href="###" onclick="upPage('+(nowPage-1)+')"><font size="4">上一页</font></a>  '
	next=' <a href="###" onclick="upPage('+(PagesLen-1)+')"><font size="4">下一页</font></a>  '
}else{
	pre=' <a href="###" onclick="upPage('+(nowPage-1)+')"><font size="4">上一页</font></a>  '
	next=' <a href="###" onclick="upPage('+(nowPage+1)+')"><font size="4">下一页</font></a>  '
}
document.getElementById("changpage").innerHTML=strS+pre+strC+next+strE+strE2
}