var navbarHeight = document.querySelector('.navbar').offsetHeight;
    
// Ajustar la posición del sidebar según la altura del navbar
var sidebar = document.querySelector('.app');
sidebar.style.marginTop = navbarHeight + 'px';