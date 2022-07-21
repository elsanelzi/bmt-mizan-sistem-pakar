<script>
  $(document).ready(function() {
    $(".divs > div").each(function(e) {
      if (e != 0)
        $(this).hide();
    });

    $("#next").click(function() {
      if ($(".divs div:visible").next().length != 0) {
        $(".divs div:visible").next().show().prev().hide();

        if ($(".divs div:visible").next().length == 0) {
          //1. Hide the two buttons
          $("#next, #prev").hide();

          //3. Show the results
          var divs = $(".divs div:visible").prevAll().clone();
          divs.show();

          //Reverse the order
          var divs = jQuery.makeArray(divs);
          divs.reverse();
          $(".your-quiz-result")
            .empty()
            .append(divs);
        }
      }
      return false;
    });


    $('.soalf').click(function() {
      var nomor = $(this).attr('data-nomor_soal'); // nomor soal di button
      var nomor2 = $('.divs div:visible').attr('data-nomor_soal2'); // nomor soal yg tampil
      konten = $("." + nomor + "");
      konten2 = $("." + nomor2 + "");
      indexlast = $("." + nomor2 + "").attr('data-indexs');
      if (nomor == nomor2) {
        // button nomor soal sudah sesuai dengan soal yg tampil

      } else {
        konten.show();
        konten2.hide();
      }
      console.log(nomor, nomor2, indexlast);
    });
  });
</script>
<script type="">
  $('.swal-jawab').click(function() {
    var id_ubah = $(this).attr('data-id');
    var blabla = $(this).attr('data-blabla');
    var ur = "/ujian-soal-siswa/"+id_ubah+"";
    swal({
      title: "Kumpulkan ujian?",
      text: "Selesaikan ujian dan kumpul!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $("#formnya").submit();
        swal("Good Luck!", {
          icon: "success",
        });
      } else {
        swal("Tidak jadi mengumpulkan ujian");
      }
    });
  });
</script>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">huhu</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">hah</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">hii</div>
</div>

<ul class="nav nav-tabs">
  <li class="active"><a href="#pending" class="nav-link active" data-toggle="tab">Pending</a></li>
  <li><a href="#diproses" class="nav-link" data-toggle="tab">Diproses</a></li>
  <li><a href="#dicancel" class="nav-link" data-toggle="tab">Dicancel Pelanggan</a></li>
  <li><a href="#dicancel_admin" class="nav-link" data-toggle="tab">Dicancel Admin</a></li>
  <li><a href="#konfirmasi_bayar" class="nav-link" data-toggle="tab">Konfirmasi Bayar</a></li>
  <li><a href="#dikirim" class="nav-link" data-toggle="tab">Dikirim</a></li>
  <li><a href="#selesai" class="nav-link" data-toggle="tab">Selesai</a></li>
</ul>