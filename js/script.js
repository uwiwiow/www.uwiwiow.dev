
// setting theme when contents are loaded
window.addEventListener('load', function () {
    let theme = localStorage.getItem('theme');
    // when first load, choose an initial theme
    if (theme === null || theme === undefined) {
        theme = 'light';
        localStorage.setItem('theme', theme);
    }
    // set theme
    const html = document.querySelector("html");
    // apply the class
    html.classList.add(theme);
})

function switchTheme() {
    const theme = localStorage.getItem('theme');
    const html = document.querySelector('html');
    // choose new theme
    let new_theme;
    if (theme === 'dark') {
        new_theme = 'light';
    } else {
        new_theme = 'dark';
    }
    // remove previous class
    html.classList.remove(theme);
    // add new class
    html.classList.add(new_theme);
    // store theme
    localStorage.setItem('theme', new_theme);
}

$(document).ready(function () {
    $('#profilePicture').change(function () {
        $('#profilePictureForm').submit();
    });
});