
document.getElementById('cari').addEventListener("click", function() {
 let str = document.getElementById('nomor').value;
    showResult(str)
    console.log(str)
});
document.getElementById('cari').addEventListener("click", function() {
 let str = document.getElementById('nomor').value;
    cekNomorSudahAdaAtauBelum(str)
    console.log(str)
});

  function showResult(str) {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          const data = JSON.parse(this.responseText);
          if (data == '') {
            console.log("data kososng")
          }else{
            console.log(data);
            console.log(str);
            console.log(typeof(data));
            console.log(data[0].id);
          }
        };
      };
      xmlhttp.open("GET", 'home/cari/' + str, true);
      xmlhttp.send();
    };


function cekNomorSudahAdaAtauBelum(str) {
    
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          const data = JSON.stringify(this.responseText);
          console.log(data)
          console.log(typeof(data));
          // maksud data.length > 2 nyaeta mun data aya isian, berarti nomer ges aya
          if (data.length > 2){
            console.log("nomor sudah ada")
          }else{
            console.log("nomor belum ada")
          }
        };
      };
      xmlhttp.open("GET", 'home/ceknomorsudahadaataubelum/' + str, true);
      xmlhttp.send();

  }
  