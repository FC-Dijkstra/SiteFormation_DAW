function toggleTheme()
{
    var header = document.getElementsByClassName("header")[0];
    var footer = document.getElementsByClassName("footer")[0];
    var body = document.getElementsByTagName("body")[0];
    toggleElement(header);
    toggleElement(footer);
    toggleElement(body);
}

function toggleElement(e) {
    if(e.className.includes("dark"))
      e.className = e.className.slice(0, e.className.indexOf('dark')) + 'light';
    else if(e.className.includes("light"))
      e.className = e.className.slice(0, e.className.indexOf('light')) + 'dark';
    else 
      e.className+= ' dark';
  }