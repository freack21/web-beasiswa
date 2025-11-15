<?php
class BeasiswaController extends Controller
{
  public function index()
  {
    $beasiswaModel = $this->model('Beasiswa');

    $data['jenis_beasiswa'] = $beasiswaModel->getAllJenisBeasiswa();
    $data['title'] = 'Daftar Beasiswa';
    $data['active_page'] = 'daftar';

    $this->view('beasiswa/index', $data);
  }

  public function registrasi()
  {
    $beasiswaModel = $this->model('Beasiswa');
    $data['jenis_beasiswa'] = $beasiswaModel->getAllJenisBeasiswa();
    $data['title'] = 'Registrasi Beasiswa';
    $data['active_page'] = 'registrasi';

    $data['ipk'] = IpkHelper::generateRandom(2.75);
    // $data['ipk'] = 3.4;

    $this->view('beasiswa/registrasi', $data);
  }

  public function daftar()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $berkas = '';
      if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] == 0) {
        $allowed = ['pdf', 'jpg', 'jpeg', 'png', 'zip'];
        $filename = $_FILES['berkas']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
          $newname = time() . '_' . $filename;
          $upload_path = '../public/uploads/' . $newname;

          if (move_uploaded_file($_FILES['berkas']['tmp_name'], $upload_path)) {
            $berkas = $newname;
          }
        }
      }

      $data = [
        'nama' => trim($_POST['nama']),
        'email' => trim($_POST['email']),
        'nomor_hp' => trim($_POST['nomor_hp']),
        'semester' => $_POST['semester'],
        'ipk' => $_POST['ipk'],
        'beasiswa_id' => $_POST['beasiswa_id'],
        'berkas' => $berkas
      ];
      $beasiswaModel = $this->model('Beasiswa');

      if ($beasiswaModel->tambahPendaftaran($data)) {
        header('Location: ' . BASEURL . '/hasil');
        exit;
      } else {
        die('Something went wrong');
      }
    } else {
      $this->redirect('registrasi');
    }
  }

  public function hasil()
  {
    $beasiswaModel = $this->model('Beasiswa');

    $data['pendaftaran'] = $beasiswaModel->getAllPendaftaran();
    $data['title'] = 'Hasil Pendaftaran';
    $data['active_page'] = 'hasil';

    $this->view('beasiswa/hasil', $data);
  }
}
