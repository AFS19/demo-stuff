<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            [
                'name' => 'Cardiology',
                'description' => 'Diagnosis and treatment of heart disorders.'
            ],
            [
                'name' => 'Dermatology',
                'description' => 'Medical specialty dealing with skin, hair, nails, and related disorders.'
            ],
            [
                'name' => 'Endocrinology',
                'description' => 'Focuses on hormones and glands that produce them.'
            ],
            [
                'name' => 'Gastroenterology',
                'description' => 'Study of digestive system and its disorders.'
            ],
            [
                'name' => 'Neurology',
                'description' => 'Deals with disorders of the nervous system.'
            ],
            [
                'name' => 'Obstetrics and Gynecology',
                'description' => "Women's health, pregnancy, and childbirth."
            ],
            [
                'name' => 'Ophthalmology',
                'description' => 'Diagnosis and treatment of eye disorders . '
            ],
            [
                'name' => 'Orthopedics',
                'description' => 'Focuses on the musculoskeletal system . '
            ],
            [
                'name' => 'Pediatrics',
                'description' => 'Medical care of infants, children, and adolescents . '
            ],
            [
                'name' => 'Psychiatry',
                'description' => 'Diagnosis and treatment of mental disorders . '
            ],
            [
                'name' => 'Radiology',
                'description' => 'Medical imaging to diagnose and treat diseases . '
            ],
            [
                'name' => 'Surgery',
                'description' => 'Medical specialty that uses operative techniques . '
            ],
            [
                'name' => 'Urology',
                'description' => 'Focuses on the urinary tract system and male reproductive organs . '
            ],
            [
                'name' => 'Family Medicine',
                'description' => 'Comprehensive healthcare for people of all ages . '
            ],
            [
                'name' => 'Internal Medicine',
                'description' => 'Deals with diagnosis, treatment, and prevention of adult diseases . '
            ],
        ];

        foreach ($specialities as $speciality) {
            Speciality::create($speciality);
        }
    }
}
