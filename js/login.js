window.onload = function() {
    const logout = document.getElementById('logout');
    var isLogout = logout.value;
    console.log('hi');
    if (isLogout == "log") {
        window.location = "/Forum-app/?loginned=true";
    }
}