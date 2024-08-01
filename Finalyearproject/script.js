// it is used for swichlink  btween log and register
document.addEventListener('DOMContentLoaded', function() {
    const switchLinks = document.querySelectorAll('.switch-link');
    switchLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const containers = document.querySelectorAll('.container');
            containers.forEach(container => {
                container.classList.toggle('register-container');
            });
        });
    });
});
