//example response, cross site scripting rules mean that you cant 
// need to add escape chars to api
var jsonResponse = '[{"0":"1","EventId":"1","1":"Litter Clean-up","Name":"Litter Clean-up","2":"Come join us clean up Dundee\'s litter!","Info":"Come join us clean up Dundee\'s litter!","3":"2022-02-01","Date":"2022-02-01","4":"Dundee","Location":"Dundee","5":null,"goalID":null},{"0":"2","EventId":"2","1":"Dundee feeds the needy","Name":"Dundee feeds the needy","2":"We will provide a hot soup stand free of charge for anyone who might need it","Info":"We will provide a hot soup stand free of charge for anyone who might need it","3":"2022-02-10","Date":"2022-02-10","4":"Dundee","Location":"Dundee","5":null,"goalID":null}]';
var response = JSON.parse(jsonResponse);

var listGroup = document.getElementById("eventsList");

response.forEach(addToList);

function addToList(event)
{
    listGroup.innerHTML += `
    <a href="#" onclick="editEvent(` + event.EventId + `)" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">` + event.Name + `</h5>
            <small>` + event.Date + `</small>
        </div>
        <p class="mb-1">` + event.Info + `</p>
        <small>` + event.Location + `</small>
    </a>
    `
}

function editEvent(eventId)
{
    var event;

    for (var i=0; i<response.length; i++)
        if (response[i].EventId = eventId) event = response[i];

    listGroup.style.display = "none";
    document.getElementById("subtitle").style.display = "none";

    var formRow = document.getElementById("formRow");
    
    formRow.innerHTML = `
    <form>
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
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
            </select>
        </div>
        <div class="form-row text-center"> 
            <button onclick="location.reload();" class="btn btn-secondary m-3">Back</button>
            <button class="btn btn-danger m-3">Delete</button>
            <button type="submit" class="btn btn-primary m-3">Save Changes</button>
        </div>
    </form>
    `
}