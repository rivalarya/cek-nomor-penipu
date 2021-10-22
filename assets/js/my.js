
$(document).ready(function(){

  let disabledOnOff = bool => {
    $("#cari").attr("disabled", bool);
    setTimeout(() => {
      $("#cari").attr("disabled", false);
      
    }, 900);
  }

  $('#cari').click(() => {  
    let str = $('#nomor')[0].value;
    // const divhasil = $('.container.border.border-primary')[0]
    jmlhGambar = 0; // pengreset variabel di fungsi cariBukti
    disabledOnOff(true) // button cari disabled
    if (str == '') {
      Swal.fire({
      icon: 'warning',
      title: 'Masukan nomor',
    })

    } 
 
    if (str != '') showResult(str)
  });

    function showResult(str) {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          const data = JSON.parse(this.responseText);
          if (data <= 0) {
            Swal.fire({
              icon: 'error',
              title: 'Maaf',
              text: 'Nomor tidak ditemukan...',
              footer: `<a href="tambah">Tambahkan nomor?</a>`
          })

          }else{
            console.log(data);
            setTimeout(() => {
              Swal.fire({
              icon: 'success',
              title: 'Nomor ditemukan!'
            })
            }, 700);

            if ($('.container.border.border-primary')[0] != null) $('.container.border.border-primary').remove()

            let tampil = $(`<div class="container border border-primary">
                              <div class="row"> <span class="id_bukti d-none">${data[0].id_bukti}</span>
                                  <div class="col-8 text-left mt-3">				
                                    <h4 class="nomor-telepon-home">
                                       ${data[0].nomor_telepon}
                                    </h4>
                                    <h6>Jumlah Pelapor : <span class="jmlh-pelapor"></span></h6>
                                    <h5 class="lihat-selengkapnya-home">
                                      <a href="nomorditemukan"> Lihat selengkapnya </a>
                                    </h5>
                                  </div>
                                <div class="row row-cols-2 bukti-home">
                                  </div>
                              </div>
                          </div> `);
            $(".container-fluid.wave").after(tampil);

            $('.jmlh-pelapor').text(data.length)
            
            for (let x in data) {
              
              cariBukti(data[x].id_bukti) //ker foto bukti;
            }

          }
        };
      };
      xmlhttp.open("GET", 'home/cari/' + str, true);
      xmlhttp.send();
        
    };

  //kode ker neangan gambar
  let jmlhGambar = 0;
  let countGambar = 1;
  function cariBukti(id_bukti) {

    $.getJSON("home/caribukti/" + id_bukti, function (data) {
      jmlhGambar += data.length;
            
      for (let i in data) {
          if (countGambar >= 5) break; //gmbr lebih dri 4 stop
          let masukanBukti = $(`<img src="./assets/img/bukti/${data[i].bukti}" class="size-bukti-home" data-featherlight="image" href="./assets/img/bukti/${data[i].bukti}" alt="" >`)
          $(".row.row-cols-2").append(masukanBukti);
          countGambar +=1;
      }
      
    }) // end getJSOn    
  }
  

    //ker event pas nomor contoh diklik
    const contoh = $('.contoh')
    contoh.click(() => {
      document.getElementById('nomor').value = 87814685520 // manual
    })

  });
// script ker page nomor ditemukan
$('#ditemukan').ready(() => {

  // setTimeout(() => {
  $.getJSON("nomorditemukan/cari", function (data) {
      
    $('.nomor-telepon-home').text(data[0].nomor_telepon)      
    $('.jmlh-pelapor').text(data.length)
    
    for (let i in data) {
        cariBuktiSelengkapnya(data[i].bukti);
      }

      // ker pelapor
      
      for (let i in data) {
        // console.log("ieu data di pelapor " + data[i].id_bukti)

        let tampil = $(`<div class="row mt-3 mb-3 p-1 border border-primary bg-pelapor">
                              <div class="col-2 d-flex justify-content-center">
                                <img src="./assets/img/user.png" alt="profil" class="profil">
                              </div>
                                <div class="col-7 text-left">				
                                  <h4 class="nama-pelapor">${data[i].nama_pelapor}</h4>
                                  <h6 class="tglkejadian-pelapor">${data[i].tgl_kejadian}</h6>
                                  <p class="keterangan-pelapor ml-1">${data[i].keterangan}</p>
                                </div>
                                <div class="row row-cols-2 bukti-pelapor ${data[i].id_bukti}">
                                </div>
                            </div>`);
        $(".container.pelapor").append(tampil);

        cariBuktiSelengkapnya(data[i].id_bukti); 
      }
      
    }) // end getJSOn
  
})

function cariBuktiSelengkapnya(id) {

  $.getJSON("nomorditemukan/cariselengkapnya/" + id, function (data) {
    console.log("ieu data di seralized ", data)

    // ker bukti semua pelapor foto 
    for (let i in data) {
              
      let masukanBukti = $(`<img src="./assets/img/bukti/${data[i].bukti}" class="size-bukti-home" alt="" data-featherlight="image" href="./assets/img/bukti/${data[i].bukti}">`)
      $(".row.row-cols-2.bukti-semua-pelapor").append(masukanBukti);
    }

    //ker perbaris
    for (let i in data) {
      console.log("ieu data di getJSOn " + data[i].bukti)
            
      let masukanBukti = $(`<img src="./assets/img/bukti/${data[i].bukti}" class="size-bukti-home" alt="" data-featherlight="image" href="./assets/img/bukti/${data[i].bukti}">`)
      $(`.row.row-cols-2.bukti-pelapor.${id}`).append(masukanBukti);
        
    }
  })// end getJSOn
}

// script page tambah 

  //script validation real-time
  const NOMOR_TELEPON = $('[name="nomor_telepon_pelaku"]')
NOMOR_TELEPON.change(() => {
  if (isNaN(NOMOR_TELEPON[0].value)) {
    $('small.ml-2.text-danger.no').removeClass('d-none')
  } else {
    $('small.ml-2.text-danger.no').addClass('d-none')
    }
})

//end script validation real-time

  //script tambah foto
    
  // preview 1
  const bukti1 = document.getElementById('bukti1')
  const thumb1 = document.getElementById('thumb1')
    bukti1.addEventListener("change", function() {
      const file = bukti1.files[0]
      thumb1.src = URL.createObjectURL(file)
    });

    // variabel ker nentuken jumlah foto
    let no = 1;

    $("#tambah").on("click",function(){

          no++;

        let baru = $(`<div class='form-inline justify-content-around border mt-3 mb-3'>
                          <input type='file' class='form-control col-4' name='bukti${no}' id='bukti${no}' required>
                          <img id='thumb${no}'  class='bukti col-7' src=''/>
                          <span id="hapus" class="badge badge-danger w-auto p-2" onclick="hapusfoto(this)"> Hapus </span>
                      </div> `);
        $("#tambahbukti").before(baru);
                      
        //preview 
          const bukti = document.getElementById(`bukti${no}`)
          const thumb = document.getElementById(`thumb${no}`)
          bukti.addEventListener("change", function() {
          const file = bukti.files[0]
              thumb.src = URL.createObjectURL(file)
          });
        

      });

      setInterval(function(){
        if(no >= 3){
          $("#tambah").hide()
          $(".tambah1").show()
        }else{
          $("#tambah").show()
          $(".tambah1").hide()
        }
      },100)

    // end script tambah foto

    // script hapus foto

    function hapusfoto(e) {

      if($(e)[0].parentNode.firstElementChild.name == 'bukti2' && $('#bukti3')[0] != null){

          const ganti = 'bukti2'
          $('#bukti3')[0].name = ganti
          $('#bukti3')[0].attributes.id.value = ganti
          $('#thumb3')[0].attributes.id.value = 'thumb2' 
        
      } else {
        Swal.fire({
            icon: 'error',
            title: 'Ada kesalahan...',
            text: 'Mohon refresh halaman ini.'
          })
      }
      $(e)[0].parentElement.remove()
      no-=1
    }

    // end script hapus foto
// end script page tambah
  