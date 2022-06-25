const swiper = new Swiper(".mySwiper", {
  effect: "cube",
  grabCursor: true,
  cubeEffect: {
    shadow: true,
    slideShadows: true,
    shadowOffset: 20,
    shadowScale: 0.94,
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable:true,
  },
});

const alert = document.getElementById('alert');
if(alert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: 'Data berhasil ditambahkan!.',
  }) 
} 