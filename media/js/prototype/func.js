/**
 * 多选
 * **/
function select_checkbox(ClassName,flag){
    var list=document.getElementsByClassName(ClassName);
    for(x in list){
        if(list[x].checked!=flag)
        {
            list[x].checked=flag;
        }
    }
}
/**
 * 选择父级
 * */
function select_parent_checkbox(parentObj){
    $(parentObj).checked=true;
}

function obj_display(obj)
{
    if($(obj).style.display=='none'){
        $(obj).show();
    }else{
        $(obj).hide();
    }
}





//判读Str字符串中是否包含subStr字符串中的任意一个字符。
//返回值：  true，包含
//	    false，不包含
function isInStr(Str,subStr){ 
	var str = new String(Str);		//类型转换
	var substr = new String(subStr);	//类型转换
	var ch;
	for(j = 0;j < subStr.length ; j++)
      	{
      		ch = subStr.charAt(j);
	        if (Str.indexOf(ch))
	        return true;
	}
	return false;
}

//检查HMTL的非法字符
//
function CheckHTML(Str)
{
	var str = new String(Str);
	var HTMLCode = new String("<>\'/\\\"");
	return (isInStr(str,HTMLCode));
}

//检查SQL的非法字符
//
function CheckSQL(Str)
{
	var str = new String(Str);
	var HTMLCode = new String("\'\\\"");
	return (isInStr(str,HTMLCode));
}

// 输入是否为数字
// 返回值：true,是; false 不是
function isDigit (theNum) {
	var theMask = '0123456789';
	if (!theNum) return (false);
	else if (theMask.indexOf (theNum) == -1) return (false);
	return (true);
}


// 检查str是否为整数
// 返回值：整数 true, 非整数 false
function isInt (theStr) {
	if (!theStr) { return false; }
	else
	{
		for (var i = 0; i < theStr.length; i++) {
			if (isDigit (theStr.substring (i, i + 1)) == false) {
				flag = false; break;
			}
		}
	}
	return (flag);
}


//

function isValidUsername(str)
{	
	for(i=0; i<str.length;i++)
	{	if( ((str.charCodeAt(i)>=97) && (str.charCodeAt(i)<123)) ||
			((str.charCodeAt(i)>=48) && (str.charCodeAt(i)<=57)) ||
			(str.charAt(i)=="_")								 ||
			(str.charCodeAt(i)>256 || str.charCodeAt(i)<0)
		  )
		{;}
		else
		{return false;}
	}
	return true;
}

// 范围的确定 isBetween(val, lo, hi)
// 返回值：在指定范围内为 true, 否则为 false
function isBetween (val, lo, hi) {
	if ((val < lo) || (val > hi)) { return (false); }
	else { return (true); }
}

// 日期的确认 isDate()
// 返回值：正确 true, 错误 false
function isDate (theStr) {
	var the1st = theStr.indexOf ('/');
	var the2nd = theStr.lastIndexOf ('/');
	if (the1st == the2nd) { return (false); }
	else {
		var m = theStr.substring (0, the1st);
		var d = theStr.substring (the1st + 1, the2nd);
		var y = theStr.substring(the2nd + 1, theStr.length);
		var maxDays = 31;
		if (isInt (m) == false || isInt (d) == false || isInt (y) == false) {
			return (false);
		}
		else if (y.length < 4) { return (false); }
		else if (!isBetween ( m, 1, 12)) { return (false); }
		else if (m == 4 || m == 6 || m == 9 || m == 11) maxDays = 30;
		else if (m == 2) {
			if ( y % 4 > 0) maxDays = 28;
			else if ( y % 100 == 0 && y % 400 > 0) maxDays = 28;
			else maxDays = 29;
		}
		if (isBetween (d, 1, maxDays) == false) { return (false); }
		else { return (true); }
	}
}

// 时间确认 isTime()
// 返回值：正确 true, 错误 false
function isTime (theStr) {
	var colonDex = theStr.indexOf (':');
	if ((colonDex < 1) || (colonDex > 2)) { return (false); }
	else {
		var hh = theStr.substring (0, colonDex);
		var ss = theStr.substring (colonDex + 1, theStr.length);
		if (( hh.length < 1) || ( hh.length > 2) || (!isInt(hh))) { return (false); }
		else if ((ss.length < 1) || (ss.length > 2) || (!isInt(ss))) { return (false); }
		else if ((!isBetween (hh, 0, 23)) || (!isBetween (ss, 0, 59))) { return (false); }
		else { return (true); }
	}
}

// 数字确认 isDigit(theNum)
// 返回值：正确 true, 错误 false
function isDigit (theNum) {
	var theMask = '0123456789';
	if (isEmpty (theNum)) return (false);
	else if (theMask.indexOf (theNum) == -1) return (false);
	return (true);
}

// 电子邮件地址格式确认 isEmail(theStr)
// 返回值：格式正确 true, 格式错误 false
function isEmail (theStr) {
	var atIndex = theStr.indexOf ('@');
	var dotIndex = theStr.indexOf ('.', atIndex);
	var flag = true;
	var theSub = theStr.substring (0, dotIndex + 1);
	if ((atIndex < 1) || (atIndex != theStr.lastIndexOf ('@')) || (dotIndex < atIndex + 2) || (theStr.length <= theSub.length))
	{
		flag = false;
	}
	else { flag = true; }
	return (flag);
}

// 检查输入是否为空 isEmpty(str)
// 参数：
//    str: 密码字符串；
//    minLength: 密码的最小长度
// 返回值：空 true, 非空 false
function isEmpty (str, minLength) {
	if (str.length < minLength) return true;
	else return (false);
}

// 检查输入是否为整数 isInt(theStr)
// 返回值：整数 true, 非整数 false
function isInt (theStr) {
	var flag = true;
	if (isEmpty (theStr)) { flag = false; }
	else 
	{
		for (var i = 0; i < theStr.length; i++) {
			if (isDigit (theStr.substring (i, i + 1)) == false) {
				flag = false; break;
			}
		}
	}
	return (flag);
}

// 检查输入是否为实数 isReal(theStr, decLen)
// 返回值：实数 true, 非实数 false
function isReal (theStr, decLen) {
	var dot1st = theStr.indexOf ('.');
	var dot2nd = theStr.lastIndexOf ('.');
	var OK = true;
	if (isEmpty (theStr)) return false;
	if (dot1st == -1){
		if (!isInt (theStr)) return (false);
		else return (true);
	}
	else if (dot1st != dot2nd) return (false);
	else if (dot1st == 0) return (false);
	else {
		var intPart = theStr.substring (0, dot1st);
		var decPart = theStr.substring (dot2nd + 1);
		if (decPart.length > decLen) return (false);
		else if (!isInt (intPart) || !isInt (decPart)) return (false);
		else if (isEmpty (decPart)) return (false);
		else return (true);
	}
}

function checkchinese(theelement)
{//如果含有中文字符返回 true
   text="abcdefghijklmnopqrstuvwxyz1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZ,/()!@$%&\#*~.;'_-";
   for(i=0;i<=theelement.length-1;i++)
   {
      char1=theelement.charAt(i);
      index=text.indexOf(char1);
      if(index==-1)
      {
         return true;//有中文
      }  
     //没有中文
   }
   return false;
}


function isNull(frm)
{
        for(var i=0;i< frm.elements.length;i++){
                if(frm.elements[i].type == "text"){
                   if (frm.elements[i].value== "")
                   {
                       alert("抱歉！表单信息必须全部填写完整！");
                       frm.elements[i].focus();
                       return(false);
                   }
                }
             }
}



function OpenWindow(url, name, width, height, align, valign, option) 
{
	var x,y;
	var window_option = "width="+width+",height="+height;

	if (option!=null) window_option+=","+option;
	if (align==null) align="center";
	if (valign==null) valign="center";

	if (align=="left") x=0;
	else if (align=="right") x=(screen.width-width);
	else if (align=="center") x=(screen.width-width)/2

	if (valign=="top") y=0;
	else if (valign=="bottom") y=(screen.height-height);
	else if (valign=="center") y=(screen.height-height)/2

	window_option+=",left="+x+",top="+y;

	var win = window.open(url,name,window_option);

	focus();
	win.focus();
	return win;
} 

substr=function(str,n)
{
  var r = /[^\x00-\xff]/g;
  if(str.replace(r, "mm").length <= n) return str;
  n = n - 3;
  var m = Math.floor(n/2);
  for(var i=m; i<str.length; i++)
  {
    if(str.substr(0, i).replace(r, "mm").length>=n)
    {
      return str.substr(0, i) +"...";
    }
  }
  return str;
}

/*
******************************************
                        字符串函数扩充                                
******************************************
*/

/*
===========================================
//去除左边的空格
===========================================

*/
String.prototype.LTrim = function()
{
        return this.replace(/(^\s*)/g, "");
}


/*
===========================================
//去除右边的空格
===========================================
*/
String.prototype.Rtrim = function()
{
        return this.replace(/(\s*$)/g, "");
}

/*
===========================================
//去除前后空格
===========================================
*/
String.prototype.Trim = function()
{
        return this.replace(/(^\s*)|(\s*$)/g, "");
}

/*
===========================================
//得到左边的字符串
===========================================
*/
String.prototype.Left = function(len)
{

        if(isNaN(len)||len==null)
        {
                len = this.length;
        }
        else
        {
                if(parseInt(len)<0||parseInt(len)>this.length)
                {
                        len = this.length;
                }
        }
       
        return this.substr(0,len);
}


/*
===========================================
//得到右边的字符串
===========================================
*/
String.prototype.Right = function(len)
{

        if(isNaN(len)||len==null)
        {
                len = this.length;
        }
        else
        {
                if(parseInt(len)<0||parseInt(len)>this.length)
                {
                        len = this.length;
                }
        }
       
        return this.substring(this.length-len,this.length);
}


/*
===========================================
//得到中间的字符串,注意从0开始
===========================================
*/
String.prototype.Mid = function(start,len)
{
        return this.substr(start,len);
}


/*
===========================================
//在字符串里查找另一字符串:位置从0开始
===========================================
*/
String.prototype.InStr = function(str)
{

        if(str==null)
        {
                str = "";
        }
       
        return this.indexOf(str);
}

/*
===========================================
//在字符串里反向查找另一字符串:位置0开始
===========================================
*/
String.prototype.InStrRev = function(str)
{

        if(str==null)
        {
                str = "";
        }
       
        return this.lastIndexOf(str);
}

/*
===========================================
//计算字符串打印长度
===========================================
*/
String.prototype.LengthW = function()
{
        return this.replace(/[^\x00-\xff]/g,"**").length;
}

/*
===========================================
//是否是正确的IP地址
===========================================
*/
String.prototype.isIP = function()
{

        var reSpaceCheck = /^(\d+)\.(\d+)\.(\d+)\.(\d+)$/;

        if (reSpaceCheck.test(this))
        {
                this.match(reSpaceCheck);
                if (RegExp.$1 <= 255 && RegExp.$1 >= 0
                 && RegExp.$2 <= 255 && RegExp.$2 >= 0
                 && RegExp.$3 <= 255 && RegExp.$3 >= 0
                 && RegExp.$4 <= 255 && RegExp.$4 >= 0)
                {
                        return true;    
                }
                else
                {
                        return false;
                }
        }
        else
        {
                return false;
        }
  
}


/*
===========================================
//是否是正确的长日期
===========================================
*/
String.prototype.isLongDate = function()
{
        var r = this.replace(/(^\s*)|(\s*$)/g, "").match(/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2}) (\d{1,2}):(\d{1,2}):(\d{1,2})$/);
        if(r==null)
        {
                return false;
        }
        var d = new Date(r[1], r[3]-1,r[4],r[5],r[6],r[7]);
        return (d.getFullYear()==r[1]&&(d.getMonth()+1)==r[3]&&d.getDate()==r[4]&&d.getHours()==r[5]&&d.getMinutes()==r[6]&&d.getSeconds()==r[7]);

}

/*
===========================================
//是否是正确的短日期
===========================================
*/
String.prototype.isShortDate = function()
{
        var r = this.replace(/(^\s*)|(\s*$)/g, "").match(/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})$/);
        if(r==null)
        {
                return false;
        }
        var d = new Date(r[1], r[3]-1, r[4]);
        return (d.getFullYear()==r[1]&&(d.getMonth()+1)==r[3]&&d.getDate()==r[4]);
}

/*
===========================================
//是否是正确的日期
===========================================
*/
String.prototype.isDate = function()
{
        return this.isLongDate()||this.isShortDate();
}

/*
===========================================
//是否是手机
===========================================
*/
String.prototype.isMobile = function()
{
        return /^0{0,1}13[0-9]{9}$/.test(this);
}

/*
===========================================
//是否是邮件
===========================================
*/
String.prototype.isEmail = function()
{
        return /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/.test(this);
}

/*
===========================================
//是否是邮编(中国)
===========================================
*/

String.prototype.isZipCode = function()
{
        return /^[\\d]{6}$/.test(this);
}

/*
===========================================
//是否是有汉字
===========================================
*/
String.prototype.existChinese = function()
{
        //[\u4E00-\u9FA5]為漢字﹐[\uFE30-\uFFA0]為全角符號
        return /^[\x00-\xff]*$/.test(this);
}

/*
===========================================
//是否是合法的文件名/目录名
===========================================
*/
String.prototype.isFileName = function()
{
        return !/[\\\/\*\?\|:"<>]/g.test(this);
}

/*
===========================================
//是否是有效链接
===========================================
*/
String.prototype.isUrl = function()
{
        return /^http[s]?:\/\/([\w-]+\.)+[\w-]+([\w-./?%&=]*)?$/i.test(this);
}


/*
===========================================
//是否是有效的身份证(中国)
===========================================
*/
String.prototype.isIDCard = function()
{
        var iSum=0;
        var info="";
        var sId = this;

        var aCity={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外 "};

        if(!/^\d{17}(\d|x)$/i.test(sId))
        {
                return false;
        }
        sId=sId.replace(/x$/i,"a");
        //非法地区
        if(aCity[parseInt(sId.substr(0,2))]==null)
        {
                return false;
        }

        var sBirthday=sId.substr(6,4)+"-"+Number(sId.substr(10,2))+"-"+Number(sId.substr(12,2));

        var d=new Date(sBirthday.replace(/-/g,"/"))
       
        //非法生日
        if(sBirthday!=(d.getFullYear()+"-"+ (d.getMonth()+1) + "-" + d.getDate()))
        {
                return false;
        }
        for(var i = 17;i>=0;i--)
        {
                iSum += (Math.pow(2,i) % 11) * parseInt(sId.charAt(17 - i),11);
        }

        if(iSum%11!=1)
        {
                return false;
        }
        return true;

}

/*
===========================================
//是否是有效的电话号码(中国)
===========================================
*/
String.prototype.isPhoneCall = function()
{
        return /(^[0-9]{3,4}\-[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/.test(this);
}


/*
===========================================
//是否是数字
===========================================
*/
String.prototype.isNumeric = function(flag)
{
        //验证是否是数字
        if(isNaN(this))
        {

                return false;
        }

        switch(flag)
        {

                case null:        //数字
                case "":
                        return true;
                case "+":        //正数
                        return                /(^\+?|^\d?)\d*\.?\d+$/.test(this);
                case "-":        //负数
                        return                /^-\d*\.?\d+$/.test(this);
                case "i":        //整数
                        return                /(^-?|^\+?|\d)\d+$/.test(this);
                case "+i":        //正整数
                        return                /(^\d+$)|(^\+?\d+$)/.test(this);                       
                case "-i":        //负整数
                        return                /^[-]\d+$/.test(this);
                case "f":        //浮点数
                        return                /(^-?|^\+?|^\d?)\d*\.\d+$/.test(this);
                case "+f":        //正浮点数
                        return                /(^\+?|^\d?)\d*\.\d+$/.test(this);                       
                case "-f":        //负浮点数
                        return                /^[-]\d*\.\d$/.test(this);               
                default:        //缺省
                        return true;                       
        }
}

/*
===========================================
//是否是颜色(#FFFFFF形式)
===========================================
*/
String.prototype.IsColor = function()
{
        var temp        = this;
        if (temp=="") return true;
        if (temp.length!=7) return false;
        return (temp.search(/\#[a-fA-F0-9]{6}/) != -1);
}

/*
===========================================
//转换成全角
===========================================
*/
String.prototype.toCase = function()
{
        var tmp = "";
        for(var i=0;i<this.length;i++)
        {
                if(this.charCodeAt(i)>0&&this.charCodeAt(i)<255)
                {
                        tmp += String.fromCharCode(this.charCodeAt(i)+65248);
                }
                else
                {
                        tmp += String.fromCharCode(this.charCodeAt(i));
                }
        }
        return tmp
}

/*
===========================================
//对字符串进行Html编码
===========================================
*/
String.prototype.toHtmlEncode = function()
{
        var str = this;

        str=str.replace(/&/g,"&amp;");
        str=str.replace(/</g,"&lt;");
        str=str.replace(/>/g,"&gt;");
        str=str.replace(/\'/g,"&apos;");
        str=str.replace(/\"/g,"&quot;");
        str=str.replace(/\n/g,"<br>");
        str=str.replace(/\ /g,"&nbsp;");
        str=str.replace(/\t/g,"&nbsp;&nbsp;&nbsp;&nbsp;");

        return str;
}

/*
===========================================
//转换成日期
===========================================
*/
String.prototype.toDate = function()
{
        try
        {
                return new Date(this.replace(/-/g, "\/"));
        }
        catch(e)
        {
                return null;
        }
}
