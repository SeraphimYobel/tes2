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
			
		])
		useEffect(() => {
			$(`#listdata`).DataTable({
				destroy: true,
				data: listData,
				columns: [
					{ data: 'Taruna', title: 'Taruna' },
					{ data: 'Nilai_Angka', title: 'Nilai Angka' },
					{ data: 'Nilai_Huruf', title: 'Nilai Huruf' },
					{ data: 'Mata_Kuliah', title: 'Mata Kuliah' },
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
							<h1> Penilaian</h1>
							<p>Klik <strong>Tambah</strong> untuk menambahkan Penilaian. </p>
						</div>
					</div>
					<div className="btnarea btnarea-nopad">
						{ /* hide show button add */
							showForm == null ? (
								<button
									title="Tambah Penilaian"
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
	// form input Penilaian
	const FormInput = props => {
		const { setShowForm, setListData } = props
		const [successMessage, setSuccessMessage] = useState(null)
		// on submit form add new Penilaian
		const handleSubmit = (e) => {
			e.preventDefault()
			const data = Object.fromEntries(new FormData(document.querySelector('#formpenilaian')).entries())
			// set number
			data.id = parseInt(Math.random() * 100)
			setListData(prev => [...prev, data])
			// on success
			$('#formpenilaian')[0].reset()
			setSuccessMessage('Penilaian berhasil ditambahkan, Terima kasih.')
			setTimeout(() => setSuccessMessage(null),5000)
		}
		return (
			<div className="forms">
				<h1>Tambah Penilaian</h1>
				<p>Silahkan lengkapi form dibawah ini.</p>
				{
					successMessage != null ? (
						<span className="successmessage"><i className="fas fa-check-circle"></i> {successMessage}</span>
					) : false
				}
				<form id="formpenilaian" onSubmit={handleSubmit}>
					<div className="wrap">
						<div className="formel">
							<label htmlFor="Taruna">Taruna</label>
							<input name="Taruna" type="text" placeholder="e.g. 210401010055" required />
						</div>
						<div className="formel">
							<label htmlFor="penilaian">Nilai Angka</label>
							<input name="Nilai_Angka" type="num" placeholder="e.g. 40" required />
						</div>
						<div className="formel">
							<label htmlFor="Nilai_Huruf">Nilai Huruf</label>
							<select required name="Nilai_Huruf">
								<option value="">Pilih Nilai Huruf</option>
								<option value="A">A</option>
								<option value="B">AB</option>
								<option value="C">B</option>
								<option value="D">BC</option>
								<option value="E">C</option>
								<option value="F">D</option>
								<option value="F">E</option>
							</select>
						</div>
						<div className="formel fulls">
							<label htmlFor="sk">Mata Kuliah</label>
							<input name="Mata_Kuliah" type="text" placeholder="e.g. Pemrograman Web II" required />
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
