<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class ImportUnspscCodes extends Command
{
    protected $signature = 'import:unspsc';
    protected $description = 'Import UNSPSC codes from a CSV file';

    public function handle()
    {
        $path = storage_path('app/unspsc/unspsc_codes.csv');
        dd($path);

        if (!file_exists($path)) {
            $this->error('CSV file does not exist.');
            return;
        }
        
        $file = fopen($path, 'r');
        if ($file === false) {
            $this->error('Unable to open the CSV file.');
            return;
        }

        $header = fgetcsv($file);  
        if ($header === false) {
            $this->error('Unable to read the header line.');
            fclose($file);
            return;
        }
        
        while (($row = fgetcsv($file)) !== false) {
            $segment = $row[0];
            $segmentTitleEn = $row[1];
            $segmentTitleFr = $row[2];
            $family = $row[3];
            $familyTitleEn = $row[4];
            $familyTitleFr = $row[5];
            $class = $row[6];
            $classTitleEn = $row[7];
            $classTitleFr = $row[8];
            $commodity = $row[9];
            $commodityTitleEn = $row[10];
            $commodityTitleFr = $row[11];

            DB::table('unspsc_codes')->updateOrInsert(
                ['commodity' => $commodity], // Clé unique
                [
                    'segment' => $segment,
                    'segment_title_en' => $segmentTitleEn,
                    'segment_title_fr' => $segmentTitleFr,
                    'family' => $family,
                    'family_title_en' => $familyTitleEn,
                    'family_title_fr' => $familyTitleFr,
                    'class' => $class,
                    'class_title_en' => $classTitleEn,
                    'class_title_fr' => $classTitleFr,
                    'commodity_title_en' => $commodityTitleEn,
                    'commodity_title_fr' => $commodityTitleFr,
                ]
            );
            $this->info("Imported record with commodity: {$commodity}");
        }

        fclose($file);

        $this->info('Unspsc codes imported successfully.');
    }
}
