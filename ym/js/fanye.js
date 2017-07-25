// name:bootstrap分页js
// time:2017.03.27
// author:yinming
var obj,j,obli;
var page=0;
var nowPage=0;//当前页
var listNum=8//每页显示<ul>数
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
// 分页按钮变色
var PageNum_2=PageNum%2==0?Math.ceil(PageNum/2)+1:Math.ceil(PageNum/2)
var PageNum_3=PageNum%2==0?Math.ceil(PageNum/2):Math.ceil(PageNum/2)+1
var strC="",startPage,endPage;
if (PageNum>=PagesLen) {startPage=0;endPage=PagesLen-1}
else if (nowPage<PageNum_2){startPage=0;endPage=PagesLen-1>PageNum?PageNum:PagesLen-1}
else {startPage=nowPage+PageNum_3>=PagesLen?PagesLen-PageNum-1: nowPage-PageNum_2+1;var t=startPage+PageNum;endPage=t>PagesLen?PagesLen-1:t}
for (var i=startPage;i<=endPage;i++){
 if (i==nowPage)strC+='<a href="###" style="background:#337AB7;color:white;" onclick="upPage('+i+')">'+(i+1)+'</font></a> '
 else strC+='<a href="###" onclick="upPage('+i+')">'+(i+1)+'</font></a> '
}
document.getElementById("yinpage").innerHTML=strC
}

function first(){
	upPage(0)
}
function last(){
	upPage(PagesLen-1)
}
function pre(){
	if(nowPage==0){
	upPage(0)
	}else{
	upPage(nowPage-1)	
	}}
function next(){
	if(nowPage==PagesLen-1){
	upPage(PagesLen-1)
	}else{
	upPage(nowPage+1)	
	}}