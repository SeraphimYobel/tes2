<style>
	.wrap {
		padding: 2em 0 1em 0;
		display: flex;
		gap: 2em;
		align-items: flex-end;
	}

	.fulls {
		flex: 1;
	}

	.btnarea {
		display: flex;
		justify-content: flex-end;
		align-items: center;
		gap: 2em;
		padding: 1em 0;
	}

	.btnarea-nopad {
		padding: 0;
	}

	.btnarea>button {
		transition: all 0.3s ease;
		background: #0079FF;
		cursor: pointer;
		color: white;
		border: none;
		padding: .75em 1.5em;
		border-radius: 0.5em;
	}

	.btnarea>a {
		color: #0079FF
	}

	.btnarea>button:hover {
		background: #015cc5;
	}

	.btnarea>button:active {
		transform: translateY(0.2em);
	}

	.successmessage {
		margin: 1em 0;
		padding: 0.7em;
		border-radius: 0.3em;
		display: block;
		text-align: center;
		color: #1B9C85;
		background: #f5fffd;
	}

	form {
		margin: 0;
	}

	.formel>button,
	.headprint>button {
		transition: all 0.3s;
		padding: 0.75em 1.4em;
		background: #0079FF;
		cursor: pointer;
		color: white;
		border: none;
		border-radius: 0.5em;
	}

	.formel>button:hover,
	.headprint>button:hover {
		background: #0055b6;
	}

	.warnmessage {
		color: #FF0060;
		background: #ffeaf2;
		border-radius: 0.5em;
		margin: 0.5em 0;
		text-align: center;
		padding: 0.75em;
	}

	.headers {
		animation: show 0.5s ease;
		display: flex;
		gap: 1.5em;
		align-items: center;
		margin: 1.5em 0;
	}

	.headers>div {
		flex: 1;
	}

	.mahasiswainfo>h5 {
		font-size: 1.5em;
	}

	.mahasiswainfo>p {
		margin-top: 0.3em;
		opacity: 0.6;
	}

	.headprint {
		display: flex;
		justify-content: center;
		align-items: flex-start;
		gap: 1em;
	}

	.tbox {
		padding: 1.5em 0 !important;
	}

	.infos {
		padding: 1.5em 0;
		display: flex;
		width: 100%;
		flex-direction: column;
		align-items: center;
		gap: 0.7em;
	}

	.infos>img {
		filter: grayscale(20%);
	}

	.infos>h3 {
		color: crimson;
		font-weight: 400;
		margin-top: 0.5em;
		font-size: 1.4em;
	}

	.infos>h3>i {
		font-size: 1.2em;
		transform: translateY(0.06em);
	}

	.boxijazah {
		position: fixed;
		top: 0;
		left: 0;
		padding: 1em;
		width: 100%;
		height: 100%;
		background: rgba(20, 20, 20, 0.5) !important;
		border-radius: 0 !important;
		animation: show 0.5s ease;
	}

	.formijazah {
		font-family: Calibri;
		font-size: 11px !important;
		height: 100%;
		border-radius: 0.3em;
		background: white;
		padding: 1.5em 2.5em;
		font-size: 1.3em;
		line-height: 1.5;
	}

	.between {
		display: flex;
		align-items: flex-end;
		justify-content: space-between;
	}

	.between>p {
		font-weight: 600;
	}

	.text-center {
		text-align: center;
	}

	.between>div {
		width: 20em;
	}

	.text-center>h1 {
		font-size: 26px;
		font-family: none;
		margin-top: 0.5em;
	}

	.wrap-center {
		padding: 3em 4em;
		display: flex;
		gap: 5em;
	}

	.bots {
		margin: 1em 0;
	}

	.pads {
		padding: 0em 1.5em 2em 1.5em;
		text-align: justify;
	}
	.watermark{
		position: absolute;
		display: flex;
		align-items: center;
		justify-content: center;
		width: 100%;
		height: 100%;
	}
	.watermark>img{
		opacity: 0.1;
	}
	.ijazahcontent{
		padding: 1em;
		background: white;
		border-radius: 0.5em;
	}
	.wraptranskrip{
		display: flex;
		gap: 1em;
	}
	.ijazahcontent{
		font-size: 11px !important;
	}
	@media print {
		body {
			font-size: 12pt;
		}
		.no-print {
			display: none;
		}
	}
	.tablewraps{
		display: flex;
		gap: 1em;
	}
	.tablewraps>div{
		flex: 1;
	}
</style>

<?php
// Fungsi untuk mendapatkan nomor acak antara 100 hingga 1000
function getRandomNumber() {
    return rand(100, 1000);
}

// Mendapatkan nomor seri dan nomor ijazah secara acak
$nomorSeri = getRandomNumber();
$nomorIjazah = getRandomNumber();
?>

<div id="appss"></div>
<script type="text/babel">
	const { useState, useEffect } = React
	const App = () => {
		const [mahasiswaInfo, setMahasiswaInfo] = useState(null)
		const [mahasiswaNotFound, setMahasiswaNotFound] = useState(false)
		const [listNilai, setListNilai] = useState([])
		const [onStart, setOnStart] = useState(true)
		const [isPrintIjazah, setIsPrintIjazah] = useState(false)
		const [isPrintTranskrip, setIsPrintTranskrip] = useState(false)
		// get detail list nilai
		const getDetailTranskrip = id => {
			$.ajax({
				url: `<?=base_url()?>index.php/Penilaian/get_all_penilaian`,
				method: 'GET',
				success: data => {
					let allData = JSON.parse(data)
					let filteredDataByIdMhs = allData.filter(it => it.tarunaid == id)
					setListNilai(filteredDataByIdMhs)
				},
				error: () => {
					alert('Gagal mendapatkan data penilaian')
				}
			})
		}
		// search mahasiswa
		const handleSearchMahasiswa = e => {
			e.preventDefault()
			$.ajax({
				url: "<?=base_url()?>index.php/DosenMahasiswa/get_all_mahasiswa",
				method: 'GET',
				success: data => {
					let allData = JSON.parse(data)
					let filteredData = allData.filter(it => it.nomor_taruna.includes($('[name="nim"]').val()))
					if (filteredData.length) {
						setMahasiswaInfo(filteredData[0])
						getDetailTranskrip(filteredData[0].id)
						setMahasiswaNotFound(false)
						setOnStart(false)
					} else {
						setMahasiswaNotFound(true)
						setMahasiswaInfo(null)
					}
				},
				error: () => {
					alert('Gagal mendapatkan data Mahasiswa')
				}
			})
		}
		// generate datatable
		useEffect(() => {
			$('#listdata').DataTable({
				destroy: true,
				data: listNilai,
				columns: [
					{ data: 'matakuliah', title: 'Mata Kuliah' },
					{ data: 'nilai_angka', title: 'Nilai Angka' },
					{ data: 'nilai_huruf', title: 'Nilai Huruf' },
				]
			})
		}, [listNilai])
		return (
			<div id="container">
				<div>
					<div className="title">
						<i className="fas fa-file-signature"></i>
						<div>
							<h1> Transkrip & Ijazah</h1>
							<p>Silahkan masukkan <strong>NIM</strong> mahasiswa untuk pencetakan Ijazah dan Traksrip. </p>
						</div>
					</div>
					<div>
						<form onSubmit={e => handleSearchMahasiswa(e)}>
							<div className="wrap">
								<div className="formel">
									<label htmlFor="nim">NIM { }</label>
									<input type="text" name="nim" placeholder="e.g. 220401020003" />
								</div>
								<div className="formel">
									<label htmlFor="nim"></label>
									<button type="submit">Cari</button>
								</div>
							</div>
						</form>
					</div>
					{
						mahasiswaNotFound ? (
							<p className="warnmessage"><i className="fa-solid fa-circle-info"></i>Maaf, Data Mahasiswa tidak ditemukan</p>
						) : false
					}
					{
						mahasiswaInfo != null ? (
							<React.Fragment>
								<div className="headers">
									<div className="mahasiswainfo">
										<h5>{mahasiswaInfo.nama}</h5>
										<p><i className="fa-solid fa-calendar-week"></i> {mahasiswaInfo.namakota}, {mahasiswaInfo.tanggal_lahir}</p>
									</div>
									<div className="mahasiswainfo">
										<h5>{mahasiswaInfo.nomor_taruna}</h5>
										<p><i className="fas fa-graduation-cap"></i>Prodi {mahasiswaInfo.namaprodi}</p>
									</div>
									<div className="headprint">
										<button 
											title="Cetak Ijazah" 
											onClick={() => setIsPrintIjazah(true)}
										><i className="fa-solid fa-print"></i> Ijazah</button>
										<button
											title="Cetak Transkrip"
											onClick={() => setIsPrintTranskrip(true)}
										><i className="fa-solid fa-print"></i> Transkrip</button>
									</div>
								</div>
								<div className="tbox">
									<table id="listdata"></table>
								</div>
							</React.Fragment>
						) : false
					}
					{
						onStart ? (
							<div className="infos">
								<img src="<?=base_url()?>assets/wait.jpg" alt="illustration" />
								<h3><i className="fa-solid fa-circle-info"></i> Anda belum melakukan pencarian. </h3>
							</div>
						) : false
					}
				</div>
				{
					isPrintIjazah ? (<FormIjazah data={mahasiswaInfo} hide={setIsPrintIjazah} />) : false
				}
				{
					isPrintTranskrip ? <FormTranskrip hide={setIsPrintTranskrip} /> : false
				}
			</div>
		)
	}
	const root = document.querySelector("#appss")
	const el = ReactDOM.createRoot(root)
	el.render(<App />)
	// form ijazah
	const FormIjazah = props => {
		const { nama, namakota, nomor_taruna, namaprodi, tanggal_lahir, program_pendidikan, akreditasi } = props.data
		const { hide } = props
		useEffect(() => {
			setTimeout(() => window.print(), 2000)
		}, [])
		return (
			<div className="boxijazah" onClick={() => hide(false)}>
				<div className="watermark">
					<img src="<?=base_url()?>assets/unsia.png" alt="illustration" />
				</div>
				<div className="formijazah">
					<div className="between">
						<p>No. Seri : <?php echo $nomorSeri; ?></p>
						<p>No. Ijazah : <?php echo $nomorIjazah; ?></p>
					</div>
					<div className="text-center">
						<h1>IJAZAH</h1>
					</div>
					<div className="wrap-center">
						<div>
							<p>Memberikan Ijazah Kepada </p>
							<p>Tempat dan Tanggal Lahir </p>
							<p>Nomor Taruna </p>
							<p>Program Pendidikan </p>
							<p>Program Studi </p>
							<p>Status </p>
						</div>
						<div>
							<p><strong>: {nama.toUpperCase()}</strong></p>
							<p>: {namakota}, {tanggal_lahir} </p>
							<p>: {nomor_taruna} </p>
							<p>: {program_pendidikan} </p>
							<p>: {namaprodi} </p>
							<p>: TERAKREDITASI <strong>"{akreditasi.toUpperCase()}"</strong> </p>
							<p><i style={{ paddingLeft: '0.4em' }}>Berdasarkan Keputusan BAN PT No. 321</i></p>
						</div>
					</div>
					<div className="pads">
						<p>Ijazah ini diserahkan berdasarkan Surat Keputusan Direktur Politeknik Siber Asia Nomor: SK. 321 Tahun 2022, setelah yang bersangkutan memenuhi semua persyaratan yang telah ditentukan dan kepadanya dilimpahkan segala wewenang dan hak yang berhubungan dengan Ijazah yang dimilikinya serta berhak menggunakan Gelar Akademik <strong>{program_pendidikan != 'Sarjana' ? 'Ahli Madya' : 'Sarjana'} Komputer ({program_pendidikan == 'Sarjana' ? 'S.Kom' : 'A.Md'})</strong></p>
					</div>
					<div className="between pads">
						<div className="text-center">
							<p>WAKIL DIREKTUR I </p>
							<p>POLITEKNIK SIBER ASIA</p>
							<div className="bots">
								<img src="<?=base_url() ?>assets/barcode.png" alt="barcode" width="100" />
							</div>
							<div>
								<p><strong>NOBITA NOBI</strong></p>
								<p>NIP. 100900879</p>
							</div>
						</div>
						<div className="text-center">
							<p>Jakarta, 12 Agustus 2023</p>
							<p>DIREKTUR</p>
							<p>POLITEKNIK SIBER ASIA</p>
							<div className="bots">
								<img src="<?=base_url() ?>assets/barcode.png" alt="barcode" width="100" />
							</div>
							<div>
								<p><strong>SUNEO</strong></p>
								<p>NIP. 100232289</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		)
	}
	// form transkrip
	const FormTranskrip = props => {
		const {hide} = props
		return (
			<div className="boxijazah" onClick={() => hide(false)}>
				<div className="ijazahcontent">
					<p>Lampiran Ijazah Nomor : 123</p>
					<h1>TRANSKRIP NILAI AKADEMIK</h1>
					<div className="wraptranskrip">
						<div>
							<p>NAMA</p>
							<p>NOMOR TARUNA</p>
							<p>TEMPAT / TANGGAL LAHIR</p>
							<p>JURUSAN / PROGRAM STUDI</p>
							<p>STATUS</p>
							<p>TANGGAL YUDISIUM</p>
						</div>
						<div>
							<p>: Rizki Ramadhan</p>
							<p>: 220401020003</p>
							<p>: Palembang, 24 Februari 1993</p>
							<p>: DIPLOMA III MANAJMEEN INFORMATIKA</p>
							<p>: TERAKREDITASI BAIK</p>
							<p>: 22 AGUSTUS 2023</p>
						</div>
					</div>
					<div className="tablewraps">
						<div>
							<table className="table-bor">
								<tbody>
									<tr>
										<th>NO</th>
										<th>KODE</th>
										<th className="Matkul">MATA KULIAH</th>
										<th>SKS</th>
										<th>NILAI</th>
									</tr>
									<tr>
										<td ></td>
										<td ></td>
										<td><b>SEMESTER I (20 SKS)</b></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td >1</td>
										<td >PK103</td>
										<td className="Matkul">PBB DAN TATA UPACARA</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td >2</td>
										<td >KK104</td>
										<td className="Matkul">BAHASA INGGRIS</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td >3</td>
										<td >KK106</td>
										<td className="Matkul">FISIKA TERAPAN</td>
										<td>3</td>
										<td>AB</td>
									</tr>
									<tr>
										<td >4</td>
										<td >PK102</td>
										<td className="Matkul">PANCASILA</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td>5</td>
										<td>PK101</td>
										<td className="Matkul">AGAMA</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>6</td>
										<td>KK109</td>
										<td className="Matkul">MENGGAMBAR TEKNIK</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>7</td>
										<td>KK111</td>
										<td className="Matkul">KOMPUTER</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>8</td>
										<td>KK107</td>
										<td className="Matkul">MATEMATIKA TERAPAN</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td ></td>
										<td ></td>
										<td><b>SEMESTER II (21 SKS)</b></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>9</td>
										<td>KK220</td>
										<td className="Matkul">DASAR DASAR TRANSPORTASI</td>
										<td>2</td>
										<td>AB</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>10</td>
										<td>KK218</td>
										<td className="Matkul">HIDROLOGI</td>
										<td>2</td>
										<td>AB</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>11</td>
										<td>KB225</td>
										<td className="Matkul">TEKNIK PENGUKURAN DAN PEMETAAN</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td>12</td>
										<td>KB228</td>
										<td className="Matkul">ILMU BANGUNAN KAPAL</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td>13</td>
										<td>PK205</td>
										<td className="Matkul">BAHASA INDONESIA</td>
										<td>2</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>14</td>
										<td>KK208</td>
										<td className="Matkul">STATISTIK TERAPAN</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td>15</td>
										<td>KK213</td>
										<td className="Matkul">PENGANTAR ILMU HUKUM</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>16</td>
										<td>BB245</td>
										<td className="Matkul">PENGANTAR ILMU HUKUM</td>
										<td>2</td>
										<td>A</td>
									</tr>
									<tr>
										<td>17</td>
										<td>KK219</td>
										<td className="Matkul">REKAYASA SUNGAI</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td ></td>
										<td ></td>
										<td><b>SEMESTER III (22 SKS)</b></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>18</td>
										<td>KB326</td>
										<td className="Matkul">TEKNIK SURVEI LLASDP</td>
										<td>3</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>19</td>
										<td>KB324</td>
										<td className="Matkul">TEKNIK SURVEI HIDROGRAFI</td>
										<td>3</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>20</td>
										<td>KK310</td>
										<td className="Matkul">DASAR-DASAR EKONOMI</td>
										<td>2</td>
										<td>A</td>
									</tr>     
									<tr>
										<td>21</td>
										<td>KB332</td>
										<td className="Matkul">TEKNIK ALUR PELAYARAN</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td>22</td>
										<td>KK327</td>
										<td className="Matkul">PERMESINAN DAN KELISTRIKAN KAPAL</td>
										<td>3</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>23</td>
										<td>KK131</td>
										<td className="Matkul">PENGANTAR ILMU MANEJEMEN</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>24</td>
										<td>KK316</td>
										<td className="Matkul">OLAH GERAK KAPAL</td>
										<td>3</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>25</td>
										<td>KB329</td>
										<td className="Matkul">STABILITAS DAN TEKNIK PEMUATAN</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr >
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div>
							<table class="table-bor">
								<thead>	
									<tr>
										<th>NO</th>
										<th>KODE</th>
										<th class="Matkul">MATA KULIAH</th>
										<th>SKS</th>
										<th>NILAI</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td><b>SEMESTER IV (20 SKS)</b></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>26</td>
										<td>KB431</td>
										<td class="Matkul">PELAKSANAAN DAN PERANCANGAN PELABUHAN SDP</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td>27</td>
										<td>KB430</td>
										<td class="Matkul">TANDA DAN RAMBU PELAYARAN SDP</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>28</td>
										<td>KB433</td>
										<td class="Matkul">MANAJEMEN OPERASI TRANSPOERTASI SDP</td>
										<td>3</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>29</td>
										<td>KB435</td>
										<td class="Matkul">KESELAMATAN PELAYARAN</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>30</td>
										<td>KB434</td>
										<td class="Matkul">PERENCANAAN TRANSPORT SDP</td>
										<td>3</td>
										<td>B</td>
									</tr>
									<tr>
										<td>31</td>
										<td>KB436</td>
										<td class="Matkul">EKONOMI TRANSPORT</td>
										<td>2</td>
										<td>A</td>
									</tr>
									<tr>
										<td>32</td>
										<td>KB439</td>
										<td class="Matkul">TEKNIK PENGERUKAN </td>
										<td>3</td>
										<td>A</td>
									</tr>
									<tr>
										<td>33</td>
										<td>KK417</td>
										<td class="Matkul">AMDAL TSDP </td>
										<td>3</td>
										<td>A</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td><b>SEMESTER V (19 SKS)</b></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>34</td>
										<td>KB537</td>
										<td class="Matkul">TEKNIK ANALISA EKONOMI DAN FINANSIAL TRANSPORTASI </td>
										<td>2</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>34</td>
										<td>KB537</td>
										<td class="Matkul">TEKNIK ANALISA EKONOMI DAN FINANSIAL TRANSPORTASI </td>
										<td>2</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>35</td>
										<td>BB544</td>
										<td class="Matkul">PERATURAN KESYABANDARAN</td>
										<td>2</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>36</td>
										<td>KB537</td>
										<td class="Matkul">TEKNIK ANALISA EKONOMI DAN FINANSIAL TRANSPORTASI </td>
										<td>2</td>
										<td>A</td>
									</tr>
									<tr>
										<td>37</td>
										<td>KB523</td>
										<td class="Matkul">KAPITA SELECTA</td>
										<td>2</td>
										<td>AB</td>
									</tr>
									<tr>
										<td>38</td>
										<td>KB514</td>
										<td class="Matkul">ILMU ADMINISTRASI</td>
										<td>2</td>
										<td>A</td>
									</tr>
									<tr>
										<td>39</td>
										<td>KK533</td>
										<td class="Matkul">MANAJEMEN OPERASI PELABUHAN SDP</td>
										<td>3</td>
										<td>A</td>
									</tr>
									<tr>
										<td>40</td>
										<td>KK521</td>
										<td  class="Matkul">TRANSPORTASI MULTIMODA</td>
										<td>2</td>
										<td>B</td>
									</tr>
									<tr>
										<td>41</td>
										<td>KB552</td>
										<td  class="Matkul">METODE PENILITIAN</td>
										<td>2</td>
										<td>A</td>
									</tr>
									<tr>
										<td>42</td>
										<td>KB515</td>
										<td  class="Matkul">KETERAMPILAN DASAR KESELAMATAN</td>
										<td>2</td>
										<td>A</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td><b>SEMESTER VI (12 SKS)</b></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>43</td>
										<td>PBA643</td>
										<td  class="Matkul">PRAKTEK KERJA LAPANGAN (PKL)</td>
										<td>4</td>
										<td>A</td>
									</tr>
									<tr>
										<td>44</td>
										<td>PBA642</td>
										<td  class="Matkul">SEMINAR</td>
										<td>2</td>
										<td>A</td>
									</tr>
									<tr >
										<td>45</td>
										<td>PBA641</td>
										<td  class="Matkul">KERTAS KERJA WAJID</td>
										<td>6</td>
										<td>B</td>
									</tr>
									<tr>
										<td></td>
										<td colspan="3" class="Matkul"><b>UJIAN AKHIR PROGRAM STUDI :</b></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td colspan="3" class="Matkul"></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		)
	}
</script>