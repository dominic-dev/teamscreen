<link rel="stylesheet" href="widgets/vertragingen.css">
<div id="vertragingen" class="widgetBoxSmall">
    <h2>Vertragingen</h2>
    <div id="traffic-list">
    </div>
    <script type="text/javascript">
        function init() {
            var service = new google.maps.DistanceMatrixService();
            var xhr = new XMLHttpRequest();
            var listbox = document.getElementById("traffic-list");
            xhr.open('get', 'http://tim.mybit.nl/users.php');
            xhr.addEventListener('load', function() {
                var list = JSON.parse(this.responseText);
                list.forEach(function(item) {
                    var param = {
                        origins: ['Hilversum'],
                        destinations: [item.destination],
                        travelMode: 'DRIVING',
                        drivingOptions: {
                            departureTime: new Date()
                        }
                    };
                    service.getDistanceMatrix(param, function(response) {
                        var result = response.rows[0].elements[0];
                        var diff = result.duration_in_traffic.value - result.duration.value;
                        // <img class="avatar" src="https://jira.local.mybit.nl/secure/useravatar?size=small&ownerId=thomas&avatarId=12067">
                        // <span class="name">Thomas Offereins</span>
                        // <span class="delay">5-15 min.</span>
                        // <span class="status ok">☺</span>
                        var listItem = document.createElement('div');
                        listItem.className = "traffic-item";

                        var img = document.createElement('img');
                        img.src = item.user.avatar;
                        img.className = "avatar";
                        listItem.appendChild(img);

                        var nameSpan = document.createElement('span');
                        nameSpan.innerText = item.user.name;
                        nameSpan.className = "name";
                        listItem.appendChild(nameSpan);

                        var delaySpan = document.createElement('span');
                        delaySpan.innerText = Math.round(diff / 60) + ' min.';
                        delaySpan.className = "delay";
                        listItem.appendChild(delaySpan);

                        listbox.appendChild(listItem);
                    });
                });
            });
            xhr.send();
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4Nr1bQijl7QINVIwC7JCq7Ljh2FYk_8I&callback=init" async defer></script>
</div>