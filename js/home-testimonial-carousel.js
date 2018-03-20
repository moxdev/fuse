// Carousel
var elem = document.querySelector('.video-carousel');
var carouselStatus = document.querySelector('.carousel-status');
var flkty = new Flickity(elem, {
  cellAlign: 'left',
  contain: true,
  pageDots: false,
  setGallerySize: true,
  groupCells: true,
  autoPlay: 7000,
  resize: true,
  selectedAttraction: 0.01,
  friction: 0.2,
  wrapAround: true,
  prevNextButtons: true
});

function updateStatus() {
  var slideNumber = flkty.selectedIndex + 1;
  carouselStatus.textContent = slideNumber + '/' + flkty.slides.length;
}
updateStatus();

flkty.on('select', updateStatus);