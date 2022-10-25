<?php
namespace App\Http\Controllers\instansi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InstansiModel;
use DataTables;
use Session;
use App\menu;
use App\Level;
use App\galerymodel;
use App\aksesmenuModel;
use App\KordinatModel;
use App\AbsenModel;
use App\Cmenu;
use DateTime;
use DatePeriod;
use DateInterval;
use Intervention\Image\ImageManagerStatic as Image;
class AbsensiCo extends Controller
{
  public function __construct()
{
  $this->primary = "id_absensi";
  $this->main    = "theme.absensi";
  $this->level   = Session::get('level');
  $this->userid  = Session::get('id_user');
  $this->msukses = 'Data Berhasil disimpan';
  $this->msupdate = 'Data Berhasil diupdate';
  $this->index   = $this->main.".index";

}

public function index(){
  $class    = new Cmenu();
  $ki       = substr(Session::get('kode_unitkerja'),0,8);
  $data     = $class->getpegawaiinstansi($ki);
  return view($this->index,compact('data'));
}
public function laporan(){
  $class    = new Cmenu();
  $ki       = substr(Session::get('kode_unitkerja'),0,8);
  $data     = $class->getpegawaiinstansi($ki);
  return view($this->main.'.laporan',compact('data'));
}
public function save(Request $r){
  if($r->file('file')) {
    $r->validate([
       'file' => 'required|mimes:png,jpg,jpeg|max:2048'
    ]);
        $file = $r->file('file');
        $ext  = $file->getClientOriginalExtension();
        $name = time().'.'.$ext;
        $image_resize = Image::make($file->getRealPath());
        $image_resize->resize(800, 600);
        $image_resize->save(public_path('theme/galery/'.$name));
        $data=[
          'judul'=>$r->judul,
          'file'=>$name
        ];
        $act = galerymodel::insert($data);
        return back()->with('success',$this->msukses);
   }

}
public function ajukanizin(Request $r){
  $pg        = $r->pg;
  $file      = $r->file('file');
  $namefile  = $file->getClientOriginalName();
  $latitude  = ($r->has('latitude')) ? $r->latitude:'0';
  $longitude = ($r->has('longitude')) ? $r->longitude:'0';
  $destinationPath = 'suratizin/'.Session::get('kode_unitkerja').'/';
  $file->move($destinationPath,$namefile);
  $dari      = new DateTime($r->awal);
  $tgl2      = date('Y-m-d', strtotime('+1 days', strtotime($r->akhir)));
  $sampai    = new DateTime($tgl2);
  $interval  = DateInterval::createFromDateString('1 day');
  $periode   = new DatePeriod($dari,$interval,$sampai);
  foreach ($pg as $p) {
    foreach ($periode as $dt ) {
      $data=[
        'id_absen'=>uniqid(),
        'id_pegawai'=>$p,
        'status'=>$r->jenis,
        'jenis'=>$r->kat,
        'no_surat'=>$r->nosurat,
        'latitude'=>$latitude,
        'longitude'=>$latitude,
        'swafoto'=>'dinas.png',
        'tglabsen'=>$dt->format('Y-m-d'),
        'file'=>$namefile,
      ];
      $act  = AbsenModel::insert($data);
    }

  }
  return back()->with('success','Data berhasil disimpan');

}
public function update(Request $r){
  if($r->file('file')) {
    $r->validate([
       'file' => 'required|mimes:png,jpg,jpeg|max:2048'
    ]);
        $file = $r->file('file');
        $ext  = $file->getClientOriginalExtension();
        $name = time().'.'.$ext;
        $image_resize = Image::make($file->getRealPath());
        $image_resize->resize(800, 600);
        $image_resize->save(public_path('theme/galery/'.$name));
        if($r->logold != 'admin.png'){
        if(file_exists(public_path('theme/galery/'.$r->logold)))
        {
        unlink(public_path('theme/galery/'.$r->logold));
        }
        }
        $data=[
          'judul'=>$r->judul,
          'file'=>$name
        ];
        $act = galerymodel::where('id_galery',$r->id)->update($data);
        return back()->with('success',$this->msukses);
   }else{
     $data=[
       'judul'=>$r->judul
     ];
     $act = galerymodel::where('id_galery',$r->id)->update($data);
     return back()->with('success',$this->msukses);
   }
}

public function hapus($id=null){
  $check = galerymodel::where('id_galery',base64_decode($id))->count();
  if($check > 0){
    $act = galerymodel::where($this->primary,base64_decode($id))->delete();
    return back()->with('success','Data berhasil dihapus');
  }else{
    return back()->with('danger','Data tidak tersedia');
  }

}


     }
