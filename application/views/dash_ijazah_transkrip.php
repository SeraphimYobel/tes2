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
		display: flex;
		gap: 1.5em;
		margin: 1em 0;
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
</style>
<div id="appss"></div>
<script type="text/babel">
	const App = () => {
		const { useState, useEffect } = React
		const [mahasiswaInfo, setMahasiswaInfo] = useState(null)
		const [mahasiswaNotFound, setMahasiswaNotFound] = useState(false)
		const [listNilai, setListNilai] = useState([])
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
					console.log(filteredData[0])
					if(filteredData.length){
						setMahasiswaInfo(filteredData[0])
						getDetailTranskrip(filteredData[0].id)
						setMahasiswaNotFound(false)
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
							<p className="warnmessage"><i className="fa-solid fa-circle-info"></i> Data Mahasiswa tidak ditemukan</p>
						) : false
					}
					{
						mahasiswaInfo != null ? (
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
									<button><i className="fa-solid fa-print"></i> Print Ijazah</button>
									<button><i className="fa-solid fa-file-contract"></i> Print Transkrip</button>
								</div>
							</div>
						) : false
					}
				</div>
			</div>
		)
	}
	const root = document.querySelector("#appss")
	const el = ReactDOM.createRoot(root)
	el.render(<App />)
	// form input program studi
</script>