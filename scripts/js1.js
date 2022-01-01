

let maCarte;

window.addEventListener('DOMContentLoaded', ()=>{
      // 1 : création
  maCarte = L.map('carte_campus');

      // 2 : choix du fond de carte
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '©️ OpenStreetMap contributors'
  }).addTo(maCarte);
  maCarte.setView([50.61, 3.14], 14);
  let pointsList = [];
  for (let item of document.querySelectorAll('#stations>li')){
    let nom = item.textContent;
    let geoloc = JSON.parse(item.dataset.geo);
    let velos = JSON.parse(item.dataset.nbvelosdispo);
    let places = JSON.parse(item.dataset.nbplacesdispo);
    let image =  VliveImage.getInstance(velos,places);
    L.marker( geoloc, {icon:image.getLeafletIcon()} ).addTo(maCarte);
    let marker = L.marker(geoloc).addTo(maCarte).bindPopup(nom);
    pointsList.push(geoloc);

    setupListeners(item,marker);
  }
  if (pointsList.length>0)
    maCarte.fitBounds(pointsList);


});


function setupListeners(item, marker){
    item.addEventListener('click', ()=>{
      marker.openPopup();
      setCurrent(item);
      maCarte.setView(marker.getLatLng(),13);
    });
    marker.on("click", ()=>{
      setCurrent(item);
      maCarte.setView(marker.getLatLng(),13);
    });
}

{
let itemCourant = null;

function setCurrent(item){
    if (itemCourant)
        itemCourant.classList.toggle('current');
    itemCourant = item;
    itemCourant.classList.toggle('current');
}
}
