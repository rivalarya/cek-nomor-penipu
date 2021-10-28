$(document).ready(function () {
  let disabledOnOff = bool => {
    $(".btn-cari").attr("disabled", bool);
    //ketika tombol cari di klik, off kan sementara
    setTimeout(() => {
      $(".btn-cari").attr("disabled", false);
      
    }, 900);
  }

// cek koneksi internet ada atau tidak ketika tiap mengklick
  $(document).click(function () {
         if (!navigator.onLine) {
        // jika user offline, munculkan alert
            swal.fire({
            title: 'Tidak ada Internet',
            timer: 1300,
            showConfirmButton: false,
            willOpen: function () {
              swal.showLoading()
            }
          })
        }
  });

    //ker event pas nomor contoh diklik
    const contoh = $('u.contoh')
    contoh.click(() => {
      $('.searchnomor').val('87814685520') // manual
    })
  
  $('.btn-cari').click(() => {  
    let str = $('.searchnomor')[0].value;
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

  });
// script ker page nomor ditemukan
$('.nomor_ditemukan').ready(() => {

  $.getJSON("nomorditemukan/cari", function (data) {
      
    $('.nomor-telepon-home').text(data[0].nomor_telepon)      
    $('.jmlh-pelapor').text(data.length)
    
    for (let i in data) {
        cariBuktiSelengkapnya(data[i].bukti);
      }

      // ker pelapor
      
      for (let i in data) {

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

    // ker bukti semua pelapor foto 
    for (let i in data) {
              
      let masukanBukti = $(`<img src="./assets/img/bukti/${data[i].bukti}" class="size-bukti-home" alt="" data-featherlight="image" href="./assets/img/bukti/${data[i].bukti}">`)
      $(".row.row-cols-2.bukti-semua-pelapor").append(masukanBukti);
    }

    //ker perbaris
    for (let i in data) {
            
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

//ketika gambar dipilih, ganti kalimat 'pilih bukti' jadi sesuai dengan nama file yg dipilih
const gantiLabel = (e) => e.labels[0].textContent = e.files[0].name

// kosongkan inputan ketika di submit
  
  $(`#formTambah`).submit(() => {
    $(`[name='kirim']`).attr('disabled', true)
    $(`[name='kirim']`).css('cursor', 'wait')
    $(`[name='kirim']`).text('Mengirim...')
    setTimeout(() => {
      $('input[type="text"],input[type="date"],input[type="file"], textarea').val('');
      $('#thumb1').attr('src', '');
      $('#thumb2').attr('src', '');
      $('#thumb3').attr('src', '');
    
    }, 400);

})

  //script tambah foto
    
  // preview 1
  const bukti1 = $('#bukti1')
  const thumb1 = $('#thumb1')
    $('#bukti1').change(function() {
      const file = bukti1[0].files[0]
      thumb1.attr({ 'href': URL.createObjectURL(file), 'src': URL.createObjectURL(file)})
    });

    // variabel ker nentuken jumlah foto
    let no = 1;

    $("#tambah").on("click",function(){

          no++;

        let baru = $(`<div class="form-inline justify-content-around border p-1 mt-3 mb-3">            
                    <div class="custom-file col-5">
                        <input type="file" class="custom-file-input" name='bukti${no}' id='bukti${no}' onchange="gantiLabel(this)" required>
                        <label class="custom-file-label justify-content-start" for="bukti${no}">Pilih bukti...</label>
                    </div>
                    <img id='thumb${no}' data-featherlight="image" class="bukti col-7" src=""/>
                    <span id="hapus" class="badge badge-danger w-auto p-2" onclick="hapusfoto(this)"> Hapus </span>
                </div>`);
        $("#tambahbukti").before(baru);
                      
      //preview 
      const bukti = $(`#bukti${no}`)
      const thumb = $(`#thumb${no}`)
       bukti.change(function() {
          const file = bukti[0].files[0]
          thumb.attr({ 'href': URL.createObjectURL(file), 'src': URL.createObjectURL(file)})
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

      if(e.parentNode.firstElementChild.firstElementChild.name == 'bukti2' && $('#bukti3')[0] != null){

        $('#bukti3')[0].labels[0].attributes.for.nodeValue = 'bukti2'
        $('#bukti3')[0].name = 'bukti2'
        $('#bukti3')[0].attributes.id.value = 'bukti2'
        $('#thumb3')[0].attributes.id.value = 'thumb2'
        
      }
      
      $(e)[0].parentElement.remove()
      no-=1
    }

    // end script hapus foto
// end script page tambah
  