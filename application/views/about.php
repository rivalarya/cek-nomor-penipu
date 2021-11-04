<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	
</head>
<body>
<div class="blob">
  <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
  <path fill="#08D9D6" d="M46.1,-60.1C59.7,-53.5,70.6,-40,75.3,-24.7C80,-9.3,78.5,7.8,68.7,17.5C59,27.2,40.9,29.4,28.1,36.6C15.3,43.9,7.6,56.2,-2.8,60C-13.1,63.8,-26.3,59,-39.1,51.8C-51.8,44.5,-64.2,34.7,-64.9,23.2C-65.7,11.8,-54.8,-1.2,-51.2,-17.9C-47.5,-34.6,-51,-54.8,-43.7,-63.4C-36.4,-72,-18.2,-68.9,-1,-67.6C16.2,-66.2,32.5,-66.6,46.1,-60.1Z" transform="translate(100 100)" />
</svg>
</div>
<div class="blob1">
  <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
  <path fill="#FF2E63" d="M46.1,-60.1C59.7,-53.5,70.6,-40,75.3,-24.7C80,-9.3,78.5,7.8,68.7,17.5C59,27.2,40.9,29.4,28.1,36.6C15.3,43.9,7.6,56.2,-2.8,60C-13.1,63.8,-26.3,59,-39.1,51.8C-51.8,44.5,-64.2,34.7,-64.9,23.2C-65.7,11.8,-54.8,-1.2,-51.2,-17.9C-47.5,-34.6,-51,-54.8,-43.7,-63.4C-36.4,-72,-18.2,-68.9,-1,-67.6C16.2,-66.2,32.5,-66.6,46.1,-60.1Z" transform="translate(100 100)" />
</svg>
</div>
<div class="container text-center">
    <h1 class="text-center justify-content-center versi">Cek Nomor Penipu</h1>
    <div class="col text-center justify-content-center">
      <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item bg-white">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Halaman Github</a>
        </li>
        <li class="nav-item bg-white">
          <a class="nav-link" id="kontak-tab" data-toggle="tab" href="#kontak" role="tab" aria-controls="kontak" aria-selected="false">Kontak</a>
        </li>
      </ul>
      
      <div class="tab-content bg-white" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="card text-center">
            <div class="card-body shadow p-3 mb-5 bg-white rounded">
                <h5 class="card-title">Bantu saya mengembangkan project ini</h5>
                <p class="card-text">Jika teman-teman terpikirkan untuk menambah fitur, menemukan bug, atau apapun itu, silahkan ke link github project ini.</p>
                <a href="https://github.com/rifalarya-2/cek-nomor-penipu.git" target="_blank" class="btn btn-primary">Link Github</a>
            </div>
          </div>
        </div>
        
        <div class="tab-pane fade border" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
          <div class="container">
              <div class="col">
                <div class="card text-left">
                  <div class="card-body rounded">
                    <div class="whatsapp">
                      <a href="https://wa.me/6283827468104/"><img src="<?= base_url('assets/img/wa.svg') ?>" alt="Kirim pesan ke Whatsapp"></a>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
    </div>
    <div class="row text-center justify-content-center">

    </div>
</div>

<footer class="fixed-bottom">&copy Rival</footer>

<script>const path = ["M36.6,-52.2C48.1,-42.1,58.5,-32.2,58.7,-21.5C58.9,-10.7,48.9,1,45.6,16C42.4,31.1,45.9,49.5,39.4,55.9C32.9,62.2,16.4,56.5,-0.2,56.8C-16.8,57.1,-33.6,63.3,-46.5,59C-59.4,54.7,-68.3,39.9,-70,25C-71.7,10.1,-66.2,-4.8,-57.8,-15.1C-49.3,-25.3,-37.9,-30.9,-27.8,-41.5C-17.7,-52.1,-8.8,-67.6,1.9,-70.2C12.6,-72.8,25.2,-62.4,36.6,-52.2Z", "M35.7,-54.3C43.7,-43.3,45.7,-29.4,46.2,-17.5C46.7,-5.6,45.5,4.4,46.7,19.7C47.9,34.9,51.6,55.4,44.2,69.2C36.8,82.9,18.4,89.9,0.6,89.1C-17.3,88.3,-34.5,79.8,-50.1,68.7C-65.7,57.6,-79.6,44,-83.9,27.9C-88.2,11.8,-82.9,-6.7,-73.3,-19.9C-63.6,-33.2,-49.6,-41.1,-36.7,-50.4C-23.7,-59.8,-11.9,-70.6,1,-71.9C13.9,-73.3,27.7,-65.3,35.7,-54.3Z", "M29.6,-38.9C37.9,-34.6,44,-25.5,53.2,-13.5C62.4,-1.4,74.7,13.4,71.9,23.8C69.2,34.3,51.4,40.3,36.9,48.7C22.4,57.2,11.2,68.1,-1.2,69.7C-13.6,71.3,-27.1,63.6,-37.5,53.8C-47.8,44,-54.9,32.1,-63.4,17.8C-71.9,3.5,-81.6,-13.1,-77.3,-24.7C-72.9,-36.3,-54.4,-42.8,-39.2,-44.8C-23.9,-46.9,-12,-44.4,-0.7,-43.4C10.6,-42.5,21.2,-43.2,29.6,-38.9Z", "M45.8,-56.8C57.7,-54.3,64.9,-38.8,68.9,-23.1C73,-7.5,74,8.5,67.9,20.5C61.9,32.6,48.7,40.8,36.2,43.2C23.7,45.5,11.9,42.1,1.2,40.5C-9.6,38.9,-19.1,39.2,-32.1,37C-45.1,34.8,-61.6,30.1,-70.8,18.9C-79.9,7.8,-81.8,-9.7,-75.5,-23C-69.1,-36.4,-54.4,-45.5,-40.4,-47.4C-26.5,-49.3,-13.2,-44,1.8,-46.5C16.9,-49,33.8,-59.3,45.8,-56.8Z", "M42.4,-55.6C51.6,-51.7,53.3,-34.8,57.9,-19.2C62.5,-3.5,70,10.8,66.2,21.2C62.3,31.5,47.2,37.8,34.3,50C21.4,62.1,10.7,80,-2,82.7C-14.6,85.4,-29.2,72.9,-39.1,59.8C-48.9,46.6,-54,32.9,-53.2,20.7C-52.5,8.5,-46.1,-2.2,-44.3,-16.4C-42.5,-30.7,-45.3,-48.4,-38.7,-53.2C-32.1,-58,-16,-49.8,0.3,-50.2C16.6,-50.6,33.2,-59.6,42.4,-55.6Z", "M32.5,-44.6C41.3,-38.2,47.3,-27.8,50.2,-16.8C53,-5.9,52.8,5.6,51.7,19.2C50.6,32.8,48.7,48.6,39.9,60.3C31.2,72,15.6,79.7,3.4,75C-8.7,70.3,-17.5,53.2,-27.2,41.8C-37,30.4,-47.8,24.7,-52,15.9C-56.2,7.1,-53.8,-4.8,-51.6,-18.4C-49.4,-32.1,-47.5,-47.5,-39,-54C-30.4,-60.5,-15.2,-58.2,-1.7,-55.8C11.8,-53.5,23.6,-51.1,32.5,-44.6Z"];
setInterval(() => {
  const randomPath = Math.floor(Math.random() * path.length)
  
    $('svg')[0].childNodes[1].attributes[1].value = path[randomPath]
    $('svg')[1].childNodes[1].attributes[1].value = path[randomPath]
 
}, 3100);</script>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/my.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

</body>
</html>