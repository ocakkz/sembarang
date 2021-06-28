<?php

class barang extends Controller
{
	public function index()
	{

		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_semua_barang();

		$this->rowoon("f_barang/v_daftar_barang", $hasil_select);
	}

	public function detail($nmr_id='')
	{
		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_satu_barang($nmr_id);

		$this->rowoon("f_barang/v_detail_barang", $hasil_select);
	}

	public function proses_hapus()
	{
		$this->ojun("m_barang")->hapus_data($_POST['nmr_id']);
		$this->index();

	}

	public function hapus($nmr_id='')
	{
		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_satu_barang($nmr_id);

		$this->rowoon("f_barang/v_hapus_barang", $hasil_select);
	}

	public function edit($nmr_id)
	{
		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_satu_barang($nmr_id);

		$hasil_select['kategori'] = $this->ojun("m_kategori")->ambil_semua_kategori();

		$this->rowoon("f_barang/v_update_barang", $hasil_select);
	}

	public function proses_update()
	{
		$this->ojun("m_barang")->update_data($_POST);
		$this->index();
	}

	public function tambah()
	{
		$data_for_view['barang'] = [
			'kode' => '',
			'nama' => '',
			'satuan' => '',
			'harga' => '',
			'kategori' => ''
		];

		$data_for_view['kategori'] = $this->ojun('m_kategori')->ambil_semua_kategori();

		$this->rowoon('f_barang/v_tambah_barang', $data_for_view);
	}

	public function proses_tambah()
	{
		$this->ojun('m_barang')->tambah_data($_POST);
		$this->index();
	}

	public function daftar_baru()
	{
		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_semua_barang();
		$this->rowoon("f_barang/v_daftar_barang_baru", $hasil_select);
	}

	public function edit_baru($nmr_id)
	{
		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_satu_barang($nmr_id);

		$hasil_select['kategori'] = $this->ojun("m_kategori")->ambil_semua_kategori();

		$this->rowoon("f_barang/v_update_barang_baru", $hasil_select);
	}

	public function proses_update_baru()
	{
		$this->ojun("m_barang")->update_data($_POST);
		$this->daftar_baru();
	}

	public function detail_baru($nmr_id='')
	{
		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_satu_barang($nmr_id);

		$this->rowoon("f_barang/v_detail_barang_baru", $hasil_select);
	}

	public function hapus_baru($nmr_id='')
	{
		$hasil_select['barang'] = $this->ojun("m_barang")->ambil_satu_barang($nmr_id);

		$this->rowoon("f_barang/v_hapus_barang_baru", $hasil_select);
	}

	public function proses_hapus_baru()
	{
		$this->ojun("m_barang")->hapus_data($_POST['nmr_id']);
		$this->daftar_baru();
	}

	public function tambah_baru()
	{
		$data_for_view['barang'] = [
			'kode' => '',
			'nama' => '',
			'satuan' => '',
			'harga' => '',
			'kategori' => ''
		];

		$data_for_view['kategori'] = $this->ojun('m_kategori')->ambil_semua_kategori();

		$this->rowoon('f_barang/v_tambah_barang_baru', $data_for_view);
	}

	public function proses_tambah_baru()
	{
		$this->ojun('m_barang')->tambah_data($_POST);
		header("location:" . APLIKASI . "/barang/daftar_baru");
	}

}
?>