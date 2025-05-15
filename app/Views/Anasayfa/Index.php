<?=view('Static/Header')?>
<div class="container-xl">
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h1 class="page-title"><?=lang('Anasayfa.sayfa.anasayfa')?></h1>
      </div>
    </div>
  </div>
  <?php if (IsAllowedViewModule('anasayfaOnlineGorebilsin') && p2pStatus==1 && p2pStatistics==1): ?>
    <div class="row row-cards">
      <div class="col-12">
        <div class="card">
          <div class="card-body pt-2">
            <button class="btn btn-primary IstatistikGetir px-2" style="position:absolute;right:15px;">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path></svg>
            </button>
            <div class="text-center onlineCountTable mt-2 mb-3">
              <h4><?=lang('Anasayfa.sayfa.toplamOyuncuSayisi')?> : 0</h4>
            </div>
            <table class="table text-center">
              <thead>
                <th><?=lang('Genel.kanal')?></th>
                <th>Shinsoo</th>
                <th>Chunjo</th>
                <th>Jinno</th>
                <th><?=lang('Genel.toplam')?></th>
              </thead>
              <tbody id="onlineCount">
                <tr>
                  <td colspan="5">-</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
<?=view('Static/Footer')?>
<?php if (IsAllowedViewModule('anasayfaOnlineGorebilsin') && p2pStatus==1 && p2pStatistics==1): ?>
  <script type="text/javascript">
  $(document).ready(function(){
    const url = $('body').data('url');
    $('.IstatistikGetir').on('click',function (e) {
      $.ajax({
        type: "get",
        url: url+'/Anasayfa/OnlineCount',
        success: function(response){
          $('.onlineCountTable').html(response.total);
          $('#onlineCount').html("");
          $.each(response.chTR, function(index, val) {
            $('#onlineCount').append(val);
          });
          $('#onlineCount').append(response.totalTr);
        },
        dataType: "json"
      });
    });
  });
  </script>
<?php endif; ?>
