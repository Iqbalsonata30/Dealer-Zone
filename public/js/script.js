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
const carsSwiper = new Swiper(".CarsSwiper", {
  effect: "coverflow",
  grabCursor: true,
  cubeEffect: {
    shadow: true,
    slideShadows: true,
    shadowOffset: 20,
    shadowScale: 0.94,
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable:true,
  },
});

const previewImage = () =>{
  const image = document.getElementById('gambar');
  const imagePreview = document.getElementsByClassName('img-preview');
  
    const showImage = new FileReader();
    showImage.readAsDataURL(image.files[0]);
    showImage.onload = (e) => {
      imagePreview[0].src = e.target.result;
    }
}


