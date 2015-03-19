<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Pestokill</title>
<link href="css/myStyles.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css" />

<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?v=3.1&sensor=false&region=PH"></script>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<style>
	.modal {
		display: none;
	}
	#sales {
		display: none;
	}
	#pw td {
		font-size: 10px;
		font-family: arial;
	}
	#pw thead td {
		font-weight: bold;
	}
	
	#pw button {
		float: right;
		padding: 3px;
		font-size: 9px;
	}
	.full td {
		display: none;
	}
</style>
</head>
<?
include ('code.php');
session_start();
$log_id = $_SESSION['log_id'];
mysql_connect("localhost", "web121-pestokill", "llikotsep");
mysql_select_db("web121-pestokill");
$sql = mysql_query("SELECT * FROM `cusers` WHERE `id`='$log_id'");
$row = mysql_fetch_assoc($sql);
$cpdUser = $row['cpdUser'];
$diaryUser = $row['diaryUser'];
$diaryPass = $row['diaryPass'];
$diaryAdmin = $row['diaryAdmin'];
$callLog = $row['logCalls'];
$adminZone = $row['adminZone'];
$pInv = $row['pInv'];
$logCall = $row['logCall'];
$checkAudits = $row['checkAudit'];
$onlineAudit = $row['onlineAudit'];
$tWorkL = $row['tWorkL'];
$tWorkP = $row['tWorkP'];
$dept = $row['dept'];
?>
<body>
<div id="mainContainer">

<? if($callLog == 1){ ?>
<div id="outerBox">
<a href = "http://www.pestokill.co.uk/callout/sites/dataEase/preScreen.php?uID=<?php echo $log_id; ?>" target = "_blank">
<div id="innerBox">Log/Edit a Call</div>
</a>
</div>
<? } ?>

<? if($dept == "off"){ ?>
<div id="outerBox">
<a href="http://www.pestokill.co.uk/bgrmo/checkLogin.php?userName=admin&passWord=pest01" target="_blank">
<div id="innerBox">BGRMO Calls</div>
</a>
</div>
<? } ?>

<? if($checkAudits == 1){ ?>
<div id="outerBox">
<a href="latestAudits.php" target="_blank">
<div id="innerBox">Audit Check</div>
</a>
</div>
<? } ?>

<? if($onlineAudit == 1){ ?>
<div id="outerBox">
<a href="http://www.pestokill.co.uk/callout/sites/onlineAudit" target="_blank">
<div id="innerBox">Online Audit</div>
</a>
</div>
<? } ?>

<? if($tWorkL != ""){ ?>
<div id="outerBox">
<a href="http://www.pestokill.co.uk/techwork/index.php?userName=<? echo $tWorkL ?>&password=<? echo $tWorkP ?>" target="_blank">
<div id="innerBox">Tech Work</div>
</a>
</div>
<? } ?>

<? if($adminZone == 1){ ?>
<div id="outerBox">
<a href="http://www.pestokill.co.uk/adminzone/mainPage.php" target="_blank">
<div id="innerBox">Admin Zone</div>
</a>
</div>
<? } ?>

<? if($diaryUser != ""){ ?>
<div id="outerBox">
<? if($diaryAdmin == 0){ ?>
<a href="http://www.pestokill.co.uk/bdt/autologin.php?login=<? echo $diaryUser ?>&password=<? echo $diaryPass ?>" target="_blank">
<?
}
?>
<? if($diaryAdmin == 1){ ?>
<a href="http://www.pestokill.co.uk/bdt/autologin.php?login=<? echo $diaryUser ?>&password=<? echo $diaryPass ?>" target="_blank">
<?
}
?>
<div id="innerBox">Diary</div>
</a>
</div>
<? } ?>


<? if($cpdUser != ""){ ?>
<div id="outerBox">
<a href="http://www.pestokill.co.uk/cpd/autologin.php?login=<? echo $row['cpdUser']?>&password=<? echo $row['cpdPassword'] ?>" target="_blank">
<div id="innerBox">The HUB</div>
</a>
</div>
<? } ?>

<? if($pInv == 1){ ?>
<div id="outerBox">
<a href="http://www.pestokill.co.uk/callout/sites/invoicing" target="_blank">
<div id="innerBox">Invoicing</div>
</a>
</div>
<? } ?>

<? if($logCall != ""){ ?>
<div id="outerBox">
<a href="http://www.pestokill.co.uk/bdt/autologin.php?login=leads.only&password=leads&forward=<?php echo base64_encode("leads?mode=addCrudItem"); ?>" target="_blank">
<div id="innerBox">Log Lead</div>
</a>
</div>
<? } ?>

<div id="outerBox">
<a href="http://www.pestokill.co.uk/coshh.htm" target="_blank">
<div id="innerBox">COSHH</div>
</a>
</div>

<!--<div id="outerBox">
<div id="innerBox">Certificates</div>
</div>-->

<div id="outerBox"><a href="../../logout.php"><div id="innerBox">Logout</div></a></div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
	<div class="modal" id="postcodedialog">
		<form id="mapform" action="../../../cpd/portlet-oncallmap.php" method="POST" target="mapview" onSubmit="window.open('', 'mapview', 'width=950,height=600,status=no,resizable=yes,menubar=no,location=no,scrollbars=no')">
			<label>Location / Post code</label><br>
			<input type="text" id="postcode" name="postcode" /><br><br>
			<label>Post code</label><br>
			<SELECT id="mode" name="mode">
				<OPTION value="C">On Call</OPTION>
				<OPTION value="L">Live Techicians</OPTION>
			</SELECT>
			<input type="hidden" id="post_lat" name="post_lat" />
			<input type="hidden" id="post_lng" name="post_lng" />
		
			<script>
				var geocoder = new google.maps.Geocoder();
				
				function getJobLatLng(address)  {
				    geocoder.geocode(
				    		{ 
				    			'address' : address 
				    		}, 
				    		function( results, status ) {
						        if (status == google.maps.GeocoderStatus.OK ) {
									var locationlat = results[0].geometry.location.lat();
									var locationlng = results[0].geometry.location.lng();
									
									if (locationlat != "") {
										$("#mapform #post_lat").val(locationlat);
										$("#mapform #post_lng").val(locationlng);
										$("#mapform").submit();
									}
									
						        } else {
						        	alert("Google map error status:" + status);
						        }
						    }
						);        
				}
			</script>
		</form>
	</div>
	<div id="pw" style=" display: block; position: relative;">
		<table width='800px'>
			<tr>
				<td width='500px'>* News <button id="nearest">Nearest Technician</button><button id="oncall">On Call</button><button id="training">Training</button><button id="sales">Sale of the week</button><button id="companynews">Company</button><button id="technicians">Who Works Here</button><button id="technology">Technology</button></td>
				<td width='300px'>* Staff <button id="whererwehub">Hub Today</button><button id="whererwe">Diary Today</button><button id="loggedin">Logged In</button><button id="timeshown">Absent Tomorrow</button></td>
			</tr>
			<tr>
				<td>
					<div style="border:2px solid blue; height: 150px; overflow: auto" id="leftportlet">
						
					</div>
				</td>
				<td>
					<div style="border:2px solid blue; height: 150px; overflow: auto" id="absent">
					</div>
				</td>
			</tr>
		</table>
		<script>
		var m_mode = "TODAY";
		var w_mode = "TOMORROW";
		var wh_mode = "TOMORROW";
		
		function showPortlet(mode) {
			if (mode == "NEWS") {
				callAjax(
						"../../../cpd/portlet-companynews.php?timestamp=" + new Date(), 
						function(data) {
							var rdata = data;
							
							rdata = rdata.replace(/src\=\"uploads/g,"src=\"../../../cpd/uploads");
							rdata = rdata.replace(/href\=\"\.\.\//g,"href=\"http://www.pestokill.co.uk/");
							
							$("#leftportlet").html(rdata);
						}
					);
					
			} else if (mode == "TECH") {
				callAjax(
						"../../../cpd/portlet-technology.php?timestamp=" + new Date(), 
						function(data) {
							var rdata = data;
							
							rdata = rdata.replace(/src\=\"uploads/g,"src=\"../../../cpd/uploads");
							rdata = rdata.replace(/href\=\"\.\.\//g,"href=\"http://www.pestokill.co.uk/");
							
							$("#leftportlet").html(rdata);
						}
					);
					
			} else if (mode == "TRAINING") {
				callAjax(
						"../../../cpd/portlet-training.php?timestamp=" + new Date(), 
						function(data) {
							$("#leftportlet").html(data);
						}
					);
					
			} else if (mode == "ONCALL") {
				callAjax(
						"../../../cpd/portlet-oncall.php?timestamp=" + new Date(), 
						function(data) {
							$("#leftportlet").html(data);
						}
					);
				
			} else if (mode == "TECHNICIANS") {
				$("#leftportlet").html($("#whoworkshere").html());
				
			} else if (mode == "WHERERWE") {
				callAjax(
						"../../../bdt/dailyactivity/portlet-whererwe.php?mode=" + w_mode + "&timestamp=" + new Date().getTime(), 
						function(data) {
							$("#absent").html(data);
						}
					);
				
			} else if (mode == "WHERERWEHUB") {
				callAjax(
						"../../../cpd/portlet-whererwe.php?mode=" + wh_mode + "&timestamp=" + new Date().getTime(), 
						function(data) {
							$("#absent").html(data);
						}
					);
					
			} else if (mode == "SALES") {
				$("#leftportlet").html("<h1>Coming Soon</h1>");
			}
		}
		
		function showAbsence() {
			callAjax(
					"../../../cpd/portlet-absent.php?mode=" + m_mode + "&timestamp=" + new Date(), 
					function(data) {
						$("#absent").html(data);
					}
				);
		}
		
		function showLoggedIn() {
			callAjax(
					"portlet-loggedin.php?timestamp=" + new Date(), 
					function(data) {
						$("#absent").html(data);
					}
				);
		}
		
		$(document).ready(
				function() {
					showPortlet("NEWS");
					showAbsence();
					
					$("#postcodedialog").dialog({
							modal: true,
							autoOpen: false,
							title: "Enter location",
							buttons: {
								Ok: function() {
									$(this).dialog("close");
									getJobLatLng($("#mapform #postcode").val());
								},
								Cancel: function() {
									$(this).dialog("close");
								}
							}
						});
					
					$("#companynews").click(
							function() {
								showPortlet("NEWS");
							}
						);
					
					
					$("#sales").click(
							function() {
								showPortlet("SALES");
							}
						);
						
					$("#nearest").click(
							function() {
								$("#postcodedialog").dialog("open");
							}
						);
					
					$("#oncall").click(
							function() {
								showPortlet("ONCALL");
							}
						);
					
					$("#training").click(
							function() {
								showPortlet("TRAINING");
							}
						);
					
					
					$("#technicians").click(
							function() {
								showPortlet("TECHNICIANS");
							}
						);
					
					$("#technology").click(
							function() {
								showPortlet("TECH");
							}
						);
					
					$("#whererwe").click(
							function() {
								if (w_mode == "TODAY") {
									w_mode = "TOMORROW";
									$("#whererwe").text("Diary Today");
									
								} else {
									w_mode = "TODAY";
									$("#whererwe").text("Diary Tomorrow");
								}
								
								showPortlet("WHERERWE");
							}
						);
					
					$("#whererwehub").click(
							function() {
								if (wh_mode == "TODAY") {
									wh_mode = "TOMORROW";
									$("#whererwehub").text("Hub Today");
									
								} else {
									wh_mode = "TODAY";
									$("#whererwehub").text("Hub Tomorrow");
								}
								
								showPortlet("WHERERWEHUB");
							}
						);
			
					$("#timeshown").click(
							function() {
								if (m_mode == "TODAY") {
									m_mode = "TOMORROW";
									$("#timeshown").text("Absent Today");
									
								} else {
									m_mode = "TODAY";
									$("#timeshown").text("Absent Tomorrow");
								}
								
								showAbsence();
							}
						);
			
					$("#loggedin").click(
							function() {
								showLoggedIn();
							}
						);
				}
			);
			
			function showFull(node) {
				$(".full td").hide();
				
				$(node).parent().next().find("td").each(
						function() {
							if ($(this).css("display") == "none") {
								$(this).show();
								
							} else {
								$(this).hide();
							}
						}
					);
			}
		</script>
	</div>
</div>
</div>
</div>
<div style="float:left; width:49%; padding:5px; border: 1px solid grey;">
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 20,
	  interval: 6000,
	  width: 'auto',
	  height: 125,
	  theme: {
	    shell: {
	      background: 'transparent',
	      color: '#000000'
	    },
	    tweets: {
	      background: 'transparent',
	      color: '#000000',
	      links: 'black'
	    }
	  },
	  features: {
	    scrollbar: true,
	    loop: false,
	    live: true,
	    hashtags: false,
	    timestamp: false,
	    avatars: false,
	    behavior: 'all'
	  }
	}).render().setUser('Pestokill_PC').start();
	</script>
</div>
<div id="whoworkshere" style="display:none">
	<table>
		<tr>
			<td>
				Post Code Prefix
			</td>
			<td>
				<input type="text" required="true" id="worklocation" name="worklocation" size=4 maxlength=4 value="" />
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<a class="link1" href="javascript: whoworkshere();"><em><b>Run Report</b></em></a>
			</td>
		</tr>
	</table>
</div>
<script>
	function whoworkshere() {
		callAjax(
				"../../../bdt/whoworkshere/portlet-whoworkshere.php?postcode=" + $("#worklocation").val() + "&timestamp=" + new Date().getTime(), 
				function(data) {
					$("#leftportlet").html(data);
				}
			);
	}
</script>
<div style="float:left; width:49%; padding:5px; border: 1px solid grey;">
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 20,
	  interval: 6000,
	  width: 'auto',
	  height: 125,
	  theme: {
	    shell: {
	      background: 'transparent',
	      color: '#000000'
	    },
	    tweets: {
	      background: 'transparent',
	      color: '#000000',
	      links: 'black'
	    }
	  },
	  features: {
	    scrollbar: true,
	    loop: false,
	    live: true,
	    hashtags: false,
	    timestamp: false,
	    avatars: false,
	    behavior: 'all'
	  }
	}).render().setUser('bedbugheat').start();
	</script>
</div>
</body>
</html>
