 <?php
        echo "
        <script type=\"text/javascript\">
         ///////////////////////////////////////////////
         // CONFIG 
         ///////////////////////////////////////////////
         var categories = {
             "Websites": {
                 "sensors": ["777688716"],
                 "status": "2"
             },
             "Plex": {
                 "sensors": ["777693990", "777893558"],
                 "status": "2"
             },
             "Services": {
                 "sensors": ["777864590", "777864593", "777864591", "777899388"],
                 "status": "2"
             }
         }
         var apiKey = "INSERT-APIKEYHERE"
         ///////////////////////////////////////////////
         // END CONFIG 
         ///////////////////////////////////////////////
         </script>
        ";
  ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta https-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="HandheldFriendly" content="True">
      <meta name="MobileOptimized" content="320">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
      <meta https-equiv="cleartype" content="on">
      <title>Status Page</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=latin" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://demo.cachethq.io/build/dist/css/all-81fdbf996d.css">
      <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
      <style type="text/css">
         body.status-page {
         background-color: #F0F3F4;
         color: #333333;
         }
         p, strong { color: #333333 !important; }
         .reds { color: #ff6f6f !important; }
         .blues { color: #3498db !important; }
         .greens { color: #7ED321 !important; }
         .yellows { color: #F7CA18 !important; }
         .oranges { color: #FF8800 !important; }
         .metrics { color: #0dccc0 !important; }
         .links { color: #7ED321 !important; }
         /**
         * Banner background
         */
         .app-banner {
         background-color:  !important;
         }
         .app-banner-padding {
         padding: 40px 0 !important;
         }
         /**
         * Alert overrides.
         */
         .alert {
         background-color: #F7CA18;
         border-color: #deb515;
         color: white;
         }
         .alert.alert-success {
         background-color: #7ED321;
         border-color: #71bd1d;
         color: white;
         }
         .alert.alert-info {
         background-color: #3498db;
         border-color: #2e88c5;
         color: white;
         }
         .alert.alert-danger {
         background-color: #ff6f6f;
         border-color: #e56363;
         color: white;
         }
         /**
         * Button Overrides
         */
         .btn.links {
         color: #ac8d10;
         }
         .btn.btn-success {
         background-color: #7ED321;
         border-color: #71bd1d;
         color: white;
         }
         .btn.btn-success.links {
         color: #589317;
         }
         .btn.btn-success.btn-outline {
         background-color: transparent;
         border-color: #7ED321;
         color: #7ED321;
         }
         .btn.btn-success.btn-outline:hover {
         background-color: #7ED321;
         border-color: #71bd1d;
         color: white;
         }
         .btn.btn-info {
         background-color: #3498db;
         border-color: #2e88c5;
         color: white;
         }
         .btn.btn-info.links {
         color: #246a99;
         }
         .btn.btn-danger {
         background-color: #ff6f6f;
         border-color: #e56363;
         color: white;
         }
         .btn.btn-danger.links {
         color: #b24d4d;
         }
         /**
         * Background fills Overrides
         */
         .component {
         background-color: #FFFFFF;
         border-color: #e5e5e5;
         }
         .sub-component {
         background-color: #FFFFFF;
         border-color: #e5e5e5;
         }
         .incident {
         background-color: #FFFFFF;
         border-color: #e5e5e5;
         }
         .status-icon {
         background-color: #FFFFFF;
         border-color: #e5e5e5;
         }
         .panel.panel-message:before {
         border-left-color: #FFFFFF !important;
         border-right-color: #FFFFFF !important;
         }
         .panel.panel-message:after {
         border-left-color: #FFFFFF !important;
         border-right-color: #FFFFFF !important;
         }
         .footer a {
         color: #333333;
         }
      </style>
   </head>
   <body class="status-page ">
      <div class="container">
      <div class="section-messages">
      </div>
      <div class="section-status">
         <div class="alert alert-success"></div>
      </div>
      <div class="section-components">
         <ul class="list-group components">
            <li class="list-group-item group-name">
               <strong>Websites</strong>
               <div class="pull-right">
                  <websitesStatus><i class="ion ion-ios-circle-filled text-component-1 greens" data-toggle="tooltip" title="Operational"></i></websitesStatus>
               </div>
            </li>
            <div class="group-items">
               <websiteCat>
               </websiteCat>
            </div>
         </ul>
         <ul class="list-group components">
            <li class="list-group-item group-name">
               <strong>Plex</strong>
               <div class="pull-right">
                  <plexStatus><i class="ion ion-ios-circle-filled text-component-1 greens" data-toggle="tooltip" title="Operational"></i></plexStatus>
               </div>
            </li>
            <div class="group-items">
               <plexCat>
               </plexCat>
            </div>
         </ul>
         <ul class="list-group components">
            <li class="list-group-item group-name">
               <strong>Services</strong>
               <div class="pull-right">
                  <servicesStatus><i class="ion ion-ios-circle-filled text-component-1 greens" data-toggle="tooltip" title="Operational"></i></servicesStatus>
               </div>
            </li>
            <div class="group-items">
               <servicesCat>
               </servicesCat>
            </div>
         </ul>
      </div>
      <div class="section-timeline">
      <h1>Recent Reports</h1>
      <timeline>
      </timeline>
      </div>
    </div>
   </body>
<script type="text/javascript">
//init variables
var monitorsData = []
var operational = true;
var operationalText = '';
var html = '';
var element = '';
var eventsToday = false;
var todayLogs = [];
var oldLogs = [];
var workingDate = new Date();
//run on API return
function jsonUptimeRobotApi(data) {
    //sort monitors into catergories and determine if all operational or not
    data.monitors.monitor.forEach(function(monitor) {
        if (categories.Websites.sensors.indexOf(monitor.id) >= 0) {
            monitor.category = "Websites";
            if (monitor.status == "8" || monitor.status == "9") {
              operational = false;
              categories.Websites.status = 1;
          }
        }
        if (categories.Plex.sensors.indexOf(monitor.id) >= 0) {
            monitor.category = "Plex";
            if (monitor.status == "8" || monitor.status == "9") {
              operational = false;
              categories.Plex.status = 1;
          }
        }
        if (categories.Services.sensors.indexOf(monitor.id) >= 0) {
            monitor.category = "Services";
            if (monitor.status == "8" || monitor.status == "9") {
              operational = false;
              categories.Services.status = 1;
          }
        }
        monitorsData.push(monitor);
    });

    //set operational header
    if (operational) {
        operationalText = '<div class="alert alert-success">All systems are operational.</div>';
    } else {
        operationalText = '<div class="alert alert-danger">Not all systems are operational.</div>';
    }
    $(".section-status").replaceWith(operationalText);

    switch (categories.Websites.status) {
      case "1":
        $("websitesStatus").replaceWith('<i class="ion ion-ios-circle-filled text-component-1 reds"></i>');
        break;
      case "2":
        $("websitesStatus").replaceWith('<i class="ion ion-ios-circle-filled text-component-1 greens"></i>');
        break;
      }

    switch (categories.Plex.status) {
      case "1":
        $("plexStatus").replaceWith('<i class="ion ion-ios-circle-filled text-component-1 reds"></i>');
        break;
      case "2":
        $("plexStatus").replaceWith('<i class="ion ion-ios-circle-filled text-component-1 greens"></i>');
        break;
      }

    switch (categories.Services.status) {
      case "1":
        $("servicesStatus").replaceWith('<i class="ion ion-ios-circle-filled text-component-1 reds"></i>');
        break;
      case "2":
        $("servicesStatus").replaceWith('<i class="ion ion-ios-circle-filled text-component-1 greens"></i>');
        break;
      }


    //determine status of each monitor
    monitorsData.forEach(function(monitor) {
        var statusText = '';
        switch (monitor.status) {
            case "0":
                statusText = '<small class="text-component-1 blues">Paused</small>';
                break;
            case "1":
                statusText = '<small class="text-component-1 yellows">Checking...</small>';
                break;
            case "2":
                statusText = '<small class="text-component-1 greens">Operational</small>';
                break;
            case "8":
                statusText = '<small class="text-component-1 reds">Not Operational</small>';
                operational = false;
                break;
            case "9":

                statusText = '<small class="text-component-1 reds">Not Operational</small>';
                operational = false;
                break;
            default:
                statusText = '<small class="text-component-1 reds">Not Operational</small>';
                operational = false;
                break;
        }
        //add monitor status to page
        html = '<li class="list-group-item sub-component"><a href="' + monitor.url + '" target="_blank" class="links">' + monitor.friendlyname + '</a><div class="pull-right">' + statusText + '</div></li>';
        switch (monitor.category) {
            case "Websites":
                element = 'websiteCat';
                break;
            case "Plex":
                element = 'plexCat';
                break;
            case "Services":
                element = 'servicesCat';
                break;
        }
        $(element).append(html);
    });


    //build logs
    var today = new Date(),
        date = today.getDate(),
        month = "January,February,March,April,May,June,July,August,September,October,November,December"
        .split(",")[today.getMonth()];

    function nth(d) {
        if (d > 3 && d < 21) return 'th'; // thanks kennebec
        switch (d % 10) {
            case 1:
                return "st";
            case 2:
                return "nd";
            case 3:
                return "rd";
            default:
                return "th";
        }
    }
    var todaysDate = '<h4>' + date + nth(date) + " " + month + " " + today.getFullYear() + '</h4>';
    element = 'timeline';
    $(element).append(todaysDate);

    monitorsData.forEach(function(monitor) {
        monitor.todayLogs = [];
        monitor.oldLogs = [];
        monitor.log.forEach(function(log) {
            log.datetime = new Date(Date.parse(log.datetime));
            log.monitor = monitor.friendlyname;
            if (today.toDateString() === log.datetime.toDateString()) {
                eventsToday = true;
                todayLogs.push(log);
            } else {
                oldLogs.push(log);
            }
        });

    });

    todayLogs.sort(function(a, b) {
        return (b.datetime - a.datetime);
    });
    oldLogs.sort(function(a, b) {
        return (b.datetime - a.datetime);
    });



    element = 'timeline';
    var logHTML = '';
    if (todayLogs.length == 0) {
        //No logs today!
        logHTML = '<div class="timeline"> <div class="content-wrapper"> <div class="panel panel-message incident"> <div class="panel-body"> <p>No incidents reported</p> </div> </div> </div> </div>';
        $(element).append(logHTML);

    } else {

        //Logs today!
        todayLogs.forEach(function(log) {

            var logType = '';
            var iconType = '';
            var serviceText = '';
            switch (log.type) {
                case "1":
                    logType = 'Unavailable';
                    iconType = '<i class="icon ion-alert reds"></i>';
                    serviceText = '<div class="panel-body"> ' + getResult() + ' </div>';
                    break;
                case "2":
                    logType = 'Available';
                    iconType = '<i class="icon ion-checkmark greens"></i>';
                    break;
                case "99":
                    logType = 'Paused';
                    iconType = '<i class="icon ion-help blues"></i>';
                    break;
                case "98":
                    logType = 'Monitor Created';
                    iconType = '<i class="icon ion-plus-round greens"></i>';
                    break;
            }
            logHTML = '<div class="col-sm-1"> <div class="status-icon status-4" data-toggle="tooltip" title="Fixed" data-placement="left"> ' + ' </div> </div> <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0"> <div class="panel panel-message incident"> <div class="panel-heading"> <strong>' + iconType + "     " + log.monitor + ' ' + logType + '</strong> <br> <small class="date"> ' + formatTime(log.datetime) + ' </small> </div>  ' + serviceText + ' </div> </div>';
            $('timeline').append(logHTML);
        });
    }
    if (oldLogs.length == 0) {
        //No old logs!
    } else {
        var lastDate = new Date();
        oldLogs.forEach(function(log) {
            currentDate = new Date(log.datetime);
            if (lastDate.getDay() != currentDate.getDay()) {
                lastDate = new Date(log.datetime);
                var today = new Date(log.datetime),
                    date = today.getDate(),
                    month = "January,February,March,April,May,June,July,August,September,October,November,December"
                    .split(",")[today.getMonth()];

                function nth(d) {
                    if (d > 3 && d < 21) return 'th'; // thanks kennebec
                    switch (d % 10) {
                        case 1:
                            return "st";
                        case 2:
                            return "nd";
                        case 3:
                            return "rd";
                        default:
                            return "th";
                    }
                }
                var logDateHTML = '<h4>' + date + nth(date) + " " + month + " " + today.getFullYear() + '</h4>';
                $('timeline').append(logDateHTML);
            }
            var logType = '';
            var iconType = '';
            var serviceText = '';
            switch (log.type) {
                case "1":
                    logType = 'Unavailable';
                    iconType = '<i class="icon ion-alert reds"></i>';
                    serviceText = '<div class="panel-body"> ' + getResult() + ' </div>';
                    break;
                case "2":
                    logType = 'Available';
                    iconType = '<i class="icon ion-checkmark greens"></i>';
                    break;
                case "99":
                    logType = 'Paused';
                    iconType = '<i class="icon ion-help blues"></i>';
                    break;
                case "98":
                    logType = 'Monitor Created';
                    iconType = '<i class="icon ion-plus-round greens"></i>';
                    break;
            }
            logHTML = '<div class="col-sm-1"> <div class="status-icon status-4" data-toggle="tooltip" title="Fixed" data-placement="left"> ' + ' </div> </div> <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0"> <div class="panel panel-message incident"> <div class="panel-heading"> <strong>' + iconType + "     " + log.monitor + ' ' + logType + '</strong> <br> <small class="date"> ' + formatTime(log.datetime) + ' </small> </div>  ' + serviceText + ' </div> </div>';
            $('timeline').append(logHTML);

        });
    }
}


function formatTime(date_obj) {
    // formats a javascript Date object into a 12h AM/PM time string
    var hour = date_obj.getHours();
    var minute = date_obj.getMinutes();
    var amPM = (hour > 11) ? "PM" : "AM";
    if (hour > 12) {
        hour -= 12;
    } else if (hour == 0) {
        hour = "12";
    }
    if (minute < 10) {
        minute = "0" + minute;
    }
    return hour + ":" + minute + " " + amPM;
}

array1 = new Array("Temporary", "Intermittant", "Partial", "Redundant", "Total", "Multiplexed", "Inherent", "Duplicated",
    "Dual-homed", "Synchronous", "Bidirectional", "Serial", "Asynchronous", "Multiple", "Replicated",
    "Non-replicated", "Unregistered", "Non-specific", "Generic", "Migrated", "Localised", "Resignalled",
    "Dereferenced", "Nullified", "Aborted", "Serious", "Minor", "Major", "Extraneous", "Illegal",
    "Insufficient", "Viral", "Unsupported", "Outmoded", "Legacy", "Permanent", "Invalid", "Deprecated",
    "Virtual", "Unreportable", "Undetermined", "Undiagnosable", "Unfiltered", "Static", "Dynamic",
    "Delayed", "Immediate", "Nonfatal", "Fatal", "Non-valid", "Unvalidated", "Non-static",
    "Unreplicatable", "Non-serious", "Hot", "Cold", "Internal", "External", "Hidden");

array2 = new Array("temporary", "intermittant", "partial", "redundant", "total", "multiplexed", "inherent", "duplicated",
    "dual-homed", "synchronous", "bidirectional", "serial", "asynchronous", "multiple", "replicated",
    "non-replicated", "unregistered", "non-specific", "generic", "migrated", "localised", "resignalled",
    "dereferenced", "nullified", "aborted", "serious", "minor", "major", "extraneous", "illegal",
    "insufficient", "viral", "unsupported", "outmoded", "legacy", "permanent", "invalid", "deprecated",
    "virtual", "unreportable", "undetermined", "undiagnosable", "unfiltered", "static", "dynamic",
    "delayed", "immediate", "nonfatal", "fatal", "non-valid", "unvalidated", "non-static",
    "unreplicatable", "non-serious", "hot", "cold", "internal", "external", "hidden");

array3 = new Array("array", "systems", "hardware", "software", "firmware", "backplane", "logic-subsystem",
    "integrity", "subsystem", "memory", "comms", "integrity", "checksum", "protocol", "parity", "bus",
    "timing", "synchronisation", "topology", "transmission", "reception", "stack", "framing", "code", "backup",
    "programming", "peripheral", "environmental", "loading", "operation", "parameter", "syntax", "context",
    "initialisation", "execution", "resource", "encryption", "decryption", "file", "precondition", "raid",
    "authentication", "paging", "swapfile", "service", "gateway", "request", "proxy", "media", "CRC",
    "registry", "configuration", "codec", "metadata", "streaming", "retrieval", "installation", "library",
    "handler");

array4 = new Array("interruption", "destabilisation", "interlude", "destruction", "abnormality", "desynchronisation",
    "dereferencing", "overflow", "variance", "underflow", "nmi", "inconsistency", "interrupt", "corruption",
    "reclock", "rejection", "invalidation", "intrusion", "halt", "exhaustion", "infection", "incompatibility",
    "timeout", "obliteration", "expiry", "glitch", "unavailability", "bug", "condition", "crash", "dump", "crashdump",
    "problem", "lockout", "failure", "anomaly", "seizure", "override", "incongruity", "stackdump", "clash",
    "disturbance", "error", "feature", "problem", "warning", "signal", "flag", "irregularity", "abnormality");

var max1 = array1.length;
var max2 = array2.length;
var max3 = array3.length;
var max4 = array4.length;

function lukraak(l, h) {
    h -= 1
    var now = new Date()
    var rnd = 16520406 * (now.getTime() / ((now.getMinutes() + 1) * 1000))
    rnd = l + Math.floor(rnd % (h - l))
    return rnd
}

function getResult() {

    index1 = lukraak(0, max1);
    if (index1 < 0) {
        index1 = 0
    }
    if (index1 == array1.length) {
        index1 = array1.length - 1
    }

    index2 = index1
    do {
        index2 = lukraak(0, max2);
        if (index2 < 0) {
            index2 = 0
        }
        if (index2 == array2.length) {
            index2 = array2.length - 1
        }
    }
    while (index2 == index1)


    index3 = lukraak(0, max3);
    if (index3 < 0) {
        index3 = 0
    }
    if (index3 == array3.length) {
        index3 = array3.length - 1
    }

    index4 = lukraak(0, max4);
    if (index4 < 0) {
        index4 = 0
    }
    if (index4 == array4.length) {
        index4 = array4.length - 1
    }

    return (array1[index1] + ", " + array2[index2] + " " + array3[index3] + " " + array4[index4] + ".");
}

//get data from api and start
$(document).ready(function() {
    var url = "https://api.uptimerobot.com/getMonitors?apiKey=" + apiKey + "&customUptimeRatio=1-7-30-365&format=json&logs=1";
    $.ajax({
        url: url,
        context: document.body,
        dataType: 'jsonp'
    });
});
</script>

</html>
