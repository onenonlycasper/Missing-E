<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
<!--

 Turnabout is fair play, sir.

-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="tumblr,missinge,missing,e,feature,features,blog,blogging" />
<meta name="description" content="Missing e - The unofficial browser extension for Tumblr!"/>
<meta name="author" content="Jeremy Cutler" />
<meta name="robots" content="FOLLOW,INDEX" />
<title>Submit Bug Report - Missing e - The browser extension for Tumblr!</title>
<link href="http://fonts.googleapis.com/css?family=Bitter:400,700,400italic" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/favicon.png" type="image/x-icon" />
<link rel="icon" href="/favicon.png" type="image/x-icon" />
<script type="text/javascript" src="browser.js"></script>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="reset.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
<?php

$submission = isset($_REQUEST['bugsubmission']);

if ($submission) {

?>
<script type="text/javascript">
<!--

var updateCheck;
var extResponded;

function currentTimestamp() {
   var now = new Date();
   var tz = 0.0 - now.getTimezoneOffset();
   tz = tz / 60;
   var month = (now.getMonth()+1);
   if (month < 10) {
      month = "0" + month;
   }
   var date = now.getDate();
   if (date < 10) {
      date = "0" + date;
   }
   return now.getFullYear() + "-" + month + "-" + date + " " +
      now.toTimeString();
}

function validateEmail(email) { 
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   return re.test(email);
}

function receiveInfo(msg) {
   var earliestVer = [2,9,0];
   var supported = false;
   if (msg.data.response === "extensionInfo") {
      if (msg.data.info && msg.data.info.version) {
         $('#missingeversion').val(msg.data.info.version);
         $('#missingeversion_text').text(msg.data.info.version);
      }
   }
}

function checkUpdate(count) {
   if (!count) { count = 1; }

   if (window.extResponded) {
      return;
   }
   else if (count > 20) {
      return;
   }
   else {
      count++;
      window.postMessage({"MissingE":true, "src":"site",
                          "request":"extensionInfo"},
                         "http://test.missing-e.com");
      updateCheck = setTimeout(function(){ checkUpdate(count); }, 500);
   }
}

jQuery(document).ready(function($) {
   window.extResponded = false;
   window.addEventListener("message", function(e) {
      if (e.data && e.data.MissingE && e.data.src === "extension") {
         if (!window.extResponded) {
            window.extResponded = true;
            receiveInfo(e);
         }
      }
   }, false);
   window.postMessage({"MissingE":true, "src":"site",
                       "request":"extensionInfo"},
                      "http://test.missing-e.com");

   updateCheck = setTimeout(checkUpdate, 500);

   $('#browser').val(BrowserDetect.browser);
   $('#browser_text').text(BrowserDetect.browser);

   $('#browserversion').val(BrowserDetect.version);
   $('#browserversion_text').text(BrowserDetect.version);
   
   $('#bugform').submit(function() {
      var errors = [];
      var form = $(this);
      var report;
      if (!validateEmail(form.find('#thec').val())) {
         errors.push("! Please enter a valid email address");
      }
      report = form.find('#report').val();
      report = report.replace(/^\s+/,'').replace(/\s+$/,'');
      if (report.length < 32) {
         errors.push("! Include a detailed description of the problem");
      }
      if (errors.length > 0) {
         alert(errors.join("\n"));
         return false;
      }
      $('#timestamp').val(currentTimestamp());
      console.log($('#timestamp').val());
      return false;
   });
});

-->
</script>
<?php

} //submission

?>
</head>
<body id="submitbug">
<div id="header_container">
 <div id="header">
  <div id="header_bar">
   <a id="home_link" href="/"></a>
   <div id="header_links">
    <a href="features">Features</a>
    <a href="faq">FAQ</a>
    <span class="selected">Troubleshoot</span>
    <a href="https://www.paypal.com/ca/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=EGQCRBB2BH5U8">Donate</a>
   </div>
  </div>
 </div>
</div>
<div id="banner_container">
 <div id="banner">
  <div id="banner_box">
   <h1>Report a bug.</h1>
   <h2>Because spraying the code with bug repellent doesn't work!</h2>
  </div>
  <img id="banner_img" style="width:199px;height:181px;margin-top:-25px;margin-right:20px" src="images/bugspray.png" alt="Submit a Bug Report" />
 </div>
</div>
<div id="ads">
 <div id="ads_title">Sponsored<br />Links</div>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-3604999147338055";
/* New Site */
google_ad_slot = "9843551983";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</div>
<div class="content_container">
 <div class="content">
<?php

if ($submission) {

?>
  <div class="troubleshoot_box">
   <h1>Done!</h1>
   <p>Thanks for submitting a bug report.</p>
   <a href="/" class="button greenbutton">Home</a>
  </div>
<?php

}
else {

?>
  <form id="bugform" action="submitbug" method="post">
   <input type="hidden" id="bugsubmission" name="bugsubmission" value="1" />
   <input type="hidden" id="timestamp" name="timestamp" value="" />
   <input type="hidden" id="reason" name="reason" value="" />
   <input type="hidden" id="browser" name="browser" value="" />
   <input type="hidden" id="browserversion" name="browserversion" value="" />
   <input type="hidden" id="missingeversion" name="missingeversion" value="" />
   <div class="troubleshoot_box">
    <h1>Submit Bug Report</h1>
    <div class="troubleshoot_item">
     <div class="step_icon unnumberedstep"></div>
     <h2>Your Computer</h2>
     <p><strong>Browser:</strong> <span id="browser_text"></span></p>
     <p><strong>Browser Version:</strong> <span id="browserversion_text"></span></p>
     <p><strong>Missing e Version:</strong> <span id="missingeversion_text"></span></p>
    </div>
    <div class="troubleshoot_item">
     <div class="step_icon unnumberedstep"></div>
     <h2>The Problem You Are Having</h2>
     <p><strong>Problem Type:</strong> <?=$_REQUEST['reason'];?></p>
     <p style="margin-top:6px;">Please describe the problem:</p>
     <textarea id="report" name="report" placeholder="What, exactly, is the problem? What were you doing when the problem came up? What steps are necessary to reproduce the problem?"></textarea>
    </div>
    <div class="troubleshoot_item">
     <div class="step_icon unnumberedstep"></div>
     <h2>Contact Email</h2>
     <div><input type="text" name="thec" id="thec" style="width:200px" /></div>
     <p style="font-size:12px;">Required. Your email address will not be used except for communicating with you for bug investigation.</p>
    </div>
    <div id="formbuttons"><button type="submit" title="Send" class="button greenbutton"><span>Send</span></button><a href="troubleshoot" title="Cancel" class="button greybutton">Cancel</a></div>
   </div>
  </form>
<?php

}

?>
 </div>
</div>
<div id="footer_container">
 <div id="footer">
 &copy; 2012 Jeremy Cutler<br />
 <small>An open-source project released under <a class="link" href="http://www.gnu.org/licenses/gpl.html" title="GPL v3 License">GPL v3</a></small>
 <a class="greybutton button" style="float:right;" href="http://blog.missing-e.com" title="Missing e on Tumblr">Follow Missing e on Tumblr</a>
 </div>
</div>
</body>
</html>