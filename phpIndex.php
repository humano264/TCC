<script>
  var areas = document.querySelectorAll('#mapa area');

  var colors = {
    acre: "#FF0000",
    alagoas: "#00FF00",
    // adicione as cores para cada estado
  };

  areas.forEach(function(area) {
    var state = area.getAttribute('data-state');
    area.style.fill = colors[state];

    area.addEventListener('mouseover', function() {
      document.querySelector('#mapa area.active').classList.remove('active');
      this.classList.add('active');
      this.style.fill = lighten(colors[state], 20);
    });

    area.addEventListener('mouseout', function() {
      this.classList.remove('active');
      this.style.fill = colors[state];
    });

    area.addEventListener('click', function(e) {
      e.preventDefault();
      window.location.href = "https://example.com/" + state + ".html";
    });
  });

  function lighten(color, amount) {
    var usePound = false;

    if (color[0] == "#") {
      color = color.slice(1);
      usePound = true;
    }

    var num = parseInt(color, 16);
    var r = (num >> 16) + amount;
    if (r > 255) r = 255;
    else if (r < 0) r = 0;

    var g = ((num >> 8) & 0x00FF) + amount;
    if (g > 255) g = 255;
    else if (g < 0) g = 0;

    var b = (num & 0x0000FF) + amount;
    if (b > 255) b = 255;
    else if (b < 0) b = 0;

    return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16);
  }
</script>