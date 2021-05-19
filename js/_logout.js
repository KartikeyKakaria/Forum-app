console.log("hi")
window.onload = function() {
    document.write("hello")
    const logout = document.getElementById('logout');
    document.write(logout);
    logout.addEventListener('click', function() {
        let logoutConf = confirm('Are you sure you want to logout');
        if (logoutConf) {
            window.location = "/Forum-app/partials/_logout.php?logout=true";
        }
    })
}