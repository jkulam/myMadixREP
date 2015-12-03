// JavaScript Document
//$(function(){
	
//parent.ipad();
//})
function rowShort(Column,thiss,tech,table,page)
{	
//alert(table);
var sor=$(thiss).attr('class');
var table_id=$(thiss).closest('table').attr('id');

if(sor=='sorting')
{
	
 $('#'+table_id+' thead tr:first-child th').removeClass('sorting_asc').removeClass('sorting_desc').addClass('sorting');
   
$(thiss).removeClass('sorting').addClass('sorting_desc');
var sor=$(thiss).attr('class');
}
if(sor=='sorting_desc')
{
$(thiss).removeClass('sorting_desc').addClass('sorting_asc');
var sor=$(thiss).attr('class');
}
else
{
	$(thiss).removeClass('sorting_asc').addClass('sorting_desc');
	var sor=$(thiss).attr('class');
}
//alert(sor);

var t_rows=$('#'+table_id+'_num').html();
//alert(sor);
	//var tableSess = $('#'+tableId).parent('div').parent('div').closest('div').attr('id');
	//var className  = $('#'+Column).attr('class');
	//showMore = $('#example3_num').text();
	//alert("column="+Column+"&sor="+sor+"&tech="+tech+"&table="+table+"&table_id="+table_id+"&t_rows="+t_rows);
	var datas = "column="+Column+"&sor="+sor+"&tech="+tech+"&table="+table+"&table_id="+table_id+"&t_rows="+t_rows+"&page="+page;
	$.ajax({
		type: "POST",
		url: "table_sort.php",
		data: datas,
		success: function(html) {
			//alert(html);
			$('#'+table_id+'_tbody').html(html);
			if($(window).width()<1024)
			  {
		  $('.last_row td').css({display:'none'});
		   $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
			  }
			  if($(window).width()<500)
			  {
				  //alert($('window').width());
				  $('.last_row td').css({display:'none'});
				  $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
		  $('.last_row td:nth-child(7)').css({display:'table-cell',width:'40px',position:'absolute',right:'10px'});
		   
			  }
				
		}
	});
}
function rowloadShort(Column,table_id,tech,table,page)
{	
//alert(table);



//alert(sor);

var t_rows=$('#'+table_id+'_num').html();
//alert(sor);
	//var tableSess = $('#'+tableId).parent('div').parent('div').closest('div').attr('id');
	//var className  = $('#'+Column).attr('class');
	//showMore = $('#example3_num').text();
	//alert("column="+Column+"&sor="+sor+"&tech="+tech+"&table="+table+"&table_id="+table_id+"&t_rows="+t_rows);
	var datas = "column="+Column+"&sor=sorting_decs&tech="+tech+"&table="+table+"&table_id="+table_id+"&t_rows="+t_rows+"&page="+page;
	$.ajax({
		type: "POST",
		url: "table_sort.php",
		data: datas,
		success: function(html) {
			//alert(html);
			$('#'+table_id+'_tbody').html(html);
			if($(window).width()<1024)
			  {
		  $('.last_row td').css({display:'none'});
		   $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
			  }
			  if($(window).width()<500)
			  {
				  //alert($('window').width());
				  $('.last_row td').css({display:'none'});
				  $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
		  $('.last_row td:nth-child(7)').css({display:'table-cell',width:'40px',position:'absolute',right:'10px'});
		   
			  }
				
		}
	});
}
$(document).ready(function(e) {

$(window).resize(function(e) {
	var wids=$('.table').width()-2;
	$('.head_icons').css({
			width:wids+'px'
     });
	 $('.top').css({width:wids+'px'}).html($('.head_icons').html());
	 $('.bottom').css({width:wids+'px'});
		
	});


	
	

});
$(document).ready(function(e) {
	
if($(document).width()<600)
	{
		
		//$('.edge1').css({width:$('body').width()-120+'px'});
		$.cookie('table_cell','1,');
	$.cookie('table_cell');
	$('.table_cells').show();
	}
	if($(document).width()<1030&&$(document).width()>600)
{
	
	
	//$('.edge').css({width:$('body').width()-2+'px'});
	//$('.edge1').css({width:$('body').width()-150+'px'});
	$.cookie('table_cell','1,2,3,');
	
	$('.table_cells').show();
	
}
if($(document).width()>1030)
{
	$.cookie('table_cell','1,2,3,4,5,');
}
	$(window).resize(function() {
				if($(document).width()<1030)
{
	$('.table_cells').show();
}
else
{
	$('.table_cells').hide();
}
	})
	if($(document).width()<1030)
	{
	var thwth='';
	$('.nav-tabs').click(function()
	{
		
		thwth +=$('.table tbody td:nth-child(1)').width()+",";
		if($('body').width()<1030&&$('body').width()>600)
			{	
			if (/iPhone/.test(navigator.userAgent)) {
				
					$('.table tbody td').css({
      width:'100%'
	 
		});
			}
			else
			{
	 }
			}
			else
			{
				
				$('.table tbody td').css({
      width:'100%'
	 
		});
			}
		var sdw=thwth.split(',');
	
	if(sdw[0]<40)
	{
	
		$('.table th').css({'min-width':'168px'});
	}
	else
	{
		
		$('.table th').css({'min-width':sdw[0]-2+'px'});
	}
		
		
	});
}
if($(document).width()<600)
{
	
	var inr=1;
	$('.nav-tabs').click(function()
	{
		inr=1;
		var wis=$('.table').width();
		$('.table th, .table tbody td').css({
		display:'none'
	});
		$('.table th:nth-child(1), .table tbody td:nth-child(1)').css({
		display:'table-cell'
	});
	$('.table th:nth-child(1)').css({'min-width':'155px'});
	$.cookie('table_cell',inr+',');
	})
	$('#next_cell').click(function()
	{
		
		inr=+inr+1;
		$('.table th, .table tbody td').css({
		display:'none'
	});
		$('.table th:nth-child('+inr+'), .table tbody td:nth-child('+inr+')').css({
		display:'table-cell'
	});
	})
	$('#pre_cell').click(function()
	{
		
		inr=+inr-1;
		$('.table th, .table tbody td').css({
		display:'none'
	});
		$('.table th:nth-child('+inr+'), .table tbody td:nth-child('+inr+')').css({
		display:'table-cell'
	});
	})
}
});
$(document).ready( function () {

		     
		$('.tab-pane').addClass('active');
	
	
	 //new FixedHeader( oTable );
    /* Add the events etc before DataTables hides a column */
    $("thead input.search_int").keyup( function () {
		 /* Filter on the column (the index) of this element */
    // $('#example').dataTable().fnFilter( this.value, $("thead input.search_int").index(this));
    });
    	 $("thead input.search_int2").keyup( function () {
		 /* Filter on the column (the index) of this element */
     $('#example2').dataTable().fnFilter( this.value, $("thead input.search_int2").index(this));
    } );
	
	$("thead input.search_int3").keyup( function () {
		
	 /* Filter on the column (the index) of this element */
     $('#example3').dataTable().fnFilter( this.value, $("thead input.search_int3").index(this));
    } );
	
	$("thead input.search_int4").keyup( function () {
		
	 /* Filter on the column (the index) of this element */
     $('#example4').dataTable().fnFilter( this.value, $("thead input.search_int4").index(this));
    } );
    /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes
     */
  
    $("thead input").focus( function () {
     if ( this.className == "search_init" )
     {
      this.className = "";
      this.value = "";
     }
    } );
    
    
  
	
  
 	

							
} );

function filter(table)
		{
			$('#subt').hide();
		$('#filter_id').show();
		
		$('#filter_id').attr('onclick','push_id("'+table+'")');
			var lable="";
			
			
				if($("#fil_left > div[id]").html()==null)
				{
				jQuery("#fil_right > span div[id]").each(function(){
				var id=$(this).attr('id');
				var ids=id.split('_');
				$('#'+table).dataTable().fnFilter('',ids[1]);
					})
				

					//$('#example').dataTable().fnFilter('');
					$('#fil_pop').hide();
				}
			lable +="<table class='sstr' align='center'><tr><th>Lables</th><th>Filter Text</th></tr>";
			jQuery("#fil_left > div[id]").each(function(){
				        var context = $(this);
		var inp=context.attr('id');
	lable += "<tr><td>"+context.html()+":</td><td> <input type='text' id='"+inp+"' title='_filterText"+inp+"'></td></tr>";
		
			});
			lable +="</table>"
			$('#cont').show();
			$('#cont').html(lable);
			
			$('#contnt').hide();
			
		}
		
		function push_id(table)
		{
			
			$("#cont").find('input').each(function(){
       
	        var ids=this.id;
	        var vals=this.value;
		    var titile=this.title;
			var colum=ids.split('_');
		
			//$('#'+titile).val(vals);
			
			
			 $('#'+table).dataTable().fnFilter(vals,colum[1]);
	//.......................................................................................................................................	
			});
			$('#fil_pop').hide();
		}
		
function sort_ch(table)
		{
			$('#stt').hide();
		$('#st_id').show();
		$('#st_id').attr('onclick','st_id("'+table+'")');
			var lable="";
			
			if(jQuery(".fil_left > div[id]").html()==null)
			{
				$('#'+table).dataTable().fnSort([[0,'asc']]);
				$('#sort_pop').hide();
			}
			
			lable +="<table class='sstr' align='center'><tr><th>Lables</th><th>Ascending</th><th>Descending</th></tr>";
			jQuery(".fil_left > div[id]").each(function(){
        var context = $(this);
		var inp=context.attr('id');
		var sty=inp.split('_');
	lable += "<tr><td>"+context.html()+":</td><td> <input type='radio' title='asc' value='"+sty[1]+"' name='"+inp+"'></td><td><input title='desc' type='radio' value='"+sty[1]+"' name='"+inp+"'></td></tr>";
		
			});
			lable +="</table>";
			$('.cont').show();
			$('.cont').html(lable);
			
			$('.contnt').hide();
		}
		
		


//................................................	

function p_ch(table)
{
	
	var names='';
	var oTable = $('#'+table).dataTable();
	$(".pos_center").find('input:not(:checked)').each(function(){
       var sel=$(this).attr('id');
	   var nam=$(this).attr('name');
	 
	   var seln=sel.split('_');
   var iCol=seln[1];
   var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
 oTable.fnSetColumnVis( iCol, bVis ? false : false);
     names +=nam+',';
	});
	var name=names.split(',');
	var dd=$('.'+table+'_thw').attr('alt');
	
	var datas="hid="+name+"&dd="+dd;
$.ajax({
      type: "POST",
      url: "table_store.php",
      data: datas,
      success: function(html) {
	
	                               
								    }});
	$(".pos_center").find('input:checked').each(function(){
       var sel=$(this).attr('id');
	   var seln=sel.split('_');
   var iCol=seln[1];
   var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
 oTable.fnSetColumnVis( iCol, bVis ? true : true);
	});
	
	$('.pos_pop').hide();
	
}





function tech(table)
{

	$('.'+table+'_tech').each(function() {
	
		var name=$(this).text();
		nm=name.split('@');
		var ty=$(this).attr('name');
	
		if(ty=='tex')
		{
			$('.'+table+'_'+nm[0]).find('span').each(function() {
                if($(this).hasClass('notdraggable'))
				{
					$(this).html(nm[1]);
				}
            });
			
			//$('.'+table+'_'+nm[0]).find('span').hasClass('notdraggable').html(nm[1]);
			//$('.'+table+'_'+nm[0]).html(nm[1]);
			$('.'+table+'_'+nm[0]+"_hid1").html(nm[1]);
			$('.'+table+'_'+nm[0]+'_hid').html(nm[1]);
		$(this).attr('name','des');
		//$('#tech').html('Technical Names');
		}
		else
		{
		$('.'+table+'_'+nm[0]).find('span').each(function() {
                if($(this).hasClass('notdraggable'))
				{
					$(this).html(nm[0]);
				}
            });
		//$('.'+table+'_'+nm[0]).find('span').hasClass('notdraggable').html(nm[0]);
		$('.'+table+'_'+nm[0]+"_hid1").html(nm[0]);
			$('.'+table+'_'+nm[0]+'_hid').html(nm[0]);
			$(this).attr('name','tex');
			//$('#tech').html('Description Names');
		}
       });
}

function exports(table,name)
{
	
	var datas="table_data="+$('#'+table).html();
var tap=table.split('_');
	$.ajax({
      type: "POST",
      url: "../lib/excel.php?name="+name,
      data: datas,
      success: function(html) {
		
		  
	  }
	})
}
function eporte(table)
{
	
 Createpdf(table);
	 
var datas="table_data="+$('#export_table').html();
var tap=table.split('_');
	$.ajax({
      type: "POST",
      url: "../lib/excel.php?name="+$('#'+tap[0]).attr('alt'),
      data: datas,
      success: function(html) {
		
		  
	  }
	})
$('.excel_link').attr("onClick","excel('"+table+"')");
$('.csv_link').attr("onClick","csv('"+table+"')");
//$('.pdf_link').attr("onClick","pdf('"+table+"')");
	$('#exp_pop').toggle();
	$('#exp_pop').mouseleave(function()
	{
		
		$('#exp_pop').hide();
	})
	
	
}
function pdf(table)
{

	  $('#loading').show();
	 $("body").css("opacity","0.4"); 
	// Createpdf(table);
	  $("body").css("filter","alpha(opacity=40)"); 
var datas="table_data="+$('#export_table').html();
var tap=table.split('_');
	$.ajax({
      type: "POST",
      url: "../lib/excel.php?name="+$('#'+tap[0]).attr('alt'),
      data: datas,
      success: function(html) {
		  
		  if($(document).width()<1030)
		  {
			
		$('#pdf_new').children('a').trigger('click');
		  }
		  else
		  {
		window.location="../pdf/pdf.php";
		  }
		    $('#loading').hide();
	 $("body").css("opacity","1"); 
		  
	  }
	})


}

function excel(table)
{

	  $('#loading').show();
	 // CreateTable(table);
	 $("body").css("opacity","0.4"); 
	  $("body").css("filter","alpha(opacity=40)"); 
var datas="table_data="+$('#export_table').html();
var tap=table.split('_');

	$.ajax({
      type: "POST",
      url: "../lib/excel.php?name="+$('#'+tap[0]).attr('alt'),
      data: datas,
      success: function(html) {
		
		window.location="../excel/generateexport.php";
		    $('#loading').hide();
	 $("body").css("opacity","1"); 
		  
	  }
	})


}

function csv(table)
{
	//CreateTable(table);

	  $('#loading').show();
	 $("body").css("opacity","0.4"); 
	  $("body").css("filter","alpha(opacity=40)"); 
var data=tableToCSV('#export_table');
var datas="table_data="+data;
var tap=table.split('_');
	$.ajax({
      type: "POST",
      url: "../lib/excel.php?name="+$('#'+tap[0]).attr('alt'),
      data: datas,
      success: function(html) {

	window.location="../lib/csv.php";
	    $('#loading').hide();
	 $("body").css("opacity","1"); 
		  
	  }
	})


}
//.............................................................




   function tableToCSV(table) {
   
      var headers = [];
	  var rows = [];
	  var csv = '';
	  
	  $(table).find('thead td').each(function() {
	  
	      var $th = $(this);
		  var text = $th.text();
		  var header = '"' + text + '"';
		  
		  headers.push(header);
	  
	  
	  });
	  
	  csv += headers.join(',') + "\n";
	  
	  
	  $(table).find('tbody tr').each(function() {
	  
	    
	  
	  
	     $(this).find('td').each(function() {
		 
		    var row = $(this).html();
			
			if(!$(this).is('td:last-child')) {
			
			    row += ',';
			
			} else {
			
		        row += "\n";
				
			}
			
			csv += row;
		 });
	  
	  
	  });
	 
	
	  return csv;
	  
	  
	  
   
   
   }






function CreateTable(tables) {
	
	var idsd=tables.split('_');
	
	document.getElementById ('export_table').innerHTML=" ";
	jsonDatar2=$('#'+tables).html();
           jsonDatar = JSON.parse(jsonDatar2);
		   alert(jsonDatar.length);
            var table = document.createElement ("table");
            table.border = "1px";
			table.cellPadding="0px";
			table.cellSpacing="0px";
			table.setAttribute("class","malto");
			table.style.textAlign="center";
			
			var tHead = table.createTHead ();
			tHead.style.backgroundColor="#859CE6";
            var row = tHead.insertRow (-1);
			$("."+idsd[0]+"_th").each(function(){
  var fid=$(this).parent('th').closest('div').hasClass('head_fix');
	var title=$(this).text();
	if(!fid)
	{
    
             var cell = row.insertCell (-1);
				cell.style.minWidth="150px";
				cell.style.paddingBottom="5px";
				cell.style.paddingTop="5px";
				cell.innerHTML = title ;

	}
	

})
             var tBody = document.createElement ("tbody");
            table.appendChild (tBody);
			for (var key in jsonDatar) {
	   var obj = jsonDatar[key];
                var row = tBody.insertRow (-1);
                for (var prop in obj) {
					
                    var cell = row.insertCell (-1);
                    cell.innerHTML = encodeURIComponent(obj[prop]);
                }
           
			}

           

           document.getElementById ('export_table').appendChild(table);           
        }

function Createpdf(tables) {
	document.getElementById ('export_table').innerHTML=" ";
	jsonDatar2=$('#'+tables).html();
           jsonDatar = JSON.parse(jsonDatar2);
		   //alert(jsonDatar.length);
            var table = document.createElement ("table");
            table.border = "1px";
			table.align='center';
			table.cellPadding="0px";
			table.cellSpacing="0px";
			table.setAttribute("class","malto");
			table.style.textAlign="center";
			var sde=0;
for (var key in jsonDatar) {
	   var obj = jsonDatar[key];
	   if(sde==0)
	   {
            var tHead = table.createTHead ();
			tHead.style='background-color:#cecece';
            var row = tHead.insertRow (-1);
			 
   
           for (var prop in obj) {
                var cell = row.insertCell (-1);
				
				cell.innerHTML = encodeURIComponent(prop);
		   }
		   
	   }
sde++;
}
             var tBody = document.createElement ("tbody");
            table.appendChild (tBody);
			for (var key in jsonDatar) {
	   var obj = jsonDatar[key];
                var row = tBody.insertRow (-1);
                for (var prop in obj) {
					
                    var cell = row.insertCell (-1);
                    cell.innerHTML = encodeURIComponent(obj[prop]);
                }
           
			}

           

           document.getElementById ('export_table').appendChild(table);           
        }
//............................................................
function mailto(table)
{
	
	  jPrompt1('Email Id:', '', 'Send Mail', function(r) {
            if( r ) 
			{
				CreateTable(table);
				
			 $('#loading').show();
	 $("body").css("opacity","0.4"); 
	  $("body").css("filter","alpha(opacity=40)"); 
			var datas="table_data="+$('#export_table').html();
	$.ajax({
      type: "POST",
      url: "../lib/testgmail.php?mail_to="+r,
      data: datas,
      success: function(html) {
		
		   $('#loading').hide();
	 $("body").css("opacity","1"); 
		 jAlert('Mail Sent','Message');
		  
	  }
	})
			}
           
        });
	
}
	
//.........................................................................
				function filtes1(table) {
				if($.browser.version=='9.0')
				{
					if($('.'+table+'_filter').css('display')=='none')
					{
					$('.table tbody').css({'margin-top':'84px'});
					$('.bottom').css({'top':'605px','left':'76px'});
					$('.bottom_btns').css({'padding-top':'500px'});
					
					}
					else
					{
						$('.table tbody').css({'margin-top':'39px'});
						$('.bottom').css({'top':'560px','left':'84px'});
						$('.bottom_btns').css({'padding-top':'455px'});
					}
				}
				if($('.'+table+'_filter').css('display')!='none')
				{
					//alert('hi');
					$('.search_int').each(function() {
                        $(this).val('');
                    });
					var tableName=$('.search_int:eq(1)').attr('name');
					var tableType=$('.search_int:eq(1)').attr('til');
					//alert(tableType);
					//alert($('.search_int:eq(1)').attr('name'));
					sear(1,'',tableName,tableType);
				}
					$('.'+table+'_filter').toggle();
}
//................................................................

function sorte(table)
  {
	  
	  $('#sort_pop').show();
	  $('.contnt').show();
	  $('.cont').hide();
	  $('#stt').show();
	  $('#st_id').hide();
	  var table_len=$('.'+table+'_th').length;
	
	
var titles="";
var st=0;
$("."+table+"_th").each(function(){
	//var idd=$('.'+table+'_th').eq(i).attr('id');
	
	  var fid=$(this).parent('th').closest('div').hasClass('head_fix');
	
	  if(!fid)
	  {
		  if($(this).parent('th').css('display')=='table-cell')
		  {
	var title = $(this).text();

      titles +="<span id='ths_"+st+"po'><div class='selt' id='ths_"+st+"' style='cursor:pointer'>"+title+"</div></span>";
		  }
	  }
	  st++;
});
$('.fil_right').html(titles);

$('.selt').click(function()
{

var fillt=$(this).attr('id');
$('.selt').css({
	background:''
});

$('#'+fillt).css({
	background:'#cecece'
});

$('.midd').attr('title',fillt);
//$('#'+fillt).hide();
$('.to_left').click(function()
{
var tt=$('.midd').attr('title');

$('.fil_left').append($('#'+tt));

})

$('.to_right').click(function()
{
var tt=$('.midd').attr('title');

$('#'+tt+'po').html($('#'+tt));
})
})
//........................

$('#stt').attr('onclick','sort_ch("'+table+'")');
	
  }
  
   	 function st_id(table)
		{
			
			var vads1=new Array;	
			
			var n =$(".cont").find('input:checked').length;
		
			var i=1;
$(".cont").find('input:checked').each(function(){
 order=this.value;
 var values=this.title;
 var ivad=new Array;
  ivad.push(order);
 ivad.push(values);
vads1.push(ivad); 

//	vads1=vads1.concat("["+order+",'"+values+"'],");
		
		});

$('#'+table).dataTable1().fnSort(vads1);
			//$('#fil_pop').hide();
			$('#sort_pop').hide();
		}
		
		function ssum(table)
		{
			var iColumn=$('#cl_pos').html();
			//alert(iColumn);
			var total=0;
			var tog=0;
					$('.'+table+'_cl'+iColumn).each(function(index, element) {
						
                 // alert($(this).text());
							
						if(!isNaN($(this).text()))
						{
							
							//alert($(this).text());
							total=Number(total)+Number($(this).text());
							}
							
						
						else
						{
							tog=1;
						}
						
                    });
				if(tog==0)
				{
				jAlert('<b>Total: </b>'+total, 'Message');
				}
				else
				{
					jAlert('<b>Invalid Selected field</b>', 'Message');
				}
		}
		//..........................................................................
		function main_table(table)
		{
			
      $('.pos_pop').show();
$('.pos_pop').css({'margin-left':'58%'});
var titles="";
var let=1;
$("."+table+"_th").each(function(){
	
	var title=$(this).text();
	titles +="<div class='cells q"+let+"'>"+title+"</div>";
	
	
let++;	
})
$('.pos_center').html(titles);
var sdwq=$.cookie('table_cell').split(',');
			var i;
			for(i=0;i<sdwq.length-1;i++)
			{
				sdwq[i];
				$('.q'+sdwq[i]).addClass('table_sel');
			}
$('.cells').click(function()
	{
			if($(this).hasClass('table_sel'))
		{
			$(this).removeClass('table_sel');
		}
		else
		{
		$(this).addClass('table_sel');
		}
		if($('.table_sel').length>5)
		{
			$(this).removeClass('table_sel');
			 jAlert('Maximum selection of columns should not be more then five','Message');
			
		}
	});
	$('#p_ch').attr('onclick','sel_class("'+table+'")');
		}
		//..........................................................................
		function table_cells(table)
		{
			
		
$('.pos_pop').show();
$('.pos_pop').addClass('post_col');




var titles="";
var let=1;

$("."+table+"_th").each(function(){
	
  var fid=$(this).parent('th').closest('div').hasClass('head_fix');
	var title=$(this).text();
	if(!fid)
	{
		if($(this).parent('th').css('display')!='none')
		{
	titles +="<div class='cells q"+let+" table_sel' alt='"+table+"'>"+title+"</div>";
		}
		else
		{
			titles +="<div class='cells q"+let+"' alt='"+table+"'>"+title+"</div>";
		}
	}
	
let++;	
})

	$('.pos_center').html(titles);


//var sdwq=$.cookie('table_cell').split(',');
	//		var i;
			//for(i=0;i<sdwq.length-1;i++)
			//{
				//sdwq[i];
				//$('.q'+sdwq[i]).addClass('table_sel');
			//}
$('.cells').click(function()
	{
		
		
		
			if($(document).width()>1026)
		{
			
			
		if($(this).hasClass('table_sel'))
		{
			$(this).removeClass('table_sel');
		}
		else
		{
		$(this).addClass('table_sel');
		}
		if($('.table_sel').length>5)
		{
			$.cookie('table_show','4')
			
			$(this).removeClass('table_sel');
			jAlert('Maximum selection of columns should not be more then five','Message',function(r)
			{
			
			});
			
		}
			}
		
		//$('.cells').removeClass('table_sel');
		
		if($(document).width()<1030)
		{
			
			
		if($(this).hasClass('table_sel'))
		{
			$(this).removeClass('table_sel');
		}
		else
		{
		$(this).addClass('table_sel');
		}
		if($('.table_sel').length>4)
		{
			$(this).removeClass('table_sel');
			 jAlert('Maximum selection of columns should not be more then four','Message');
			
		}
			}
		
		if($(document).width()<600)
		{
			$('.cells').removeClass('table_sel');
			$(this).addClass('table_sel');
		}
	})
$('#p_ch').attr('onclick','sel_class("'+table+'")');
			
			
$(document).mouseup(function (e)
{
    var container = $(".post_col");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
       $('.pos_pop').hide();
    }
});
			

		}
		function sel_class(table)
		{
		
			if($('body').width()<1030&&$('body').width()>600)
			{
            if($('.table_sel').length<4)
		        {
             jAlert('Atleast four columns need to be selected.','Message');
			 return false;
               } 
			}
			if($('body').width()>1030)
			{
				 if($('.table_sel').length<5)
		        {
             jAlert('Atleast five columns need to be selected.','Message',function(r)
			{//onClick="table_cells('example')
			
			});
			 return false;
               } 
			}
			var inr=0;
			var head_pos='';
		$('#'+table+' th, #'+table+' tbody td').css({
		display:'none'
	});
			$('.cells').each(function() {
				inr=inr+1;
				if($(this).hasClass('table_sel'))
				{
			
			if($('body').width()<1030&&$('body').width()>600)
			{	
			
			$('#'+table+' th:nth-child('+inr+'), #'+table+' tbody td:nth-child('+inr+')').css({
		display:'table-cell',
		width:'210px'
             });
			 $('#'+table+' th:nth-child(7), #'+table+' tbody td:nth-child(7)').css({
		display:'table-cell'
             }); 
			}
			if($('body').width()<600)
			{
				
				$('#'+table+' th:nth-child('+inr+'), #'+table+' tbody td:nth-child('+inr+')').css({
		'display':'table-cell',
		'width':'100%',
		'height':'20px'
		
	});
	 $('.last_row td:nth-child(7)').css({display:'table-cell',width:'40px',position:'absolute',right:'10px'});
			}
			if($('body').width()>1030)
			{
				
	/*		$('#'+table+' th:nth-child('+inr+'), #'+table+' tbody td:nth-child('+inr+')').css({
		display:'table-cell',
		width:'20%'
	});*/
			}
	head_pos +=inr+',';
				}
            });
			$.cookie('table_cell',head_pos);
			$('.pos_pop').hide();
			$('.pos_center').html(' ');
			store_tableheader_couchdb(table);
		}
		//..........................................................................
		function post(table)
{
	
$('.pos_pop').show();
$('.pos_pop').css({'margin-left':'5%'});
var arrt='';	

$("."+table+"_th").each(function(){
	var tti=$(this).attr('name');
	
	arrt +=tti+',';
})

	var arr=arrt.split(',');
	
 var table_len=$('.'+table+'_thw').length;
var titles="";
for(i=0;i<table_len;i++)
{
       var ids = $('.'+table+'_thw').eq(i).attr('name');
	  
	    var title = $('.'+table+'_thw').eq(i).text();
	  var t=arr.indexOf(ids);
	if(t!=-1)
	{
		titles +="<div><input type='checkbox' id='ch_"+i+"'  name='"+ids+"' CHECKED>"+title+"</div>";
	}
	else
	{
      titles +="<div><input type='checkbox' id='ch_"+i+"' name='"+ids+"' >"+title+"</div>";
	}
}
$('.pos_center').html(titles);

$('#p_ch').attr('onclick','p_ch("'+table+'")');
}
//..................................................
function side_links(jonb,jum)
{
		$('#loading').show();
	 $("body").css("opacity","0.4"); 
	  $("body").css("filter","alpha(opacity=40)"); 
		 $.ajax({
		type:'POST', 
		url: "../lib/controller.php?page=forms&url=editsalesorder&values="+jonb+"&jum="+jum+"&titl=Edit Sales Order&tabs=editsalesorder", 
		
		success: function(response) {
			
			$('#loading').hide();
			  $("body").css("opacity","1"); 
			$('#out_put').html(response)
		}
		 })
	//controller.php?page=forms&url=editsalesorder&values="+jonb+"&jum="+jum+"&titl=Edit Sales Order&tabs=editsalesorder
}
 //onclick='side_links(\""+jonb+"\",\""+jum+"\")' 
 function side_links(id){
	 $.cookie('sub_out','1');
	var form_values= $('#'+$.cookie('validation_form')).serialize();
	
	 $.cookie('form_values',form_values);
 var back_to=$('#'+id).attr('name');
 
var back_tit=$('#head_tittle').html();
location.href='#sublink';
        $(document).find('.head_fix').each(function(index, element) {
        $(this).remove();
});

		$('#loading').show();
	 $("body").css("opacity","0.4"); 
	  $("body").css("filter","alpha(opacity=40)"); 
	  $('.pos_center').addClass('addheaders');
	  $('.addheaders').removeClass('pos_center');
	  $('.addheaders').html(' ');
	   $('#p_ch').addClass('submitreplace');
	   $('.submitreplace').removeAttr('id');
		 $.ajax({
		type:'POST', 
		url: $('#'+id).attr('alt'), 
		
		success: function(response) {
			
			$('#loading').hide();
			  $("body").css("opacity","1"); 
			   $('#out_put').hide('slide', {direction: 'left'}, 500);
			   $('#out_table').html(response)
			   $('#out_table').show('slide', {direction: 'right'}, 500);
			
		}
		 })
		 
		 $('#back_to').show();
		$('#back_to').attr('onClick','back_to("'+back_to+'","'+back_tit+'")')
	
		 
   
}

function back_to(page,title)
{
	$('.addheaders').addClass('pos_center');
	  $('.pos_center').removeClass('addheaders');
	  $('.submitreplace').attr('id','p_ch');
	  $('#p_ch').removeClass('submitreplace');
		 $.cookie('form_values','');
		$.cookie('sub_out','0');
		$('#back_to').hide();
		$('#out_table').hide('slide', {direction: 'right'}, 500);
		$('#out_put').show('slide', {direction: 'left'}, 500);
			   $('#out_table').html("");
			  parent.subtu(page);
		     $('#head_tittle').html(title);
		 
	
}



function show_dilv(id,jonb,jum,back_to)
{
	var lent=$('#'+id).closest('table').find('tr').length-2;
	var ide=$('#'+id).closest('tr').index();
    var ure=lent-ide;
    var tope=''
	var leftq=''
	$('.red_pop').remove();
var ids=id.split('_');
	 var doc_s='';
		doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div  style='display:none;' class='exp_menu' name='"+back_to+"' id='display1' onclick='side_links(\"display1\")' alt='../lib/controller.php?page=forms&url=picking_and_post_goods&values="+jonb+"&jum="+jum+"&titl=Pick And Post Goods&tabs=picking_and_post_goods'>Display</div>";

 doc_s += "</div>";
 doc_s +="</div>";
 
 
	var doc_h=$('#'+id).append(doc_s);
	$('#display1').trigger('click');
	$('.red_pop').css({position:'absolute'});
	
	if(ure<=5)
	{
		$('.red_pop').css({'margin-top':'0px'});
	}
	$('.red_pop').show();
	
	 $('.red_pop').mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
    $('#'+id).mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
   
	
}
//.......................................................
function ccls()
{
		$('.material_pop').hide();
}
function show_prod(id,pnt,back_to)
{
		$('#loading').show();
	 $("body").css("opacity","0.4"); 
	 
			
$.ajax({
		type:'POST', 
		url: '../lib/controller.php?page=bapi&bapiName=BAPI_MATERIAL_STOCK_REQ_LIST&url=product_avl&values='+id+'&pln='+pnt, 
		
		success: function(response) {
			
			$('#loading').hide();
			  $("body").css("opacity","1"); 
			$('.material_pop').html(response)
			$('.material_pop').show();
		}
		 })
	

	
	
}


//.......................................................
function show_rels(id,jonb,jum,back_to)
{
	var lent=$('#'+id).closest('table').find('tr').length-2;
	var ide=$('#'+id).closest('tr').index();
    var ure=lent-ide;
    var tope=''
	var leftq=''
	$('.red_pop').remove();
var ids=id.split('_');
	 var doc_s='';
		doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div  style='display:none;' class='exp_menu' id='display1' name='"+back_to+"' onclick='cert_deliv(\"display1\")' alt='../lib/controller.php?bapiName=BAPI_PRODORD_RELEASE&page=bapi&url=releasepro&ORDER_NUMBER="+jonb+"&jum="+jum+"&titl=Release Prod Order&tabs=release_prod_order'>Display</div>";

 doc_s += "</div>";
 doc_s +="</div>";
 
 
	var doc_h=$('#'+id).append(doc_s);
	$('#display1').trigger('click');
	$('.red_pop').css({position:'absolute'});
	
	if(ure<=5)
	{
		$('.red_pop').css({'margin-top':'0px'});
	}
	$('.red_pop').show();
	
	 $('.red_pop').mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
    $('#'+id).mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
   
	
}
//..................................................

function show_conf(id,jon,jonb,jum,back_to)
{
	
	var lent=$('#'+id).closest('table').find('tr').length-2;
	var ide=$('#'+id).closest('tr').index();
    var ure=lent-ide;
    var tope=''
	var leftq=''
	$('.red_pop').remove();
var ids=id.split('_');
	 var doc_s='';
		doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div  style='display:none;' class='exp_menu' name='"+back_to+"' id='display1' onclick='side_links(\"display1\")' alt='../lib/controller.php?page=forms&url=confirm_prod_order&json="+jon+"&value="+jonb+"&jum="+jum+"&titl=Confirm Prod Order&tabs=confirm_prod_order'>Display</div>";

 doc_s += "</div>";
 doc_s +="</div>";
 
 
	var doc_h=$('#'+id).append(doc_s);
	$('#display1').trigger('click');
	$('.red_pop').css({position:'absolute'});
	
	if(ure<=5)
	{
		$('.red_pop').css({'margin-top':'0px'});
	}
	$('.red_pop').show();
	
	 $('.red_pop').mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
    $('#'+id).mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
   
	
}

//..................................................
function show_menu(id,jonb,jum,back_to)
{
	
	var lent=$('#'+id).closest('table').find('tr').length-2;
	var ide=$('#'+id).closest('tr').index();
    var ure=lent-ide;
    var tope=''
	var leftq=''
	$('.red_pop').remove();
var ids=id.split('_');
	 var doc_s='';
		doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div class='exp_menu' id='display1' name='"+back_to+"' onclick='side_links(\"display1\")' alt='../lib/controller.php?page=bapi&bapiName=BAPISDORDER_GETDETAILEDLIST&url=editsalesorder&I_VBELN="+ids[0]+"&jum="+jum+"&titl=Display Sales Order&tabs=editsalesorder'>Display</div>";
 doc_s += "<div class='exp_menu' id='Set_Delivery' onclick='cert_deliv(\"Set_Delivery\")' alt='../lib/controller.php?REF_DOC="+ids[0]+"&page=bapi&url=deliveryblock&bapiName=BAPI_SALESORDER_CHANGE&type=set'>Set Delivery Block</div>";
 doc_s += "<div class='exp_menu' id='Remove_Delivery' onclick='cert_deliv(\"Remove_Delivery\")' alt='../lib/controller.php?REF_DOC="+ids[0]+"&page=bapi&url=deliveryblock&bapiName=BAPI_SALESORDER_CHANGE&type=remove'>Remove Delivery Block</div>";
 doc_s += "<div class='exp_menu' id='Create_Delivery1' onclick='cert_deliv(\"Create_Delivery1\")' alt='../lib/controller.php?REF_DOC="+ids[0]+"&page=bapi&url=createdelivery&bapiName=BAPI_OUTB_DELIVERY_CREATE_SLS'>Create Delivery</div>";
 doc_s += "<div class='exp_menu' onclick='cert_r(\""+ids[0]+"\",\""+id+"\")'>Credit Release</div>";
 if(jum=='/KYK/S_POWL_BILLDUE')
 {
  doc_s += "<div class='exp_menu' id='Create_Billing1' onclick='cert_deliv(\"Create_Billing1\")' alt='../lib/controller.php?REF_DOC="+ids[0]+"&josn="+jonb+"&page=bapi&url=createbill&bapiName=ZBAPI_POWL_CREATE_BILLING'>Create Billing</div>";
 }
 doc_s += "</div>";
 doc_s +="</div>";
	var doc_h=$('#'+id).append(doc_s);
	$('.red_pop').css({position:'absolute'});
	
	if(ure<=4)
	{
		$('.red_pop').css({'margin-top':'-148px'});
		if(lent<5)
		{
			$('.red_pop').css({'margin-top':'-60px','margin-left':'100px'});
		}
	}
	$('.red_pop').show();
	
	 $('.red_pop').mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
    $('#'+id).mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
   
	
}
//......................................................................
function show_info_rec(id,json,back_to)
{
	

	 var doc_s='';
		doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div  style='display:none;' class='exp_menu' name='"+back_to+"' id='display1' onclick='side_links(\"display1\")' alt='../lib/controller.php?page=forms&url=create_purchase_order&ORDER_NUMBER="+id+"&json="+json+"&titl=Create Purchase Order&tabs=create_purchase_order'>Display</div>";

 doc_s += "</div>";
 doc_s +="</div>";
 
 
	var doc_h=$('#'+id).append(doc_s);
	$('#display1').trigger('click');
	
	
}
function show_pro_avl(id,json,back_to)
{
	

	 var doc_s='';
		doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div  style='display:none;' class='exp_menu' name='"+back_to+"' id='display1' onclick='side_links(\"display1\")' alt='../lib/controller.php?page=forms&url=product_availability&ORDER_NUMBER="+id+"&json="+json+"&titl=Create Purchase Order&tabs=create_purchase_order'>Display</div>";

 doc_s += "</div>";
 doc_s +="</div>";
 
 
	var doc_h=$('#'+id).append(doc_s);
	$('#display1').trigger('click');
	
	
}
function show_cus(id,back_to)
{
	 var widt=$(document).width();
	
	var lent=$('#'+id).closest('table').find('tr').length-2;
	
	var ide=$('#'+id).closest('tr').index();
    var ure=lent-ide;
	$('.red_pop').remove();
	var ids=id.split('_');
	 var doc_s='';
doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div class='exp_menu' id='Display_Edit1' name='"+back_to+"' onclick='side_links(\"Display_Edit1\")' alt='../lib/controller.php?page=bapi&url=editcustomers&bapiName=BAPI_CUSTOMER_GETLIST&type=off&CUSTOMER_ID="+ids[0]+"&titl=Edit Customers&tabs=editcustomers'>Display/Edit</div>";
 doc_s += "<div class='exp_menu' id='Sales_Details1' onclick='side_links(\"Sales_Details1\")' alt='../lib/controller.php?scr="+widt+"&page=bapi&url=search_sales_orders&bapiName=BAPI_SALESORDER_GETLIST&type=off&CUSTOMER_NUMBER="+ids[0]+"&SALES_ORGANIZATION=1000&titl=Search Sales Orders&tabs=search_sales_orders'>Sales Details</div>";
 doc_s += "<div class='exp_menu' id='Post_Incoming1' onclick='side_links(\"Post_Incoming1\")' alt='../lib/controller.php?page=forms&url=post_incoming_payment&bapiName=ZBAPI_ACC_DOCUMENT_POST&type=off&CUSTOMER="+ids[0]+"&titl=Post Incoming Payment&tabs=post_incoming_payment'>Post Incoming Payment</div>";
 doc_s += "</div>";
  doc_s += "</div>";
	var doc_h=$('#'+id).append(doc_s);
	if(ure<=4)
	{
		$('.red_pop').css({'margin-top':'-105px'});
		if(lent<2)
		{
			$('.red_pop').css({'margin-top':'-60px','margin-left':'100px'});
		}
	}
	if(ure==-1)
	{
		$('.red_pop').css({'margin-top':'0px'});
	}
	$('.red_pop').show();
	
	 $('.red_pop').mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
    $('#'+id).mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
	
}
//............................................................
function cert(id)
{
	
	$('.red_pop').remove();
	var ids=id.split('_');
	 var doc_s='';
	doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div class='exp_menu' onclick='cert_r(\""+ids[0]+"\")'>Credit Release</div>";

 doc_s += "</div>";
 doc_s +="</div>";
	$('#'+id).append(doc_s);
	
	$('.red_pop').show();
	
	 $('.red_pop').mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
    $('#'+id).mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
	
}


function show_cus_map(id,back_to)
{
	 var widt=$(document).width();
	
	var lent=$('#'+id).closest('table').find('tr').length-2;
	
	var ide=$('#'+id).closest('tr').index();
    var ure=lent-ide;
	$('.red_pop').remove();
	var ids=id.split('_');
	 var doc_s='';
doc_s +="<div class='blue_pop'>";
 doc_s +="<div class='red_pop'>";
 doc_s += "<div class='exp_menu' id='Display_Edit1' name='"+back_to+"' onclick='parent.side_links_map(\"../lib/controller.php?page=bapi&url=editcustomers&bapiName=BAPI_CUSTOMER_GETLIST&type=off&CUSTOMER_ID="+ids[0]+"&titl=Edit Customers&tabs=editcustomers\")' alt=''>Display/Edit</div>";
 doc_s += "<div class='exp_menu' id='Sales_Details1' onclick='parent.side_links_map(\"../lib/controller.php?scr="+widt+"&page=bapi&url=search_sales_orders&bapiName=BAPI_SALESORDER_GETLIST&type=off&CUSTOMER_NUMBER="+ids[0]+"&SALES_ORGANIZATION=1000&titl=Search Sales Orders&tabs=search_sales_orders\")' alt=''>Sales Details</div>";
 doc_s += "<div class='exp_menu' id='Post_Incoming1' onclick='parent.side_links_map(\"../lib/controller.php?page=forms&url=post_incoming_payment&bapiName=ZBAPI_ACC_DOCUMENT_POST&type=off&CUSTOMER="+ids[0]+"&titl=Post Incoming Payment&tabs=post_incoming_payment\")' alt=''>Post Incoming Payment</div>";
 doc_s += "</div>";
  doc_s += "</div>";
	var doc_h=$('#'+id).append(doc_s);
	if(ure<=4)
	{
		$('.red_pop').css({'margin-top':'-105px'});
		if(lent<2)
		{
			$('.red_pop').css({'margin-top':'-60px','margin-left':'50px'});
		}
	}
	if(ure==-1)
	{
		$('.red_pop').css({'margin-top':'0px'});
	}
	$('.red_pop').show();
	
	 $('.red_pop').mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
    $('#'+id).mouseleave(function()
   {
	  
	   $('.red_pop').remove();
   })
	
}
//............................................................




function cert_r(ids,id)
{
	
	//var tr=$('#'+ids).closest('tr');
	//var rowindex=tr.index();
	
	
  $('#loading').show();
	 $("body").css("opacity","0.4"); 
	  $("body").css("filter","alpha(opacity=40)");
$.ajax({
      type: "POST",
      url: "../lib/controller.php?url=sales_order_credit_release&page=bapi&bapiName=ZBAPI_ORDER_CREDIT_RELEASE&I_VBELN="+ids,
     
      success: function(html) {
		 var df= "Order "+ids+" released from credit block";
		$('#loading').hide();
	 $("body").css("opacity","1"); 
		jAlert('<b>SAP System message:</b><br>'+html, "Message",function(r)
		{
			if(r)
			{
				if(html==df)
				{
					$('#'+id).closest('td').closest('tr').remove();
				//	$('#loading').show();
	// $("body").css("opacity","0.4"); 
	 // $("body").css("filter","alpha(opacity=40)");
					//location.reload();
				}
			}
		});
	  }});
}


function cert_deliv(id)
{
  $('#loading').show();
	 $("body").css("opacity","0.4"); 
	  $("body").css("filter","alpha(opacity=40)");
$.ajax({
      type: "POST",
      url: $('#'+id).attr('alt'),
     
      success: function(html) {

		$('#loading').hide();
	 $("body").css("opacity","1"); 
		jAlert('<b>SAP System message:</b><br>'+html, "Message");
	  }});
}

//.............................................................................
$(document).ready(function(e) {
	$(document).mousemove(function(e){
      $.cookie('mouse-y',e.pageY);
   }); 
    $('.select_item').click(function(){
		
		
		if($(this).hasClass('table_items'))
		{
			$(this).find('.pointers').addClass('pointer');
			$(this).removeClass('table_items');
		$(this).find('input:checkbox').attr('checked', false);
		}
		else
		{
			
			$(this).find('.pointer').addClass('pointers')
			$(this).find('.pointer').removeClass('pointer');
			$(this).addClass('table_items');
			//$(this).addClass('.table_items a');
		$(this).find('input:checkbox').attr('checked', true);
		
		}
		
	})
	
	//........................input fields................
	
	
	
	
});
function testy()
{
	$('.utopia-form-box').show();
	parent.gut1();
		$('.edge').hide();
		$('.edge2').hide();
		parent.formsa2();
		parent.jur();
}

function cancel_pop()
{
	
		$('#sort_pop').hide();
		$('#fil_pop').hide();
		$('.pos_pop').hide();
	
}
var sds=0;
var sdr=0;
function sear(id,val,ses,page)
{
	sds++;
	var sess=ses.split('@');
	var table_name=$('#'+sess[1]).attr('alt');
	$('#filter_result_'+id).html('<img src="../images/ajax-loader1.gif"/>');
$.ajax({
		type:'POST', 
		url: 'append_table.php?id='+id+'&val='+val+'&ses='+ses+'&table_name='+table_name+'&page='+page, 
		success: function(response) {
		sdr++;
		//alert(response);
			$('#'+sess[1]+'_tbody').html(response);
			if($(window).width()<1024)
			  {
		  $('.last_row td').css({display:'none'});
		   $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
			  }
			  if($(window).width()<500)
			  {
				  //alert($('window').width());
				  $('.last_row td').css({display:'none'});
				  $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
		  $('.last_row td:nth-child(7)').css({display:'table-cell',width:'40px',position:'absolute',right:'10px'});
		   
			  }
			
			
			
			if(val!='')
			{
				$('#example_num').html(10);
			$('#example_num').attr('alt','filter_result');
			}
			else
			{
				$('#example_num').html(30);
			$('#example_num').attr('alt','datastore');
			}
			if(sds==sdr)
			{
				sds=0;
				sdr=0;
				$('#filter_result_'+id).html('');	
			}
		}
	  })
}
var valuet=0;
function more_menu()
		{
		valuet=valuet+1;
		if (valuet%2 == 0)
		{
		$('#pos_tab').hide();
		}
	else
	{
		$('#pos_tab').show();
	}
			
		
			var mut="";
			var i=0;
			var len=$('.menu_tab').find('li').length;
			$('.menu_tab').find('li').each(function(index, element) {
				
				
				if($(document).width()<600)
				{
					
					if(i==0)
					{
						$(this).addClass('ls_li');
					}
				}
				else
				{
					if(i==3)
				{
				$(this).addClass('ls_li');
				}
				}
				if($(this).css('display')=='none')
				{
					var ids=$(this).attr('id');
				mut+="<div class='tab_sel' alt='"+ids+"'>"+$(this).text()+"</div>";
				
				}
                
				i++;
	
            });
			$('#pos_tab').html(mut);
			$('.tab_sel').click(function(e) {
			
            var idf=$(this).attr('alt');
			
			$('.ls_li').hide();
			$('#'+idf).addClass('ls_li');
			$('#'+idf).show();
			$('#'+idf).children('a').trigger('click');
			
        });
			
		}
		function color_tip()
{
	$('[tip]').colorTip({color:'red'});
}
function ter(addr)
{
	$('.dirst').remove();
	$('.ser_by').remove();
	$('.appl').parent('div').parent('div').parent('div').parent('div').attr('class','rty');
	$('.rty').append("<div style='border-left:1px solid #ABABAB;border-right:1px solid #ABABAB;background:#fff;width:284px;margin-top:-25px;z-index:1000;position:absolute;' class='dirst'><div style='margin-left:13px;'><div class='tofr'><span class='toh'>To here</span><span class='fromh'>From here</span></div><input type='text' name='daddr' class='ito' alt='saddr'/><span class='go_dir'>GO</span></div></div>");
	 $('.toh').click(function(e) {
        $('.ito').attr('name','daddr');
		$('.ito').attr('alt','saddr');
		$('.ito').val("");
		$(this).css({color:'#0095CC','text-decoration':'underline'});
		$('.fromh').css({color:'#000','text-decoration':'none'});
    });
	 $('.fromh').click(function(e) {
      $('.ito').attr('name','saddr');
	   $('.ito').attr('alt','daddr');
	$('.ito').val("");
	$(this).css({color:'#0095CC','text-decoration':'underline'});
	$('.toh').css({color:'#000','text-decoration':'none'});
    });
	$('.go_dir').click(function(e) {
        var value=$('.ito').val();
		var name=$('.ito').attr('name');
		var own=$('.ito').attr('alt');
		var url=name+'='+value+'&'+own+'='+addr;
		 window.open("https://maps.google.com/maps?"+url, '_blank');
    });
}
function serach_by(addr)
{
	$('.dirst').remove();
	$('.ser_by').remove();
	$('.appl').parent('div').parent('div').parent('div').parent('div').attr('class','rty');
	$('.rty').append("<div style='border-left:1px solid #ABABAB;border-right:1px solid #ABABAB;background:#fff;width:284px;margin-top:-22px;z-index:1000;position:absolute;' class='ser_by'><div style='margin-left:13px'><input type='text' name='saer' class='sert' /><span class='go_sr'>GO</span></div></div>");
	$('.go_sr').click(function(e) {
        var value=$('.sert').val();
		var url='q='+value+'&near='+addr;
		 window.open("http://maps.google.com/maps?"+url, '_blank');
    });
	
}
function nearby()
{
	$('.ner').val('');
	$('.back_b').removeClass('btn-primary');
	$('#n_map_list').addClass('btn-primary');
	$('#ser_ty').val('near_map');
	$.ajax({
      type: "POST",
      url: "../lib/geolocation.php",
     
      success: function(html) {
		//$('#sstate').val(html);
		var first2 = html.substr(0, 2);
		nearbymap(first2)
	  }
	});
	
	
}
function nearby_table() 
{
	$('.ner').val('');
	$('#ser_ty').val('near_list')
	$.ajax({
      type: "POST",
      url: "../lib/geolocation.php",
     
      success: function(html) {
				 
var first2 = html.substr(0, 2);

		$('#scountry').val(first2);
		submit_form('validation')
		
	  }
	});
}
 function wedthery()
	  {
		  var zipc=$('.en_weath').val();
		   $.simpleWeather({
            zipcode: zipc,
            unit: 'f',
            success: function(weather) {
				
				html=  '<h3 class="widget_weth"><img src="../img/icons/paragraph_justify.png" class="p_ic">Weather <span id="wiget_url" onClick="widget_url()">Edit Location</span></h3>';
                html += '<h4 style="color:#000;margin-left:10px;">'+weather.city+', '+weather.region+'</h4>';
                html += '<img style="float:left" width="125px " src="'+weather.image+'">';
                html += '<p style="margin-top:0px;">'+weather.temp+'&deg; '+weather.units.temp+'<br /><span>'+weather.currently+'</span></p>';
                html += '<a href="'+weather.link+'" target="_blank">View Forecast &raquo;</a>';
                
                $("#utopia-dashboard-weather").css({marginBottom:'20px'}).html(html);
				$.ajax({
      type: "POST",
	  data:"page=welcome_url&type=zip_code&url="+zipc,
      url: "../lib/controller.php",
      success: function(html) {
	  }
});
            },
            error: function(error) {
                $("#utopia-dashboard-weather").html('<p>'+error+'</p>');
            }
        });

	  }
function thisrow(id)
{
	//alert('hi');
	//$(id).children('td:last-child').children('div').children('img:first-child').trigger('click');
}
function customize()
{	
	
	$('.widgg').removeClass('dis_wd');
	$('.deld_wid').removeClass('dis_wd');
	$('.deld_wid').show();
	$('.cutz').each(function(index, element) 
	{
		var tag='0'
		$(this).parent().children('label').each(function(index, element) {
			tag='2';
		});
		$(this).parent().children('label').find('span').each(function(index, element) {
			tag='1';
			$(this).remove();
        });
		if($(this).children('span:eq(1)').hasClass('notdraggable'))
		{
		//alert($(this).children('span:eq(1)').html())
			/*var innerhtml=$(this).children('span:eq(1)').html().replace(/:/g,"");
			if(innerhtml!='')
			{			
				var value=$(this).children('span:eq(1)').html();
				var srt=value.replace(/:/g,"");
				var clss=$(this).attr('alt');
				var d_clss=clss.replace(/ /g,"_");
				$(this).children('span:eq(1)').html("<input type='text' value='"+srt+"' class='customize_input "+d_clss+"' >");
				$('.'+d_clss).keyup(function(e) {
					var keys=$(this).val();
					$('.'+d_clss).val(keys);
				});
			}*/
		}
		else
		{
			$(this).children('span').remove();
			var innerhtml=$(this).html().replace(/:/g,"");
			if(innerhtml!='')
			{			
				var value=$(this).html();
				var srt=value.replace(/:/g,"");
				var clss=$(this).attr('alt');
				var d_clss=clss.replace(/ /g,"_");
				$(this).html("<input type='text' value='"+srt+"' class='customize_input "+d_clss+"' alt='"+tag+"'>");
				$('.'+d_clss).keyup(function(e) {
					var keys=$(this).val();
					$('.'+d_clss).val(keys);
				});
			}
		}
		
    });
	$('.edit_customize').hide();
	$('.save_customize').show();
	//$('.control-label1').css({'background-color':'green'});
}
function save_customize()
{
         		$('.widgg').addClass('dis_wd');
	$('.deld_wid').addClass('dis_wd');
			var datastr='';
	var spl=0;
	$('.customize_input').each(function(index, element) {
		var title=$(this).parent(this).attr('alt');
		datastr +=title +"="+ $(this).val()+",";
		var iChars = "!`@#$%^&*()+=[]\\\';,/{}|\":<>?~";   
              var data=$(this).val();
                for (var i = 0; i < data.length; i++)
                {      
				
                    if (iChars.indexOf(data.charAt(i)) != -1)
                    {    
					
                   jAlert("Your string has special characters. \nThese are not allowed.","Message");
                    
                    spl=1;
                    } 
                }
				
	});
	if(spl==1)
	{
		return false; 
	}
	 
	dataString="url="+page_url+"&lables="+datastr;
	$.ajax({
      type: "POST",
	  data:dataString,
      url: "../lib/save_customize.php",
     
      success: function(html) {
		
		  $('.customize_input').each(function(index, element) {
			  var tag=$(this).attr('alt');
			 
		var sdt=$(this).val();
		if(tag==1)
		{
		$(this).parent(this).html(sdt+"<span> * </span>:");
		}
		if(tag==2)
		{
		$(this).parent(this).html(sdt+":");
		}
		if(tag==0)
		{
		$(this).parent(this).html(sdt);
		}
	});
		$('.edit_customize').show();
	$('.save_customize').hide();
	  }
	});
}

function edit_tiwt() {

    $('#edit_tiwt').replaceWith('<input type="text"  id="tiwt_wel" placeholder="Enter Name">');
	$('#tiwt_wel').focus();
	$('.my_sms,.my_wel,.my_wid, .utopia-widget-content').click(function()
	{
		$('#tiwt_wel').replaceWith('<span id="edit_tiwt" onClick="edit_tiwt()"></span>');
	})
	$('#tiwt_wel').focusout(function()
	{
		$(this).replaceWith('<span id="edit_tiwt" onClick="edit_tiwt()"></span>');
	});
		$('#tiwt_wel').keydown(function(e) {
			if(e.keyCode=='27')
		{
			$(this).replaceWith('<span id="edit_tiwt" onClick="edit_tiwt()"></span>');
		}
        if(e.keyCode=='13')
		{
			$('#tweets').html('');
		$('#tweets').tweetable({
				username: $(this).val(),
				time: true,
				rotate: true,
				speed: 4000,
				limit: 5,
				replies: false,
			
				failed: "Sorry, twitter is currently unavailable for this user.",
				html5: true,
				onComplete:function($ul){
					$('time').timeago();
				}
			});
				
		   $(this).replaceWith('<span id="edit_tiwt" onClick="edit_tiwt()"></span>');
		   $.ajax({
      type: "POST",
	  data:"page=welcome_url&type=tiwt&url="+$(this).val(),
      url: "../lib/controller.php",
      success: function(html) {
	  }
		   });
			
			

		}
    });
	}


function edit_url() {

    $('#edit_url').replaceWith('<input type="url"  id="url_wel" placeholder="Enter URL">');
	$('#url_wel').focus();
	$('.my_sms,.my_twt,.my_wid').click(function()
	{
		$('#url_wel').replaceWith('<span id="edit_url" onClick="edit_url()"></span>');
	})
	$('#url_wel').focusout(function()
	{
	$(this).replaceWith('<span id="edit_url" onClick="edit_url()"></span>');
	});
		$('#url_wel').keydown(function(e) {
			if(e.keyCode=='27')
		{
			$(this).replaceWith('<span id="edit_url" onClick="edit_url()"></span>');
		}
	        if(e.keyCode=='13')
		{
			var str=$(this).val();
             var n=str.search("http");
						 if(n>-1)
			 {
				 var urls=str;
			 }
			 else
			 {
				 var urls="http://"+str;
			 }
			
			var url=urls.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
			if(url)
			{
						
           $('#welcome_if').attr('src',urls);
		   $(this).replaceWith('<span id="edit_url" onClick="edit_url()"></span>');
		   $.ajax({
      type: "POST",
	  data:"page=welcome_url&type=welcome&url="+urls,
      url: "../lib/controller.php",
      success: function(html) {
	  }
		   });
			}
			else
			{
				jAlert("Please Enter valid URL","Meassage",function(r){
					if(r)
					{
						edit_url()
					}
				});
				return false;
			}

		}
    });
	}
	function widget_url()
	{
		
		$('#wiget_url').before('<div class="feed_url"><input type="text"  placeholder="Enter zip code" class="en_weath"/></div>');
		$('.en_weath').focus();
		$('#delete_weather').mouseleave(function(e) {
        $('.feed_url').remove();
    });
		$('.en_weath').keydown(function(e) {
        if(e.keyCode=='13')
		{
			if($('.en_weath').val()!='')
		{
			wedthery();
		}
		}	
        });
	}
	function feed_url()
{
	$('#feed_url').before('<div class="feed_url"><input type="text" placeholder="Enter RSS Feed URL" class="feed_in"/></div>');
	$('.feed_in').focus();
	$('.news').mouseleave(function(e) {
        $('.feed_url').remove();
    });
	$('.feed_in').keydown(function(e) {
        if(e.keyCode=='13')
		{
			
			var url=$(this).val().match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
			if(url)
			{
				$.ajax({
      type: "POST",
	  data:"page=welcome_url&type=feed&url="+$(this).val(),
      url: "../lib/controller.php",
      success: function(html) {
		  
		  $('.circle').html(html);
	  }
	});
				
			}
			else
			{
				jAlert("Please Enter valid URL","Meassage");
				return false;
			}
			
			
		}
    });
	
}
function numdef(num,id)
		{
		
		if(num!="")
			{
				if($.isNumeric(num))
				{
			var str = num;
    while (str.length < 10) {
        str = '0' + str;
    }
	document.getElementById(id).value=str;
				}
	
			}
		}
		function  remove_class()
{
	$('.widgg').addClass('dis_wd');
	$('.deld_wid').addClass('dis_wd');
	
	$('.customize_input').each(function(index, element) {
		$(this).remove();
	});
}
function search_result()
{
	var rows=$('#example_nums').html();
	
	$('#example_nums').html(Number(rows)+10);
	$.ajax({
      type: "POST",
	  data:"rows="+rows,
      url: "../html/search_result.php",
      success: function(html) {
		  var rep=html.split('@$@');
		 // alert(rep[1]);
		  $('.testr').hide();
		  if(rep[1]!='NO_ROWS')
		  {
			  
		  $('.last_row:last-child').after(rep[0]);
		 if($(window).width()<1024)
			  {
				  $('.testr').show();
		  $('.last_row td').css({display:'none'});
		   $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
			  }
			  if($(window).width()<500)
			  {
				  $('.testr').show();
				  //alert($('window').width());
				  $('.last_row td').css({display:'none'});
				  $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
		 
		    $('.last_row td:nth-child(7)').css({display:'table-cell',width:'40px',position:'absolute',right:'10px'});
			  }
		  }
	  }
	});
}
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
		
function order_lines(ids)
{
	
	var num=1;
	var title='';
	
	$('#'+ids).children('thead').children('tr').children('th').each(function(index, element) {
		
		if($(this).css('display')=='table-cell')
	{
		var ind=$(this).index()+1;
	}
	if(num==ind)
	{
       title+='<li onClick="order_line_select(\''+ids+'\',\''+num+'\')" class="'+ids+'_'+num+' ord_tit table_select">'+$(this).text()+'</li>';
	}
	else
	{
		title+='<li onClick="order_line_select(\''+ids+'\',\''+num+'\')" class="'+ids+'_'+num+' ord_tit">'+$(this).text()+'</li>';
	}
	   
		num++;
    });
	$('#'+ids).children('thead').children('tr').before('<div class="order_header_titles"><ul>'+title+'</ul></div>')
}
function order_line_select(ids,row)
{
	$('.ord_tit').removeClass('table_select');
	$('.'+ids+'_'+row).addClass('table_select');
	$('#'+ids+' th, #'+ids+' td').css({display:'none'});
	
		$('#'+ids+' th:nth-child('+row+'), #'+ids+' td:nth-child('+row+')').css({display:'table-cell'});
		$('.order_header_titles').remove();
	//alert(row);
}