var listGroup = document.getElementById("eventsList");
var response;

popList();

async function popList()
{
    await fetch('https://group9agilewebapp.azurewebsites.net/api/allEvents', {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => response = data);

    response.forEach(addToList);
}

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

function goalToString(goalId)
{
    switch (goalId)
    {
        case 1:
            return "End poverty in all its forms everywhere";
        case 2:
            return "End hunger, achieve food security and imporoved nutrition and promote sustainable agriculture";
        case 3:
            return "Ensure healthy lives and promote well being for all ages";
        case 4:
            return "Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all";
        case 5:
            return "Achieve gender equality and empower all women and girls";
        case 6:
            return "Ensure availability and sustainable management of water and sanitation for all";
        case 7:
            return "Ensure access to affordable, reliable, sustainable and modern energy for all";
        case 8:
            return "Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all";
        case 9:
            return "Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation";
        case 10:
            return "Reduce inequality within and among countries";
        case 11:
            return "Make cities and human settlements inclusive, safe, resilient and sustainable";
        case 12:
            return "Ensure sustainable consumption and production patterns";
        case 13:
            return "Take urgent action to combat climate change and its impacts";
        case 14:
            return "Conserve and sustainably use the oceans, seas and marine resources for sustainable development";
        case 15:
            return "Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss";
        case 16:
            return "Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels";
        case 17:
            return "Strengthen the means of implementation and revitalize the global partnership for sustainable development";
        default:
            return "Error: incorrect goal ID";
    }
}

function stringToGoal(string) 
{
    switch (string)
    {
        case "End poverty in all its forms everywhere":
            return 1;
        case "End hunger, achieve food security and imporoved nutrition and promote sustainable agriculture":
            return 2;
        case "Ensure healthy lives and promote well being for all ages":
            return 3;
        case "Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all":
            return 4;
        case "Achieve gender equality and empower all women and girls":
            return 5;
        case "Ensure availability and sustainable management of water and sanitation for all":
            return 6;
        case "Ensure access to affordable, reliable, sustainable and modern energy for all":
            return 7;
        case "Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all":
            return 8;
        case "Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation":
            return 9;
        case "Reduce inequality within and among countries":
            return 10;
        case "Make cities and human settlements inclusive, safe, resilient and sustainable":
            return 11;
        case "Ensure sustainable consumption and production patterns":
            return 12;
        case "Take urgent action to combat climate change and its impacts":
            return 13;
        case "Conserve and sustainably use the oceans, seas and marine resources for sustainable development":
            return 14;
        case "Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss":
            return 15;
        case "Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels":
            return 16;
        case "Strengthen the means of implementation and revitalize the global partnership for sustainable development":
            return 17;
        default:
            return "Error: incorrect goal";
    }
}

function buildSelect(goalId)
{
    var s = "";

    for (var i=1; i<=17; i++)
    {
        if (i == goalId)
        {
            s += '<option selected="selected">' + goalToString(i) + '</option>\n';
        }

        s += '<option>' + goalToString(i) + '</option>\n';
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
            <label for="goalSelect">Goal</label>
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
    
    var json = JSON.stringify({
        "EventId": parseInt(eventId)
    });

    fetch('https://group9agilewebapp.azurewebsites.net/api/deleteEvent', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: json, 
    });

    location.reload();
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
        "goalID": stringToGoal(goal)
    });

    fetch('https://group9agilewebapp.azurewebsites.net/api/editEvent', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: json,
    });
    
    location.reload();
}