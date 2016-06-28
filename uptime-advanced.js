var categories = {
    "Websites": {
        "sensors": ["777688716"],
        "monitors": []
    },
    "Plex": {
        "sensors": ["777693990", "777893558"],
        "monitors": []
    },
    "Services": {
        "sensors": ["777864590", "777864593", "777864591", "777899388"],
        "monitors": []
    }
}
var monitorsData = []
var operational = true;
var operationalText = '';
var html = '';
var element = '';

function jsonUptimeRobotApi(data) {
    data.monitors.monitor.forEach(function(monitor) {
        if (categories.Websites.sensors.indexOf(monitor.id) >= 0) {
            monitor.category = "Websites";
        }
        if (categories.Plex.sensors.indexOf(monitor.id) >= 0) {
            monitor.category = "Plex";
        }
        if (categories.Services.sensors.indexOf(monitor.id) >= 0) {
            monitor.category = "Services";
        }
        if (monitor.status == "8" || monitor.status == "9") {
            operational = false;
        }
        monitorsData.push(monitor);
    });
    console.log(monitorsData);
    if (operational) {
        operationalText = '<div class="alert alert-success">All systems are operational.</div>';
    } else {
        operationalText = '<div class="alert alert-danger">Not all systems are operational.</div>';
    }
    $(".section-status").replaceWith(operationalText);




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
        console.log('Adding ' + html + ' to ' + element + '.');
        $(element).append(html);
    });
}

$(document).ready(function() {
    var apiKey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
    var url = "https://api.uptimerobot.com/getMonitors?apiKey=" + apiKey + "&customUptimeRatio=1-7-30-365&format=json&logs=1";
    $.ajax({
        url: url,
        context: document.body,
        dataType: 'jsonp'
    });
});
