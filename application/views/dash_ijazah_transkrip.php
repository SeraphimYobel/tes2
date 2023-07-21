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
	.formel>button{
		transition: all 0.3s;
		padding: 0.75em 1.4em;
		background: #0079FF;
		cursor: pointer;
		color: white;
		border: none;
		border-radius: 0.5em;
	}
	.formel>button:hover{
		background: #0055b6;
	}
</style>
<div id="appss"></div>
<script type="text/babel">
	const { useState, useEffect } = React
	const App = () => {
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
						<form>
							<div className="wrap">
								<div className="formel">
									<label for="nim">NIM {}</label>
									<input type="text" name="nim" placeholder="e.g. 220401020003" />
								</div>
								<div className="formel">
									<label for="nim"></label>
									<button type="submit">Cari</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		)
	}
	const root = document.querySelector("#appss")
	const el = ReactDOM.createRoot(root)
	el.render(<App />)
	// form input program studi
</script>