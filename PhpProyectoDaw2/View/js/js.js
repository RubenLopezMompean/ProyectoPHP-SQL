var init = function () {
        var carousel = document.getElementById('carousel'),
                navButtons = document.querySelectorAll('#navigation button'),
                panelCount = carousel.children.length,
                theta = 0,
                onNavButtonClick = function (event) {
                  var increment = parseInt(event.target.getAttribute('data-increment'));
                  theta += (360 / panelCount) * increment;
                  carousel.style.transform = 'translateZ( -288px ) rotateY(' + theta + 'deg)';
                  console.log("theta: ", theta)
                };

        for (var i = 0; i < 2; i++) {
          navButtons[i].addEventListener('click', onNavButtonClick, false);
        }

      };
      
      
      
      function confirmSubmit() {
        var agree = confirm("¿Está seguro de eliminar este usuario? Este proceso es irreversible.");
        if (agree)
          return true;
        else
          return false;
      }

      function alta() {
        var agree = confirm("Va a proceder a darse de alta.");
        if (agree)
          return true;
        else
          return false;
      }