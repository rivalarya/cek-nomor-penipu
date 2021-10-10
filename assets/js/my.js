$(document).ready(function(){
  
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
            console.log("data kosong")
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

  });

//script tambah foto
  
// preview 1
const bukti1 = document.getElementById('bukti1')
const thumb1 = document.getElementById('thumb1')
  bukti1.addEventListener("change", function() {
    const file = bukti1.files[0]
    thumb1.src = URL.createObjectURL(file)
  });

  // variabel ker nentuken jumlah foto
  let no = 2;

    $("#tambah").click(function(){

      if(no < 4){

      let baru = $(`<div class='form-inline justify-content-around border mt-3 mb-3'>
                        <input type='file' class='form-control col-4' name='bukti${no}' id='bukti${no}' required>
                        <img id='thumb${no}'  class='bukti col-7' src=''/>
                        <span id="hapus" class="badge badge-danger w-auto p-2" onclick="hapusfoto(this)"> Hapus </span>
                    </div> `);
      $("#tambah").before(baru);
                    
      //preview 
        const bukti = document.getElementById(`bukti${no}`)
        const thumb = document.getElementById(`thumb${no}`)
        bukti.addEventListener("change", function() {
        const file = bukti.files[0]
            thumb.src = URL.createObjectURL(file)
        });
       

        no++;
       
      }

    });

    setInterval(function(){
      if(no > 3){
        $("#tambah").hide();
      }else{
        $("#tambah").show();
      }
    },100)

  // end script tambah foto

  // script hapus foto

  function hapusfoto(e) {
    $(e)[0].parentElement.remove()
     no-=1
  }

  // end script hapus foto
