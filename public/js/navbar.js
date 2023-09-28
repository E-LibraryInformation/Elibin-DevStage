function toggleDownUser() {
    var downUser = document.getElementById("downUser");
    if (downUser.classList.contains("hidden")) {
        downUser.classList.remove("hidden");
        downUser.classList.add("flex");
    } else {
        downUser.classList.add("hidden");
    }
}
