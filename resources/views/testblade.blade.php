@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @php
                    use App\Desa;

                    $faker = Faker\Factory::create('id_ID');
                    $results = DB::select(
                        'SELECT id FROM desa WHERE id_kecamatan IN (SELECT id FROM kecamatan WHERE id_kabupaten IN (SELECT id FROM kabupaten WHERE id_provinsi=35))'
                        );
                    $resultArray = json_decode(json_encode($results), true);
                    // dd(collect($resultArray)->flatten());
                    
                    $pendapatan = array("Penghasilan Usaha Pokok","Penghasilan Usaha Sampingan","Penghasilan Istri/Suami","Penghasilan Anak/Menantu","Penghasilan Lainnya (Sebutkan)");
                    foreach ($pendapatan as $value) {
                        echo $value;
                        echo "<br>";
                    }
                    echo 500000*1.1;
                    for ($i = 0; $i < 10; $i++) {
                      // echo $faker->name(); 
                      echo $faker->name('female');
                      echo "<br>";
                      echo $faker->randomElement(collect($resultArray)->flatten());
                      echo "<br>";
                      echo $faker->address();
                      echo "<br>";
                      echo Carbon\Carbon::now()->toDateTimeString();
                      echo "<br>";
                      echo $faker->randomElement(['LAYAK','TIDAK']);
                      echo "<br>";
                      echo Carbon\Carbon::now()->addDays(7);
                      echo "<br>";
                      echo $faker->randomFloat(2,1.0, 1.2);
                      echo "<br>";
                      echo 10000 * $faker->randomFloat(2,1.0, 1.2);
                      echo "<br>";
                      echo "<br>";
                    }
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
