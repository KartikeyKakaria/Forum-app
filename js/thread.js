function arrow(id) {
    const element = document.getElementById(id);
    var text = element.innerText;
    console.log(text);
    if (text == "View Replies ↓") {
        element.innerHTML = "View Replies &uarr;";
    } else if (text == "View Replies ↑") {
        element.innerHTML = "View Replies &darr;";
    }
}