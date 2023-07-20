<!-- application/views/edit_program_studi.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Program Studi</title>
</head>
<body>
    <h2>Edit Data Program Studi</h2>

    <?php
    // Mengecek apakah ada data programstudi yang dikirimkan dari controller
    if(isset($programstudi)) {
        // Jika ada, gunakan data tersebut untuk mengisi nilai awal form
        $nama = $programstudi['nama'];
        $program_pendidikan = $programstudi['program_pendidikan'];
        $akreditasi = $programstudi['akreditasi'];
        $sk_akreditasi = $programstudi['sk_akreditasi'];
    } else {
        // Jika tidak ada, set nilai awal form ke kosong
        $nama = '';
        $program_pendidikan = '';
        $akreditasi = '';
        $sk_akreditasi = '';
    }
    ?>

    <!-- edit_program_studi.php -->
    <form method="post" action="<?php echo base_url('programstudi/update/' . $programstudi['id']); ?>">
        <label for="nama">Nama Program Studi:</label>
        <input type="text" name="nama" value="<?php echo $programstudi['nama']; ?>"><br>

        <label for="program_pendidikan">Program Pendidikan:</label>
        <input type="text" name="program_pendidikan" value="<?php echo $programstudi['program_pendidikan']; ?>"><br>

        <label for="akreditasi">Akreditasi:</label>
        <input type="text" name="akreditasi" value="<?php echo $programstudi['akreditasi']; ?>"><br>

        <label for="sk_akreditasi">SK Akreditasi:</label>
        <input type="text" name="sk_akreditasi" value="<?php echo $programstudi['sk_akreditasi']; ?>"><br>

        <!-- Menampilkan semua data program studi dalam bentuk dropdown -->
        <div class="formel fulls">
            <label for="program_studi">Pilih Program Studi</label>
            <select name="program_studi">
                <?php foreach ($all_programstudi as $program): ?>
                    <option value="<?= $program['id']; ?>" <?php if ($program['id'] == $programstudi['id']) echo 'selected'; ?>>
                        <?= $program['nama']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" value="Update">
    </form>
</body>
</html>
