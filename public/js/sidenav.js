document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.querySelector('[data-dropdown-toggle="dropdown-user"]');
    const dropdownMenu = document.getElementById('dropdown-user');
    const sidebar = document.getElementById('logo-sidebar');

    dropdownButton.addEventListener('click', function(event) {
        event.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function(event) {
        if (!dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });

    const drawerButton = document.querySelector('[data-drawer-target="logo-sidebar"]');
    drawerButton.addEventListener('click', function() {
        if (sidebar.classList.contains('left-0')) {
            sidebar.classList.remove('left-0');
            setTimeout(function() {
                sidebar.classList.add('left-64', 'transform', 'transition-transform');
            }, 50); // Adjust the delay time if needed
        } else {
            sidebar.classList.remove('left-64', 'transform', 'transition-transform');
            setTimeout(function() {
                sidebar.classList.add('left-0');
            }, 50); // Adjust the delay time if needed
        }
    });
});
