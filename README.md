Study Case Backend

    Framework Laravel
    Login Auth menggunakan JWT
    Server Local Menggunakan Laragon jadi ketika di Running otomatis menciptakan
    PORT tambahan jadi akan terlihat sepeti http://127.0.0.1:8000

Postman Collection
Cara Import Postman Collection
Buka Aplikasi postman lalu pilih menu File->import, lalu upload file JSON dibawah ini

Versi Localhost - https://github.com/devyferd1223/studycase_backend_programmer_importirorg_devy_ferdiansyah/blob/main/Postman_Collection/importirorg_localhost.postman_collection_devy_ferdiansyah.json
Varsi Online - https://github.com/devyferd1223/studycase_backend_programmer_importirorg_devy_ferdiansyah/blob/main/Postman_Collection/postman_collection_versi_online_devyferdiansyahcom.json
API ini terdiri dari :

    Role User (CRUD)
    Register / User (CRUD)
    Login
    Kategori Barang (CRUD)
    Barang (CRUD)
    Barang Masuk (CRUD)
    Barang Keluar (CRUD)
    Laporan Stok Barang - Pilih filter: hari, minggu, bulan, tahun
    Laporan Barang Masuk - Pilih filter: hari, minggu, bulan, tahun
    Laporan Barang Keluar - Pilih filter: hari, minggu, bulan, tahun

Prosedur penggunaaan :

    Didalam github ini terdapat 3 buah folder, yaitu : folder project, folder database yang 
    berisikan file sql database, lalu ada folder postman_collection yang berisikan file JSON 
    postman, untuk menggunakan nya tinggal buka aplikasi POSTMAN dekstop anda lalu IMPORT file JSON 
    didalamnya, maka akan muncul semua LINK API d dalamnya.

    Dikarenakan ada relasi antara tabel user dengan role_user, maka tabel user 
    hanya menyimpan atribut role_id: nilai integer
    pastikan pada tabel role_user nilai 
    - record pertama role_id=1, role_name=Admin
    - record kedua role_id=2, role_name=Staff Gudang

    Untuk Filter HANDLE disini hanya berada pada function laporan_stok_barang, 
    laporan_barang_masuk dan laporan_barang_keluar
    dengan membaca 
    if(Auth::user()->role_id<>1){
            return response()->json( [
                'error'   => false,
                'message' => trans( 'Hanya dapat diakses oleh Admin' )
            ] );
        }

    - localhost:8000/api/register - POST
    - localhost:8000/api/login - POST
    - localhost:8000/api/logout - POST
    - localhost:8000/api/roleuser - GET
    - localhost:8000/api/roleuser - POST
    - localhost:8000/api/roleuser/1?_method=put - POST - _metod=put
    - localhost:8000/api/roleuser/1?_method=put - DELETE
    - localhost:8000/api/kategoribarang - GET
    - localhost:8000/api/kategoribarang - POST
    - localhost:8000/api/kategoribarang/1
    - localhost:8000/api/kategoribarang/1?_method=pull
    - localhost:8000/api/barang - GET
    - localhost:8000/api/barang - POST
    - localhost:8000/api/barang/B001 - DELETE
    - localhost:8000/api/barang/B001?_method=put
    - localhost:8000/api/barangmasuk - GET
    - localhost:8000/api/barangmasuk - POST
    - localhost:8000/api/barangmasuk/1 - DELETE
    - localhost:8000/api/barangmasuk/B001?_method=put - POST - _metod=put
    - localhost:8000/api/barangmasuk/1
    - localhost:8000/api/barangkeluar - GET
    - localhost:8000/api/barangkeluar - POST
    - localhost:8000/api/barangkeluar/1?_method=put - POST - _metod=put
    - localhost:8000/api/barangkeluar/1 - DELETE
    - localhost:8000/api/laporan_stok_barang/hari - GET
    - localhost:8000/api/laporan_stok_barang/minggu - GET
    - localhost:8000/api/laporan_stok_barang/bulan - GET
    - localhost:8000/api/laporan_stok_barang/tahun - GET
    - localhost:8000/api/laporan_barang_masuk/hari - GET
    - localhost:8000/api/laporan_barang_masuk/minggu - GET
    - localhost:8000/api/laporan_barang_masuk/bulan - GET
    - localhost:8000/api/laporan_barang_masuk/tahun - GET
    - localhost:8000/api/laporan_barang_keluar/hari - GET
    - localhost:8000/api/laporan_barang_keluar/minggu - GET
    - localhost:8000/api/laporan_barang_keluar/bulan - GET
    - localhost:8000/api/laporan_barang_keluar/tahun - GET