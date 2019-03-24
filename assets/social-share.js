document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.contact_button').remove()
    var elements = document.querySelectorAll('.shareable');

    elements.forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            window.open(element.href, 'ShareWindow', 'height=450, width=550, toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        });
    });
});