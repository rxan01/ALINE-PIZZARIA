const map =L.map('map').setView([-23.61263132183051, -46.77224424247143], 16)
const layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
});

layer.addTo(map)

const marker = L.marker([-23.61263132183051, -46.77224424247143])
marker.addTo(map)

/*menu*/

const menu = document.querySelector('.menu');
const NavMenu = document.querySelector('.nav-menu');

menu.addEventListener('click', () => {
    menu.classList.toggle('ativo');
    NavMenu.classList.toggle('ativo');
})