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
</style>
<div id="appss"></div>
<script type="text/babel">
	const { useState, useEffect } = React
	const App = () => {
		const [showForm, setShowForm] = useState(null)
		const [listData, setListData] = useState([
			{ id: 1, nama: 'TI', program_pendidikan: 'Teknik Informatika', akreditasi: 'A', sk_akreditasi: '001/TI/AKRED/UNSIA' },
			{ id: 2, nama: 'MI', program_pendidikan: 'Managemen Informatika', akreditasi: 'B', sk_akreditasi: '001/TI/AKRED/UNSIA' },
			{ id: 3, nama: 'AK', program_pendidikan: 'Akuntansi', akreditasi: 'A', sk_akreditasi: '001/TI/AKRED/UNSIA' },
		])
		useEffect(() => {
			$(`#listdata`).DataTable({
				destroy: true,
				data: listData,
				columns: [
					{ data: 'nama', title: 'Nama' },
					{ data: 'program_pendidikan', title: 'Program Pendidikan' },
					{ data: 'akreditasi', title: 'Akreditasi' },
					{ data: 'sk_akreditasi', title: 'SK Akreditasi' },
					{ data: 'id', title: 'Action' },
				]
			})
		}, [listData])
		return (
			<div id="container">
				<div>
					<div className="title">
						<i className="fas fa-graduation-cap"></i>
						<div>
							<h1> Program Studi</h1>
							<p>Klik <strong>Tambah</strong> untuk menambahkan Program Studi. </p>
						</div>
					</div>
					<div className="btnarea btnarea-nopad">
						{ /* hide show button add */
							showForm == null ? (
								<button
									title="Tambah program studi"
									onClick={() => setShowForm('add')}
								>
									<i className="fas fa-plus"></i> Tambah</button>
							) : false
						}
					</div>
					{
						showForm == 'add' ? (
							<FormInput setShowForm={setShowForm} setListData={setListData} />
						) : false
					}
					<div className="tablebox">
						<table id="listdata"></table>
					</div>
				</div>
			</div>
		)
	}
	const root = document.querySelector("#appss")
	const el = ReactDOM.createRoot(root)
	el.render(<App />)
	// form input program studi
	const FormInput = props => {
		const { setShowForm, setListData } = props
		const [successMessage, setSuccessMessage] = useState(null)
		// on submit form add new program studi
		const handleSubmit = (e) => {
			e.preventDefault()
			const data = Object.fromEntries(new FormData(document.querySelector('#formprogramstudi')).entries())
			// set number
			data.id = parseInt(Math.random() * 100)
			setListData(prev => [...prev, data])
			// on success
			$('#formprogramstudi')[0].reset()
			setSuccessMessage('Program Studi berhasil ditambahkan, Terima kasih.')
			setTimeout(() => setSuccessMessage(null),5000)
		}
		return (
			<div className="forms">
				<h1>Tambah Program Studi</h1>
				<p>Silahkan lengkapi form dibawah ini.</p>
				{
					successMessage != null ? (
						<span className="successmessage"><i className="fas fa-check-circle"></i> {successMessage}</span>
					) : false
				}
				<form id="formprogramstudi" onSubmit={handleSubmit}>
					<div className="wrap">
						<div className="formel">
							<label htmlFor="nama">Nama</label>
							<input name="nama" type="text" placeholder="e.g. MI" required />
						</div>
						<div className="formel">
							<label htmlFor="programpendidikan">Program Pendidikan</label>
							<input name="program_pendidikan" type="text" placeholder="e.g. Managemen Informatika" required />
						</div>
						<div className="formel">
							<label htmlFor="akreditasi">Akreditasi</label>
							<select required name="akreditasi">
								<option value="">Pilih Akreditasi</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
							</select>
						</div>
						<div className="formel fulls">
							<label htmlFor="sk">SK Akreditasi</label>
							<input name="sk_akreditasi" type="text" placeholder="e.g. 001/TI/AKRED/UNSIA" required />
						</div>
					</div>
					<div className="btnarea">
						<a href="#" onClick={() => setShowForm(null)}>Batal</a>
						<button><i className="fas fa-save"></i> Simpan</button>
					</div>
				</form>
			</div>
		)
	}
</script>