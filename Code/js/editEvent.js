fetch('https://group9agilewebapp.azurewebsites.net/api/allEvents')
  .then(response => response.json())
  .then(data => console.log(data));
