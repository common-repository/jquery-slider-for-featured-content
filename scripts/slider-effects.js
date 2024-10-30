// JavaScript Document
	
	function FCGSlideInOut(){ 
		alert(leftcaption_speed);
		$("#featured").tabs({fx:{opacity: "toggle"}, select : function(){
			if( show_caption != 'No') {
				$("#featured .ui-tabs-panel .info").animate({top:'280px'}, leftcaption_speed ).animate({top:'180px'}, leftcaption_speed );
			}
			
		 }}).tabs("rotate", slider_speed, true); 
		$("#featured").hover(function() {  
			$("#featured").tabs("rotate",0,true); 
			},  
		function() {  
		$("#featured").tabs("rotate",5000,true);  

		});  
	}
	function FCGFadeInOut(){  
		$("#featured").tabs({fx:{opacity: "toggle"}, select : function(){
			if( show_caption != 'No') {																	   
				$("#featured .ui-tabs-panel .info").fadeOut("slow");
			}
		 }}).tabs("rotate", slider_speed, true); 
		$("#featured").hover(function() {  
			$("#featured").tabs("rotate",0,true); 
			},  
		function() {  
		$("#featured").tabs("rotate",5000,true);  

		});  
	}