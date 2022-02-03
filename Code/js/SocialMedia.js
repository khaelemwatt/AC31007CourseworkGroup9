const twitterBtn = document.querySelector(".twitter-btn");

function init()
{
    let postTitle = encodeURI("This is a test goal");
    let postURL = encodeURI(document.location.href);

    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postURL}&text=${postTitle}`);
}

init();
