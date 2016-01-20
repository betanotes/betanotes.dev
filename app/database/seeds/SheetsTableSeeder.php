<?php 

class SheetsTableSeeder extends Seeder {

    public function run()
    {
        $user = User::firstOrFail();

        $sheet1 = new Sheet();
        $sheet1->title = 'The Planets in Portuguese'; 
        $sheet1->public_or_private = 'private';
        $sheet1->user_id = $user->id;
        $sheet1->save();

        $sheet2 = new Sheet();
        $sheet2->title = 'State Capitals';
        $sheet2->public_or_private = 'public';
        $sheet2->user_id = $user->id;
        $sheet2->save();

        $sheet3 = new Sheet();
        $sheet3->title = 'State Birds';
        $sheet3->public_or_private = 'private';
        $sheet3->user_id = $user->id;
        $sheet3->save();

        $sheet4 = new Sheet();
        $sheet4->title = 'European Capitals';
        $sheet4->public_or_private = 'public';
        $sheet4->user_id = $user->id;
        $sheet4->save();

        $sheet5 = new Sheet();
        $sheet5->title = 'Spanish Vocab List 7';
        $sheet5->public_or_private = 'public';
        $sheet5->user_id = $user->id;
        $sheet5->save();
    }
}