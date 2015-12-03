<?php

session_start ();
if (!isset($_SESSION['TOKEN'])) {
  header('Location: ../index.php');
  exit();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Madix :: Orderlist</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=0">

    <link class="theme-css" href="../css/utopia-white.css" rel="stylesheet">
    <link href="../css/utopia-responsive.css" rel="stylesheet">

    <link href="../css/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="../css/weather.css" rel="stylesheet" type="text/css" />
    <link href="../css/gallery/modal.css" rel="stylesheet">
    <link href="../css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <link href="../css/chosen.css" media="screen" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../css/website.css" type="text/css" media="screen" />
    <link href="../css/alerts.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/colortip-1.0-jquery.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" href="../css/jquery.contextmenu.css">
    <link rel="stylesheet" href="../css/datepicker.css">

    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/table_header.css" rel="stylesheet" />
    <link href="../css/TableTools.css" rel="stylesheet" />
    <link href="../css/demo_table.css" rel="stylesheet" />
    <link href="../css/jquery.feedBackBox.css" rel="stylesheet" type="text/css">
    <link href="../css/twit_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/dragtable-default.css" type="text/css" />

    <link rel="stylesheet" href="../css/styles_query.css" type="text/css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" type="text/css" />

    <!--[if IE 9]>
      <link rel="stylesheet" type="text/css" href="../css/ie.css" />
    <![endif]-->

    <!--[if IE 8]>
      <link href="css/ie8.css" rel="stylesheet">
    <![endif]-->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/colortip-1.0-jquery.js"></script>

    <script src="../js/jquery.contextmenu.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/FixedHeader.js"></script>

    <script src="../js/jquery.feedBackBox.js"></script>

    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/table.dragtable.js"></script>

    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

    <script>
      if ($.cookie("css")) {
        $('link[href*="utopia-white.css"]').attr("href", $.cookie("css"))
        $('link[href*="utopia-dark.css"]').attr("href", $.cookie("css"))
      }
      $(document).ready(function() {
        $(".theme-changer a").live('click', function() {
          $('link[href*="utopia-white.css"]').attr("href", $(this).attr('rel'))
          $('link[href*="utopia-dark.css"]').attr("href", $(this).attr('rel'))
          $.cookie("css",$(this).attr('rel'), {expires: 365, path: '/'})
          $('.user-info').removeClass('user-active')
          $('.user-dropbox').hide()
        })
      })
    </script>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="row-fluid">
      <div class='span12' id='header'>
        <div class='span2'>
          <a href='http://www.madixinc.com/'><img src="../images/madix-logo300.png"></a>
        </div>
        <div class='span5 your_title' style='margin-top: 45px;'>
          <h2 id='he1'>| Your Past Items</h2>

          <?php
            $data = file_get_contents ('../data/stockreport.json');
            $json = json_decode($data, true);
            $cust_id = $_SESSION['KUNNR'];
          ?>

          <?php if (isset($json[$cust_id])) { ?>
            <div style="position: absolute; margin: -37px; margin-left: 180px; padding-top: 10px;">
              <a href="../lib/stockreport.php?id=<?php echo $cust_id;?>" target="_blank"><img src='../images/excel.png' />&nbsp;<span>Stock Report</span></a>
            </div>
          <?php } ?>

        </div>
        <a href='../lib/logout.php' style='right: 30px; position: absolute; top: 60px;'>Logout</a>
      </div>
    </div>

    <div class="container-fluid">

      <div class="search_fields_th">
        <div class='search_fields' onClick='order_lines("line_order")'></div>
      </div>

      <form name="searchForm" method="post" id='myMadixSearch'>
        <div class="wrapper">
	        <table class='order_details_align form_order_details'
	          cellpadding='5px' cellspacing='5px'>
	          <tr>
	            <td valign='top'>
	              <table class='order_details'>
	                <tr'>
	                  <td valign='center' align='right' class="order-titles">Store Number</td>
	                  <td class='Order order-detail' valign='center' align='left'>
	                    <input id='query_store' name='store' type="text"/>
	                  </td>
	                  <td valign='center' align='right' class="order-titles">City</td>
	                  <td class='Order order-detail' valign='center' align='left'>
	                    <input id='query_city' name='city' type="text"/>
	                  </td>
	                </tr>
	
	                <tr>
	                  <td valign='center' align='right' class="order-titles">ZIP</td>
	                  <td class='Order order-detail' valign='center' align='left'>
	                    <input id='query_zip' name='zip' type="text"/>
	                  </td>
	                  <td valign='center' align='right' class="order-titles">State</td>
	                  <td class='Order order-detail' valign='center' align='left'>
	                    <input id='query_state' name='state' type="text"/>
	                  </td>
	                </tr>
	
	                <tr>
	                  <td valign='center' align='right' class="order-titles">Months</td>
	                  <td class='Order order-detail' valign='center' align='left'>
	                    <select id='query_date' name='date'>
	                      <option value="1">1 month</option>
	                      <option value="2">2 months</option>
	                      <option value="4">4 months</option>
	                      <option value="6">6 months</option>
	                      <option value="12">1 year</option>
	                    </select>
	                  </td>

	                  <td valign='center' align='right' class="order-titles">Part Number</td>
	                  <td class='Order order-detail' valign='center' align='left'>
	                    <input id='query_part' name='part' type="text"/>
	                  </td>
	                </tr>
	              </table>
	            </td>
	          </tr>
	        </table>
	
	        <div class="search_button">
	          <button id='btn_search' class='btn' style='width: 90px;'>Search</button>
	        </div>
        </div>
      </form>

    </div>

    <div class="response">
      <div id="results" class="hidden">
        <table id="table_id" class="display compact">
          <thead>
            <tr>
              <th>Part Number</th>
              <th>Part Description</th>
              <th>Finish Code</th>
              <th>Qty</th>
              <th>Ship Date</th>
              <th>Ship To Name</th>
              <th>City</th>
              <th>State</th>
              <th>ZIP</th>
            </tr>
          </thead>
          <tbody>
            <!--tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td>8</td>
              <td>9</td>
            </tr-->
          </tbody>
        </table>
      </div>

      <div id="empty" class="hidden">
        <h3>No records found</h3>
        <img src='../images/search-icons.png' />
      </div>

      <div id="error" class="hidden">
        <h3>Error, try again later</h3>
        <img src='../images/search-icons.png' />
      </div>
    </div>

    <script>
      $(function() {
        var search  = $("#btn_search"),
            form    = $("#myMadixSearch"),
            results = $("#results"),
            empty   = $("#empty"),
            error   = $("#error")

        var table = results.find("table").DataTable({
          paging: false,
          info: false
        });

        search.click(function(e) {
          e.preventDefault()

          search.html("Search <img src='../images/ajax-loader1.gif' />");

          $.ajax({
            url: "../lib/query.php",
            type: "POST",
            dataType: "json",
            data: form.serialize(),
            success: function(response) {
              if (response.success) {
                if (response.data.length > 0) {
                  // Show results

                  table.clear().draw()
                  $.each(response.data, function(i, values) {
                    /*
                      Data example:
                      {
                        "KUNNR":"0000679066",
                        "KUNAG":"0000001038",
                        "NAME1":"HEB TEXAS CITY 662",
                        "MATNR":"SUS-1214",
                        "ARKTX":"STD UPPER SHELF",
                        "FIN":"SA-M29PPR-SA-SP",
                        "ORT01":"TEXAS CITY",
                        "REGIO":"TX",
                        "PSTLZ":"77590",
                        "LFIMG":"3.000",
                        "LFDAT":"20150722"
                      }
                    */
                    table.row.add([
                      values.MATNR,
                      values.ARKTX,
                      values.FIN,
                      values.LFIMG,
                      values.LFDAT,
                      values.NAME1,
                      values.ORT01,
                      values.REGIO,
                      values.PSTLZ
                    ]).draw(false)
                  })

                  results.removeClass("hidden")
                  empty.addClass("hidden")
                  error.addClass("hidden")
                } else {
                  results.addClass("hidden")
                  empty.removeClass("hidden")
                  error.addClass("hidden")
                }
              } else {
                results.addClass("hidden")
                empty.addClass("hidden")
                error.removeClass("hidden")
              }
            },
            complete: function(response) {
              search.html('Search');
            }
          })
        })
      })
    </script>

  </body>
</html>