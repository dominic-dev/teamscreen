console.log(2);
console.log(teamMembers);
TRAFFIC_MAX_OK_DELAY_MINS = 9;
// TRAFFIC_USERS_URL = 'http://tim.mybit.nl/users.php';
// TRAFFIC_USERS_URL = 'api/members/get_all.php';

class TrafficWidget{
    constructor(){
        this.service = new google.maps.DistanceMatrixService();
        this.list = {};
        this.listCounter = 0;
        this.listbox = document.getElementById("traffic-list");
        this.elements = {};
    }

    getTrafficInformation(item, callback, widget){
        var param = {
            origins: ['Hilversum'],
            destinations: [item.destination],
            travelMode: 'DRIVING',
            drivingOptions: {
                departureTime: new Date()
            }
        };
        this.service.getDistanceMatrix(param, function(response){
            callback(item, response, widget);
        });
    }

    update(){
        var widget = this;
        this.elements = {};
        widget.list = teamMembers;
        widget.listCounter = 0;
        widget.list.forEach(function(item) {
            widget.getTrafficInformation(item, widget.updateDOM, widget);
        });
        /*
        var xhr = new XMLHttpRequest();
        xhr.open('get', TRAFFIC_USERS_URL);
        xhr.addEventListener('load', function() {
            this.elements = {};
            widget.list = JSON.parse(this.responseText);
            widget.listCounter = 0;
            widget.list.forEach(function(item) {
                widget.getTrafficInformation(item, widget.updateDOM, widget);
            });
        });
        xhr.send();
         */
    }

    updateDOM(item, response, widget){
        var result = response.rows[0].elements[0];
        var diff = result.duration_in_traffic.value - result.duration.value;
        var diffInMinutes = Math.round(diff/60);

        var listItem = document.createElement('div');
        listItem.className = "traffic-item";

        var img = document.createElement('img');
        img.src = item.avatar;
        img.className = "avatar";
        listItem.appendChild(img);

        var nameSpan = document.createElement('span');
        nameSpan.innerText = item.name;
        nameSpan.className = "name";
        listItem.appendChild(nameSpan);


        var statusSpan = document.createElement('span');
        statusSpan.className = "status";

        var delaySpan = document.createElement('span');
        delaySpan.innerText = diffInMinutes + ' min.';
        delaySpan.className = "status-delay";
        statusSpan.appendChild(delaySpan);

        var iconSpan = document.createElement('span');
        iconSpan.className = "status-icon";
        if(diffInMinutes < TRAFFIC_MAX_OK_DELAY_MINS) {
            statusSpan.className = "status ok";
            iconSpan.innerText = "☺";
        }
        else{
            statusSpan.className = "status bad";
            iconSpan.innerText = "☹";
        }
        statusSpan.appendChild(iconSpan);
        listItem.appendChild(statusSpan);

        var index = diffInMinutes * 100;
        while (index in widget.elements){
            ++index;
        }

        widget.elements[index] = listItem;
        widget.listCounter++;
        if (widget.listCounter === widget.list.length){
            var sorted= Object.keys(widget.elements)
                    .sort(function (a, b){ return b-a })
                    .map(function(k) { return widget.elements[k] });
            console.log(sorted);

            for (var el in sorted){
                widget.listbox.appendChild(sorted[el]);
            }
        }
    }

}

var trafficWidget;

function initTraffic() {
    trafficWidget = new TrafficWidget;
    trafficWidget.update();
}
