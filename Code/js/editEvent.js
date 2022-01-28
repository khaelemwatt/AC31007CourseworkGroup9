//example response, cross site scripting rules mean that you cant 
// need to add escape chars to api
var jsonResponse = '[{"0":"1","EventId":"1","1":"Litter Clean-up","Name":"Litter Clean-up","2":"Come join us clean up Dundee\'s litter!","Info":"Come join us clean up Dundee\'s litter!","3":"2022-02-01","Date":"2022-02-01","4":"Dundee","Location":"Dundee","5":null,"goalID":null},{"0":"2","EventId":"2","1":"Dundee feeds the needy","Name":"Dundee feeds the needy","2":"We will provide a hot soup stand free of charge for anyone who might need it","Info":"We will provide a hot soup stand free of charge for anyone who might need it","3":"2022-02-10","Date":"2022-02-10","4":"Dundee","Location":"Dundee","5":null,"goalID":null}]';
var response = JSON.parse(jsonResponse);

var listGroup = document.getElementById("eventsList");

response.forEach(addToList);

function addToList(event)
{
    listGroup.innerHTML += `
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">` + event.Name + `</h5>
            <small>` + event.Date + `</small>
        </div>
        <p class="mb-1">` + event.Info + `</p>
        <small>` + event.Location + `</small>
    </a>
    `
}