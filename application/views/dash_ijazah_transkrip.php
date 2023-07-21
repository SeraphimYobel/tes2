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
	form{
		margin: 0;
	}
	.formel>button, .headprint>button{
		transition: all 0.3s;
		padding: 0.75em 1.4em;
		background: #0079FF;
		cursor: pointer;
		color: white;
		border: none;
		border-radius: 0.5em;
	}
	.formel>button:hover, .headprint>button:hover{
		background: #0055b6;
	}
	.warnmessage{
		color: #FF0060;
		background: #ffeaf2;
		border-radius: 0.5em;
		margin: 0.5em 0;
		text-align: center;
		padding: 0.75em;
	}
	.headers{
		animation: show 0.5s ease;
		display: flex;
		gap: 1.5em;
		align-items: center;
		margin: 1.5em 0;
	}
	.headers>div{
		flex: 1;
	}
	.mahasiswainfo>h5{
		font-size: 1.5em;
	}
	.mahasiswainfo>p{
		margin-top: 0.3em;
		opacity: 0.6;
	}
	.headprint{
		display: flex;
		justify-content: center;
		align-items: flex-start;
		gap: 1em;
	}
	.tbox{
		padding: 1.5em 0 !important;
	}
	.infos{
		padding: 1.5em 0;
		display: flex;
		width: 100%;
		flex-direction: column;
		align-items: center;
		gap: 0.7em;
	}
	.infos>img{
		filter: grayscale(20%);
	}
	.infos>h3{
		color: crimson;
		font-weight: 400;
		margin-top: 0.5em;
		font-size: 1.4em;
	}
	.infos>h3>i{
		font-size: 1.2em;
		transform: translateY(0.06em);
	}
	.boxijazah{
		position: fixed;
		top: 0;
		left: 0;
		padding: 1em;
		width: 100%;
		height: 100%;
		background: rgba(20,20,20,0.5) !important;
		border-radius: 0 !important;
		animation: show 0.5s ease;
	}
	.formijazah{
		height: 100%;
		border-radius: 0.3em;
		background: white;
		padding: 2.5em 4em;
		font-size: 1.3em;
		line-height: 1.5;
	}
	.between{
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.text-center{
		text-align: center;
	}
	.between>div{
		width: 20em;
	}
	.text-center>h1{
		font-size: 1.8em;
		margin-top: 0.5em;
	}
	.wrap-center{
		padding: 3em 8em;
		display: flex;
		gap: 5em;
	}
	.bots{
		margin-top: 4em;
	}
	.pads{
		padding: 0em 6em 2em 6em;
		text-align: justify;
	}
</style>
<div id="appss"></div>
<script type="text/babel">
	const { useState, useEffect } = React
	const App = () => {
		const [mahasiswaInfo, setMahasiswaInfo] = useState(null)
		const [mahasiswaNotFound, setMahasiswaNotFound] = useState(false)
		const [listNilai, setListNilai] = useState([])
		const [onStart, setOnStart] = useState(true)
		const [isPrintIjazah, setIsPrintIjazah] = useState(false)
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
				error : () => {
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
					if(filteredData.length){
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
					{data: 'matakuliah', title: 'Mata Kuliah'},
					{data: 'nilai_angka', title: 'Nilai Angka'},
					{data: 'nilai_huruf', title: 'Nilai Huruf'},
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
									<label htmlFor="nim">NIM {}</label>
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
										<p><i className="fas fa-graduation-cap"></i> {mahasiswaInfo.namaprodi}</p>
									</div>
									<div className="headprint">
										<button onClick={() => setIsPrintIjazah(true)}><i className="fa-solid fa-print"></i> Print Ijazah</button>
										<button><i className="fa-solid fa-file-contract"></i> Print Transkrip</button>
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
					isPrintIjazah ? (<FormIjazah data={mahasiswaInfo} hide={setIsPrintIjazah}/>) : false
				}
			</div>
		)
	}
	const root = document.querySelector("#appss")
	const el = ReactDOM.createRoot(root)
	el.render(<App />)
	// form input program studi
	const FormIjazah = props => {
		const {nama, namakota, nomor_taruna, namaprodi, tanggal_lahir, program_pendidikan, akreditasi} = props.data
		const {hide} = props
		useEffect(() => {
			window.print()
		}, [])
		return (
			<div className="boxijazah" onClick={e => e.target.className == "boxijazah" && hide(false)}>
				<div className="formijazah">
					<div className="between">
						<p>No. Seri : 120</p>
						<p>No. Ijazah : 1320</p>
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
							<p><strong>: {nama}</strong></p>
							<p>: {namakota}, {tanggal_lahir} </p>
							<p>: {nomor_taruna} </p>
							<p>: {namaprodi} </p>
							<p>: {program_pendidikan} </p>
							<p>: <strong>{akreditasi}</strong> </p>
						</div>
					</div>
					<div className="pads">
						<p>Ijazah ini diserahkan berdasarkan Surat Keputusan Direktur Politeknik XYZ Nomor: SK.321 Tahun 2022, setelah yang bersangkutan memenuhi semua persyaratan yang telah ditentukan dan kepadanya dilimpahkan segala wewenang dan hak yang berhubungan dengan Ijazah yang dimilikinya serta berhak menggunakan Gelar Akademik <strong>{program_pendidikan != 'Sarjana' ? 'Ahli Madya' : 'Sarjana'} Komputer ({program_pendidikan == 'Sarjana' ? 'S.Kom' : 'A.Md'})</strong></p>
					</div>
					<div className="between pads">
						<div className="text-center">
							<p>WAKIL DIREKTUR I </p>
							<p>POLITEKNIK XYZ</p>
							<div className="bots">
								<p><strong>NOBITA NOBI</strong></p>
								<p>NIP. 100900879</p>
							</div>
						</div>
						<div className="text-center">
							<p>Jakarta, 12 Agustus 2023</p>
							<p>DIREKTUR</p>
							<p>POLITEKNIK XYZ</p>
							<div className="bots">
								<p><strong>SUNEO</strong></p>
								<p>NIP. 100232289</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		)
	}
</script>