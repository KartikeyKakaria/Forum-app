window.onload = function() {
    const logout = document.getElementById('logout');
    logout.addEventListener('click', function() {
        let Logout = confirm("Are you sure you want to logout?");
        if (Logout) {
            window.location = "/Forum-app/partials/_logout.php?logout=true";
        } else {
            window.location = "/Forum-app/";
        }
    })
}