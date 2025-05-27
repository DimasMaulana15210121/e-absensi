<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gaji Karyawan <?= date('M') ?></title>
</head>

<body>
    <center>
        <h3 style="margin: 0; text-decoration: underline;">Slip Gaji Karyawan</h3>
        <h3 style="margin-bottom: 50px;"><?= date('d-M-Y', strtotime($dataGajiKaryawan['tgl_gajian'])) ?></h3>
    </center>

    <table border="0" cellspacing="0" cellpadding="5" style="width: 100%; margin-top: 20px;">
        <tr>
            <td style="font-weight: bold">Nama :</td>
            <td><?= $dataGajiKaryawan['nama_karyawan'] ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold">Jabatan :</td>
            <td><?= $dataGajiKaryawan['nama_jabatan'] ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold">Alamat :</td>
            <td><?= $dataGajiKaryawan['alamat_rumah'] ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold">Telp :</td>
            <td><?= $dataGajiKaryawan['no_hp'] ?></td>
        </tr>
    </table>

    <hr>

    <table border="0" cellspacing="0" cellpadding="5" style="width: 100%;">
        <thead>
            <tr>
                <th style="text-align: center; vertical-align: top;">Pendapatan</th>
                <th style="vertical-align: top;"></th>
                <th style="text-align: center; vertical-align: top;">Potongan</th>
                <th style="vertical-align: top;"></th>
            </tr>
            <tr>
                <th colspan="4">
                    <hr>
                </th>
            </tr>
        </thead>
        <?php
            // $count = count($data_absen);
            $potong_gaji = $dataGajiKaryawan['potong_gaji'] * $dataGajiKaryawan['total_alpha'];
            $total_pajak = $dataGajiKaryawan['gaji_pokok'] * ($dataGajiKaryawan['pajak']/100);
            $total_pendapatan = $dataGajiKaryawan['gaji_pokok'] + $dataGajiKaryawan['tj_kesehatan'] + $dataGajiKaryawan['tj_transportasi'] + $dataGajiKaryawan['uang_makan'] + $dataGajiKaryawan['bonus_gajian'];
            $total_potongan = $potong_gaji + $dataGajiKaryawan['bpjs'] + $total_pajak;
            $total_gaji = $total_pendapatan - $total_potongan;
        ?>
        <tbody>
            <tr>
                <td style="font-weight: bold; vertical-align: top;">Gaji Pokok :</td>
                <td style="vertical-align: top;">Rp. <?= number_format($dataGajiKaryawan['gaji_pokok'], 0, ".", ".") ?>
                </td>
                <td style="font-weight: bold; vertical-align: top;">Potongan Tidak Hadir :</td>
                <td style="vertical-align: top;">Rp. <?= number_format($potong_gaji, 0, ".", ".") ?>
            </tr>
            <tr>
                <td style="font-weight: bold; vertical-align: top;">Tj. Kesehatan :</td>
                <td style="vertical-align: top;">Rp.
                    <?= number_format($dataGajiKaryawan['tj_kesehatan'], 0, ".", ".") ?></td>
                <td style="font-weight: bold; vertical-align: top;">BPJS :</td>
                <td style="vertical-align: top;">Rp.
                    <?= number_format($dataGajiKaryawan['bpjs'], 0, ".", ".") ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; vertical-align: top;">Tj. Transportasi :</td>
                <td style="vertical-align: top;">Rp.
                    <?= number_format($dataGajiKaryawan['tj_transportasi'], 0, ".", ".") ?></td>
                <td style="font-weight: bold; vertical-align: top;">Pajak :</td>
                <td style="vertical-align: top;">Rp.
                    <?= number_format($total_pajak, 0, ".", ".") ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; vertical-align: top;">Tj. Konsumsi :</td>
                <td style="vertical-align: top;">Rp. <?= number_format($dataGajiKaryawan['uang_makan'], 0, ".", ".") ?>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold; vertical-align: top;">Bonus :</td>
                <td style="vertical-align: top;">Rp. <?= number_format($dataGajiKaryawan['bonus_gajian'], 0, ".", ".") ?>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; vertical-align: top;">Total Pendapatan :</td>
                <td style="vertical-align: top;">Rp. <?= number_format($total_pendapatan, 0, ".", ".") ?></td>
                <td style="font-weight: bold; vertical-align: top;">Total Potongan :</td>
                <td style="vertical-align: top;">Rp. <?= number_format($total_potongan, 0, ".", ".") ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <hr>
                    <hr>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; vertical-align: top;">Jumlah Diterima :</td>
                <td style="vertical-align: top;">Rp. <?= number_format($total_gaji, 0, ".", ".") ?></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


    <hr>

    <p style="margin: 40px 0 60px;">Mengetahui</p>
    <p>Human Resource Development</p>

</body>

</html>