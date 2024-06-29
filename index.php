<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="src/adminlte.min.css">

    <title>Uas Pemrograman Berbasis Objek</title>
</head>

<body>
    <?php

    use PhpParser\Node\Expr\New_;
    use ThimPress\Customizer\Modules\CSS\Output;

    class Data
    {
        private $data;

        public function __construct()
        {
            $this->data = [
                'NIM' => '102220022',
                'Nama' => 'Ahsanu Rohmatika Taqwa',
                'Kelas' => 'TK22A',
                'Durasi mengerjakan' => '1 jam 30 menit',
                'Waktu mengerjakan' => '13:00 - 15:00'
            ];
        }

        public  function getData($key)
        {
            return $this->data[$key] ?? null;
        }

        public function getAllData()
        {
            return $this->data;
        }
    }

    $dataMHS = new Data();
    $data = $dataMHS->getAllData();
    $output = '';
    $label = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $option = $_POST['option'];
        $output = $dataMHS->getData($option);
        $label = $option;
    }
    ?>

    <div class="container-fluid bg-gradient-teal vh-100">
        <div class="row justify-content-center align-items-center vh-100">
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
                                        <table class="table table-bordered mb-3">
                                            <thead>
                                                <tr>
                                                    <th>Judul Identitas</th>
                                                    <th style="width: 10px">:</th>
                                                    <th>Isian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $key => $value) : ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($key); ?></td>
                                                        <td>:</td>
                                                        <td><?= htmlspecialchars($value) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <form action="" method="post">
                                            <div class="form-group mb-3">
                                                <label>Pilihan :</label>
                                                <select class="form-select" name="option" style="width: 100%;">
                                                    <option value="NIM" selected="selected">NIM</option>
                                                    <option value="Nama">Nama</option>
                                                    <option value="Kelas">Kelas</option>
                                                    <option value="Durasi mengerjakan">Durasi Mengerjakan</option>
                                                    <option value="Waktu mengerjakan">Waktu Mengerjakan</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-outline-success btn-sm mb-2">
                                                Kirim Pesan
                                            </button>
                                        </form>

                                        <p id="output">Output : <?= htmlspecialchars($label); ?> Saya <strong class="text-teal"><em><?= htmlspecialchars($output); ?></em></strong> </p>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer bg-gradient-teal">
                                        Jawaban UAS Pemrograman Berbasis Objek Semester Genap
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- accordion -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="src/adminlte.min.js"></script>
</body>

</html>