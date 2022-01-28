function goal1Hover(){
    cosnole.log("mouse over");
    goal1card.innerHTML = "<h1>No Poverty</h1>";
    goal1card.innerHTML = "<p>End Poverty in all its forms everywhere</p>";
    goal1card.innerHTML += "<a href='Goals/Goal1.php' class='btn MoreInfo mt-auto'>More Information</a>";
  }
  function addGoal1Hover(){
    var goal1 = document.getElementById("goal1");
    var goal1Card = document.getElementById("goal1card");
    goal1.addEventListener("mouseover", goal1Hover());
  }
  function goal1Leave(){
    console.log("Mouse out");
    goalcard.innerHTML = "<img class='card-img-top img-fluid' src='Code/php/inc/Images/Goal1.jpg' alt='Goal1' id='goal1'>";
    goal1.addEventListener("mouseover", addGoal1Hover());
  }
