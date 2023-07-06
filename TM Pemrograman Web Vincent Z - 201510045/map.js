function loadmap(){
    // The location of nikaweratiya public library
    var nps = { lat: 7.7594867, lng: 80.1255858 };
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: nps,
      });
  
    // The marker, positioned at nikaweratiya public library
    var marker = new google.maps.Marker({
      position: nps,
      map: map,
    });
  }
