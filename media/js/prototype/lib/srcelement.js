Element.addMethods();
Object.extend(Event,
{SrcElement:function(){
	var event=__getEvent();
	if(event.srcElement){
		return event.srcElement;
	}else{
		return event.target;
	}
}}
);

function __getEvent()
{
if(document.all)
{
return window.event;
}
func=__getEvent.caller;
while(func!=null)
{
var arg0=func.arguments[0];
if(arg0)
{
if((arg0.constructor==Event || arg0.constructor ==MouseEvent)
||(typeof(arg0)=="object" && arg0.preventDefault && arg0.stopPropagation))
{
return arg0;
}
}
func=func.caller;
}
return null;
}

function srcElement(){
	var event=__getEvent();
	if(event.srcElement){
		return event.srcElement;
	}else{
		return event.target;
	}
}
