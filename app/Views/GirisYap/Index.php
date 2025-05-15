<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title><?=lang('GirisYap.sayfa.girisYap').' - '.lang('Genel.yonetimPaneli')?></title>
  <link href="<?=base_url('assets/css/tabler.min.css')?>" rel="stylesheet"/>
  <link rel="icon" href="<?=base_url('favicon.ico')?>">
</head>
<body class="antialiased d-flex flex-column" data-url="<?=base_url()?>">
  <div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
      <div class="text-center mb-4">
        <a href="<?=base_url('GirisYap')?>"><img src="<?=base_url('assets/img/logo.png')?>" height="36" alt=""></a>
      </div>
      <form class="card card-md GirisYap">
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label"><?=lang('Genel.kullaniciAdi')?></label>
            <input type="text" name="name" class="form-control" placeholder="<?=lang('GirisYap.sayfa.kullaniciAdiGir')?>">
          </div>
          <div class="mb-2">
            <label class="form-label"><?=lang('Genel.sifre')?></label>
            <div class="input-group input-group-flat">
              <input type="password" name="password" class="form-control"  placeholder="<?=lang('GirisYap.sayfa.sifreGiriniz')?>" autocomplete="off">
              <span class="input-group-text">
                <a href="javascript:void(0)" class="link-secondary sifreyiGoster" title="<?=lang('Genel.sifreyiGoster')?>" data-bs-toggle="tooltip">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                </a>
              </span>
            </div>
          </div>
          <div class="mt-3">
            <label class="form-check">
              <input type="checkbox" name="remember" checked class="form-check-input"/>
              <span class="form-check-label"><?=lang('GirisYap.sayfa.beniHatirla')?></span>
            </label>
          </div>
          <input type="hidden" name="<?=csrf_token()?>" value="<?=csrf_hash()?>">
          <div class="form-footer mt-3">
            <button type="submit" class="btn btn-primary w-100"><?=lang('GirisYap.sayfa.girisYap')?></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="site_loading">
    <div class="sk-chase">
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
    </div>
  </div>
  <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/js/tabler.min.js')?>"></script>
  <script src="<?=base_url('assets/js/toastr.min.js')?>"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.sifreyiGoster').on('click',function(e) {
      if ($('[name="password"]').attr('type')=="text") {
        $('[name="password"]').attr('type','password');
      }else {
        $('[name="password"]').attr('type','text');
      }
    });
    $('.GirisYap').on('submit', function(e){
      var data = new FormData(this);
      var url = $("body").data("url");
      $.ajax({
        type: "post",
        url: url+"/GirisYap/GirisYap",
        contentType: false,
        processData: false,
        data: data,
        beforeSend: function(){
          $(".site_loading").show();
        },
        success: function(response){
          if (response.error) {
            toastr["error"](response.error);
          }else {
            window.location.href = url+"/Anasayfa/Index";
          }
        },
        complete: function(){
          $(".site_loading").hide();
        },
        dataType: "json"
      })
      .fail(function(response) {
        toastr["error"](response.responseJSON.message);
      });
      e.preventDefault();
    });
  });
  <?php $alert = session()->getFlashdata('alert')  ?>
  <?php if ($alert): ?>
  toastr["<?=$alert['type']?>"]("<?=$alert['text']?>");
  <?php endif; ?>
</script>
</body>
</html>
