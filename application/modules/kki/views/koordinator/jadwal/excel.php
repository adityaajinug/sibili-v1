<?php
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
$file = $title . ".xls";
header("Content-Disposition: attachment;filename=" . basename($file));

header("Pragma: no-chace");

header("Expires: 0");
?>
<h3>Jadwal Ujian KKI</h3>
<table border="1" width="100%">
  <thead>
    <th>No</th>
    <!-- <th>Tanggal</th>
    <th>Waktu</th> -->
    <th>NIM</th>
    <th>Nama</th>
    <th>Dosen Pembimbing</th>
    <th>Ketua Penguji</th>
    <th>Anggota Penguji</th>
    <th>Ruang</th>
  </thead>
  <tbody>

    <?php $no = 1;
    foreach ($scheduleExam as $exam) : ?>


      <tr>
        <!-- <td><?= $no++; ?></td>
        <td>
          <?php $tgl = $exam['schedule_start'];
          echo tgl_indo($tgl); ?>
        </td>
        <td>
          <?php $tgl = $exam['schedule_start'];
          echo waktu_indo($tgl); ?> - Selesai
        </td> <br> -->
        <td><?= $exam['username'] ?></td>
        <td><?= $exam['mhs_name'] ?></td>
        <td><?= $exam['dosen_name'] ?></td>
        <td><?= $exam['assesor_one'] ?></td>
        <td><?= $exam['assesor_two'] ?></td>
        <td><?= $exam['room_exam'] ?></td>
      </tr>

      <br>
      <br>
    <?php endforeach; ?>
  </tbody>
</table>