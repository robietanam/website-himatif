<?php

use Illuminate\Database\Seeder;

class ProkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prokers = [];
        $prokers[] = [
            'name' => 'Proker Himatif',
            'description' => 'Proker himatif adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius necessitatibus quod qui, maiores eum nam repellendus quasi, soluta hic architecto fugiat illo? Dolor magni dolorem veritatis dicta minus tenetur delectus ratione magnam, rem eveniet eligendi illum enim libero animi eius hic at aliquam dolore ipsa harum fugiat quas! Expedita, aperiam?',
            'is_registration_open' => '1',
            'status' => '1',
            'link_registration' => 'https://www.google.com/',
        ];
        $prokers[] = [
            'name' => 'Proker Himatif 2',
            'description' => 'Proker himatif adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius necessitatibus quod qui, maiores eum nam repellendus quasi, soluta hic architecto fugiat illo? Dolor magni dolorem veritatis dicta minus tenetur delectus ratione magnam, rem eveniet eligendi illum enim libero animi eius hic at aliquam dolore ipsa harum fugiat quas! Expedita, aperiam?',
            'is_registration_open' => '0',
            'status' => '0',
            'link_registration' => 'https://www.google.com/',
        ];
        DB::table('prokers')->insert($prokers);
        $this->command->info("Data Dummy Proker berhasil diinsert");
    }
}
