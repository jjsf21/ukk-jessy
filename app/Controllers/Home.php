<?php

namespace App\Controllers;
use CodeIgniter\Controllers; 
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {
  //    echo view('header');
        // echo view('menu');
        // echo view('footer');
        

        $model=new M_model();
        echo view('login');
    }

    public function aksi_login()
    {
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');
        $model = new M_model();
        $data=array(
            'username'=>$n, 
            'password'=>$p
        );
        $cek=$model->getarray('user', $data);
        if ($cek>0) {

            session()->set('id', $cek['id_user']);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            return redirect()->to('/home/dashboard');

        }else {
        return redirect()->to('/home/dashboard');
    }
}

    public function log_out()
    {
        // if(session()->get('id')>0) {

         session()->destroy();
         return redirect()->to('/');

    //  }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

    public function dashboard()
    {
        echo view('header');
        echo view('menu');
        echo view('dashboard');
        echo view('footer');
    }

    public function user()
    {
// if(session()->get('level')== 1) {

        $model = new M_model();
        $kui['ferdi'] = $model->tampil('user');

        $id = session()->get('id');
        $where = array('id' => $id);

        echo view('header', $kui);
        echo view('menu');
        echo view('v_user');
        echo view('footer');
// }else{
//     return redirect()->to('/home/dashboard');
// }
    }

    // public function tambah_user()
    // {
    //     $model = new M_model();
    //     $kui['ferdi']=$model->tampil('user');
    //     echo view('header');
    //     echo view('menu');
    //     echo view('v_tambah_user',$kui);
    //     echo view('footer');
    // }

    // public function aksi_tambah_user()
    // {
    //     $a= $this->request->getPost('username');
    //     $b= $this->request->getPost('password');
    //     $c= $this->request->getPost('level');
        
    //     $simpan=array(
    //         'username'=>$a,
    //         'password'=>$b,
    //         'level'=>$c
           
    //     );
    //     $model = new M_model();
    //     $model->simpan('user',$simpan);
    //     return redirect()->to('/home/user');
    // }

    public function hapus_user($id)
    {
        $model = new M_model();
        $where=array('id_user'=>$id);
        $model->hapus('user',$where);
        return redirect()->to('/home/user');
    }

    public function pelanggan()
    {
// if(session()->get('level')== 1) {

        $model = new M_model();
        $kui['ferdi'] = $model->tampil('pelanggan');

        // $id = session()->get('id');
        // $where = array('id' => $id);

        echo view('header', $kui);
        echo view('menu');
        echo view('v_pelanggan');
        echo view('footer');
// }else{
//     return redirect()->to('/home/dashboard');
// }
    }

    public function tambah_pelanggan()
    {
        $model = new M_model();
        $kui['ferdi']=$model->tampil('pelanggan');
        echo view('header');
        echo view('menu');
        echo view('v_tambah_pelanggan',$kui);
        echo view('footer');
    }

    public function aksi_tambah_pelanggan()
    {
        $a= $this->request->getPost('nama_pelanggan');
        $b= $this->request->getPost('alamat');
        $c= $this->request->getPost('nomor_telepon');       

        $simpan=array(
            'nama_pelanggan'=>$a,
            'alamat'=>$b,
            'nomor_telepon'=>$c         

        );
        $model = new M_model();
        $model->simpan('pelanggan',$simpan);
        return redirect()->to('/home/pelanggan');
    }

    public function edit_pelanggan($id)
    {
        $model = new M_model();
        $where=array('id_pelanggan'=>$id);
        $kui['ferdi']=$model->getRow('pelanggan',$where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('header');
        echo view('menu');
        echo view('v_edit_pelanggan',$kui);
        echo view('footer');
    }

    public function aksi_edit_pelanggan()
    {
         $model=new M_model();
         $id= $this->request->getPost('id');
         $nama_pelanggan= $this->request->getPost('nama_pelanggan');
         $alamat= $this->request->getPost('alamat');
         $nomor_telepon= $this->request->getPost('nomor_telepon');
         

         $where=array('id_pelanggan'=>$id);
         $simpan=array(
            'nama_pelanggan'=>$nama_pelanggan,
            'alamat'=>$alamat,
            'nomor_telepon'=>$nomor_telepon
    
         );

         $model = new M_model();
         $model->edit('pelanggan', $simpan, $where);
         return redirect()->to('/home/pelanggan');
    }

    public function hapus_pelanggan($id)
    {
        $model = new M_model();
        $where=array('id_pelanggan'=>$id);
        $model->hapus('pelanggan',$where);
        return redirect()->to('/home/pelanggan');
    }

	public function penjualan()
    {
        // if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { 

        $model = new M_model();
        $on='penjualan.id_pelanggan=pelanggan.id_pelanggan';
        $kui['ferdi'] = $model->fusionleft('penjualan', 'pelanggan', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $where=array('id_user' => session()->get('id'));
        $kui['user']=$model->getRow('user',$where);

        echo view('header', $kui);
        echo view('menu');
        echo view('v_penjualan');
        echo view('footer');
    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

   public function tambah_penjualan()
    {
        // if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {

        $model=new M_model();
        // $on='penjualan.id_pelanggan=pelanggan.id_pelanggan';
        // $kui['ferdi'] = $model->fusionleft('penjualan', 'pelanggan', $on);

        $kui['ferdi1'] = $model->tampil('pelanggan');
        $kui['ferdi2'] = $model->tampil('produk');

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $where=array('id_user' => session()->get('id'));    
        $kui['user']=$model->getRow('user',$where);

        $where=array('id_user' => session()->get('id'));
        // $kui['user']=$model->getRow('user',$where);

        $kui['duar']=$model->tampil('pelanggan'); 


        echo view('header',$kui);
        echo view('menu');
        echo view('v_tambah_penjualan');
        echo view('footer');

    //     }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

    public function aksi_tambah_penjualan()
    {
        $model = new M_model();
        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $id_produk = $this->request->getPost('id_produk');
        $tanggal_penjualan = $this->request->getPost('tanggal_penjualan');
        $jumlah = $this->request->getPost('jumlah');
        $total_harga = $this->request->getPost('total_harga');
        $total_bayar = $this->request->getPost('total_bayar');
        $total_kembali = $this->request->getPost('total_kembali');

        $data = array(
            'id_pelanggan' => $id_pelanggan,
            // 'id_produk' => $id_produk,
            'tanggal_penjualan' => $tanggal_penjualan,
            'total_harga' => $total_harga,
            'total_bayar' => $total_bayar,
            'kembalian' => $total_kembali
        );

        $model->simpan('penjualan', $data);

        $kui['ferdi']=$model->getRow('penjualan',$data);

        
        $data2 = array(
            'id_penjualan' => $kui['ferdi']->id_penjualan,
            'id_produk' => $id_produk,
            'jumlah_produk' => $jumlah,
            'subtotal' => $total_harga
        );

        $model->simpan('detail_penjualan', $data2);


    // print_r($data2);
        // Simpan data ke dalam tabel 'resep' menggunakan model

        // print_r($kui['ferdi']);
        // // Redirect ke halaman '/home/resep'
        return redirect()->to('/home/penjualan');
    }

    public function edit_penjualan($id)
    {
        // if(session()->get('level')== 4) {

        $model=new M_model();
        $where2=array('id_penjualan'=>$id);
        $on='penjualan.id_pelanggan=pelanggan.id_pelanggan';
        $kui['ferdi'] = $model->edit_penjualan ('penjualan', 'pelanggan', $on, $where2);
        $kui['duar']=$model->tampil('pelanggan'); 

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $where=array('id_user' => session()->get('id'));
        $kui['user']=$model->getwhere('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('v_edit_penjualan');
        echo view('footer');

//     }else{
//         return redirect()->to('/home/dashboard');
//     }
    }

    public function aksi_edit_penjualan()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('id_pelanggan');
        $tanggal_penjualan=$this->request->getPost('tanggal_penjualan');        
        $total_harga=$this->request->getPost('total_harga');

        $data=array(
            'id_pelanggan'=>$a,
            'tanggal_penjualan'=>$tanggal_penjualan,
            'total_harga'=>$total_harga

        );
        // print_r($data);
        $where=array('id_penjualan'=>$id);
        $model->edit('penjualan',$data,$where);
        return redirect()->to('/home/penjualan');
    }

    public function hapus_penjualan($id)
    {
        $model = new M_model();
        $where=array('id_penjualan'=>$id);
        $model->hapus('penjualan',$where);
        $model->hapus('detail_penjualan',$where);
        return redirect()->to('/home/penjualan');
    }

    public function detail_penjualan($id)
    {
        // if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { 

        $model = new M_model();
        // $on='detail_penjualan.id_penjualan=penjualan.id_penjualan';
        // $on2='detail_penjualan.id_produk=produk.id_produk';
        // $kui['ferdi'] = $model->super('detail_penjualan', 'penjualan', 'produk', $on, $on2);
        $kui['ferdi'] = $model->detail_penjualan($id);


        $id2=session()->get('id');
        $where=array('id_user'=>$id);
        $where=array('id_user' => session()->get('id'));
        $kui['user']=$model->getRow('user',$where);

        echo view('header', $kui);
        echo view('menu');
        echo view('v_detail_penjualan',$kui);
        echo view('footer');
    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }
    
    public function nota($id)
    {
        // if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { 

        $model = new M_model();
        // $on='detail_penjualan.id_penjualan=penjualan.id_penjualan';
        // $on2='detail_penjualan.id_produk=produk.id_produk';
        // $kui['ferdi'] = $model->super('detail_penjualan', 'penjualan', 'produk', $on, $on2);
        $kui['ferdi'] = $model->detail_penjualan($id);


        $id2=session()->get('id');
        $where=array('id_user'=>$id);
        $where=array('id_user' => session()->get('id'));
        $kui['user']=$model->getRow('user',$where);

        echo view('header', $kui);
        echo view('menu');
        echo view('nota',$kui);
        echo view('footer');
    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

    public function tambah_detail_penjualan()
    {
        // if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {

        $model=new M_model();
        $on='detail_penjualan.id_penjualan=penjualan.id_penjualan';
        $on2='detail_penjualan.id_produk=produk.id_produk';
        $kui['ferdi'] = $model->super('detail_penjualan', 'penjualan', 'produk', $on, $on2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $where=array('id_user' => session()->get('id'));    
        $kui['user']=$model->getRow('user',$where);

        $where=array('id_user' => session()->get('id'));
        // $kui['user']=$model->getRow('user',$where);

        $kui['duar']=$model->tampil('penjualan'); 
        $kui['a']=$model->tampil('produk'); 


        echo view('header',$kui);
        echo view('menu');
        echo view('v_tambah_detail_penjualan');
        echo view('footer');

    //     }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

    public function aksi_tambah_detail_penjualan()
    {
        $model = new M_model();
        $id_penjualan = $this->request->getPost('id_penjualan');
        $id_produk = $this->request->getPost('id_produk');
        $jumlah_produk = $this->request->getPost('jumlah_produk');
        $subtotal = $this->request->getPost('subtotal');

        $data = array(
            'id_penjualan' => $id_penjualan,
            'id_produk' => $id_produk,
            'jumlah_produk' => $jumlah_produk,
            'subtotal' => $subtotal
        );
    // print_r($data);
        // Simpan data ke dalam tabel 'resep' menggunakan model
        $model->simpan('detail_penjualan', $data);

        // // Redirect ke halaman '/home/resep'
        return redirect()->to('/home/detail_penjualan');
    }

    public function edit_detail_penjualan($id)
    {
        // if(session()->get('level')== 4) {

        $model=new M_model();
        $where2=array('id_detail'=>$id);
        $on='detail_penjualan.id_penjualan=penjualan.id_penjualan';
        $on2='detail_penjualan.id_produk=produk.id_produk';
        $kui['ferdi'] = $model->edit_resep('detail_penjualan', 'penjualan', 'produk', $on, $on2, $where2);
        $kui['duar']=$model->tampil('penjualan'); 
        $kui['a']=$model->tampil('produk'); 

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $where=array('id_user' => session()->get('id'));
        $kui['user']=$model->getwhere('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('v_edit_detail_penjualan');
        echo view('footer');

//     }else{
//         return redirect()->to('/home/dashboard');
//     }
    }

    public function aksi_edit_detail_penjualan()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('id_penjualan');
        $b=$this->request->getPost('id_produk');
        $jumlah_produk=$this->request->getPost('jumlah_produk');
        $subtotal=$this->request->getPost('subtotal');

        $data=array(
            'id_penjualan'=>$a,
            'id_produk'=>$b,
            'jumlah_produk'=>$jumlah_produk,
            'subtotal'=>$subtotal            

        );
        // print_r($data);
        $where=array('id_detail'=>$id);
        $model->edit('detail_penjualan',$data,$where);
        return redirect()->to('/home/detail_penjualan');
    }

    public function hapus_detail_penjualan($id)
    {
        $model = new M_model();
        $where=array('id_detail'=>$id);
        $model->hapus('detail_penjualan',$where);
        return redirect()->to('/home/detail_penjualan');
    }

    public function produk()
    {
// if(session()->get('level')== 1) {

        $model = new M_model();
        $kui['ferdi'] = $model->tampil('produk');

        // $id = session()->get('id');
        // $where = array('id' => $id);

        echo view('header', $kui);
        echo view('menu');
        echo view('v_produk');
        echo view('footer');
// }else{
//     return redirect()->to('/home/dashboard');
// }
    }

    public function tambah_produk()
    {
        $model = new M_model();
        $kui['ferdi']=$model->tampil('produk');
        echo view('header');
        echo view('menu');
        echo view('v_tambah_produk',$kui);
        echo view('footer');
    }

    public function aksi_tambah_produk()
    {
        $a= $this->request->getPost('nama_produk');
        $b= $this->request->getPost('harga');
        $c= $this->request->getPost('stok');

        $simpan=array(
            'nama_produk'=>$a,
            'harga'=>$b,
            'stok'=>$c

        );
        $model = new M_model();
        $model->simpan('produk',$simpan);
        return redirect()->to('/home/produk');
    }

    public function edit_produk($id)
    {
        $model = new M_model();
        $where=array('id_produk'=>$id);
        $kui['ferdi']=$model->getRow('produk',$where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('header');
        echo view('menu');
        echo view('v_edit_produk',$kui);
        echo view('footer');
    }

    public function aksi_edit_produk()
    {
         $model=new M_model();
         $id= $this->request->getPost('id');
         $nama_produk= $this->request->getPost('nama_produk');
         $harga= $this->request->getPost('harga');
         $stok= $this->request->getPost('stok');
         

         $where=array('id_produk'=>$id);
         $simpan=array(
            'nama_produk'=>$nama_produk,
            'harga'=>$harga,
            'stok'=>$stok
    
         );

         $model = new M_model();
         $model->edit('produk', $simpan, $where);
         return redirect()->to('/home/produk');
    }

    public function hapus_produk($id)
    {
        $model = new M_model();
        $where=array('id_produk'=>$id);
        $model->hapus('produk',$where);
        return redirect()->to('/home/produk');
    }

//     public function resep()
//     {
//         // if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { 

//         $model = new M_model();
//         $on='resep.id_dokter=dokter.id_dokter';
//         $on2='resep.id_pasien=pasien.id_pasien';
//         $on3='resep.id_poliklinik=poliklinik.id_poliklinik';
//         $kui['ferdi'] = $model->ultra('resep', 'dokter', 'pasien', 'poliklinik', $on, $on2, $on3);

//         $id=session()->get('id');
//         $where=array('id_user'=>$id);
//         $where=array('id_user' => session()->get('id'));
//         $kui['user']=$model->getRow('user',$where);

//         echo view('header', $kui);
//         echo view('menu');
//         echo view('v_resep');
//         echo view('footer');
//     // }else{
//     //     return redirect()->to('/home/dashboard');
//     // }
//     }

//     public function tambah_resep()
//     {
//         // if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {

//         $model=new M_model();
//         $on='resep.id_dokter=dokter.id_dokter';
//         $on2='resep.id_pasien=pasien.id_pasien';
//         $on3='resep.id_poliklinik=poliklinik.id_poliklinik';
//         $kui['ferdi'] = $model->ultra('resep', 'dokter', 'pasien', 'poliklinik', $on, $on2, $on3);

//         $id=session()->get('id');
//         $where=array('id_user'=>$id);
//         $where=array('id_user' => session()->get('id'));    
//         $kui['user']=$model->getRow('user',$where);

//         $where=array('id_user' => session()->get('id'));
//         // $kui['user']=$model->getRow('user',$where);

//         $kui['duar']=$model->tampil('dokter'); 
//         $kui['a']=$model->tampil('pasien'); 
//         $kui['b']=$model->tampil('poliklinik'); 


//         echo view('header',$kui);
//         echo view('menu');
//         echo view('v_tambah_resep');
//         echo view('footer');

//     //     }else{
//     //     return redirect()->to('/home/dashboard');
//     // }
//     }

//     public function aksi_tambah_resep()
//     {
//         $model = new M_model();
//         $id_dokter = $this->request->getPost('id_dokter');
//         $id_pasien = $this->request->getPost('id_pasien');
//         $id_poliklinik = $this->request->getPost('id_poliklinik');
//         $tgl_resep = $this->request->getPost('tgl_resep');
//         $total_harga = $this->request->getPost('total_harga');
//         $bayar = $this->request->getPost('bayar');
//         $kembali = $this->request->getPost('kembali');

//         $data = array(
//             'id_dokter' => $id_dokter,
//             'id_pasien' => $id_pasien,
//             'id_poliklinik' => $id_poliklinik,
//             'tgl_resep' => $tgl_resep,
//             'total_harga' => $total_harga,
//             'bayar' => $bayar,
//             'kembali' => $kembali
//         );
//     // print_r($data);
//         // Simpan data ke dalam tabel 'resep' menggunakan model
//         $model->simpan('resep', $data);

//         // // Redirect ke halaman '/home/resep'
//         return redirect()->to('/home/resep');
//     }

//     public function edit_resep($id)
//     {
//         // if(session()->get('level')== 4) {

//         $model=new M_model();
//         $where2=array('id_resep'=>$id);
//         $on='resep.id_dokter=dokter.id_dokter';
//         $on2='resep.id_pasien=pasien.id_pasien';
//         $on3='resep.id_poliklinik=poliklinik.id_poliklinik';
//         $kui['ferdi'] = $model->edit_resep('resep', 'dokter', 'pasien', 'poliklinik', $on, $on2, $on3, $where2);
//         $kui['duar']=$model->tampil('dokter'); 
//         $kui['a']=$model->tampil('pasien'); 
//         $kui['b']=$model->tampil('poliklinik'); 

//         $id=session()->get('id');
//         $where=array('id_user'=>$id);
//         $where=array('id_user' => session()->get('id'));
//         $kui['user']=$model->getwhere('user',$where);

//         echo view('header',$kui);
//         echo view('menu');
//         echo view('v_edit_resep');
//         echo view('footer');

// //     }else{
// //         return redirect()->to('/home/dashboard');
// //     }
//     }

//     public function aksi_edit_resep()
//     {
//         $model=new M_model();
//         $id=$this->request->getPost('id');
//         $a=$this->request->getPost('id_pasien');
//         $b=$this->request->getPost('id_dokter');
//         $c=$this->request->getPost('id_poliklinik');
//         $tgl_resep=$this->request->getPost('tgl_resep');        
//         $total_harga=$this->request->getPost('total_harga');
//         $bayar=$this->request->getPost('bayar');
//         $kembali=$this->request->getPost('kembali');

//         $data=array(
//             'id_pasien'=>$a,
//             'id_dokter'=>$b,
//             'id_poliklinik'=>$c,
//             'tgl_resep'=>$tgl_resep,
//             'total_harga'=>$total_harga,
//             'bayar'=>$bayar,
//             'kembali'=>$kembali,            

//         );
//         // print_r($data);
//         $where=array('id_resep'=>$id);
//         $model->edit('resep',$data,$where);
//         return redirect()->to('/home/resep');
//     }

//     public function hapus_resep($id)
//     {
//         $model = new M_model();
//         $where=array('id_resep'=>$id);
//         $model->hapus('resep',$where);
//         return redirect()->to('/home/resep');
//     }

    public function laporan_penjualan()
    {
        // if(session()->get('level')== 2) {

        $model=new M_model();
        $kui['kunci']='view_penjualan';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu',$kui);
        echo view('filter',$kui);
        echo view('footer');

    //     }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

    public function cari_penjualan()
    {
        // if(session()->get('level')== 2) {

        $model=new M_model();
        // $on = 'pembayaran.id_pasien = pasien.id_pasien';
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['ferdi'] = $model->filter('penjualan', $awal, $akhir);
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\pengajian\public\assets\KOP_PH.jpg');

        // $kui['foto'] = base64_encode($img);


        echo view('c_p',$kui);

    //     }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

    public function pdf_penjualan()
    {
        // if(session()->get('level')== 2) {

        $model=new M_model();
        // $on = 'pembayaran.id_pasien = pasien.id_pasien';
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['ferdi']=$model->filter('penjualan', $awal, $akhir);
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\pegawai\public\assets\KOP_PH.jpg');

        // $kui['foto'] = base64_encode($img);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('c_p',$kui));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>0));

    //     }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }

    public function excel_penjualan()
    {
    // if(session()->get('level')== 2) {

    $model=new M_model();
    // $on = 'pembayaran.id_pasien = pasien.id_pasien';
    $awal= $this->request->getPost('awal');
    $akhir= $this->request->getPost('akhir');
    $data=$model->filter('penjualan', $awal, $akhir);

    $spreadsheet=new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tanggal penjualan')
    ->setCellValue('B1', 'Total Harga');


    // ->setCellValue('C1', 'Jarak')
    // // ->setCellValue('D1', 'Due Date')
    // ->setCellValue('D1', 'Suhu')
    // ->setCellValue('E1', 'Tanggal Perjalanan');

    $column=2;

    foreach($data as $data){

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'. $column, $data->tanggal_penjualan)
        ->setCellValue('B'. $column, $data->total_harga);
      

        // ->setCellValue('C'. $column, $data->jarak)
        // // ->setCellValue('D'. $column, $data->tgl_jatuh_tempo)
        // ->setCellValue('D'. $column, $data->suhu)
        // ->setCellValue('E'. $column, $data->tanggal_perjalanan);

        // $total += $data->jumlah_gaji;

        $column++;
    }
    $writer = new XLsx($spreadsheet);
    $fileName = 'penjualan';

    header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition:attachment;filename='.$fileName.'.xls');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }
}