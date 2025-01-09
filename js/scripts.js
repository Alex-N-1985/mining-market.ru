const winState = document.getElementById("openModal");
const searchState = document.getElementsByClassName("searchfield");
const searchShow = document.getElementById("quicksearchshow");

function modalWindowOpenClose(){
    let state = winState.style.display;
    if (state === null || state === "" || state === "none"){
        winState.style.display = "block";
    } else if (state === "block"){
        winState.style.display = "none";
    }
}

function quickSearchShow() {
    searchState[0].style.display = "flex";
    searchShow.style.display = "none";
}