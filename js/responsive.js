$('.responsive-slick').slick({
    dots: false,
    infinite: true,
    centerMode: true,
    variableWidth: true,
    speed: 300,
    touchThreshold:100,
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: false,
          centerMode: true,
          variableWidth: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  document.querySelectorAll('.con').forEach(el => {
    el.style.width = `${el.children.length * 100}%`;
    Array.from(el.children).forEach(img => {
      img.style.width = `${100 / el.children.length}%`
    })
  })