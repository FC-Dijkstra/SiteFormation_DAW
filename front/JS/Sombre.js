function toggleTheme()
{
    var theme = document.getElementsByTagName('link')[0];
    if (theme.getAttribute('href') == '/front/CSS/menu.css') {
        theme.setAttribute('href', '/front/CSS/DarkTheme/dark.css');
    } else {
        theme.setAttribute('href', '/front/CSS/menu.css');
    }
}