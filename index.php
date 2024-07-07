<?php
class Mahasiswa
{
    private $mhs = [
        'NIM' => '102220022',
        'Nama' => 'Ahsanu Rohmatika Taqwa',
        'Kelas' => 'TK22A',
        'Durasi Mengerjakan' => '1 jam 30 menit',
        'Waktu Mengerjakan' => '13:00 - 15:00'
    ];

    public function tampil()
    {
        echo '<table class="table table-bordered mb-3">';
        echo '<thead><tr><th>Judul Identitas</th><th style="width: 10px">:</th><th>Isian</th></tr></thead>';
        echo '<tbody>';
        foreach ($this->mhs as $key => $value) {
            echo '<tr><td>' . htmlspecialchars($key) . '</td><td>:</td><td>' . htmlspecialchars($value) . '</td></tr>';
        }
        echo '</tbody></table>';
    }

    public function panggil($php_self)
    {
        echo '<form action="' . htmlspecialchars($php_self) . '" method="post">';
        echo '<div class="form-group mb-3">';
        echo '<label>Pilihan :</label>';
        echo '<select class="form-select" name="option" style="width: 100%;">';
        foreach ($this->mhs as $key => $value) {
            echo '<option value="' . htmlspecialchars($key) . '">' . htmlspecialchars($key) . '</option>';
        }
        echo '</select></div>';
        echo '<button type="submit" class="btn btn-outline-success btn-sm mb-2">Kirim Pesan</button>';
        echo '</form>';
    }

    public function getData($key)
    {
        return $this->mhs[$key] ?? null;
    }
}

$mhs = new Mahasiswa();
$output = '';
$label = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $option = $_POST['option'];
    $output = $mhs->getData($option);
    $label = $option;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <title>UAS Pemrograman Berbasis Objek</title>
</head>

<body class="bg-gradient-teal">
    <div class="container-fluid min-vh-100">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <div class="accordion shadow" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold text-teal" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                UAS PBO || Ahsanu Rohmatika Taqwa || 102220022 || TK22A
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card card-outline card-teal">
                                    <div class="card-body bg-white">
                                        <?php
                                        $mhs->tampil();
                                        $php_self = htmlspecialchars($_SERVER["PHP_SELF"]);
                                        $mhs->panggil($php_self);
                                        ?>
                                        <p id="output">Output : <?= htmlspecialchars($label); ?> Saya <strong class="text-teal"><em><?= htmlspecialchars($output); ?></em></strong> </p>
                                    </div>
                                    <div class="card-footer bg-gradient-teal">
                                        Jawaban UAS Pemrograman Berbasis Objek Semester Genap
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>