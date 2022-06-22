<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Ujian <?= $scheduleId->schedule_name ?> Semester <?php if ($semester['genap'] != 1) {
                                                                    echo "Ganjil";
                                                                  } else if ($semester['genap'] == 1) {
                                                                    echo "Genap";
                                                                  } ?> T.A <?= $semester['year'] ?></title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }

    .date-time {
      text-align: center;
      margin-top: 10px;
      font-size: 16px;
    }

    .title1,
    .title2 {
      font-size: 30px;
      font-weight: bold;
      margin-bottom: 10px;

    }



    .table1 {
      font-family: sans-serif;
      color: #232323;
      border-collapse: collapse;
      margin-left: auto;
      margin-right: auto;
    }

    .table1,
    th,
    td {
      border: 1px solid #999;
      padding: 7px 15px;
      font-size: 13px;
    }
  </style>
</head>

<body>
  <!-- <?php var_dump($semester) ?> -->

  <div class="title">
    <div class="title1" style="text-align: center;">Jadwal Ujian <?= $scheduleId->schedule_name ?> Teknik Informatika D3 <br> </div>
    <div class="title2" style="text-align: center;">Semester <?php if ($semester['genap'] != 1) {
                                                                echo "Ganjil";
                                                              } else if ($semester['genap'] == 1) {
                                                                echo "Genap";
                                                              } ?> T.A <?= $semester['year'] ?> </div>
  </div>
  <div class="date-time" style="display: flex; justify-content:space-between">
    <div class="tgl">
      Hari, Tanggal : <?php
                      $tgl = $scheduleId->schedule_start;
                      echo tgl_indo($tgl);
                      ?>

    </div>
    <div class="time" style="margin-top: 5px;margin-bottom:5px">
      Jam : <?php
            $time = $scheduleId->schedule_start;
            echo waktu_indo($time);
            ?> - Selesai
    </div>

  </div>
  <table class="table1">
    <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Dosen Pembimbing</th>
        <th>Ketua Penguji</th>
        <th>Anggota Penguji</th>
        <th>Room</th>

      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($jad as $m) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $m->username ?></td>
          <td><?= $m->mhs_name ?></td>
          <td><?= $m->dosen_name ?></td>
          <td><?= $m->assesor_one ?></td>
          <td><?= $m->assesor_two ?></td>
          <td><?= $m->room_exam ?></td>

        </tr>


      <?php endforeach; ?>
    </tbody>

  </table>

  <p style="font-weight: bold; margin-top: 50px;">Peraturan Ujian :</p>
  <ol style="margin-top: 5px;">
    <?php foreach ($rules as $r) : ?>
      <li><?= $r['rules'] ?></li>
    <?php endforeach; ?>

  </ol>



</body>

</html>