/* 

Twitter:
https://twitter.com/share?url=[post-url]&text=[post-title]


*/

const twitterBtn = document.querySelector(".twitter-btn");

function init()
{
    console.log("test");
    console.log(document.location.href);
    let postTitle = encodeURI("This is a test goal");
    console.log(postTitle);
    let postURL = encodeURI(document.location.href);
    console.log(postURL);

    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postURL}&text=${postTitle}`);
}

init();
