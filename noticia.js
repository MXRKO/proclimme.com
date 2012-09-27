// JavaScript Document
$(document).ready(function(){
	$("#imgNota").click(function(){
		TINY.box.show({image:$("#imgNota").attr("data-url"),boxid:'frameless',animate:true,width:$("#imgNota").attr("data-width"),height:$("#imgNota").attr("data-height"),fixed:false,top:20});
	});		
});