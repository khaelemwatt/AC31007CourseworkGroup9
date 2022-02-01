//example response, cross site scripting rules mean that you cant 
// need to add escape chars to api
var xmlHttp = new XMLHttpRequest();
xmlHttp.open( "GET", 'https://group9agilewebapp.azurewebsites.net/api/allEvents', false );
xmlHttp.send( null );
var jsonResponse = xmlHttp.responseText;

var response = JSON.parse(jsonResponse);

var listGroup = document.getElementById("eventsList");

response.forEach(addToList);

function addToList(event)
{
    listGroup.innerHTML += `
    <a href="#" onclick="editEvent(` + parseInt(event.EventId) + `)" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">` + event.Name + `</h5>
            <small>` + event.Date + `</small>
        </div>
        <p class="mb-1">` + event.Info + `</p>
        <small>` + event.Location + `</small>
    </a>
    `
}

function buildSelect(goalId)
{
    var s = "";

    for (var i=1; i<=17; i++)
    {
        if (i == goalId)
        {
            s += '<option selected="selected">' + i.toString() + '</option>\n';
        }

        s += '<option>' + i.toString() + '</option>\n';
    }

    return s;
}

function editEvent(eventId)
{
    var event;

    for (var i=0; i<response.length; i++)
        if (parseInt(response[i].EventId) == eventId) event = response[i];

    
    listGroup.style.display = "none";
    document.getElementById("subtitle").style.display = "none";

    var formRow = document.getElementById("formRow");
    
    formRow.innerHTML = `
    <form id="eventForm">
        <div class="form-group">
            <label for="nameInput">Name</label>
            <input type="text" class="form-control" id="nameInput" value="` + event.Name + `">
        </div>
        <div class="form-group">
            <label for="locationInput">Location</label>
            <input type="text" class="form-control" id="locationInput" value="` + event.Location + `">
        </div>
        <div class="form-group">
            <label for="dateInput">Date (yyyy-mm-dd)</label>
            <input type="text" class="form-control" id="dateInput" value="` + event.Date + `">
        </div>
        <div class="form-group">
            <label for="infoInput">Info</label>
            <textarea class="form-control" id="infoInput" rows="3">` + event.Info + `</textarea>
        </div>
        <div class="form-group">
            <label for="goalSelect">Goal ID</label>
            <select class="form-control" id="goalSelect">
                ` + buildSelect(parseInt(event.goalID)) + `
            </select>
        </div>
        <div class="form-row text-center"> 
            <button onclick="location.reload();" class="btn btn-secondary m-3">Back</button>
            <button onclick="deleteEvent(` + parseInt(event.EventId) + `)" class="btn btn-danger m-3">Delete</button>
            <button onclick="saveEvent(` + parseInt(event.EventId) + `)" class="btn btn-primary m-3">Save Changes</button>
        </div>
    </form>
    `
}

function deleteEvent(eventId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://group9agilewebapp.azurewebsites.net/deleteEvent", false);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify({
        "EventId": parseInt(eventId)
    }));

}

function saveEvent(eventId) {
    var name = document.getElementById("nameInput").value;
    var location = document.getElementById("locationInput").value;
    var date = document.getElementById("dateInput").value;
    var info = document.getElementById("infoInput").value;
    var goal = document.getElementById("goalSelect").value;
    
    var json = JSON.stringify({
        "EventId": parseInt(eventId),
        "Name": name,
        "Location": location,
        "Date": date,
        "Info": info,
        "goalID": parseInt(goal)
    });

    fetch('https://group9agilewebapp.azurewebsites.net/api/editEvent', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: json,
    })
    .then(response => response.json())
    .then(data => {
    console.log('Success:', data);
    accept(data);
    })
    .catch((error) => {
    console.error('Error:', error);
    reject();
    });
}