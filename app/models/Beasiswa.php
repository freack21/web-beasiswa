<?php
class Beasiswa
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllJenisBeasiswa()
  {
    $this->db->query('SELECT * FROM jenis_beasiswa ORDER BY id ASC');
    return $this->db->resultSet();
  }

  public function getJenisBeasiswaById($id)
  {
    $this->db->query('SELECT * FROM jenis_beasiswa WHERE id = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function tambahPendaftaran($data)
  {
    $this->db->query('INSERT INTO pendaftaran (nama, email, nomor_hp, semester, ipk, beasiswa_id, berkas, status_ajuan) 
                         VALUES (:nama, :email, :nomor_hp, :semester, :ipk, :beasiswa_id, :berkas, :status_ajuan)');

    $this->db->bind(':nama', $data['nama']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':nomor_hp', $data['nomor_hp']);
    $this->db->bind(':semester', $data['semester']);
    $this->db->bind(':ipk', $data['ipk']);
    $this->db->bind(':beasiswa_id', $data['beasiswa_id']);
    $this->db->bind(':berkas', $data['berkas']);
    $this->db->bind(':status_ajuan', 'belum di verifikasi');

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getAllPendaftaran()
  {
    $this->db->query('SELECT p.*, j.nama_beasiswa 
                         FROM pendaftaran p 
                         LEFT JOIN jenis_beasiswa j ON p.beasiswa_id = j.id 
                         ORDER BY p.created_at DESC');
    return $this->db->resultSet();
  }

  public function getPendaftaranById($id)
  {
    $this->db->query('SELECT p.*, j.nama_beasiswa 
                         FROM pendaftaran p 
                         LEFT JOIN jenis_beasiswa j ON p.beasiswa_id = j.id 
                         WHERE p.id = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
  }
}
