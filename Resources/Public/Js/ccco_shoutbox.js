$(document).ready(function(){
	// check stringlength
	function fc_chstrnglength(strng,srt,end) {
		if(strng.length>srt&&strng.length<end){
			return true;
		}else{
			return false;
		}
	}
	var bgdmwndw = $('#archive').attr('data-bgdmwndw');
	var ldrimg = $('#archive').attr('data-ldrimg');
	var uridmwndw = $('#archive').attr('data-uridmwndw');
	var urishts = $('#fssht').attr('data-urishts');	
	var errnme = $('.lb_nme').attr('data-errnme');	
	var errorshout = $('.lb_sht').attr('data-errshout');	
			

	var uri = urishts;	
	var form = $("#f_shout");
	var errmssgenme = errnme;
	var errmssgeshout = errorshout;
	$("#f_shout").submit(function(event) {
		// check if all entries are valid
		var validname = fc_chstrnglength($('.inp_nme').val(),2,30);
		var validshout = fc_chstrnglength($('.tx_shts').val(),5,210);			
		if(validname==true&&validshout==true){
			$.ajax({
				type: "POST",
				url: uri,
				data: form.serialize(),
				success: function(data) {
					var items = [];
					$.each(data, function(key, val) {
						string = "<li><strong>"+data.name+"</strong> "+"("+data.date+")"+"<br/>"+data.shout+"</li>";
					});
					$('.ul_shouts').prepend(string);					
				}
			})
			return false;				
		}else{
			$('#bx_error').remove();
			var errmessage = errmssgenme+' - '+errmssgeshout;
			if(validname==true&&validshout==false){
				errmessage = errmssgeshout;
			}
			if(validname==false&&validshout==true){
				errmessage = errmssgenme;
			}
			$('#head').append('<div id="bx_error">'+errmessage+'</div>');
		}
		event.preventDefault();
	});	
	$('#archive').click(function(event){
		var uri = uridmwndw;
		var dclt = ($(document).width()/2)-250;
		var dctp = ($(document).height()/2)-125;
		var loaderimg = ldrimg;
		var bgimg = bgdmwndw;
		event.preventDefault();
		$(this).openDOMWindow({
			eventType:null, 
			positionType: 'absolute',
			positionLeft: dclt,
			positionTop: dctp,
			windowPadding: '0',
			loader:1, 
			loaderImagePath: loaderimg, 
			loaderHeight:1, 
			loaderWidth:470,
			width:500,
			height:270,
			borderSize: 0,
			overlayColor: '#000000',
			draggable: 1,
			windowBGColor: 'transparent',
			borderColor:'none',
			windowSource:'ajax', 
			windowHTTPType: 'get',
			windowBGImage: bgimg,
			windowSourceURL: uri
		});
	});	
	$('.ul_pgs li a').click(function(event) {		
		var imgsrc = loaderimg;
		var imgtg = '<img src="'+imgsrc+'" alt="loader">';
		$('#bx_ajshoutsarchive').remove();
		$('.ul_pgs').remove();
		$('.h5_arcv').remove();
		$('.h4_arcv').replaceWith('<img src="'+imgsrc+'" alt="loader" id="img_loader">');
		var uri = $(this).attr('href');
		$.ajax({
  			url: uri,
			dataType: "html",
  			success: function(data) {
				$('#DOMWindow').empty();
				$("#DOMWindow").append(data);
  			}
		});
		event.preventDefault();
		return false;					
	});		
});	
