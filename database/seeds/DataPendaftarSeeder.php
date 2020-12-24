<?php

use App\IndikatorKeimanan;
use App\Pendaftar;
use App\PendaftarDetail;
use App\PendaftarFoto;
use App\PendaftarKeluarga;
use App\PendapatanKeluarga;
use App\PengeluaranKeluarga;
use App\ProgramLain;
use App\RekapitulasiKelayakan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Pendaftar
        // //php artisan db:seed --class=DataPendaftarSeeder
        DB::transaction(function () {
            $faker = Faker\Factory::create('id_ID');
            $results = DB::select(
                'SELECT id FROM desa WHERE id_kecamatan IN (SELECT id FROM kecamatan WHERE id_kabupaten IN (SELECT id FROM kabupaten WHERE id_provinsi=35))'
            );
            $date = Carbon\Carbon::now();
            for ($i = 0; $i < 100; $i++) {
                $resultArray = json_decode(json_encode($results), true);
                $alamat_pendaftar = $faker->address();
                $id_desa = $faker->randomElement(collect($resultArray)->flatten());
                $isAsal = $faker->randomElement([true, false]);
                $isMale = $faker->randomElement([true, false]);
                $namaPendaftar = $isMale ? $faker->name('male') : $faker->name('female');
                $id = Pendaftar::insertGetId([
                    "nama" => $namaPendaftar,
                    "users_id" => NULL,
                    "id_desa_sekarang" => $id_desa,
                    "alamat_sekarang" => $alamat_pendaftar,
                    "id_desa_asal" => $isAsal ? $id_desa : $faker->randomElement(collect($resultArray)->flatten()),
                    "alamat_asal" => $isAsal ? $alamat_pendaftar : $faker->address(),
                    "program" => "Studi Kelayakan Mitra (Program)",
                    "data_ke" => 0,
                    "tgl_input" => $date,
                    "rekomendasi" => $faker->randomElement([true, false]),
                    "keterangan" => $faker->text,
                    "tgl_cek" => $date->addDays(7),
                    "surveyor" => "Evry Nazyli",
                    "surveyor_id" => 1,
                ]);

                $jumlahHewan = $faker->randomElement([1, 2, 3]);
                $hewan = NULL;
                if ($jumlahHewan == 1) {
                    $hewan = "Unggas:" . $faker->numberBetween(1, 20);
                } elseif ($jumlahHewan == 2) {
                    $hewan = "Unggas:" . $faker->numberBetween(1, 20) . ",Kambing/Domba:" . $faker->numberBetween(1, 10);
                } else {
                    $hewan = "Unggas:" . $faker->numberBetween(1, 20) . ",Kambing/Domba:" . $faker->numberBetween(1, 10) . ",Sapi/Kerbau:" . $faker->numberBetween(1, 10);
                }
                PendaftarDetail::insert([
                    "pendaftar_id" => $id,
                    "idx_ukuran_rumah" => $faker->randomElement(["Sangat kecil (< 4 m<sup>2</sup>)", "Kecil (4 - 6 m<sup>2</sup>)", "Sedang (6 - 8 m<sup>2</sup>)", "Besar (> 8 m<sup>2</sup>)"]),
                    "idx_dinding" => $faker->randomElement(["Bilik bambu/Kayu", "Semi", "Gypusm", "Tembok/Beton"]),
                    "idx_lantai" => $faker->randomElement(["Tanah", "Panggung", "Semen", "Keramik"]),
                    "idx_atap" => $faker->randomElement(["Kirai/Ijuk", "Genteng/Seng", "Asbes/Berglazur"]),
                    "idx_kpm_rumah" => $faker->randomElement(["Menumpang", "Kontrak", "Keluarga", "Sendiri"]),
                    "idx_dapur" => $faker->randomElement(["Tungku", "Kompor Minyak", "Kompor Gas/Listrik"]),
                    "idx_kursi" => $faker->randomElement(["Lesehan", "Balai Bambu", "Kayu", "Sofa"]),
                    "aset_pribadi_sawah" => $faker->randomElement(["Tidak Ada", "< 1000 m<sup>2</sup>", "1000 - 5000 m<sup>2</sup>", "> 5000 m<sup>2</sup>"]),
                    "aset_pribadi_elektronik" => $faker->randomElement(["Radio", "Tape", "Televisi", "CD. Player", "Kulkas"]),
                    "aset_pribadi_kendaraan" => $faker->randomElement(["Tidak Ada", "Sepeda Kayuh", "Sepeda Motor", "Mobil"]),
                    "aset_pribadi_ternak" => $hewan,
                    "aset_pribadi_simpanan" => $faker->randomElement(["Ada (Rp " . $faker->numberBetween(100000, 5000.000) . ")", "Tidak Ada"]),
                    "aset_produktif_jenis" => NULL,
                    "aset_produktif_penggunaan" => $faker->randomElement(["Bertambahnya aset produktif", "Investasi usaha lain", "Investasi usaha turunan"])
                ]);


                PendaftarKeluarga::insert([
                    "pendaftar_id" => $id,
                    "nama" => $namaPendaftar,
                    "umur" => $faker->numberBetween(30, 40),
                    "hubungan" => $isMale ? "Kepala Keluarga" : "Istri",
                    "status" => "Kawin",
                    "pekerjaan_utama" => $faker->randomElement(['PNS', 'Swasta', 'Wiraswata', 'Petani', 'Buruh', 'Lain-Lain']),
                    "pekerjaan_sampingan" => $faker->randomElement(["Admin Olshop", "Jasa Laundry", "Menjual Kue", "Freelance", NULL]),
                    "pendidikan" => $faker->randomElement(['SD/MI', 'SMP/MTs', 'SMA/SMK', "Diploma", 'Sarjana', 'Magister', "Doketer"]),
                    "keteterangan" => $faker->text
                ]);
                PendaftarKeluarga::insert([
                    "pendaftar_id" => $id,
                    "nama" => $isMale ? $faker->name('female') : $faker->name('male'),
                    "umur" => $faker->numberBetween(30, 40),
                    "hubungan" => $isMale ? "Istri" : "Suami",
                    "status" => "Kawin",
                    "pekerjaan_utama" => $faker->randomElement(['PNS', 'Swasta', 'Wiraswata', 'Petani', 'Buruh', 'Lain-Lain']),
                    "pekerjaan_sampingan" => $faker->randomElement(["Admin Olshop", "Jasa Laundry", "Menjual Kue", "Freelance", NULL]),
                    "pendidikan" => $faker->randomElement(['SD/MI', 'SMP/MTs', 'SMA/SMK', "Diploma", 'Sarjana', 'Magister', "Doketer"]),
                    "keteterangan" => $faker->text
                ]);

                for ($j = 0; $j < $faker->numberBetween(0, 3); $j++) {
                    PendaftarKeluarga::insert([
                        "pendaftar_id" => $id,
                        "nama" => $faker->name('female'),
                        "umur" => $faker->numberBetween(10, 25),
                        "hubungan" => "Anak",
                        "status" => "Belum Kawin",
                        "pekerjaan_utama" => $faker->randomElement([NULL, $faker->randomElement(['PNS', 'Swasta', 'Wiraswata', 'Petani', 'Buruh', 'Lain-Lain'])]),
                        "pekerjaan_sampingan" => $faker->randomElement([NULL, $faker->randomElement(["Admin Olshop", "Jasa Laundry", "Menjual Kue", "Freelance"])]),
                        "pendidikan" => $faker->randomElement(['SD/MI', 'SMP/MTs', 'SMA/SMK', "Diploma", 'Sarjana', 'Magister', "Doketer"]),
                        "keteterangan" => $faker->text
                    ]);
                    }
                    // Pendapatan Keluarga
                    $pendapatan = array("Penghasilan Usaha Pokok", "Penghasilan Usaha Sampingan", "Penghasilan Istri/Suami", "Penghasilan Anak/Menantu", "Penghasilan Lainnya (Sebutkan)");
                    foreach ($pendapatan as $value) {
                        PendapatanKeluarga::insert([
                            "pendaftar_id" => $id,
                            "nama_pendapatan" => $value,
                            "jumlah" => $faker->numberBetween(1, 50) . "00000",
                        ]);
                    }

                    // Pengeluaran Keluarga
                    $pendapatan = array("Kebutuhan Dapur", "Pendidikan", "Kesehatan", "Transportasi", "Iuran Rutin (Listrik, Siskamling, PAM)", "Angsuran lainnya");
                    foreach ($pendapatan as $value) {
                        PengeluaranKeluarga::insert([
                            "pendaftar_id" => $id,
                            "nama_pengeluaran" => $value,
                            "jumlah" => $faker->numberBetween(1, 100) . "0000",
                        ]);
                    }

                    // Program lain
                    $isPinjam = $faker->randomElement(["Ya", "Tidak"]);
                    $besarPinjam = $isPinjam == "Ya" ? $faker->numberBetween(1, 50) . "00000" : NULL;
                    ProgramLain::insert([
                        "pendaftar_id" => $id,
                        "isPinjam" => $isPinjam,
                        "nama_lembaga" => $isPinjam == "Ya" ? $faker->randomElement(["Bank", "Koperasi"]) : NULL,
                        "besar_pinjaman" => $besarPinjam,
                        "cara_pengembalian" => $isPinjam == "Ya" ? $faker->randomElement(["Diangsur/Dicicil", "Jatuh Tempo"]) : NULL,
                        "lama_pinjaman" => $isPinjam == "Ya" ? $faker->numberBetween(1, 10) : NULL,
                        "pinjaman_per" => $isPinjam == "Ya" ? $faker->randomElement(['Minggu', 'Bulan', 'Tahun']) : NULL,
                        "total_pinjam" => $besarPinjam != NULL ? $besarPinjam * $faker->randomFloat(2, 1.0, 1.2) : NULL,
                        "isLunas" => $isPinjam == "Ya" ? $faker->randomElement(['Sudah', 'Belum']) : NULL,
                        "terlibat_program" => $faker->randomElement(['Pernah', 'Belum']),
                        "pernah_pengurus" => $faker->randomElement(['Pernah', 'Belum']),
                    ]);

                    // Indikator Keimanan
                    IndikatorKeimanan::insert([
                        "pendaftar_id" => $id,
                        "kebiasaan_patologis" => $faker->randomElement(["Ya", "Tidak"]),
                        "sholat_fardu" => $faker->randomElement(["Rutin", "Jarang", "Tidak Pernah"]),
                        "kegiatan_pengajian" => $faker->randomElement(["Rutin", "Jarang", "Tidak Pernah"]),
                        "kegiatan_berinfaq" => $faker->randomElement(["Rutin", "Jarang", "Tidak Pernah"]),
                    ]);

                    $parameter = array("Indeks Rumah", "Kepemilikan Harta","Pendapatan");
                    foreach ($parameter as $value) {
                    RekapitulasiKelayakan::insert([
                            "pendaftar_id" => $id,
                            "parameter" => $value,
                            "kelayakan" => $faker->randomElement([true, false]),
                            "keterangan" => $faker->text,
                    ]);
                    }

                    PendaftarFoto::insert([
                            "pendaftar_id" => $id,
                            "foto_ktp" => "ktpsample.jpg",
                            "foto_kk" => "kksample.jpg",
                            "foto_diri" => "profilsample.jpg",
                            "foto_rumah" => "rumahsample.jpg",
                            "isDisplay" => true,
                    ]);
                
            }
        });
    }
}
