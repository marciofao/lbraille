function getIdade(data_nasc){
    //http://jsfiddle.net/gaby/XDKa3/1/
    var birth = new Date(data_nasc);
    var check = new Date();
    var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;
    var ageInDays = (check - birth) / milliDay;
    var age =  Math.floor(ageInDays / 365 );
    window.document.write(age);
  }