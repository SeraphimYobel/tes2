<style>
   .btnlogout {
      cursor: pointer;
      transition: all 0.3s;
      padding: 0.7em;
      border: none;
   }
   .headmenu{
      display: flex;
      align-items: center;
      padding: 1em 0.5em;
      border-bottom: 1px solid rgb(230,230,230);
      margin-bottom: 1em;
      gap: 1em;
   }
   .headmenu>div>p{
      font-size: 0.8em;
      margin-top: 0.2em;
      opacity: 0.6;
   }
   .btnlogout:hover {
      background: #cb014f
   }
</style>
<div id="apps"></div>
<script type="text/babel">
   const App = () => {
      return (
         <nav className="navigation">
            <div>
               <div>
                  <div className="headmenu">
                     <img src="./assets/unsia.png" alt="logo kampus" width="40" height="40"/>
                     <div>
                        <h3>UNSIA Menu</h3>
                        <p>Universitas Siber Asia</p>
                     </div>
                  </div>
                  <div className="menus">
                     <a href="/"><i className="fas fa-users"></i> Dosen & Mahasiswa</a>
                     <a href="/"><i className="fas fa-file-signature"></i> Ijazah & Transkrip</a>
                     <a href="/"><i className="fas fa-award"></i> Penilaian</a>
                     <a href="/"><i className="fas fa-book"></i> Mata Kuliah</a>
                     <a href="/"><i className="fas fa-graduation-cap"></i> Program Studi</a>
                     <a href="/"><i className="fas fa-building"></i> Kota</a>
                  </div>
               </div>
               <button title="Keluar dari Akun" className="bgred btnlogout">Log Out</button>
            </div>
         </nav>
      )
   }
   const root = document.querySelector("#apps")
   const el = ReactDOM.createRoot(root)
   el.render(<App />)
</script>