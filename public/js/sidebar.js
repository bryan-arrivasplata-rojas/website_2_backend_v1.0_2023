var navbarHeight = document.querySelector('.navbar').offsetHeight;
    
// Ajustar la posición del sidebar según la altura del navbar
var sidebar = document.querySelector('.sidebar');
sidebar.style.top = navbarHeight + 'px';

function simulateLinkClick(event) {
  var link = event.currentTarget.querySelector('a');
  if (link) {
      link.click();
  }
}