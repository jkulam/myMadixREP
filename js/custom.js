$(document).ready( function() {
    $("#alertButton").click( function() {
        jAlert('This is a custom alert box', 'Alert Dialog');
        return false;
    });

    $("#confirm_button").click( function() {
        jConfirm('Can you confirm this?', 'Confirmation Dialog', function(r) {
            jAlert('Confirmed: ' + r, 'Confirmation Results');
            return false;


        });
        return false;
    });

    $("#prompt_button").click( function() {
        jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
            if( r ) alert('You entered ' + r);
            return false;
        });
        return false;
    });

 $("#prompt_button").click( function() {
        jPrompt1('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
            if( r ) alert('You entered ' + r);
            return false;
        });
        return false;
    });
    $("#alert_button_with_html").click( function() {
        jAlert('You can use HTML, such as <strong>bold</strong>, <em>italics</em>, and <u>underline</u>!');
        return false;
    });

    $("#alert_style_example").click( function() {
        $.alerts.dialogClass = $(this).attr('id'); // set custom style class
        jAlert('This is the custom class called &ldquo;style_1&rdquo;', 'Custom Styles', function() {
            $.alerts.dialogClass = null; // reset to default
            return false;
        });
        return false;
    });


});
function jspt(ids,myKey,e)
		{
			
//alert($('.dynamicDiv').html())
if(e.keyCode==40)
{
	
	var downkey=40;
	if($('.dynamicDiv').html()==null)
	{
		
		downkey=0;
	}
}
	if((downkey!=40) && (e.keyCode!=38) &&(e.keyCode!=13))
	{
		var chosen = "";
$(document).keydown(function(e){ // 38-up, 40-down
    if (e.keyCode == 40) { 
        if(chosen === "") {
            chosen = 0;
        } else if((chosen+1) < $('#'+ids+'fill li').length) {
            chosen++; 
        }
        $('#'+ids+'fill li').removeClass('selected');
        $('#'+ids+'fill li:eq('+chosen+')').addClass('selected');
        return false;
    }
    if (e.keyCode == 38) { 
        if(chosen === "") {
            chosen = 0;
        } else if(chosen > 0) {
            chosen--;            
        }
        $('#'+ids+'fill li').removeClass('selected');
        $('#'+ids+'fill li:eq('+chosen+')').addClass('selected');
       // return false;
    }
	
	
});
		
			var wtd=$("#"+ids).width();
			 var position = $("#"+ids).position();
 // alert('X: ' + position.left + ", Y: " + position.top );
			$('.dynamicDiv').remove();
			 			
            //document.getElementById(ids+'_s').appendChild(divTag);
			
			$("#"+ids).before("<div class='relative'><div id='"+ids+"fill' class='dynamicDiv'></div></div>");
			$('#'+ids+'fill').html('');
			
			if($('#'+ids).attr('alt')=='MULTI')
			{
              $('#'+ids+'fill').css({
			  width: wtd+'px',
             
            
            'margin-left':'10px',
			'margin-top':'25px'
			
			});

			}
			else
			{
			$('#'+ids+'fill').css({
				width: wtd+'px',
             
           
            
			'margin-top':'25px'
			});
			}
			if($.cookie(ids))
			{
				var sd=$.cookie(ids);
				
			var se=sd.split(',');
			
			for(i=0;i<=se.length-1;i++)
			{
				
				
				var myMatch = se[i].search(myKey);
				
if(myMatch != -1)
{
$('#'+ids+'fill').append('<li class="name_ha" name="'+ids+'">'+se[i]+'</li>'); 
}

				
			}
			}
		
				if($('#'+ids+'fill').html()=="")
				{
									
					$('.dynamicDiv').remove();
				}
				
			$('.name_ha').hover(function(){
				//alert($(this).text());
				$('li').removeClass('selected');
				$('.name_ha').css({
					background:'',
					color:'#000'
					})
				$(this).addClass('selected');
				$(this).click(function()
				{
					
				$('#'+ids).val($(this).text());
				$('.dynamicDiv').remove();
				})
			});
			$('#'+ids).focusout(function()
	{
			$('.selected').each(function(index, element) {
							var fq=$('.selected').attr('name');
                $('#'+fq).val($('.selected').text());
		$('.dynamicDiv').remove();
				return false;
            });
	$('.dynamicDiv').remove();
	});
			
	}
	
	
		}